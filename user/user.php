<?php 
	require '../config/Database.php';
	use PointOfSale2\Database;

	$db = new Database();
	$data_users = $db->data_show('users');
 ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>User | Point Os Sale</title>
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
									<i class="mdi mdi-account"></i>
								</span> User </h3>
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
										<div class="row">
											<div class="col-md-8">
												<h4 class="card-title">Users Data Table</h4>                    
											</div>
											<div class="col-md-4 text-right">
												<a href="user_add.php" class="btn btn-md px-3 btn-gradient-info"><i class="mdi mdi-account-plus"></i></a>
											</div>
										</div>
										<table class="table table-hover">
											<thead class=" text-info">
												<th style="width: 20px">No</th>
												<th>Name</th>
												<th>Gender</th>
												<th>Email</th>
												<th>Age</th>
												<th>Address</th>
												<th class="text-center" style="width: 50px">Action</th>
											</thead>
												<?php 
													$no = 1;
													foreach ($data_users as $data) {
												?>
											<tbody>
												<td><?= $no++ ?></td>
												<td><?= $data['name'] ?></td>
												<td><?= ($data['gender'])?"
													<span class='badge badge-gradient-success'><i class='mdi mdi-gender-male'></i> Man</span>":"
													<span class='badge badge-gradient-warning'><i class='mdi mdi-gender-female'></i> Woman</span>" ?>  
												</td>
												<td><?= $data['email'] ?></td>
												<td><?= $data['age'] ?></td>
												<td><?= $data['address'] ?></td>
												<td>
													<a href="./user_edit.php?id=<?= $data['id'] ?>" class="btn btn-xs btn-warning"><i class="mdi mdi-settings"></i></a>
													<a href="../config/proccess.php?id=<?= $data['id']; ?>&action=user_delete" class="btn btn-xs btn-danger"><i class="mdi mdi-trash-can"></i></a>
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
</html>