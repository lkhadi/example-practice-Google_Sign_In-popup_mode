<html lang="en">
  <head>
    <meta name="google-signin-scope" content="profile email">
    <meta name="google-signin-client_id" content="911706458791-0tu98raksnbn2v2uobo8n7c77u8qqanr.apps.googleusercontent.com">
  </head>
  <body>

    <button id="googleSignIn">Login</button>
    <div id="result"></div>
    <script type="text/javascript">
      function onLoadGoogleCallback(){
  gapi.load('auth2', function() {
    auth2 = gapi.auth2.init({
      cookiepolicy: 'single_host_origin'
    });

  auth2.attachClickHandler(element, {},
    function(googleUser) {
        var id_token = googleUser.getAuthResponse().id_token;
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'http://localhost/gsign/validasi_token.php');
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onload = function() {
          var output = JSON.parse(xhr.responseText);
          var html = "<h4>"+output.name+"</h4>"+"<h6>"+output.email+"</h6><br><img src='"+output.picture+"'>";
          var result = document.getElementById("result");
          result.innerHTML = html;
        };
        xhr.send('idtoken=' + id_token);
      }, function(error) {
        alert('Error');
      }
    );
  });

  element = document.getElementById('googleSignIn');
}
    </script>
<script src="https://apis.google.com/js/platform.js?onload=onLoadGoogleCallback" async defer></script>




<!--     <div class="g-signin2" data-onsuccess="onSignIn" data-theme="dark" id="signin"></div>
    <script>
      // gapi.load('auth2', function(){
      //   gapi.auth2.init();
      // });
      function onSignIn(googleUser) {
        // Useful data for your client-side scripts:
        // var profile = googleUser.getBasicProfile();
        // console.log("ID: " + profile.getId()); // Don't send this directly to your server!
        // console.log('Full Name: ' + profile.getName());
        // console.log('Given Name: ' + profile.getGivenName());
        // console.log('Family Name: ' + profile.getFamilyName());
        // console.log("Image URL: " + profile.getImageUrl());
        // console.log("Email: " + profile.getEmail());

        // The ID token you need to pass to your backend:
        var id_token = googleUser.getAuthResponse().id_token;
        // window.location.href = 'https://www.googleapis.com/oauth2/v3/tokeninfo?id_token='+id_token;
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'http://localhost/gsign/token.php');
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onload = function() {
          alert('Signed in as: ' + xhr.responseText);
        };
        xhr.send('idtoken=' + id_token);
      };
    </script>
    <a href="http://localhost/gsign/" onclick="signOut();">Sign out</a>
<script>
  function signOut() {
    var auth2 = gapi.auth2.getAuthInstance().disconnect();
  }
</script> -->
  </body>
</html>