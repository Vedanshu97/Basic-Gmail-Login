<html lang="en">
  <head>
    <title>Google Login</title>
    <meta name="google-signin-client_id" content="131764845963-p3tnh3gohk6pkm5dp4p2eqaiplervn2a.apps.googleusercontent.com">
    <script src="https://apis.google.com/js/platform.js" async defer></script>
  </head>

  <body>
    
    <h4>
        Gmail Login via JS !
    </h4>
    <div class="g-signin2" data-onsuccess="onSignIn"></div>
    <script>
      function onSignIn(userInfo) {
        var user = userInfo.getBasicProfile();
        console.log("ID: " + user.getId());
        console.log('Full Name: ' + user.getName());
        console.log("Image URL: " + user.getImageUrl());
        console.log("Email: " + user.getEmail());
        console.log("ID Token: " + userInfo.getAuthResponse().id_token);
      };
    </script>
  
  <br/><br/>
	
  <h4>
    <a href="googleSignIn.php"> 
      Gmail Login via PHP !
    </a>
  </h4>

  </body>

</html>
