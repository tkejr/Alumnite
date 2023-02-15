	<?php
		include 'headerFiles.php';
	?>

	<title>Hey</title>
</head>
<body>
		<!--header-start-->

		<header>	
			<div class="container myContents">
				
				<div class="row">
					<div class="col-sm-12">
						<a><img src="img/logo.png" alt="" height="190" width="220"></a>
					</div>
				</div>
				
				<div class="row">
					<div class="col-sm-12">
						<h1>Welcome To Alumnite</h1>
					</div>
				</div>
				
				<div class="row">
					<div class="col-sm-12">
						<p>We Slinging Knowledge!</p>
					</div>
				</div>
				
				<div class="row">
					<div class="col-sm-12">
						<a href="UploadDownload.php" class="link">Get Started</a>
					</div>
				</div>
			</div>
 
			
		</header>

		<!--header-end -->
	
		<div class="loader-wrapper">
    		<span class="loader"><span class="loader-inner"></span></span>
		</div>

		<!-- <?php
			// include "UploadDownload.php";
			
		?> -->

		<script type="text/javascript">
			$(window).on("load",function(){
     			$(".loader-wrapper").fadeOut("slow");
			});
		</script>

</body>
</html>