<?php 
	session_start();
	require '/var/www/html/project/PointOfSale2/config/Database.php';
	use PointOfSale2\Database;
	if (isset($_SESSION['name'])) {
	$db = new Database();
	$user = mysqli_query($db->connect, "SELECT * FROM users");
	$userRow = mysqli_num_rows($user);
	$category = mysqli_query($db->connect, "SELECT * FROM category");
	$categoryRow = mysqli_num_rows($category);
	$item = mysqli_query($db->connect, "SELECT * FROM item");
	$itemRow = mysqli_num_rows($item);
 ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>Point Os Sale | Iyasmzn</title>
		<!-- plugins:css -->
		<?php include '/var/www/html/project/PointOfSale2/tmp/link.php'; ?>
	</head>
	<body>
		<div class="container-scroller">
			<!-- partial:partials/_navbar.html -->
			<?php include '/var/www/html/project/PointOfSale2/tmp/purpleAdmin/partials/_navbar.html'; ?>
			<!-- partial -->
			<div class="container-fluid page-body-wrapper">
				<!-- partial:partials/_sidebar.html -->
				<?php include '/var/www/html/project/PointOfSale2/tmp/purpleAdmin/partials/_sidebar.html'; ?>
				<!-- partial -->
				<div class="main-panel">
					<div class="content-wrapper">
						<div class="page-header">
							<h3 class="page-title" data-aos="fade-down">
								<span class="page-title-icon bg-gradient-primary text-white mr-2">
									<i class="mdi mdi-home"></i>
								</span> Home </h3>
							<nav aria-label="breadcrumb">
								<ul class="breadcrumb">
									<li class="breadcrumb-item active" aria-current="page">
										<span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
									</li>
								</ul>
							</nav>
						</div>
						<div class="row">
							<div class="col-md-3 stretch-card grid-margin" data-aos="zoom-in" data-aos-delay="200">
								<div class="card bg-gradient-success card-img-holder text-white">
									<div class="card-body">
										<img src="/project/PointOfSale2/tmp/purpleAdmin/assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
										<h4 class="font-weight-normal mb-3">Users <i class="mdi mdi-account-multiple h1 float-right"></i>
										</h4>
										<h2 class="mb-5"><?= $userRow ?></h2>
										<h6 class="card-text">Total Users</h6>
									</div>
								</div>
							</div>
							<div class="col-md-3 stretch-card grid-margin" data-aos="zoom-in" data-aos-delay="300">
								<div class="card bg-gradient-info card-img-holder text-white">
									<div class="card-body">
										<img src="/project/PointOfSale2/tmp/purpleAdmin/assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
										<h4 class="font-weight-normal mb-3">Category <i class="mdi mdi-bookmark-outline mdi-24px float-right"></i>
										</h4>
										<h2 class="mb-5"><?= $categoryRow ?></h2>
										<h6 class="card-text">Kind of Category</h6>
									</div>
								</div>
							</div>
							<div class="col-md-3 stretch-card grid-margin" data-aos="zoom-in" data-aos-delay="400">
								<div class="card bg-gradient-warning card-img-holder text-white">
									<div class="card-body">
										<img src="/project/PointOfSale2/tmp/purpleAdmin/assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
										<h4 class="font-weight-normal mb-3">Item <i class="mdi mdi-diamond mdi-24px float-right"></i>
										</h4>
										<h2 class="mb-5"><?= $itemRow ?></h2>
										<h6 class="card-text">Items</h6>
									</div>
								</div>
							</div>
							<div class="col-md-3 stretch-card grid-margin" data-aos="zoom-in" data-aos-delay="500">
								<div class="card bg-gradient-danger card-img-holder text-white">
									<div class="card-body">
										<img src="/project/PointOfSale2/tmp/purpleAdmin/assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
										<h4 class="font-weight-normal mb-3">Order <i class="mdi mdi-diamond mdi-24px float-right"></i>
										</h4>
										<h2 class="mb-5">0</h2>
										<h6 class="card-text">Orders</h6>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- content-wrapper ends -->
					<!-- partial:partials/_footer.html -->
					<?php include '/var/www/html/project/PointOfSale2/tmp/purpleAdmin/partials/_footer.html'; ?>
					<!-- partial -->
				</div>
				<!-- main-panel ends -->
			</div>
			<!-- page-body-wrapper ends -->
		</div>
		<!-- container-scroller -->
		<!-- plugins:js -->
	 <?php include '/var/www/html/project/PointOfSale2/tmp/script.php'; ?>
		<!-- End custom js for this page -->
	</body>
	<?php 
	}
	else {
		echo "please login first";
		header('Refresh:2;../index.php');
	}
		 ?>
</html>