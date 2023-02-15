import jwtDecode from 'https://esm.run/jwt-decode';

function handleCredentialResponse(response) {
  console.log(response);

  const responsePayLoad = jwtDecode(response.credential);
  console.log("ID: " + responsePayLoad.sub);
  console.log('Full Name: ' + responsePayLoad.name);
  console.log('Given Name: ' + responsePayLoad.given_name);
  console.log('Family Name: ' + responsePayLoad.family_name);
  console.log("Image URL: " + responsePayLoad.picture);
  console.log("Email: " + responsePayLoad.email);

  var myEmailFromGoo = responsePayLoad.email;
  var name = responsePayLoad.name;
  var id = responsePayLoad.sub;

  // The ID token you need to pass to your backend:
  // var id_token = googleUser.getAuthResponse().id_token;
  // console.log("ID Token: " + id_token);

  // var auth2 = gapi.auth2.getAuthInstance();
  // auth2.disconnect();

  $.ajax({
    type: 'GET',
    url: 'phpFiles/googleSignUp.php',
    data: {
      gooEmail: myEmailFromGoo
    },
    success: function (response) {

      if (response !== "1") {
        openGooSign();
        document.getElementById("gooName").value = name;
        document.getElementById("gooEmail").value = myEmailFromGoo;
      } else {
        $("#submitResult").html("Successfully Logged In");
        location.reload();
      }
    },
    error: function (e) {
      alert("Some error occured check console");
      console.log(e);
    }
  });


  $('#FormGoogSignUp').submit(function (e) {
    //                alert("GooForm Submit");
    e.preventDefault();
    $.ajax({
      type: "POST",
      url: 'phpFiles/googleSignUp.php',
      data: $(this).serialize(),
      success: function (response) {
        document.getElementById("submitResult").style.display = "block";
        if (response === "1") {
          $("#submitResult").html("Created your ID successfully.<br/>You have recieved <b>5</b> <i class='fas fa-coins'></i>. ");
          location.reload();
        } else {
          $("#submitResult").html("Sorry some error occured. Please contact the developer.");
        }
      },
      error: function (ts) {
        console.log(ts.responseText);
      }
    });
  });

  /*function onSignFailed(error) {
      alert("Sign in / up Cancelled: " + error);
      console.log("==============");
      console.log("Error while logging in via google");
      console.log(error);
      console.log("==============");
  }*/



}

window.handleCredentialResponse = handleCredentialResponse;