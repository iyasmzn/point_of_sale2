<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Purple Admin</title>
    <!-- plugins:css -->
    <?php include '../tmp/link.php'; ?>
  </head>
  <body>
  	<?php 
			$action = $_GET['action'];
			if ($action == "wrong_password") {
 		?>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center text-center error-page bg-primary">
          <div class="row flex-grow">
            <div class="col-lg-7 mx-auto text-white">
              <div class="row align-items-center d-flex flex-row">
                <div class="col-lg-6 text-lg-right pr-lg-4">
                  <h1 class="display-1 mb-0" data-aos="zoom-out"><i class="mdi mdi-close"></i></h1>
                </div>
                <div class="col-lg-6 error-page-divider text-lg-left pl-lg-4">
                  <h2 data-aos="fade-right" data-aos-delay="200">ERROR!</h2>
                  <h3 class="font-weight-light" data-aos="fade-right" data-aos-delay="400">Wrong password or username.</h3>
                </div>
              </div>
              <div class="row mt-5">
                <div class="col-12 text-center mt-xl-2">
                	<p data-aos="zoom-in" data-aos-delay="800">You will automatically back to login page for <span style="font-size: 1.5em;"><b id="countdown">6</b></span>sec</p>
                  <a class="text-white font-weight-medium" href="/project/PointOfSale2/" data-aos="zoom-in" data-aos-delay="600"><i class="mdi mdi-door-open"></i> Back to home</a>
                </div>
              </div>
              <div class="row mt-5">
                <div class="col-12 mt-xl-2">
                  <p class="text-white font-weight-medium text-center" data-aos="zoom-in" data-aos-delay="1000">Iyasmzn &copy; 2020 All rights reserved.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <?php 
  }
  elseif ($action == 'empty') { ?>
  	<div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center text-center error-page bg-primary">
          <div class="row flex-grow">
            <div class="col-lg-7 mx-auto text-white">
              <div class="row align-items-center d-flex flex-row">
                <div class="col-lg-6 text-lg-right pr-lg-4">
                  <h1 class="display-1 mb-0" data-aos="zoom-out"><i class="mdi mdi-close"></i></h1>
                </div>
                <div class="col-lg-6 error-page-divider text-lg-left pl-lg-4">
                  <h2 data-aos="fade-right" data-aos-delay="200">Error!</h2>
                  <h3 class="font-weight-light" data-aos="fade-right" data-aos-delay="400">Your username or password are empty.</h3>
                </div>
              </div>
              <div class="row mt-5">
                <div class="col-12 text-center mt-xl-2">
                	<p data-aos="zoom-in" data-aos-delay="800">You will automatically back to login page for <span style="font-size: 1.5em;"><b id="countdown">6</b></span>sec</p>
                  <a class="text-white font-weight-medium" href="/project/PointOfSale2/" data-aos="zoom-in" data-aos-delay="600"><i class="mdi mdi-door-open"></i> Back to home</a>
                </div>
              </div>
              <div class="row mt-5">
                <div class="col-12 mt-xl-2">
                  <p class="text-white font-weight-medium text-center" data-aos="zoom-in" data-aos-delay="1000">Iyasmzn &copy; 2020 All rights reserved.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
  <?php }
     ?>
    <!-- container-scroller -->
    <!-- plugins:js -->
   <?php 
   	header('Refresh:6;/project/PointOfSale2/');
   	include '../tmp/script.php'; 
   ?>
   <script type="text/javascript">
   		var seconds		= document.getElementById('countdown').textContent;
   		var countdown = setInterval(function() {
   			seconds--;
   			document.getElementById('countdown').textContent = seconds;
   			if (seconds <= 0) clearInterval(countdown);
   		},1000);
   </script>
    <!-- endinject -->
  </body>
</html>
