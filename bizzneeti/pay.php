<?php 

// Inintialize URL to the variable 
$url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
// Use parse_url() function to parse the URL 
// and return an associative array which 
// contains its various components 
$url_components = parse_url($url); 

// Use parse_str() function to parse the 
// string passed via URL 
parse_str($url_components['query'], $params); 
	
// Display result 
$c = $params['c'];
$a = $params['a'];
$qr= "https://api.qrserver.com/v1/create-qr-code/?data=upi%3A%2F%2Fpay%3Fpa%3Dbizzneeti%40upi%26pn%3DBizzneeti%26am%3D$a%26tn%3D$c&size=175x175";
$openupi = "upi://pay?pa=bizzneeti@upi&pn=Bizzneeti&am=$a&tn=$c";

function isMobile() {
    return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
}

?> 

<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>

	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<!-- Stylesheets
	============================================= -->
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700|Poppins:300,400,500,600,700|PT+Serif:400,400i&display=swap" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
	<link rel="stylesheet" href="style.css" type="text/css" />
	<link rel="stylesheet" href="css/dark.css" type="text/css" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />

	<!-- Document Title
	============================================= -->
	<title>Bizzneeti | <?php echo $c; ?> Payment</title>
	<link rel="icon" type="image/png" href="images/favicon.png" />


</head>

<body class="stretched">

	<!-- Document Wrapper
	============================================= -->
	<div id="wrapper" class="clearfix">

		<!-- Content
		============================================= -->
		<section id="content">
			<div class="content-wrap py-0">

				<div class="section dark p-0 m-0 h-100 position-absolute"></div>

				<div class="section bg-transparent min-vh-100 p-0 m-0 d-flex">
					<div class="vertical-middle">
						<div class="container py-5">


							<div class="card mx-auto rounded-0 border-0" style="max-width: 400px;">
								<div class="card-body" style="padding: 40px;">
										<h2>Bizzneeti Payment</h2>
										
										<div class="row">
											<div class="col-12 form-group">
											<span><b>Team Name: </b><span> <?php echo $c; ?></span>
											</div>

											<div class="col-12 form-group">
											<span><b>Amount: </b> INR <?php echo $a; ?></span>
											</div>
										</div>
										<div class="line line-sm"></div>
										<div style="text-align: center;">
											<img src="<?php echo $qr; ?>">
											<br>
											<span><b>bizzneeti@upi</b></span><br><br>
											<span>Scan via any UPI app to Pay.</span>
										</div>
										<div class="line line-sm"></div>
										<div class="row">
											<div class="col-12 form-group mb-0">	
												<button class="btn btn-success btn-lg btn-block" id="paynow">Pay Now</button>
												
												</div>											
										</div>

								</div>
							</div>

							<div class="text-center text-muted mt-3"><small>Support : colloquium@nmims.edu.in</small></div>

						</div>
					</div>
				</div>

			</div>
		</section><!-- #content end -->

	</div><!-- #wrapper end -->

	<!-- Go To Top
	============================================= -->
	<div id="gotoTop" class="icon-angle-up"></div>

	<!-- JavaScripts
	============================================= -->
	<script type="text/javascript">
    document.getElementById("paynow").onclick = function () {
		if (<?php echo isMobile(); ?>){
			location.href = "<?php echo $openupi; ?>";
		}
		else{
			alert("Pay Now option is only available for smartphones. Please scan the QR using any UPI app and email us a screenshot of successful payment.");
		}
    };
</script>
<script src="js/jquery.js"></script>
	<script src="js/plugins.min.js"></script>

	<!-- Footer Scripts
	============================================= -->
	<script src="js/functions.js"></script>

</body>
</html>