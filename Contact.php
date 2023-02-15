		<?php
		include 'headerFiles.php';
		?>

		<title>Contact</title>
		<script src="contactform/contactform.js"></script>

		<style type="text/css">
			/* Contact---------------------------------*/

			.form {
				margin: 0 66px 0 30px;
			}

			.conInput {
				padding: 15px 16px;
				border: 1px solid #cccccc;
				width: 100%;
				height: 50px;
				display: block;
				border-radius: 4px;
				font-size: 15px;
				color: #aaa;
				font-family: 'Open Sans', sans-serif;
				margin: 0 0 15px 0;
				transition: all 0.3s ease-in-out;
				-moz-transition: all 0.3s ease-in-out;
				-webkit-transition: all 0.3s ease-in-out;
			}

			.conInput:focus {
				border: 1px solid #7cc576;
				outline: 0;
				-webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px rgba(124, 197, 118, 0.3);
				-moz-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px rgba(124, 197, 118, 0.3);
				box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px rgba(124, 197, 118, 0.3);
			}

			.conInput.text-area {
				height: 165px;
				resize: none;
				overflow: auto;
			}

			.input-btn {
				width: 175px;
				height: 50px;
				background: #7cc576;
				border-radius: 4px;
				color: #ffffff;
				font-size: 14px;
				text-transform: uppercase;
				font-family: 'Montserrat', sans-serif;
				font-weight: 400;
				border: 0px;
				transition: all 0.3s ease-in-out;
				-moz-transition: all 0.3s ease-in-out;
				-webkit-transition: all 0.3s ease-in-out;
			}

			.input-btn:hover {
				background: #111;
				color: #fff;
			}

			.validation {
				color: red;
				display: none;
				margin: 0 0 20px;
				font-weight: 400;
				font-size: 13px;
			}

			#sendmessage {
				color: #7cc576;
				border: 1px solid #7cc576;
				display: none;
				text-align: center;
				padding: 15px;
				font-weight: 600;
				margin-bottom: 15px;
			}

			#errormessage {
				color: red;
				display: none;
				border: 1px solid red;
				text-align: center;
				padding: 15px;
				font-weight: 600;
				margin-bottom: 15px;
			}

			#sendmessage.show,
			#errormessage.show,
			.show {
				display: block;
			}

			#head {
				margin-top: 15px;
				padding: 20px;
				text-align: center;

			}

			.myConGroup {
				width: 100%
			}

			/*@media only screen and (max-width: 600px) {
				.myConGroup{
					width: 90%;
				}
			}*/

			.abtGrp {
				padding: 20px;
			}

			.abtGrp span {
				margin-top: 8px;
			}
		</style>

		</head>



		<body>

			<div class="container-fluid" style="background-color: #fcfcfc;">

				<div class="row">
					<?php
					include 'nav.php';
					?>
				</div>



				<div class="container">
					<h1 id="head">Contact Us</h1>

					<div class="row">

						<div class="col-sm-4">
							<div class="row abtGrp">
								<h4><i class="fa fa-pencil"></i> Email&nbsp;:&nbsp;&nbsp;
									<span>support@alumnite.co</span>
								</h4>
							</div>
						</div>

						<div class="col-sm-8 wow fadeInUp delay-05s">
							<div class="form">

								<div id="sendmessage">Your message has been sent. Thank you!</div>
								<div id="errormessage"></div>
								<form action="contactScript.php" method="post" role="form" class="contactForm">
									<div class="myConGroup">
										<input type="text" name="name" class=" conInput" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
										<div class="validation"></div>
									</div>
									<div class="myConGroup">
										<input type="email" class=" conInput" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
										<div class="validation"></div>
									</div>
									<div class="myConGroup">
										<input type="text" class=" conInput" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
										<div class="validation"></div>
									</div>
									<div class="myConGroup">
										<textarea class=" conInput text-area" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
										<div class="validation"></div>
									</div>

									<div class="text-center"><button type="submit" class="input-btn">Send Message</button></div>
								</form>
							</div>
						</div>
					</div>
				</div>


			</div>

			<?php
			include 'footer.php';
			?>

		</body>

		</html>