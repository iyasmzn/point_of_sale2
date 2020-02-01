<?php 
	require './config/Database.php';
	use PointOfSale2\Database;

	$db = new Database();
	$data_categories = $db->category_data();
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>
		Category | Point of Sale
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
						<div class="col-md-12">
							<div class="card">
								<div class="card-header card-header-info">
									<h4 class="card-title ">Categories</h4>
									<p class="card-category">Category Data Table</p>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<a href="category_add.php" class="btn btn-md px-2 btn-info "><i class="material-icons">person_add</i></a>
										<table class="table">
											<thead class=" text-info">
												<th style="width: 20px">No</th>
												<th>Category</th>
												<th><span class="pull-right">Action</span></th>
											</thead>
												<?php 
													$no = 1;
													foreach ($data_categories as $data) {
												?>
											<tbody>
												<td><?= $no++ ?></td>
												<td><?= $data['category_name'] ?></td>
												<td>
													<a href="./config/proccess.php?id=<?= $data['id']; ?>&action=category_delete" class="btn btn-sm btn-danger pull-right">Delete</a>
													<a href="./category_edit.php?id=<?= $data['id'] ?>" class="btn btn-sm btn-warning pull-right">Edit</a>
												</td>
											</tbody>
												<?php 
													}
												 ?>
										</table>
									</div>
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
