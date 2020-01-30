<?php 
  require '../config/Database.php';
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
                  <i class="mdi mdi-account"></i>
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
                    <h4 class="card-title">Items Data Table</h4>
                    </p>
                    <table class="table table-hover">
                      <thead class=" text-info">
                        <th style="width: 20px">No</th>
                        <th>Category</th>
                        <th>Item</th>
                        <th>Price</th>
                        <th>Status</th>
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
                        <td><?= ($data['status'])?"<p class='badge badge-gradient-success px-2'><i class='mdi mdi-check-circle'></i> active</p>":"<p class='badge badge-sm badge-gradient-danger px-2' style='border: 0px;box-shadow: none;'><i class='mdi mdi-close-circle'></i> not active</p>" ?></td>
                        <td>
                          <a href="../config/proccess.php?id=<?= $data['id']; ?>&action=item_delete" class="btn btn-xs btn-danger">Delete</a>
                          <a href="./item_edit.php?id=<?= $data['id'] ?>" class="btn btn-xs btn-warning">Edit</a>
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
   <?php include '../tmp/script2.php'; ?>
    <!-- End custom js for this page -->
  </body>
</html>