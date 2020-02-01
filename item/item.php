<?php 
	require '/var/www/html/project/PointOfSale2/config/Database.php';
	use PointOfSale2\Database;

	$db = new Database();
	$data_items = $db->data_show('item');
 ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>Item | Point Os Sale</title>
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
							<h3 class="page-title">
								<span class="page-title-icon bg-gradient-success text-white mr-2">
									<i class="mdi mdi-codepen"></i>
								</span> Item </h3>
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
                    <div class="row mb-3">
                      <div class="col-md-8">
                        <h4 class="card-title">Items Data Table</h4>                    
                      </div>
                      <div class="col-md-4 text-right">
                        <a href="item_add.php" class="btn btn-md px-3 btn-gradient-info"><i class="mdi mdi-plus"></i></a>
                      </div>
                    </div>
										<table class="table table-hover">
											<thead class=" text-info">
												<th style="width: 20px">No</th>
												<th>Item</th>
												<th>Category</th>
												<th>Price</th>
												<th>Stock</th>
												<th>Status</th>
												<th class="text-center" style="width: 50px">Action</th>
											</thead>
												<?php 
													$no = 1;
													foreach ($data_items as $data) {
														$cate = $db->get_data_from_id('category',$data['category_id']);
												?>
											<tbody>
												<td><?= $no++ ?></td>
												<td><?= $data['item'] ?></td>
												<td><?= $cate['category_name'] ?></td>
												<td><?= $data['price'] ?></td>
												<td><?= $data['stock'] ?></td>
												<td><?= ($data['status'])?"<p class='badge badge-gradient-success px-2'><i class='mdi mdi-check-circle'></i> active</p>":"<p class='badge badge-sm badge-gradient-danger px-2' style='border: 0px;box-shadow: none;'><i class='mdi mdi-close-circle'></i> not active</p>" ?></td>
												<td>
													<a href="./item_edit.php?id=<?= $data['id'] ?>" class="btn btn-xs btn-warning"><i class="mdi mdi-settings"></i></a>
													<a href="/var/www/html/project/PointOfSale2/config/proccess.php?id=<?= $data['id']; ?>&action=item_delete" class="btn btn-xs btn-danger"><i class="mdi mdi-trash-can"></i></a>
												</td>
											</tbody>
												<?php 
													}
												 ?>
										</table>
									</div>
								</div>
							</div>
						<!-- END CONTENT -->
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
</html>