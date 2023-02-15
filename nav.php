<?php
// session_start();
?>

<!-------------Google Sign in--------------->
<script type="module" src="google_parse.js"></script>
<script src="https://accounts.google.com/gsi/client" async defer></script>
<div id="g_id_onload" data-client_id="519957784838-d0qblpr4hi0mtucb7jcq70r57ukkv54q.apps.googleusercontent.com" data-context="signin" data-ux_mode="popup" data-callback="handleCredentialResponse" data-auto_prompt="false">
</div>
<!-- ========================================= -->

<link rel="stylesheet" href="navFiles/styles.css">
<link rel="stylesheet" href="css/nav.css">
<script src="navFiles/responsive-nav.js"></script>

<div class="navBarMy">
    <a href="index.php"><img src="img/logo.png" width="80" height="70"></a>
    <a id="name" href="UploadDownload.php">Alumnite</a>
    <nav class="nav-collapse">
        <ul>
            <li class="menu-item"><a href="#">QA</a></li>
            <li class="menu-item"><a href="About.php">About</a></li>
            <li class="menu-item"><a href="Contact.php">Contact</a></li>

            <?php
            if (isset($_SESSION['Email']) && isset($_SESSION["Uni"])) {
                // I am logged in
                // echo "Logged In";
            ?>

                <li class="menu-item"><a href="MyProfile.php">My Profile</a></li>

            <?php
            } //if ended
            else {
                // I am logged out
                // echo "Logged Out";
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
                <!-- <div class="g-signin2" data-onsuccess="onSignIn" data-onfailure="onSignFailed" data-longtitle="true"></div> -->

                <div class="g_id_signin" data-type="standard" data-shape="rectangular" data-theme="outline" data-text="signin_with" data-size="large" data-logo_alignment="left">
                </div>


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
</script>