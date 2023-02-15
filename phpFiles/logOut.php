<?php
session_start();
session_destroy();
echo "<script>alert('Successfully Logged Out.');</script>";
        
echo "<script>
        history.go(-2);
        var auth2 = gapi.auth2.getAuthInstance();
        auth2.signOut().then(function () {
          console.log('User signed out.');
        });
        
    </script>";

?>