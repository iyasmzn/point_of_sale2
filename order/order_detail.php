<?php 
  session_start();
  require '/var/www/html/project/PointOfSale2/config/Database.php';
  use PointOfSale2\Database;
  if (isset($_SESSION['name'])) {
  $user_iddd        = $_GET['user_id'];
  $order_iddd        = $_GET['id'];
  $code_trx        = $_GET['code_trx'];
  $db               = new Database();
  $orders_data      = $db->get_data_from_id('order_user', $order_iddd);
  $user_data        = $db->get_data_from_id('users',$user_iddd);
  $user_data_order  = $db->get_data_from_id('order_user',$order_iddd);
  $table_id         = $user_data_order['table_id'];
  $table_data  = $db->get_data_from_id('tables',$table_id);
  function rupiah($rp) {
    $res_rp = "Rp ".number_format($rp,2,',','.');
    return $res_rp;
  }
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
              <div id="cart" data-aos="zoom-in" data-aos-offset="400" class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="row mb-3">
                      <div class="col-md-4">
                        <h4 class="card-title">Order</h4>                    
                      </div>
                      <div class="col-md-4">
                        <h4 class="text-center text-muted"><?= $orders_data['datte'] ?></h4>                    
                      </div>
                      <div class="col-md-4 text-right">
                        <h4 class="card-title"><?= $user_data['name'] ?><br><span class="text-muted" style="font-size: 0.7em"><i>Orderer</i></span></h4>                    
                      </div>
                    </div>
                  <h6 class="mb-0 text-muted"><i class="mdi mdi-table"></i> Table Seat</h6>
                  <h4 class="pb-3 mb-0"><?= $table_data['tables'] ?></h4>
                    <div class="row">
                      <table class="table table-bordered table-hover">
                        <tr class="bg-light">
                          <th style="width: 50px;">No</th>
                          <th>Category</th>
                          <th>Item</th>
                          <th>Qty</th>
                          <th>Total</th>
                        </tr>
                  <?php 
                    $cart_data = $db->data_order_detail_show('order_detail', $user_iddd, $code_trx);
                    $no = 1;
                    if (empty($cart_data)) {
                      echo "Nothing item";
                    } else {
                    foreach ($cart_data as $data) { 
                      $item = $db->get_data_from_id('item',$data['item_id']);
                      $catee = $db->get_data_from_id('category',$item['category_id']);
                      ?>
                      <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $catee['category_name'] ?></td>
                        <td style="text-transform: capitalize;"><?= $item['item'] ?></td>
                        <td><?= $data['qty'] ?></td>
                        <td><?= rupiah($data['total']) ?></td>
                      </tr>
                      <?php } } 
                        $qty_tot = mysqli_query($db->connect, "SELECT sum(qty) FROM order_cart WHERE user_id='$user_iddd'")->fetch_assoc();
                        $tot_tot = mysqli_query($db->connect, "SELECT sum(total) FROM order_cart WHERE user_id='$user_iddd'")->fetch_assoc();
                      ?>
                      <tr style="font-weight: bolder;">
                        <td colspan="2">Total</td>
                        <td class="text-right" colspan="2"><?= $qty_tot['sum(qty)']; ?></td>
                        <td class="text-center"><?= rupiah($tot_tot['sum(total)']); ?></td>
                      </tr>
                      </table>
                    </div>
                    <div class="row my-4">
                      <div class="col-md-12 text-center">
                        <a href="./order2.php" class="btn btn-md btn-gradient-warning"><i class="mdi mdi-chevron-double-left"></i> BACK</a>
                      </div>
                    </div>
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