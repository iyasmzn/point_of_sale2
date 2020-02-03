<?php 
	session_start();
  require '../config/Database.php';
  use PointOfSale2\Database;
	if (isset($_SESSION['name'])) {
  $db = new Database();
  $item = $db->data_show('item');
 ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>Add Item | Point Os Sale</title>
		<!-- plugins:css -->
		<?php include '../tmp/link.php'; ?>
	</head>
	<body>
		<div class="container-scroller">
			<!-- partial:partials/_navbar.html -->
			<?php include '../tmp/purpleAdmin/partials/_navbar.html'; ?>
			<!-- partial -->
			<div class="container-fluid page-body-wrapper">
				<!-- partial:partials/_sidebar.html -->
				<?php include '../tmp/purpleAdmin/partials/_sidebar.html'; ?>
				<!-- partial -->
				<div class="main-panel">
					<div class="content-wrapper">
						<div class="page-header">
							<h3 class="page-title">
								<span class="page-title-icon bg-gradient-success text-white mr-2">
									<i class="mdi mdi-codepen"></i>
								</span> Add New Items </h3>
							<nav aria-label="breadcrumb">
								<ul class="breadcrumb">
									<li class="breadcrumb-item active" aria-current="page">
										<span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
									</li>
								</ul>
							</nav>
						</div>
						<!-- CONTENT -->
							<div class="col-lg-12 grid-margin stretch-card">
								<div class="card">
									<div class="card-body">
										<h4 class="card-title">Add Kind Of Items</h4>
										<form class="form-sample" method="POST" action="../config/proccess.php?action=order_add">
											<p class="card-description"> </p>
											<div class="form-group row">
												<label class="col-sm-12 col-form-label">Table</label>
												<div class="col-sm-5">
													<div class="input-group">
														<div class="input-group-prepend">
															<span class="input-group-text"><i class="mdi mdi-table"></i></span>
														</div>
														<input type="text" class="form-control" placeholder="Table" aria-label="Table" aria-describedby="basic-addon1" name="table">
													</div>
												</div>
											</div>
											<div class="form-group row my-0">
												<div class="col-sm-12">
													<div class="form-group">
													  <label for="item">Item</label>
													  <select class="form-control" id="item" name="item">
													  	<?php foreach ($item as $item_data) { ?>
													    <option value="<?= $item_data['id'] ?>"><?= $item_data['item'] ?></option>
													  	<?php } ?>
													  </select>
													</div>
												</div>
											</div>
											<div class="form-group row mb-3">
												<label class="col-sm-12 col-form-label">Qty</label>
												<div class="col-sm-5">
													<div class="input-group">
														<div class="input-group-prepend">
															<span class="input-group-text"><i class="mdi mdi-currency-usd"></i></span>
														</div>
														<input type="number" class="form-control" placeholder="Qty" aria-label="Qty" aria-describedby="basic-addon1" name="qty">
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-12 text-center">
													<a href="./order.php" class="btn btn-md btn-gradient-warning"><i class="mdi mdi-chevron-left"></i> back</a>
													<button type="submit" class="btn btn-md btn-gradient-success">Submit <i class="mdi mdi-chevron-right"></i></button>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
						<!-- END CONTENT -->
					</div>
					<!-- content-wrapper ends -->
					<!-- partial:partials/_footer.html -->
					<?php include '../tmp/purpleAdmin/partials/_footer.html'; ?>
					<!-- partial -->
				</div>
				<!-- main-panel ends -->
			</div>
			<!-- page-body-wrapper ends -->
		</div>
		<!-- container-scroller -->
		<!-- plugins:js -->
	 <?php include '../tmp/script.php'; ?>
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