 	<?php
		include 'headerFiles.php';
		?>

 	<title>My Profile</title>

 	<style type="text/css">
 		#changePassRes {
 			display: none;
 			border: 1px dotted black;
 			color: black;
 			text-align: center;
 			width: 100%;
 			padding: 10px;
 			border-radius: 10px;
 		}
 	</style>

 	</head>

 	<body>
 		<div class="container-fluid">

 			<div class="row">
 				<?php include 'nav.php'; ?>
 			</div>

 			<?php
				include 'phpFiles/connection.php';
				if (!isset($_SESSION['Email'])) {
					echo "<script>openForm('no');</script>";
				} else {

					$username = $_SESSION['Email'];
					$sqli = "Select * from userInfo where Email='$username'";
					$result = mysqli_query($conn, $sqli);
					$exists = mysqli_num_rows($result); //it checks that the username exsists or not
					$table_email = "";
					$table_name = "";
					$table_Major = "";
					$table_GradDate = "";
					$table_PhoneNo = "";
					$table_id = "";
					$table_coins = "";
					$table_uni = "";

					if ($exists > 0) //checks are there any existing rows
					{
						while ($row = mysqli_fetch_assoc($result)) //shows all rows from result
						{
							$table_email = $row['Email'];
							$table_name = $row['Name'];
							$table_Major = $row['Major'];
							$table_GradDate = $row['GradDate'];
							$table_PhoneNo = $row['PhoneNo'];
							$table_id = $row['ID'];
							$table_coins = $row['Coins'];
							$table_uni = $row['University'];
						}
					} else {
						echo "Id Not Found"; //id not found
					}

					$_SESSION['ID'] = $table_id;
					$_SESSION['Uni'] = $table_uni;


					// echo "Email : " . $table_email .
					// 	"<br>Name : " . $table_name .
					// 	"<br>Major : " . $table_Major .
					// 	"<br>Grad : " . $table_GradDate .
					// 	"<br>Num : " . $table_PhoneNo;
				}
				?>

 			<div id="resultUpdateInfo" class="row" style="margin-top: 10px; margin-bottom: 0;">
 				<div class="alert alert-success" role="alert" id="successAlert" style="text-align: center;"></div>
 				<div class="alert alert-danger" role="alert" id="failAlert" style="text-align: center;"></div>
 			</div>

 			<div class="row justify-content-center" style="margin-top: 10px; margin-bottom: -5px;">
 				<span class="col-sm-3" id="myCoinBtn">
 					My Coins : <?php echo $table_coins; ?> <i class="fas fa-coins"></i>
 				</span>
 			</div>

 			<div class="row" style="margin-top: 10px;">

 				<div class="col-sm-12" style="padding: 20px; padding-top: 0px;">
 					<form id="UpdateInfoForm" method='POST'>

 						<div class="MyProfGroup input-group" style="padding-top: 0;">
 							<label for="myProfName" class="input-group-addon"><i class="fas fa-user"></i></label>
 							<input type="text" class="form-control" name="myProfName" id="myProfName" placeholder="Your Name" value="<?php echo $table_name; ?>" required />
 						</div>

 						<div class="MyProfGroup input-group">
 							<label for="myProfEmail" class="input-group-addon"><i class="fas fa-envelope"></i></label>
 							<input type="text" class="form-control" name="myProfEmail" id="myProfEmail" placeholder="Your Email" value="<?php echo $table_email; ?>" required />
 						</div>

 						<div class="MyProfGroup input-group">
 							<label for="myProfMajor" class="input-group-addon"><i class="fas fa-graduation-cap"></i></label>
 							<input type="text" class="form-control" name="myProfMajor" id="myProfMajor" placeholder="Your Major" value="<?php echo $table_Major; ?>" required />
 						</div>

 						<div class="MyProfGroup input-group">
 							<label for="myProfGrad" class="input-group-addon"><i class="fas fa-calendar"></i></label>
 							<input type="text" class="form-control" name="myProfGrad" id="myProfGrad" placeholder="Your Graduation Date" value="<?php echo $table_GradDate; ?>" required />
 						</div>

 						<div class="MyProfGroup input-group">
 							<label for="myProfPhone" class="input-group-addon"><i class="fas fa-phone"></i></label>
 							<input type="text" class="form-control" name="myProfPhone" id="myProfPhone" placeholder="Your Phone No." value="<?php echo $table_PhoneNo; ?>" required />
 						</div>


 						<div class="input-group mb-3" style="height: 100%; margin:0; margin-bottom: 0px; margin-top: 12px;">
 							<div class="input-group-prepend" style="height: 100%;">
 								<label class="input-group-text" for="myProfUni">University</label>
 							</div>
 							<select class="custom-select" id="myProfUni" name="myProfUni">

 								<option value="Texas Christian University" <?php if ($_SESSION['Uni'] == "Texas Christian University") {
																															echo "selected";
																														} ?>>Texas Christian University </option>

 								<option value="Baylor University" <?php if ($_SESSION['Uni'] == "Baylor University") {
																											echo "selected";
																										} ?>>Baylor University</option>

 								<option value="SMU" <?php if ($_SESSION['Uni'] == "SMU") {
																				echo "selected";
																			} ?>>SMU</option>
 							</select>
 						</div>

 						<div class="row justify-content-center" style="margin-top: 15px;">
 							<button type="submit" class="col-sm-4" id="myProfSub">
 								Update Info
 							</button>
 						</div>

 					</form>

 					<div class="row justify-content-center" style="margin-top: 15px; margin-bottom: 20px;">
 						<button id="changePassBtn" class="col-sm-3" onclick="openPop()">
 							<i class="fas fa-lock-open"></i>&nbsp;&nbsp;Change Password
 						</button>
 					</div>

 					<div class="row justify-content-center">
 						<a id="logOutBtn" class="col-sm-2" href="phpFiles/logOut.php">
 							<i class="fas fa-sign-out-alt"></i>&nbsp;&nbsp;Log Out
 						</a>
 					</div>

 				</div><!-- Col-sm-12 end -->

 				<!-- ----------------_Change Pass Pop Up_------------- -->
 				<div id="blurBackMask1">
 					<div id="changePassPop" class="container">

 						<div class="row">
 							<span class="col-sm-11"></span>
 							<button class="col-sm-1" id="closeFormBtn" onclick="closePop()"><i class="far fa-times-circle"></i></button>
 						</div>

 						<div class="row">
 							<p id="changePassRes">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
 						</div>


 						<form method="POST" class="container" id="ChangePassForm">
 							<h2>Change Password</h2>

 							<div class="MyProfGroup input-group">
 								<label for="myProfOldPass" class="input-group-addon"><i class="fas fa-user"></i></label>
 								<input type="text" class="form-control" name="myProfOldPass" id="myProfOldPass" placeholder="Your OLD Password" required />
 							</div>

 							<div class="MyProfGroup input-group">
 								<label for="myProfNewPass" class="input-group-addon"><i class="fas fa-lock"></i></label>
 								<input type="password" class="form-control" name="myProfNewPass" id="myProfNewPass" placeholder="Your NEW Password" required />
 							</div>

 							<div class="MyProfGroup input-group">
 								<label for="myProfNewPassRe" class="input-group-addon"><i class="fas fa-lock"></i></label>
 								<input type="password" class="form-control" name="myProfNewPassRe" id="myProfNewPassRe" placeholder="Retype your NEW Password" required />
 							</div>

 							<button type="submit" id="changePassSubmitBtn">
 								Submit
 							</button>
 						</form>
 					</div>
 				</div>
 				<!-- --------------------******************----------------------- -->


 			</div><!-- Row end -->

 		</div>


 		<script type="text/javascript">
 			function openPop() {
 				$("#blurBackMask1").fadeIn();
 			}

 			function closePop() {
 				$("#blurBackMask1").fadeOut();
 			}

 			document.getElementById("resultUpdateInfo").style.display = "none";

 			$(document).ready(function() {
 				$('#UpdateInfoForm').submit(function(e) {
 					e.preventDefault();
 					document.getElementById("resultUpdateInfo").style.display = "block";
 					$.ajax({
 						type: "POST",
 						url: 'phpFiles/updateInfo.php',
 						data: $(this).serialize(),
 						success: function(response) {
 							if (response === "0") {
 								$("#successAlert").html("Updated Successfully.");
 								document.getElementById("failAlert").style.display = "none";
 								// location.reload();
 							} else {
 								$("#failAlert").html(response);
 								document.getElementById("successAlert").style.display = "none";
 							}
 						},
 						error: function(ts) {
 							console.log(ts.responseText);
 						}
 					});
 				});



 				$('#ChangePassForm').submit(function(e) {
 					e.preventDefault();

 					var newPassRe = document.getElementById("myProfNewPassRe").value;
 					var newPass = document.getElementById("myProfNewPass").value;
 					document.getElementById("changePassRes").style.display = "block";
 					if (newPass === newPassRe) {
 						$.ajax({
 							type: "POST",
 							url: 'phpFiles/ChangePass.php',
 							data: $(this).serialize(),
 							success: function(response) {
 								if (response === "0") {
 									location.reload();
 									alert("Your password is successfully changed.")
 								} else if (response === "1") {
 									$("#changePassRes").html("There was some error updating the password.");
 								} else if (response === "2") {
 									$("#changePassRes").html("Your old password did not match.");
 								} else {
 									$("#changePassRes").html("There was some error. Please contact the developer.");
 								}
 							},
 							error: function(ts) {
 								console.log(ts.responseText);
 							}
 						});
 					} else {
 						// alert("Your New Passwords does not Match");
 						$("#changePassRes").html("Your New Passwords does not Match");
 					}


 				}); //changePassForm submit end



 			}); //success document close
 		</script>

 	</body>

 	</html>