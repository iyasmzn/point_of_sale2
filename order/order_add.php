<?php 
	session_start();
  require '../config/Database.php';
  use PointOfSale2\Database;
	if (isset($_SESSION['name'])) {
  $db = new Database();
  $tables = $db->data_show('tables');
  $data_items = $db->data_id_item('item');
  $data_catte = $db->data_show('category');
  $ang = 1;
 ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>Order Add | Point Os Sale</title>
		<!-- plugins:css -->
		<?php include '../tmp/link.php'; ?>
		<style type="text/css">
			[class*='itttem'] {
				display: none;
			}
			.itttem-all {
				display: block;
			}
		</style>
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
								</span> Add New Order </h3>
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
										<h4 class="card-title">Add Order</h4>
										<form class="form-sample" method="POST" action="../config/proccess.php?action=order_add">
	              			<input type="hidden" name="user_id" value="<?= $_SESSION['id'] ?>">
											<p class="card-description"> </p>
											<!-- <div class="form-group row my-0">
												<div class="col-sm-12">
													<div class="form-group">
													  <label for="table">Table</label>
		 											  <select class="form-control" id="table" name="table">
		 											  	<?php foreach ($tables as $table) { ?>
		 											    <option value="<?= $table['id'] ?>"><?= $table['tables'] ?></option>
		 											  	<?php } ?>
		 											  </select>
													</div>
												</div>
											  <label for="date" class="col-1 col-form-label">Date</label>
											  <div class="col-10">
											    <input class="form-control" type="date" value="" id="date" name="date">
											  </div>
											</div> -->
											<div class="form-group row my-0">
												<div class="col-sm-6">
													<div class="form-group">
													  <label for="category">Category</label>
													  <select class="form-control category-select" id="category" name="category" onchange="check(this);">
													  	<option value="all">Select category here...</option>
													  	<?php foreach ($data_catte as $data) { ?>
													    <option value="<?= $data['id'] ?>"><?= $data['category_name'] ?></option>
													  	<?php } ?>
													  </select>
													</div>
												</div>
												<?php  
												  echo "<script>document.write(sss);</script>";
												?>
											<input type="text" class="vvval" name="" value="all" id="checking">
												<div class="col-sm-6">
													<div class="form-group">
													  <label for="item">Item</label>
													  <select class="form-control itttem-all itemNone-all" id="item" name="item">
														  	<?php 
														  	foreach ($data_items as $data) { ?>
														    <option value="<?= $data['id'] ?>"><?= $data['item'] ?></option>
														  	<?php } ?>
														  </select>	
													  <?php 
													  	foreach ($data_catte as $caate) { 
															  $data_item_id = $db->data_itemss($caate['id']);
													  		?>
													  		<input type="hidden" class="ittttem" value="<?= $caate['id'] ?>">
														  <select class="form-control itttem-<?= $caate['id'] ?> itemNone-<?= $caate['id'] ?>" id="item" name="item">
														  	<?php 
														  	foreach ($data_item_id as $data) { ?>
														    <option value="<?= $data['id'] ?>"><?= $data['item'] ?></option>
														  	<?php } ?>
														  </select>	
													  	<?php
													  	}
													   ?>
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
														<input type="number" class="form-control" placeholder="Qty" aria-label="Qty" aria-describedby="basic-addon1" name="qty" min="1" value="1">
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
	 <script type="text/javascript">
        $(document).ready(function() {
            $('.category-select').change(function() {
                var cate = $('.category-select').val();
                $('.vvval').val(cate);
                $('.itttem-'+cate).css('display', 'block');
                if (cate == 1) {
	                $('.itemNone-all').css('display', 'none');
	                $('.itemNone-2').css('display', 'none');
	                $('.itemNone-3').css('display', 'none');
                }
                if (cate == 2) {
	                $('.itemNone-all').css('display', 'none');
	                $('.itemNone-1').css('display', 'none');
	                $('.itemNone-3').css('display', 'none');
                }
                if (cate == "all") {
	                $('.itemNone-all').css('display', 'block');
	                $('.itemNone-1').css('display', 'none');
	                $('.itemNone-2').css('display', 'none');
	                $('.itemNone-3').css('display', 'none');
                }
            });
        });
    </script>
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