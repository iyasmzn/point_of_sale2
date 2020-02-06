<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Point of Sale 2</title>
    <!-- plugins:css -->
		<?php include '/var/www/html/project/PointOfSale2/tmp/link.php'; ?>
  </head>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth">
          <div class="row flex-grow">
            <div class="col-lg-4 mx-auto" data-aos="zoom-in">
              <div class="auth-form-light text-left p-5">
                <div class="brand-logo">
                  <a class="brand-logo text-success" href="/project/PointOfSale2/view/index.php" style="font-size: 2em;"><i class="mdi mdi-basket"></i> <b>Point of Sale</b> 2</a>
                </div>
                <h4>Hello! let's get started</h4>
                <h6 class="font-weight-light">Sign in to continue.</h6>
                <form class="pt-3" action="./config/proccess.php?action=login_proccess" method="post">
                  <div class="form-group">
                    <input type="text" class="form-control form-control-lg" id="name" placeholder="Input your username" name="name">
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password" name="password">
                  </div>
                  <div class="mt-3">
                    <button class="btn btn-block btn-gradient-success btn-lg font-weight-medium auth-form-btn" href="../../index.html">SIGN IN</button>
                  </div>
                  <div class="text-center mt-4 font-weight-light"> Don't have an account? <a href="./login/register.php" class="text-info">Create</a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
	 <?php include '/var/www/html/project/PointOfSale2/tmp/script.php'; ?>
    <!-- endinject -->
  </body>
</html>