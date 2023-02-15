<!DOCTYPE html>
<html>

<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- For fonts -->
	<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Courgette&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Lora&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Alata&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Indie+Flower&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto+Mono&display=swap" rel="stylesheet">


	<!-- For bootstrap -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

	<!-- For the style sheet -->
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link rel="icon" href="../img/logo.png">

	<!-- For the icons font awsome -->
	<script src="https://kit.fontawesome.com/b751257aad.js" crossorigin="anonymous"></script>

	<!-- For the list api -->
	<script type="text/javascript" src="../js/list.min.js"></script>

	<title>Master Panel</title>

	<style type="text/css">
		.search {
			height: 50px;
			border: 1px solid black;
			padding: 5px;
			border-radius: 6px;
			border: none;
			border-bottom: 1px solid black;
			width: 80%;
		}

		.search:focus {
			outline: none;
		}

		#blurBackMask2 {
			display: none;
			background: rgba(255, 255, 255, 0.5);
			backdrop-filter: blur(5px);
			z-index: 8;
			width: 100%;
			height: 100%;
			position: absolute;
			top: 0;
		}

		#massVerPop {
			box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
			padding: 20px;
			padding-top: 0px;
			border-radius: 10px;
			margin-top: 20px;
			padding-right: 20px;
			width: 60%;
			position: absolute;
			z-index: 9;
			background-color: #fff;
			/*To center it*/
			margin: 0;
			top: 50%;
			left: 50%;
			-ms-transform: translate(-50%, -50%);
			transform: translate(-50%, -50%);
		}

		@media only screen and (max-width: 600px) {
			#massVerPop {
				width: 90%;
			}
		}

		.masGroup {
			margin-top: 15px;
			padding: 10px;
			border: 0;
			border-bottom: 1px solid black;
		}

		.masGroup input {
			border: 0;
		}

		.masGroup input:focus {
			outline: none;
		}

		.masGroup label {
			margin-bottom: 0;
			margin-top: 8px;
		}

		#masSubmit {
			background-color: #4CAF50;
			color: white;
			padding: 16px 20px;
			border: none;
			width: 100%;
			margin-bottom: 10px;
			opacity: 0.8;
			border-radius: 10px;
			margin-top: 10px;
		}

		#masSubmit:hover {
			opacity: 1;
		}

		#masSubmit:focus {
			outline: none;
		}

		#blurBackMask3 {
			/*				display: none;*/
			background: rgba(255, 255, 255, 0.5);
			backdrop-filter: blur(5px);
			z-index: 8;
			width: 100%;
			height: 100%;
			position: absolute;
			top: 0;
		}

		#EditProfileContainer {
			box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
			padding: 20px;
			padding-top: 0px;
			border-radius: 10px;
			margin-top: 20px;
			padding-right: 20px;
			width: 60%;
			position: absolute;
			z-index: 9;
			background-color: #fff;
			/*To center it*/
			margin: 0;
			top: 50%;
			left: 50%;
			-ms-transform: translate(-50%, -50%);
			transform: translate(-50%, -50%);
		}
	</style>

</head>


<body>

	<!-----------------------------PDF List---------------------------->
	<div class="container" id="myList" style="margin-top: 20px;">

		<h1>PDFs</h1>

		<div class="row" style="margin-bottom: 10px;">

			<input class="search col-sm-12" placeholder="Search by Name, Subject, Year or Professor" />

		</div>

		<ul class="list" style="padding: 0; margin: 0; width: 100%; padding-bottom: 20px;">
			<div class="row" style="margin-bottom: 20px;">
				<div class="col-sm-1">ID</div>
				<div class="col-sm-1">Title</div>
				<div class="col-sm-1">Subject</div>
				<div class="col-sm-1">Prof</div>
				<div class="col-sm-2">Uploaded By</div>
				<div class="col-sm-1 text-center">University</div>
				<div class="col-sm-2 text-center">Pending</div>
				<div class="col-sm-3 content-justify-center">Operations</div>
			</div>

			<?php
			include "../phpFiles/connection.php";
			$tblName = "PDFs";

			$sql = "SELECT * from $tblName";
			$result = mysqli_query($conn, $sql) or die("SELECT Error: ");

			while ($row = mysqli_fetch_array($result)) {

				$id = $row['ID'];
				$name = $row['Name'];
				$subject = $row['Subject'];
				$year = $row['Year'];
				$prof = $row['Prof'];
				$desc = $row['Description'];
				$docPath = $row['pathName'];
				$upldBy = $row['UploadedBy'];
				$pending = $row['Pending'];
				$uni = $row['University'];
				$category = $row["Category"];

			?>
				<!-- this html code is in the while loop whih means it will run everytime -->
				<div class="row" style="margin-top:15px;">
					<div class="col-sm-1 masId" style="border-right: 1px solid #E5E5E5;"><?php echo $id; ?></div>
					<div class="col-sm-1 masName" style="border-right: 1px solid #E5E5E5;"><?php echo $name; ?></div>
					<div class="col-sm-1 masSub" style="border-right: 1px solid #E5E5E5;"><?php echo $subject; ?></div>
					<div class="col-sm-1 masProf" style="border-right: 1px solid #E5E5E5;"><?php echo $prof; ?></div>
					<div class="col-sm-2 masUpldBy" style="border-right: 1px solid #E5E5E5; word-wrap: break-word;"><?php echo $upldBy; ?></div>
					<div class="col-sm-1 masUni text-center" style="border-right: 1px solid #E5E5E5;"><?php echo $uni; ?></div>

					<form action="/action_page.php" class="col-sm-2 text-center">
						<div class="form-check-inline">
							<label class="form-check-label" for="radio1">
								<input type="radio" class="form-check-input" id="pRadY" name="pendingRadio" value="Yes" checked onchange="pChange('Yes','<?php echo $id; ?>');" <?php if ($pending == "Yes") {
																																																																																	echo "checked";
																																																																																} ?>>Yes
							</label>
						</div>
						<div class="form-check-inline">
							<label class="form-check-label" for="radio2">
								<input type="radio" class="form-check-input" id="pRadN" name="pendingRadio" value="No" onchange="pChange('No','<?php echo $id; ?>');" <?php if ($pending == "No") {
																																																																												echo "checked";
																																																																											} ?>>No
							</label>
						</div>
					</form>

					<?php
					if ($category != "Quizlet Links") {
						$docPath = "../" . $docPath;
					}
					?>

					<button class="col-sm-1 masViewDoc" onclick="window.open('<?php echo $docPath; ?>','_blank');">View Doc</button>
					<button class="col-sm-1 masDeleteDoc" onclick="deleteDoc('<?php echo $id; ?>','<?php echo $docPath; ?>')">Delete Doc</button>
				</div>
				<hr>

			<?php
			} //while loop ended
			?>
		</ul>
	</div><!-- My List container div close -->


	<!--        -----------------------------User List-------------------------->
	<div class="container" id="myUserList" style="margin-top: 20px;">

		<h1>Users</h1>

		<div class="row" style="margin-bottom: 10px;">

			<input class="search col-sm-12" placeholder="Search by Name, Email, Major, GradDate, Phone No." />

		</div>

		<ul class="list" style="padding: 0; margin: 0; width: 100%; padding-bottom: 20px;">
			<div class="row" style="margin-bottom: 20px;">
				<div class="col-sm-1">ID</div>
				<div class="col-sm-1">Name</div>
				<div class="col-sm-2">Email</div>
				<div class="col-sm-1">Major</div>
				<div class="col-sm-1">Graduation Date</div>
				<div class="col-sm-2 text-center">Phone No.</div>
				<div class="col-sm-2 text-center">University</div>
				<div class="col-sm-2 text-center">Coins</div>
			</div>

			<?php
			include "../phpFiles/connection.php";
			$tblName = "userInfo";

			$sql = "SELECT * from $tblName";
			$result = mysqli_query($conn, $sql) or die("SELECT Error: ");

			while ($row = mysqli_fetch_array($result)) {

				$id = $row['ID'];
				$name = $row['Name'];
				$email = $row['Email'];
				$major = $row['Major'];
				$gradDate = $row['GradDate'];
				$phone = $row['PhoneNo'];
				$uni = $row['University'];
				$coins = $row['Coins'];

			?>
				<!-- this html code is in the while loop whih means it will run everytime -->
				<div class="row" style="margin-top:15px;">
					<div class="col-sm-1 usId" style="border-right: 1px solid #E5E5E5;"><?php echo $id; ?></div>
					<div class="col-sm-1 usName" style="border-right: 1px solid #E5E5E5;"><?php echo $name; ?></div>
					<div class="col-sm-2 usEmail" style="border-right: 1px solid #E5E5E5; word-wrap: break-word;"><?php echo $email; ?></div>
					<div class="col-sm-1 usMajor" style="border-right: 1px solid #E5E5E5;"><?php echo $major; ?></div>
					<div class="col-sm-1 usGrad" style="border-right: 1px solid #E5E5E5;"><?php echo $gradDate; ?></div>
					<div class="col-sm-2 usPhone text-center" style="border-right: 1px solid #E5E5E5;"><?php echo $phone; ?></div>
					<div class="col-sm-2 usUni text-center" style="border-right: 1px solid #E5E5E5;"><?php echo $uni; ?></div>

					<input type="text" class="col-sm-2 usCoins text-center" value=" <?php echo $coins; ?>" id="coinInputMas<?php echo $id; ?>" onchange="updateCoin(<?php echo $id; ?>);" />


				</div>
				<hr>

			<?php
			} //while loop ended
			?>
		</ul>
	</div><!-- My UserList container div close -->




	<!-- ------------------_For verify pop up_--------------- -->
	<div id="blurBackMask2">
		<div id="massVerPop" class="container">

			<div class="row justify-content-center" style="margin-top: 15px; margin-bottom: 15px; display: none;" id="masResRow">
				<span id="masRes" style="text-align: center;">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</span>
			</div>


			<form method="POST" class="container" id="masFormSubmit" style="margin-top: 10px;">
				<h2>Welcome Admin</h2>

				<div class="masGroup input-group">
					<label for="masName" class="input-group-addon"><i class="fas fa-user"></i></label>
					<input type="text" class="form-control" name="masName" id="masName" placeholder="Username" required />
				</div>

				<div class="masGroup input-group">
					<label for="masPass" class="input-group-addon"><i class="fas fa-lock"></i></label>
					<input type="password" class="form-control" name="masPass" id="masPass" placeholder="Password" required />
				</div>

				<button type="submit" id="masSubmit">
					Submit
				</button>
			</form>
		</div>
	</div>
	<!-- --------------------******************----------------------- -->


	<?php

	if (!isset($_SESSION['MainAdminLoggedIn'])) {
		echo "<script>$('#blurBackMask2').fadeIn();</script>";
	}
	?>



	<!-- List.js scripts -->
	<script type="text/javascript">
		var options = {
			valueNames: ['masId', 'masName', 'masSub', 'masProf', 'masUpldBy', 'masPending']
		};

		var myListOBJ = new List('myList', options);


		//-------User List-------------
		var userOptions = {
			valueNames: ['usId', 'usName', 'usEmail', 'usMajor', 'usGrad', 'usPhone', 'usUni']
		};

		var myUserListOBJ = new List('myUserList', userOptions);



		function deleteDoc(id, path) {

			$.ajax({
				type: "POST",
				url: "../phpFiles/delete.php?id=" + id + "&path=" + path,
				data: {
					action: 'delete'
				},
				success: function(myMess) {
					// alert(myMess);
					if (myMess == "Success") {
						alert("Successfully deleted.")
						location.reload();
					} else {
						alert(myMess);
						location.reload();
					}
				}
			});
		}

		$('#masFormSubmit').submit(function(e) {
			e.preventDefault();
			document.getElementById("masResRow").style.display = "block";
			$.ajax({
				type: "POST",
				url: 'check.php',
				data: $(this).serialize(),
				success: function(response) {
					document.getElementById("masRes").innerHTML = response;
					if (response == "Successfully Logged In") {
						$("#blurBackMask2").fadeOut();
					}
				},
				error: function(ts) {
					console.log(ts.responseText);
				}
			});

		});


		//------------------_Pending_--------------------------
		function pChange(value, id) {
			$.ajax({
				type: "POST",
				url: "pendingUpdate.php?id=" + id + "&res=" + value,
				data: $(this).serialize(),
				success: function(myMess) {
					alert(myMess);
					location.reload();
				}
			});
		}


		function updateCoin(id, val) {
			var val = document.getElementById('coinInputMas' + id).value.trim();
			//                    alert("Value :- "+val+" id :- "+id);

			$.ajax({
				type: "POST",
				url: 'updateCoin.php?id=' + id + '&val=' + val,
				data: $(this).serialize(),
				success: function(response) {
					alert(response);
					loction.reload();
				},
				error: function(ts) {
					console.log(ts.responseText);
				}
			});

		}
	</script>

</body>

</html>