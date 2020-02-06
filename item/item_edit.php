<?php 
	session_start();
  require '../config/Database.php';
  use PointOfSale2\Database;
	if (isset($_SESSION['name'])) {
  $item_id = $_GET['id'];
  $db = new Database();
  $category = $db->data_show('category');
  $itemss = $db->get_data_from_id('item',$item_id);
 ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>Edit Item | Point Os Sale</title>
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
								</span> Edit Item </h3>
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
										<h4 class="card-title">Edit Item</h4>
										<form class="form-sample" method="POST" action="../config/proccess.php?action=item_edit">
											<input type="hidden" name="id" value="<?= $item_id ?>">
											<p class="card-description"> </p>
											<div class="form-group row">
												<label class="col-sm-12 col-form-label">Item</label>
												<div class="col-sm-12">
													<div class="input-group">
														<div class="input-group-prepend">
															<span class="input-group-text"><i class="mdi mdi-codepen"></i></span>
														</div>
														<input type="text" class="form-control" placeholder="Item name" aria-label="Item name" aria-describedby="basic-addon1" name="item" value="<?= $itemss['item'] ?>">
													</div>
												</div>
											</div>
											<div class="form-group row my-0">
												<div class="col-sm-12">
													<div class="form-group">
													  <label for="category">Category</label>
													  <select class="form-control" id="category" name="category">
													  	<?php foreach ($category as $cate) { 
													  		if ($cate['id'] == $itemss['category_id']) { ?>				  			
													    <option value="<?= $cate['id'] ?>" selected><?= $cate['category_name'] ?></option>
													    <?php
													  		} else { ?>
															    <option value="<?= $cate['id'] ?>"><?= $cate['category_name'] ?></option>
													  			<?php }
													  		} ?>
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
														<input type="number" class="form-control" placeholder="Price" aria-label="Price" aria-describedby="basic-addon1" name="price" value="<?= $itemss['price'] ?>">
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
														<input type="number" class="form-control" placeholder="Stock" aria-label="Stock" aria-describedby="basic-addon1" name="stock" value="<?= $itemss['stock'] ?>">
													</div>
												</div>
												<div class="col-sm-4">
													<div class="row">
														<div class="col-sm-6 form-check form-check-success">
														  <label class="form-check-label">
														    <input type="radio" class="form-check-input" name="status" id="status" value="1" <?= ($itemss['status'])?"checked":"" ?>> ACTIVE 
														  </label>
														</div>
														<div class="col-sm-6 form-check form-check-danger">
														  <label class="form-check-label">
														    <input type="radio" class="form-check-input" name="status" id="status" value="0" <?= ($itemss['status'])?"":"checked" ?>> NOT ACTIVE 
														  </label>
														</div>	
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-12 text-center">
													<a href="./item.php" class="btn btn-md btn-gradient-warning"><i class="mdi mdi-chevron-left"></i> back</a>
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