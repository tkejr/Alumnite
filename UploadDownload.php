		<?php
		include 'headerFiles.php';
		?>

		<style type="text/css">
			/*For The Main Button*/

			.UpDownStyle {
				background-color: #fcfcfc;
				height: 100vh;
				background-size: cover;
				background-repeat: no-repeat;
			}

			body {
				width: 100%;
				height: 100%;
				position: absolute;
				top: 0;
				left: 0;
				/*background: linear-gradient(180deg, rgba(118,191,170,1) 1%, rgba(254,202,0,1) 66%, rgba(253,65,102,1) 100%);*/
				background: rgba(255, 255, 255, 0.5);
				backdrop-filter: blur(2px);
			}


			#UploadDownloadBtnID {
				position: relative;
			}

			#UploadDownloadBtnID table {
				/*To put everything in center vertically and horizontally*/
				text-align: center;
				margin: 0;
				position: absolute;
				top: 50%;
				left: 50%;
				-ms-transform: translate(-50%, -50%);
				transform: translate(-50%, -50%);

				font-family: 'Montserrat', sans-serif;

			}

			/*---------------------------------*/
		</style>

		<title>Get Started</title>
		</head>


		<body>

			<div class="container-fluid UpDownStyle">


				<div class="row">
					<?php
					include 'nav.php';
					?>
				</div>

				<div class="row" style="height: 87%;">
					<div class="col-sm-6" id="UploadDownloadBtnID">
						<table>
							<tr>
								<th>
									<h3>Add Worksheets</h3>
								</th>
							</tr>
							<tr>
								<td>Help your fellow brethren</td>
							</tr>
							<tr>
								<td>
									<a href="Upload.php" class="MainBtn">
										<i class="fas fa-plus" style="font-size: 60px;"></i>
									</a>
								</td>
							</tr>
						</table>
					</div>


					<div class="col-sm-6" id="UploadDownloadBtnID">
						<table>
							<tr>
								<th>
									<h3>Browse Worksheets</h3>
								</th>
							</tr>
							<tr>
								<td>You know what to do</td>
							</tr>
							<tr>
								<td>
									<a href="Browse.php" class="MainBtn">
										<i class="fas fa-search" style="font-size: 60px;"></i>
									</a>
								</td>
							</tr>
						</table>
					</div>
				</div>

			</div>



			<div class="loader-wrapper" style="background-color: #fcfcfc;">
				<span class="loader"><span class="loader-inner"></span></span>
			</div>

			<script type="text/javascript">
				$(window).on("load", function() {
					$(".loader-wrapper").fadeOut("slow");
				});
			</script>

			<?php
			include 'footer.php';
			?>