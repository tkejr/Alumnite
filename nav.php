<?php
session_start();
// include 'headerFiles.php';
?>

<!-------------Google Sign in--------------->
<meta name="google-signin-scope" content="profile email">
<meta name="google-signin-client_id" content="519957784838-d0qblpr4hi0mtucb7jcq70r57ukkv54q.apps.googleusercontent.com">
<script src="https://apis.google.com/js/platform.js" async defer></script>
<!--*********************************-->

<link rel="stylesheet" href="navFiles/styles.css">
<script src="navFiles/responsive-nav.js"></script>

<!--*******************************************-->


<style type="text/css">
    .form-control:focus {
        border: 0;
        box-shadow: none;
    }

    .form-control {
        border: 0 !important;
        font-size: 20px;
        margin-left: 10px;
        background-color: #fff;
    }

    .input-group-addon {
        margin-bottom: 0px;
        margin-top: 8px;
    }

    #goToLogin {
        color: #000000;
        border: 2px solid black;
        text-align: center;
        padding-left: 10px;
        padding-right: 10px;
        padding-top: 2px;
        padding-bottom: 2px;
        border-radius: 20px;
    }

    #goToLogin:hover {
        text-decoration: none;
        color: #fff;
        background-color: #000;
    }

    #goToRegister {
        color: #000000;
        border: 2px solid black;
        text-align: center;
        padding-left: 10px;
        padding-right: 10px;
        padding-top: 2px;
        padding-bottom: 2px;
        border-radius: 20px;
    }

    #goToRegister:hover {
        text-decoration: none;
        color: #ffffff;
        background-color: #000;
    }

    #logInForgotPass {
        color: #0cc1d8;
        float: right;
        margin-bottom: 15px;
        margin-right: 10px;
    }

    #logInForgotPass:hover {
        text-decoration: none;
        color: #023762;
    }

    #submitResult {
        display: none;
        border: 1px dotted black;
        color: black;
        text-align: center;
        width: 100%;
        padding: 10px;
        border-radius: 10px;
    }

    #AlHaveAcc {
        color: #c0c0c0;
    }
</style>

</head>

<body>

    <?php
    // if (isset($_SESSION['Email'])) 
    // {
    //     echo "Logged in";
    // }
    // else
    // {
    //     echo "Logged out";
    // }
    ?>

    <div class="navBarMy">
        <a href="index.php"><img src="img/logo.png" width="80" height="70"></a>
        <a id="name" href="UploadDownload.php">Alumnite</a>
        <nav class="nav-collapse">
            <ul>
                <!--                <li class="menu-item"><a href="UploadDownload.php">Home</a></li>-->
                <li class="menu-item"><a href="#">QA</a></li>
                <li class="menu-item"><a href="About.php">About</a></li>
                <li class="menu-item"><a href="Contact.php">Contact</a></li>

                <?php
                if (isset($_SESSION['Email'])) {
                    // I am logged in
                ?>

                    <li class="menu-item"><a href="MyProfile.php">My Profile</a></li>

                <?php
                } //if ended
                else {
                    // I am logged out
                ?>

                    <li class="menu-item"><a onclick="openForm('yes')">Sign In/Up</a></li>

                <?php
                } //else ended
                ?>

            </ul>
        </nav>
    </div>
    <!-- -------------------------------New pop up---------------------------- -->

    <div id="blurBackMask">

        <div class="container" id="mainLoginRegContainer">
            <div class="row" id="closeBtnRow" style="height: 50px;">
                <span class="col-sm-11"></span>
                <button class="col-sm-1" id="closeFormBtn" onclick="closeForm()"><i class="far fa-times-circle"></i></button>
            </div>

            <div class="row">
                <p id="submitResult"></p>
            </div>


            <form method="POST" class="container" id="FormReg">
                <h2>Sign Up</h2>

                <div class="LogFormGroup input-group">
                    <label for="myName" class="input-group-addon"><i class="fas fa-user"></i></label>
                    <input type="text" class="form-control" name="myName" id="myName" placeholder="Your Name" required />
                </div>

                <div class="LogFormGroup input-group">
                    <label for="myEmail" class="input-group-addon"><i class="fas fa-envelope"></i></label>
                    <input type="text" class="form-control" name="myEmail" id="myEmail" placeholder="Your Email" required />
                </div>

                <div class="LogFormGroup input-group">
                    <label for="myPass" class="input-group-addon"><i class="fas fa-lock"></i></label>
                    <input type="password" class="form-control" name="myPass" id="myPass" placeholder="Password" required />
                </div>

                <div class="input-group mb-3" style="height: 100%; margin:0; margin-bottom: 0px; margin-top: 12px;">
                    <div class="input-group-prepend" style="height: 100%;">
                        <label class="input-group-text" for="upldUni">University</label>
                    </div>
                    <select class="custom-select" id="upldUni" name="upldUni">
                        <option value="Texas Christian University">Texas Christian University </option>
                        <option value="Baylor University">Baylor University</option>
                        <option value="SMU">SMU</option>
                    </select>
                </div>

                <button type="submit" class="FormRegSubmitBtn">
                    Register
                </button>

                <div class="row justify-content-center">
                    <span id="AlHaveAcc">Already have an account ?</span><br>
                </div>

                <div class="row justify-content-center" style="text-align: center; margin-top: 5px; ">
                    <a id="goToLogin" onclick="openLog()">Login here</a>
                </div>

                <div class="row justify-content-center" style="margin-top: 5px; ">
                    <span>By creating an account, I agree to Alumnite's <a href="#">Website terms</a>, <a href="#">Privacy Policy</a> and <a href="#">Licensing terms.</a></span>
                </div>

            </form>

            <form method="POST" class="container" id="FormGoogSignUp">
                <h2>Sign Up</h2>

                <div class="LogFormGroup input-group">
                    <label for="gooName" class="input-group-addon"><i class="fas fa-user"></i></label>
                    <input type="text" class="form-control" name="gooName" id="gooName" placeholder="Your Name" />
                </div>

                <div class="LogFormGroup input-group">
                    <label for="gooEmail" class="input-group-addon"><i class="fas fa-envelope"></i></label>
                    <input type="text" class="form-control" name="gooEmail" id="gooEmail" placeholder="Your Email" />
                </div>

                <div class="input-group mb-3" style="height: 100%; margin:0; margin-bottom: 0px; margin-top: 12px;">
                    <div class="input-group-prepend" style="height: 100%;">
                        <label class="input-group-text" for="gooupldUni">University</label>
                    </div>
                    <select class="custom-select" id="gooupldUni" name="gooupldUni">
                        <option value="Texas Christian University">Texas Christian University </option>
                        <option value="Baylor University">Baylor University</option>
                        <option value="SMU">SMU</option>
                    </select>
                </div>

                <button type="submit" class="FormRegSubmitBtn">
                    Register
                </button>

                <div class="row justify-content-center" style="margin-top: 5px; ">
                    <span>By creating an account, I agree to Alumnite's <a href="#">Website terms</a>, <a href="#">Privacy Policy</a> and <a href="#">Licensing terms.</a></span>
                </div>

            </form>


            <form method="POST" class="container" id="FormLog">
                <h2>Sign In</h2>

                <div class="LogFormGroup input-group">
                    <label for="myEmail" class="input-group-addon"><i class="fas fa-envelope"></i></label>
                    <input type="text" class="form-control" name="myEmail" id="myEmail" placeholder="Your Email" required />
                </div>

                <div class="LogFormGroup input-group">
                    <label for="myPass" class="input-group-addon"><i class="fas fa-lock"></i></label>
                    <input type="password" class="form-control" name="myPass" id="myPass" placeholder="Password" required />
                </div>

                <button type="submit" class="FormLogSubmitBtn">
                    Login
                </button>

                <div class="row justify-content-end">
                    <a id="logInForgotPass" onclick="openFog()">Forgot Password ?</a>
                </div>

                <div class="row justify-content-center">
                    <span id="AlHaveAcc">Not a member ?</span><br>
                </div>

                <div class="row justify-content-center" style="text-align: center; margin-top: 5px; ">
                    <a id="goToRegister" onclick="openReg()">Register Here</a>
                </div>

                <div class="row justify-content-center" style="text-align: center; margin-top: 15px; ">
                    <div class="g-signin2" data-onsuccess="onSignIn" data-onfailure="onSignFailed" data-longtitle="true"></div>
                </div>
            </form>

            <form method="POST" class="container" id="FormFog">
                <h2>Forgot Password</h2>

                <div class="LogFormGroup input-group">
                    <label for="myEmail" class="input-group-addon"><i class="fas fa-envelope"></i></label>
                    <input type="text" class="form-control" name="myEmail" id="myEmail" placeholder="Your Email" required />
                </div>

                <button type="submit" class="FormLogSubmitBtn">
                    Submit
                </button>

            </form>

        </div><!-- Pop container end -->

    </div><!-- blurBack Maskend -->

    <!-- <div id="blurBackMask"></div> -->


    <script src="navFiles/fastclick.js"></script>
    <script src="navFiles/scroll.js"></script>
    <script src="navFiles/fixed-responsive-nav.js"></script>

    <script>
        function openForm(closable) {
            if (closable !== 'yes') {
                document.getElementById("closeFormBtn").style.display = "none";
                $("#mainLoginRegContainer").css = "padding-top:10px;"
            }
            $("#blurBackMask").fadeIn("slow");
            $("#FormLog").fadeIn("slow");
            document.getElementById("FormReg").style.display = "none";
            document.getElementById("FormFog").style.display = "none";
            document.getElementById("FormGoogSignUp").style.display = "none";
        }

        function closeForm() {
            // document.getElementById("mainLoginRegContainer").style.display = "none";
            $("#blurBackMask").fadeOut("slow");
            $("#submitResult").css("display", "none");
        }

        function openLog() {
            document.getElementById("FormReg").style.display = "none";
            $("#FormLog").fadeIn("slow");
            var subRes = document.getElementById("submitResult");
            if (subRes.style.display == "block") {
                subRes.style.display = "none"
            }
        }

        function closeLog() {
            closeForm();
        }

        function openReg() {
            // document.getElementById("FormReg").style.display = "block";
            document.getElementById("FormLog").style.display = "none";
            $("#FormReg").fadeIn("slow");
            var subRes = document.getElementById("submitResult");
            if (subRes.style.display == "block") {
                subRes.style.display = "none"
            }
        }

        function closeReg() {
            closeForm();
        }

        function openFog() {
            document.getElementById("FormLog").style.display = "none";
            document.getElementById("FormReg").style.display = "none";
            $("#FormFog").fadeIn("slow");
            var subRes = document.getElementById("submitResult");
            if (subRes.style.display == "block") {
                subRes.style.display = "none"
            }
        }

        function openGooSign() {
            document.getElementById("closeFormBtn").style.display = "none";
            $("#mainLoginRegContainer").css = "padding-top:10px;"
            document.getElementById("FormLog").style.display = "none";
            document.getElementById("FormReg").style.display = "none";
            $("#FormGoogSignUp").fadeIn("slow");
        }

        $(document).ready(function() {
            $('#FormLog').submit(function(e) {
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: 'phpFiles/loginAction.php',
                    data: $(this).serialize(),
                    success: function(response) {
                        document.getElementById("submitResult").style.display = "block";
                        if (response === "1") {
                            $("#submitResult").html("Successfully Logged In");
                            location.reload();
                        } else if (response === "2") {
                            $("#submitResult").html("Sorry your entered password was wrong.");
                        } else if (response === "3") {
                            $("#submitResult").html("No account with these credentials exist. Please create one.");
                        } else {
                            $("#submitResult").html("There has been an error. Please contact the developer.");
                        }
                    },
                    error: function(ts) {
                        console.log(ts.responseText);
                    }
                });
            });

            $('#FormReg').submit(function(e) {
                //                alert("Form Reg Submit");
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: 'phpFiles/registerAction.php',
                    data: $(this).serialize(),
                    success: function(response) {
                        document.getElementById("submitResult").style.display = "block";
                        if (response === "1") {
                            $("#submitResult").html("Created your ID successfully.<br/>You have recieved <b>5</b> <i class='fas fa-coins'></i>. ");
                            location.reload();
                        } else if (response === "3") {
                            $("#submitResult").html("An Id with the same email address exists. Please Login.");
                            openForm("yes");
                        } else {
                            $("#submitResult").html("Some error occured");
                        }
                    },
                    error: function(ts) {
                        console.log(ts.responseText);
                    }
                });
            });

            $('#FormFog').submit(function(e) {
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: 'phpFiles/forgotPass.php',
                    data: $(this).serialize(),
                    success: function(response) {
                        document.getElementById("submitResult").style.display = "block";
                        if (response == "1") {
                            $("#submitResult").html("The <b>Password</b> has been sent to your mail.");
                        } else {
                            $("#submitResult").html("Some <b>Error</b> occured.");
                        }
                    },
                    error: function(ts) {
                        console.log(ts.responseText);
                    }
                });
            });


        });

        // ----------------Google Sign up-----------------------
        function onSignIn(googleUser) {
            // alert("Ran");
            // Useful data for your client-side scripts:
            var profile = googleUser.getBasicProfile();
            console.log("ID: " + profile.getId()); // Don't send this directly to your server!
            console.log('Full Name: ' + profile.getName());
            console.log('Given Name: ' + profile.getGivenName());
            console.log('Family Name: ' + profile.getFamilyName());
            console.log("Image URL: " + profile.getImageUrl());
            console.log("Email: " + profile.getEmail());

            var myEmailFromGoo = profile.getEmail();
            var name = profile.getName();
            var id = profile.getId();

            // The ID token you need to pass to your backend:
            var id_token = googleUser.getAuthResponse().id_token;
            console.log("ID Token: " + id_token);

            var auth2 = gapi.auth2.getAuthInstance();
            auth2.disconnect();

            $.ajax({
                type: 'GET',
                url: 'phpFiles/googleSignUp.php',
                data: {
                    gooEmail: myEmailFromGoo
                },
                success: function(response) {

                    if (response !== "1") {
                        openGooSign();
                        document.getElementById("gooName").value = name;
                        document.getElementById("gooEmail").value = myEmailFromGoo;
                    } else {
                        $("#submitResult").html("Successfully Logged In");
                        location.reload();
                    }
                },
                error: function(e) {
                    alert(e);
                }
            });


            $('#FormGoogSignUp').submit(function(e) {
                //                alert("GooForm Submit");
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: 'phpFiles/googleSignUp.php',
                    data: $(this).serialize(),
                    success: function(response) {
                        document.getElementById("submitResult").style.display = "block";
                        if (response === "1") {
                            $("#submitResult").html("Created your ID successfully.<br/>You have recieved <b>5</b> <i class='fas fa-coins'></i>. ");
                            location.reload();
                        } else {
                            $("#submitResult").html("Sorry some error occured. Please contact the developer.");
                        }
                    },
                    error: function(ts) {
                        console.log(ts.responseText);
                    }
                });
            });


        }

        function onSignFailed() {
            alert("Sign in / up Cancelled");
        }
    </script>
</body>

</html>