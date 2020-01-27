<!DOCTYPE html>
<html lang="en">

<head>
	<title>
		Add User | Point of Sale
	</title>
	<?php include './tmp/link.php'; ?>
</head>

<body class="">
	<div class="wrapper ">
		<?php include './tmp/sidebar.php'; ?>
		<div class="main-panel">
			<!-- Navbar -->
			<?php include './tmp/navbar.php'; ?>
			<!-- End Navbar -->
			<div class="content">
				<div class="container-fluid">
          <div class="row">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Add New User</h4>
                  <p class="card-category">Complete your profile</p>
                </div>
                <div class="card-body">
                  <form method="POST" action="./config/proccess.php?action=user_add">
                    <div class="row">
                      <div class="col-md-8">
                        <div class="form-group">
                          <label class="bmd-label-floating">Username</label>
                          <input type="text" class="form-control" name="name">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Age</label>
                          <input type="number" class="form-control" name="age">
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Email address</label>
                          <input type="email" class="form-control" name="email">
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Password</label>
                          <input type="email" class="form-control" name="password">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>Address</label>
                          <div class="form-group">
                            <label class="bmd-label-floating"> Add your identified address.</label>
                            <textarea class="form-control" rows="5" name="address"></textarea>
                          </div>
                        </div>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-info pull-right">Add New User</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card card-profile">
                <div class="card-avatar">
                  <a href="#pablo">
                    <img class="img" src="./tmp/material/assets/img/faces/marc.jpg" />
                  </a>
                </div>
                <div class="card-body">
                  <h6 class="card-category text-gray">Brilliant Student</h6>
                  <h4 class="card-title">Who Am I</h4>
                  <p class="card-description">
                    Be scared of the truth because we need to restart the human foundation in truth And I love you like Kanye loves Kanye I love Rick Owens’ bed design but the back is...
                  </p>
                  <a href="#pablo" class="btn btn-danger btn-round">Kick</a>
                </div>
              </div>
            </div>
          </div>
				</div>
			</div>
			<!-- Footer -->
			<?php include './tmp/footer.php'; ?>
		</div>
	</div>
		<!-- Fixed Plugin -->
		<?php include './tmp/fixedPlugin.php'; ?>
	<!--   Core JS Files   -->
	<?php include './tmp/script.php'; ?>
</body>

</html>
