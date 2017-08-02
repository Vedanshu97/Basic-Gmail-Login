<?php

session_start();
require_once 'dbcontroller.php';

require_once './google-api-php-client/vendor/autoload.php';

$redirect_uri = "http://localhost/BasicGoogleLogin/googleSignIn.php";
$redirect_uri_logout = "http://localhost/BasicGoogleLogin/index.php";

//Creating Google Client using downloaded JSON credentials
$client = new Google_Client();
$client->setApplicationName('Simple Gmail Login');
$client->addScope("https://www.googleapis.com/auth/userinfo.profile");
$client->addScope("https://www.googleapis.com/auth/userinfo.email");
$client->setAuthConfig('./client_secret.json');
$client->setRedirectUri($redirect_uri);

//Send Client Request
$objOAuthService = new Google_Service_Oauth2($client);

//Logout
if (isset($_REQUEST['logoutGmail'])) {
  unset($_SESSION['access_token']);
  $client->revokeToken();
  header('Location: ' . filter_var($redirect_uri_logout, FILTER_SANITIZE_URL)); //redirect user back to main page
  die;
}

//Get and Set Access Token
if (isset($_GET['code'])) {
  $client->authenticate($_GET['code']);
  $_SESSION['access_token'] = $client->getAccessToken();
  header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
  die;
}

//Set Access Token using Session (already fetched)
if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
  $client->setAccessToken($_SESSION['access_token']);
}

//User Authorized and Access Token not expired
if($client->getAccessToken()){
  //Get User Data
  $userData = $objOAuthService->userinfo->get();

  if(!empty($userData)) {
    $objDBController = new DBController();
    $isNewUser = $objDBController->isNewUser($userData->id);

    //if New User,insert into Database
    if($isNewUser) {
      $objDBController->addUser($userData);
      ?><script>alert('New User ! Added to DB...');</script><?php
    }

    //Display Data
    ?>
    <img src="<?php echo $userData["picture"]; ?>" width="100px" size="100px" /><br/>
    <p>Hey there, <a href="<?php echo $userData["link"]; ?>" target="_blank"><?php echo $userData["name"]; ?></a>.</p>
    <p>Email : <?php echo $userData["email"]; ?></p>
    <div><a href='?logoutGmail'>Logout</a></div>
    <?php

  } else {
    echo "<h3> Error fetching User Data ! </h3>";
  }
} else {
  $auth_url = $client->createAuthUrl();
  header('Location: ' . filter_var($auth_url, FILTER_SANITIZE_URL));
}
?>
