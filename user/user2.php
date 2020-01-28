<?php 
  require '../config/Database.php';
  use PointOfSale2\Database;

  $db = new Database();
  $data_users = $db->user_data();
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>User | Point Os Sale</title>
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
                    <h4 class="card-title">Users Data Table</h4>
                    </p>
                    <table class="table table-hover">
                      <thead class=" text-info">
                        <th style="width: 20px">No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Age</th>
                        <th>Address</th>
                        <th><span class="pull-right">Action</span></th>
                      </thead>
                        <?php 
                          $no = 1;
                          foreach ($data_users as $data) {
                        ?>
                      <tbody>
                        <td><?= $no++ ?></td>
                        <td><?= $data['name'] ?></td>
                        <td><?= $data['email'] ?></td>
                        <td><?= $data['age'] ?></td>
                        <td><?= $data['address'] ?></td>
                        <td>
                          <a href="../config/proccess.php?id=<?= $data['id']; ?>&action=user_delete" class="btn btn-xs btn-danger">Delete</a>
                          <a href="./user_edit.php?id=<?= $data['id'] ?>" class="btn btn-xs btn-warning">Edit</a>
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