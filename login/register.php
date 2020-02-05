<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Purple Admin</title>
    <!-- plugins:css -->
    <?php include '/var/www/html/project/PointOfSale2/tmp/link.php'; ?>
  </head>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth">
          <div class="row flex-grow">
            <div class="col-lg-6 mx-auto">
              <div class="auth-form-light text-left p-5">
                <div class="brand-logo">
                  <a class="brand-logo text-success" href="/project/PointOfSale2/view/index.php" style="font-size: 2em;"><i class="mdi mdi-basket"></i> <b>Point of Sale</b> 2</a>
                </div>
                <h4>New here?</h4>
                <h6 class="font-weight-light">Signing up is easy. It only takes a few steps</h6>
                    <form class="form-sample" method="POST" action="../config/proccess.php?action=register">
                      <p class="card-description"> Complete this Form </p>
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Name</label>
                            <div class="col-sm-12">
                              <div class="input-group">
                                <div class="input-group-prepend">
                                  <span class="input-group-text">@</span>
                                </div>
                                <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" name="name">
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <div class="col-sm-12">
                            <label class="col-sm-12 col-form-label">Gender</label>
                              <div class="form-check form-check-danger">
                                <label class="form-check-label">
                                  <input type="radio" class="form-check-input" name="gender" id="gender" value="1"> MAN 
                                </label>
                              </div>
                              <div class="form-check form-check-warning">
                                <label class="form-check-label">
                                  <input type="radio" class="form-check-input" name="gender" id="gender" value="0"> WOMAN 
                                </label>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Age</label>
                            <div class="col-sm-12">
                              <input type="number" min="0" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" name="age">
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Email</label>
                            <div class="col-sm-12">
                              <div class="input-group">
                                <div class="input-group-prepend">
                                  <span class="input-group-text"><i class="mdi mdi-email"></i></span>
                                </div>
                                <input type="email" class="form-control" placeholder="Email address" aria-label="Email" aria-describedby="basic-addon1" name="email">
                              </div>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Password</label>
                            <div class="col-sm-12">
                              <div class="input-group">
                                <div class="input-group-prepend">
                                  <span class="input-group-text"><i class="mdi mdi-key"></i></span>
                                </div>
                                <input type="password" class="form-control" placeholder="Type your password" aria-label="Password" aria-describedby="basic-addon1" name="password">
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Address</label>
                            <div class="col-sm-12">
                              <textarea class="form-control" rows="4" name="address"></textarea>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12 text-center">
                          <button type="submit" class="btn btn-md btn-gradient-success">Submit <i class="mdi mdi-chevron-right"></i></button>
                        </div>
                      </div>
                    </form>
                  <div class="text-center mt-4 font-weight-light"> Already have an account? <a href="../" class="text-primary">Login</a>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <?php include '/var/www/html/project/PointOfSale2/tmp/script.php'; ?>
    <!-- endinject -->
  </body>
</html>