<?php 
  session_start();
  require '/var/www/html/project/PointOfSale2/config/Database.php';
  use PointOfSale2\Database;
  $db           = new Database();
  $orders_data  = $db->data_show('order_user');
  if (isset($_SESSION['name'])) {
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Order | Point Os Sale</title>
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
                  <i class="mdi mdi-cart"></i>
                </span> Order </h3>
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
                        <h4 class="card-title">Orders Data Table</h4>                    
                      </div>
                      <div class="col-md-4 text-right">
                        <a href="order_add.php" class="btn btn-md px-3 btn-gradient-info"><i class="mdi mdi-cart-plus"></i></a>
                      </div>
                    </div>
                    <table class="table table-hover table-bordered">
                      <thead class=" text-info">
                        <th style="width: 20px">No</th>
                        <th>Name</th>
                        <th>Table Seat</th>
                        <th>Qty</th>
                        <th>Total</th>
                        <th class="text-center" style="width: 50px">Action</th>
                      </thead>
                        <?php 
			                    function rupiah($rp) {
														$res_rp = "Rp ".number_format($rp,2,',','.');
														return $res_rp;
													}
                          $no = 1;
                          foreach ($orders_data as $data) {
                            $user = $db->get_data_from_id('users',$data['user_id']);
                            $table = $db->get_data_from_id('tables',$data['table_id']);
                        ?>
                      <tbody>
                        <td><?= $no++ ?></td>
                        <td><?= $user['name'] ?></td>
                        <td><?= $table['tables'] ?></td>
                        <td><?= $data['qty'] ?></td>
                        <td><?= rupiah($data['payment']) ?></td>
                        <td>
                          <a href="./order_detail.php?id=<?= $data['id'] ?>&user_id=<?= $data['user_id'] ?>" class="btn btn-xs btn-twitter"><i class="mdi mdi-eye"></i></a>
                          <a href="/project/PointOfSale2/config/proccess.php?id=<?= $data['id']; ?>&action=order_delete" class="btn btn-xs btn-danger"><i class="mdi mdi-trash-can"></i></a>
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
  <?php 
  }
  else {
    echo "please login first";
    header('Refresh:2;../index.php');
  }
     ?>
</html>