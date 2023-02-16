		<?php
		include 'headerFiles.php';
		?>

		<title>Browse</title>

		<style type="text/css">
			.search {
				height: 50px;
				border: 1px solid black;
				padding: 5px;
				border-radius: 6px;
				border: none;
				border-bottom: 1px solid black;
			}

			.search:focus {
				outline: none;
			}

			/* #pdfIconRow {
				box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
				transition: 0.3s;
				border-radius: 5px;
				text-align: center;
			} */

			.myIcon {
				font-size: 200px;
				text-align: center;
				vertical-align: middle;
				line-height: 200px;
				margin-top: 20px;
				/*                color: linear-gradient(to right, rgba(210,255,82,1) 0%, rgba(145,232,66,1) 100%);*/
			}

			.pdf {
				color: rgb(236, 0, 0);
			}

			.epub {
				color: rgb(111, 188, 0);
			}

			.xlsx {
				color: rgb(0, 116, 66);
			}

			.ppt {
				color: rgb(222, 50, 0);
			}

			.docx {
				color: rgb(35, 77, 153);
			}

			.py {
				color: rgb(248, 215, 0);
			}

			.java {
				color: rgb(248, 146, 0);
			}

			.zip {
				color: rgb(248, 229, 135);
			}

			@media only screen and (max-width: 600px) {
				#pdfIconRow {
					margin-bottom: 10px;
				}

				.myIcon {
					font-size: 180px;
					text-align: center;
					vertical-align: middle;
					line-height: 180px;
				}

			}
		</style>


		</head>

		<body>

			<div class="container-fluid">
				<div class="row">
					<?php include 'nav.php';

					if (!isset($_SESSION['Email'])) {
						echo "<script>alert('You have to first Log In.'); openForm('no');</script>";
					}

					?>
				</div>


				<div class="container" id="myList" style="margin-top: 20px;">

					<div class="row">

						<input class="search col-sm-12" placeholder="Search by Name, Subject, Semester, Professor or Category" />

					</div><!-- Row close -->

					<ul class="list" style="padding: 0; margin: 0; width: 100%; padding-bottom: 20px;">

						<?php
						include "phpFiles/connection.php";
						$tblName = "pdfs";

						$uni = $_SESSION['Uni'];
						// echo "<script>alert('$uni')</script>";

						$sql = "SELECT * from $tblName where Pending='No' AND University = '$uni' ";
						$result = mysqli_query($conn, $sql) or die("SELECT Error: ");

						while ($row = mysqli_fetch_array($result)) {

							$id = $row['ID'];
							$name = $row['Name'];
							$subject = $row['Subject'];
							$year = $row['Year'];
							$prof = $row['Prof'];
							$desc = $row['Description'];
							$docPath = $row['pathName'];
							$classLVL = $row['ClassLvl'];
							$category = $row['Category'];
							$university = $row['University'];

						?>
							<!-- this html code is in the while loop whih means it will run everytime -->
							<div class="row" id="worksheetDetails" style="margin: 0; margin-top: 25px;">

								<div class="col-sm-3" id="pdfIconRow">
									<?php
									$ext = strtolower(pathinfo($name, PATHINFO_EXTENSION));
									//   echo $ext;

									switch ($ext) {
										case "pdf":
											echo "<i class='far fa-file-pdf myIcon pdf'></i>";
											break;

										case "epub":
											echo "<i class='fab fa-leanpub myIcon epub'></i>";
											break;

										case "xlsx":
											echo "<i class='fas fa-file-excel myIcon xlsx'></i>";
											break;

										case "ppt":
											echo "<i class='far fa-file-powerpoint myIcon ppt'></i>";
											break;

										case "mp4":
											echo "<i class='far fa-file-video myIcon'></i>";
											break;

										case "docx":
											echo "<i class='far fa-file-word myIcon docx'></i>";
											break;

										case "txt":
											echo "<i class='far fa-file-alt myIcon'></i>";
											break;

										case "py":
											echo "<i class='fab fa-python myIcon py'></i>";
											break;

										case "java":
											echo "<i class='fab fa-java myIcon java'></i>";
											break;

										case "jpg":
											echo "<i class='far fa-image myIcon'></i>";
											break;

										case "png":
											echo "<i class='far fa-image myIcon'></i>";
											break;

										case "zip":
											echo "<i class='far fa-file-archive myIcon zip'></i>";
											break;

										default:
											echo "<i class='fas fa-link myIcon'></i>";
									}

									?>
									<!--<img src="img/pdfIcon.png" width="150" height="200" id="pdfThumb">-->

								</div>

								<div class="col-sm-9">

									<div class="row" style="width: 100%; margin-bottom: 10px;">

										<div class="col-sm-12" style="padding: 5px;">
											<h4 class="lisName">Title : &nbsp; <?php echo $name; ?> </h4>
										</div>

									</div>

									<div class="row">

										<div class="col-sm-4" style="padding: 5px;">
											<b class="lisSub">Subject : &nbsp;<?php echo $subject; ?></b>
										</div>

										<div class="col-sm-4" style="padding: 5px;">
											<i class="lisYr">Semester : &nbsp;<?php echo $year; ?></i>
										</div>


										<div class="col-sm-4" style="padding: 5px;">
											<i class="lisProf">Professor : &nbsp;<?php echo $prof; ?></i>
										</div>

									</div>

									<div class="row">
										<div class="col-sm-4" style="padding: 5px;">
											<i class="lisClassLVL" style="padding: 5px;">Class Lvl : &nbsp;<?php echo $classLVL; ?></i>
										</div>

										<div class="col-sm-4" style="padding: 5px;">
											<i class="lisCategory" style="padding: 5px;">Category : &nbsp;<?php echo $category; ?></i>
										</div>

										<!--<div class="col-sm-4" style="padding: 5px;">-->
										<!--	<i class="lisUni" style="padding: 5px;">University : &nbsp;<?php //echo $university; 
																																											?></i>-->
										<!--</div>-->
									</div>

									<div class="row" style="margin-top: 20px; margin-bottom: 20px;">

										<div class="col-sm-10" style="padding: 5px;">
											<p class="lisDesc">Description : &nbsp;<?php echo $desc; ?></p>
										</div>

										<div class="col-sm-2" style="padding: 5px;">
											<button id="viewDocBtn" onclick="viewDoc('<?php echo $docPath; ?>');">View Doc &nbsp; <i class="far fa-eye"></i></button>

										</div>
									</div>

								</div><!-- col close -->
							</div><!-- row close -->


						<?php
						} //while loop ended
						?>
					</ul>
				</div><!-- My List container div close -->


			</div><!-- Container fluid End -->

			<!-- List.js scripts -->
			<script type="text/javascript">
				var options = {
					valueNames: ['lisName', 'lisSub', 'lisYr', 'lisProf', 'lisDesc', 'lisClassLVL', 'lisCategory', 'lisUni']
				};

				var myListOBJ = new List('myList', options);

				function viewDoc(path) {

					if (confirm("Your are going to use 2 coins. Are you sure ?")) {
						$.ajax({
							type: "POST",
							url: 'phpFiles/coin.php',
							data: {
								action: 'call_this'
							},
							success: function(myMess) {
								// alert(myMess);
								if (myMess == "Success") {

									window.open(path, "_blank");
								} else if (myMess === "no") {
									alert("You don't have enough coins. To get more upload more.");
								} else {
									alert("There was some error.");
								}
							}
						});
					}
				}
			</script>

		</body>

		</html>