<?php 
  require '../config/Database.php';
  use PointOfSale2\Database;

  $db = new Database();
  $category = $db->data_show('category');
 ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>Add Item | Point Os Sale</title>
		<!-- plugins:css -->
		<?php include '../tmp/link2.php'; ?>
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
										<form class="form-sample" method="POST" action="../config/proccess.php?action=item_add">
											<p class="card-description"> </p>
											<div class="form-group row">
												<label class="col-sm-12 col-form-label">Item</label>
												<div class="col-sm-12">
													<div class="input-group">
														<div class="input-group-prepend">
															<span class="input-group-text"><i class="mdi mdi-codepen"></i></span>
														</div>
														<input type="text" class="form-control" placeholder="Item name" aria-label="Item name" aria-describedby="basic-addon1" name="item">
													</div>
												</div>
											</div>
											<div class="form-group row my-0">
												<div class="col-sm-12">
													<div class="form-group">
													  <label for="category">Category</label>
													  <select class="form-control" id="category" name="category">
													  	<?php foreach ($category as $cate) { ?>
													    <option value="<?= $cate['id'] ?>"><?= $cate['category_name'] ?></option>
													  	<?php } ?>
													  </select>
													</div>
												</div>
											</div>
											<div class="form-group row mb-3">
												<label class="col-sm-12 col-form-label">Price</label>
												<div class="col-sm-12">
													<div class="input-group">
														<div class="input-group-prepend">
															<span class="input-group-text"><i class="mdi mdi-currency-usd"></i></span>
														</div>
														<input type="number" class="form-control" placeholder="Price" aria-label="Price" aria-describedby="basic-addon1" name="price">
													</div>
												</div>
											</div>
											<div class="form-group row mb-5">
												<label class="col-sm-6 col-form-label">Stock</label>
												<label class="col-sm-6 col-form-label">Status</label>
												<div class="col-sm-6">
													<div class="input-group">
														<div class="input-group-prepend">
															<span class="input-group-text"><i class="mdi mdi-database"></i></span>
														</div>
														<input type="number" class="form-control" placeholder="Stock" aria-label="Stock" aria-describedby="basic-addon1" name="stock">
													</div>
												</div>
												<div class="col-sm-4">
													<div class="row">
														<div class="col-sm-6 form-check form-check-success">
														  <label class="form-check-label">
														    <input type="radio" class="form-check-input" name="status" id="status" value="1"> ACTIVE 
														  </label>
														</div>
														<div class="col-sm-6 form-check form-check-danger">
														  <label class="form-check-label">
														    <input type="radio" class="form-check-input" name="status" id="status" value="0"> NOT ACTIVE 
														  </label>
														</div>	
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-12 text-center">
													<a href="./item2.php" class="btn btn-md btn-gradient-warning"><i class="mdi mdi-chevron-left"></i> back</a>
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
	 <?php include '../tmp/script2.php'; ?>
		<!-- End custom js for this page -->
	</body>
</html>