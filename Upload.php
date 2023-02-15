 		<?php
			include 'headerFiles.php';
			?>

 		<title>Upload New Worksheet</title>

 		<style type="text/css">
 			.progress {
 				margin-left: auto;
 				margin-right: auto;
 			}

 			#upldFileCol {
 				background-color: #EEE;
 				border: #999 5px dashed;
 				width: 50%;
 				height: 100px;
 				padding: 8px;
 				font-size: 18px;
 				margin-top: 10px;
 				justify-content: center;
 			}
 		</style>

 		</head>



 		<body>

 			<div class="container-fluid">

 				<div class="row">
 					<?php
						include 'nav.php';
						if (!isset($_SESSION['Email'])) {
							echo "<script>alert('You have to first Log In.'); openForm('no');</script>";
							// 		if (!isset($_SESSION['Uni'])) {
							// 		    echo "<script>alert('Please select a University from MyProfile Section.');window.location.href = 'MyProfile.php';</script>";
							// 	    }
						}
						?>
 				</div>

 				<?php
					// echo date('M Y'); 
					// $time  = strtotime(date('M Y'));
					// $month = date('m',$time);
					// $year  = date('Y',$time);
					// echo "<br>Month :- ".$month." Year :- ".$year;

					// $fall = array("10", "11", "12", "01", "02", "03");
					// $summer = array("04", "05", "06", "07", "08", "09");

					// if (in_array("07", $fall)) {
					// 	echo "<br>Month :- ".$month." Type :- Fall";
					// }
					// else{
					// 	echo "<br>Month :- ".$month." Type :- Summer";
					// }

					?>

 				<div class="row" style="margin-top: 30px;" id="formRow">

 					<form class="col" method='POST' enctype="multipart/form-data" id="FormUpld">

 						<div class="row">
 							<div class="col-sm-4" style="text-align: center;">
 								<input type="text" name="subject" class="upldInput" placeholder="Class Name" required>
 							</div>

 							<div class="col-sm-4" style="text-align: center;">
 								<input type="text" name="prof" class="upldInput" placeholder="Professor Name" required>
 							</div>
 							<div class="col-sm-4" style="text-align: center;">
 								<input type="text" name="fileName" class="upldInput" placeholder="File Name" required>
 							</div>
 						</div>

 						<div class="row" style="margin-top: 20px;">

 							<div class="input-group mb-3 col-sm-4" style="height: 100%; margin:0; margin-bottom: 0px; margin-top: 32px;">
 								<div class="input-group-prepend" style="height: 100%;">
 									<label class="input-group-text" for="yr">Semester</label>
 								</div>
 								<select class="custom-select" id="yr" name="yr">

 									<?php
										$currYR = date("Y");
										for ($i = 2018; $i <= (int)$currYR; $i++) {
											echo "<option value='Spring " . $i . "'>Spring " . $i . "</option>";
											echo "<option value='Fall " . $i . "'>Fall " . $i . "</option>";
										}
										?>
 								</select>
 							</div>

 							<div class="input-group mb-3 col-sm-4" style="height: 100%; margin:0; margin-bottom: 0px; margin-top: 32px;">
 								<div class="input-group-prepend" style="height: 100%;">
 									<label class="input-group-text" for="classLvl">Class Level</label>
 								</div>
 								<select class="custom-select" id="classLvl" name="classLvl">
 									<option value="Freshman/Sophomore">Freshman/Sophomore</option>
 									<option value="Junior/Senior">Junior/Senior</option>
 								</select>
 							</div>

 							<div class="input-group mb-3 col-sm-4" style="height: 100%; margin:0; margin-bottom: 0px; margin-top: 32px;">
 								<div class="input-group-prepend" style="height: 100%;">
 									<label class="input-group-text" for="upldCategory">Category</label>
 								</div>
 								<select class="custom-select" id="upldCategory" name="upldCategory" onchange="quizLetCheck(this);">
 									<option value="Sample Papers" selected>Sample Papers</option>
 									<option value="Powerpoints">Powerpoints</option>
 									<option value="Notes">Notes</option>
 									<option value="Class Worksheets">Class Worksheets</option>
 									<option value="Essays">Essays</option>
 									<option value="Code">Code</option>
 									<option value="Quizlet Links">Quizlet Links</option>
 									<option value="Study Guides">Study Guides</option>
 									<option value="Syllabus">Syllabus</option>
 								</select>
 							</div>


 						</div>

 						<div class="row" style="margin-top: 40px;">
 							<div class="col-sm-12 text-center">
 								<input type="text" name="desc" class="upldInput" placeholder="Enter Description or Subtitle" style="width: 90%;">
 							</div>
 						</div>




 						<div class="row justify-content-center" id="upldFileRow" style="margin-top: 30px;">
 							<div class="col-sm-12 text-center" id="">
 								<input type="file" name="myInputfFile" id="upldFileBtn" required style="display: block; margin-left: auto; margin-right: auto;">
 								<input type="text" name="myInputfFile" id="upldQuizLink" class="upldInput" required style="width: 90%; display: block; margin-left: auto; margin-right: auto;" placeholder="Enter Quizlet link">
 							</div>
 						</div>


 						<div class="row text-center" style="margin-top: 10px; display: none;" id="upldFileProgressRow">
 							<div class="progress center-block" style="width: 70%; height: 35px;">
 								<div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width:0%" id="upldFileProgress">
 									<span id="perc"></span>
 								</div>
 							</div>
 						</div>

 						<div class="row" style="margin-top: 50px;">
 							<div class="col text-center">
 								<button type="button" id="submitFileBtn">
 									Submit
 								</button>
 							</div>
 						</div>

 					</form>
 				</div>

 				<div id="resultUpld" class="row">
 					<div class="alert alert-success" role="alert" id="successAlert"></div>
 					<div class="alert alert-danger" role="alert" id="failAlert"></div>
 				</div>

 				<div class="loader-wrapper">
 					<span class="loader"><span class="loader-inner"></span></span>
 				</div>

 			</div><!-- Container end -->

 			<script type="text/javascript">
 				$(window).bind("load", function() {
 					$(".loader-wrapper").fadeOut("slow");
 				});

 				var quizLinkActive = "no";

 				function quizLetCheck(sel) {
 					if (sel.value == "Quizlet Links") {
 						quizletLinkshow();
 						upldFileBtnRem();
 						quizLinkActive = "yes";
 					} else {
 						quizletLinkRem();
 						upldFileBtnShow();
 						quizLinkActive = "no";
 					}
 				}

 				quizletLinkRem();
 				upldFileBtnShow();

 				function upldFileBtnRem() {
 					$("#upldFileBtn").css("display", "none");
 					$("#upldFileBtn").removeAttr('required');
 				}

 				function upldFileBtnShow() {
 					$("#upldFileBtn").css("display", "block");
 				}

 				function quizletLinkRem() {
 					$("#upldQuizLink").css("display", "none");
 					$("#upldQuizLink").removeAttr('required');
 				}

 				function quizletLinkshow() {
 					$("#upldQuizLink").css("display", "block");
 				}


 				$(document).ready(function() {
 					$('#submitFileBtn').click(function(e) {
 						var retVal = confirm("Are you sure you want to Upload.");
 						if (retVal == true) {

 							e.preventDefault();
 							$.ajax({
 								type: "POST",
 								url: 'UploadScript.php?val=' + quizLinkActive,
 								data: new FormData(document.getElementById("FormUpld")),
 								contentType: false,
 								cache: false,
 								processData: false,

 								xhr: function() {
 									$("#upldFileProgressRow").css("display", "block");
 									var xhr = new window.XMLHttpRequest();

 									xhr.upload.addEventListener("progress", function(evt) {
 										if (evt.lengthComputable) {
 											var percentComplete = evt.loaded / evt.total;
 											percentComplete = parseInt(percentComplete * 100);
 											console.log(percentComplete);


 											document.getElementById("upldFileProgress").setAttribute("aria-valuenow", percentComplete);

 											$("#upldFileProgress").css("width", percentComplete + "%");

 											$("#perc").innerHTML = percentComplete + "%";

 											if (percentComplete === 100) {

 												$("#resultUpld").fadeIn();

 												document.getElementById("successAlert").style.display = "none";

 												document.getElementById("failAlert").style.display = "none";

 												$(".loader-wrapper").fadeIn();

 											}

 										}
 									}, false);

 									return xhr;
 								},
 								success: function(response) {
 									$(".loader-wrapper").fadeOut();
 									if (response === "0") {
 										document.getElementById("failAlert").style.display = "block";
 										$("#failAlert").html("Only PDF, EPUB, XLS, PPT, MP4, Word, JPG, PNG, ZIP, DOCX, Py & JAVA file extenions are allowed.");
 									} else if (response === "1") {
 										document.getElementById("failAlert").style.display = "block";
 										$("#failAlert").html("Please Log in First and then Try Again.");
 										openForm();
 									} else if (response === "2") {
 										document.getElementById("failAlert").style.display = "block";
 										$("#failAlert").html("Sorry your file was not uploaded because some error occured. Please contact us.");
 									} else {
 										$("#formRow").fadeOut();
 										document.getElementById("successAlert").style.display = "block";
 										$("#successAlert").html(response);
 									}
 								},
 								error: function(ts) {
 									console.log(ts.responseText);
 								}
 							});
 						}
 					});
 				});

 				function drag_drop(event) {
 					event.preventDefault();
 					alert(event.dataTransfer.files[0]);
 					alert(event.dataTransfer.files[0].name);
 					alert(event.dataTransfer.files[0].size + " bytes");
 					document.getElementById("upldFileCol").setAttribute("")
 				}
 			</script>

 		</body>

 		</html>