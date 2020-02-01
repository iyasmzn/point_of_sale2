<?php 
	require './config/Database.php';
	use PointOfSale2\Database;

	$db = new Database();
	$data_items = $db->item_data();
	// $data_category = $db->get_category_name(99);
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>
		Item | Point of Sale
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
									<h4 class="card-title ">Items</h4>
									<p class="card-category">Item Data Table</p>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<a href="category_add.php" class="btn btn-md px-2 btn-info "><i class="material-icons">person_add</i></a>
										<table class="table">
											<thead class=" text-info">
												<th>No</th>
												<th>Category</th>
												<th>Item</th>
												<th>Price</th>
												<th class="text-center">Status</th>
												<th><span class="pull-right">Action</span></th>
											</thead>
												<?php 
													$no = 1;
													foreach ($data_items as $data) {
												?>
											<tbody>
												<td><?= $no++ ?></td>
												<td><?= $db->get_category_name($data['category_id']) ?></td>
												<td><?= $data['item'] ?></td>
												<td><?= $data['price'] ?></td>
												<td class="text-center"><?= ($data['status'])?"<p class='btn btn-sm btn-outline-success px-2' style='border: 0px;box-shadow: none;'><i class='material-icons'>done_all</i> active</p>":"<p class='btn btn-sm btn-outline-danger px-2' style='border: 0px;box-shadow: none;'><i class='material-icons'>clear</i> not active</p>" ?></td>
												<td>
													<a href="./config/proccess.php?id=<?= $data['id']; ?>&action=item_delete" class="btn btn-sm btn-danger pull-right">Delete</a>
													<a href="" class="btn btn-sm btn-warning pull-right">Edit</a>
												</td>
											</tbody>
												<?php 
													}
													function cate($id) {
														$cateQueryData = "SELECT category_name FROM category WHERE id='$id'";
														$res = mysqli_query($connect, $cateQueryData);
														$row = mysqli_fetch_assoc($res);
														return $row['category_name'];
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
