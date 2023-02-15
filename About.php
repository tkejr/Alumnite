 		<?php
			include 'headerFiles.php';
			?>

 		<title>About</title>

 		<style type="text/css">
 			.social-link {
 				padding: 35px 0;
 				margin: 0 auto;
 				display: block;
 				overflow: hidden;
 				list-style: none;
 				position: relative;
 			}

 			.social-link li {
 				float: left;
 				margin-right: 8px;
 			}

 			.social-link li a {
 				display: block;
 				width: 50px;
 				height: 50px;
 				font-size: 25px;
 				text-decoration: none;
 				color: #fff !important;
 				text-align: center;
 				line-height: 50px;
 				/*background:#222222;*/
 				border-radius: 50%;
 				transition: all 0.3s ease-in-out;
 			}

 			.social-link li a:hover,
 			.social-link li a:focus {
 				text-decoration: none;
 			}

 			.centerMe {
 				display: table;
 				/* Allow the centering to work */
 				margin: 0 auto;
 			}

 			.facebook a {
 				background: #3b5998;
 			}

 			.instagram a {
 				background: -moz-linear-gradient(45deg, #f09433 0%, #e6683c 25%, #dc2743 50%, #cc2366 75%, #bc1888 100%);
 				background: -webkit-linear-gradient(45deg, #f09433 0%, #e6683c 25%, #dc2743 50%, #cc2366 75%, #bc1888 100%);
 				background: linear-gradient(45deg, #f09433 0%, #e6683c 25%, #dc2743 50%, #cc2366 75%, #bc1888 100%);
 				/*filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#f09433', endColorstr='#bc1888',GradientType=1 ); */
 			}

 			#aboutInfo {
 				padding: 20px;
 				font-size: 20px;
 				text-align: center;
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

 					<h1 style="text-align: center; margin-top: 10px; margin-bottom: 10px; color: rgb(77, 194, 237);">About Us</h1>

 					<div class="row">

 						<div class="col-sm-12">

 							<p id="aboutInfo">
 								Almunite is an amazing online source for classroom notes, practice worksheets and study guides. Our goal is to enable students to learn faster, so they have more time to focus one personal endeavors.<br><br>
 								We understand that school life is stressful and balancing curriculars with extra-curriculars can be cumbersome. This site allows students to exchange valuable information that can potentially increase their speed of gaining knowledge. Students who have already taken the courses share tips, insights and notes to help you succeed academically. The material available on Alumnite is meant to be specific to your school. <br><br>
 								Just like in a classroom we encourage you to lend a helping hand by sharing relevant course information. Alumnite utilizes Stu-coins that can be earned by uploading your notes and spent to get other students’ notes.

 							</p>
 						</div>
 					</div>

 					<div class="centerMe">
 						<ul class="social-link">
 							<li class="facebook">
 								<a href="#">
 									<i class="fab fa-facebook-f"></i>
 								</a>
 							</li>
 							<li class="instagram">
 								<a href="#">
 									<i class="fab fa-instagram"></i>
 								</a>
 							</li>
 						</ul>
 					</div>

 				</div>

 			</div>

 			<?php
				include 'footer.php';
				?>