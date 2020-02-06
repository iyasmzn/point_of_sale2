<?php 
  session_start();
	require '/var/www/html/project/PointOfSale2/config/Database.php';
	use PointOfSale2\Database;
  if (isset($_SESSION['name'])) {
	$db = new Database();
	$data_items = $db->data_id_item('item');
 ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>Add to Cart | Point Os Sale</title>
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
							<h3 class="page-title" data-aos="fade-down">
								<span class="page-title-icon bg-gradient-success text-white mr-2">
									<i class="mdi mdi-cart"></i>
								</span> Cart </h3>
							<nav aria-label="breadcrumb">
								<ul class="breadcrumb">
									<li class="breadcrumb-item active" aria-current="page">
										<span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
									</li>
								</ul>
							</nav>
						</div>
						<!-- CONTENT -->
							<div class="col-lg-12 grid-margin stretch-card" data-aos="zoom-in" data-aos-delay="100">
								<div class="card">
									<div class="card-body">
                    <div class="row mb-3">
                      <div class="col-md-8">
                        <h4 class="card-title" data-aos="fade-down" data-aos-delay="400">Items</h4>                    
                      </div>
                      <div class="col-md-4 text-right">
                      </div>
                    </div>
										<div class="row">
                    <?php 
                    $delay = 500;
                    function rupiah($rp) {
											$res_rp = "Rp ".number_format($rp,2,',','.');
											return $res_rp;
										}
                    foreach ($data_items as $item) { 
											$cate = $db->get_data_from_id('category',$item['category_id']);
                    	?>
                    	<div class="col-sm-4 my-2" data-aos="zoom-in" data-aos-delay="<?= $delay+=200 ?>">
	                    	<div class="bg-light mx-2 p-2 text-dark text-center">
	                    		<form method="post" action="../config/proccess.php?action=add_to_cart">
	                    			<input type="hidden" name="user_id" value="<?= $_SESSION['id'] ?>">
		                    		<p class="text-muted"><?= $cate['category_name'] ?></p>
		                    		<!-- <h3 name="item_id"></h3> -->
		                    		<select class="custom-select" style="border: none;background: none;color: black;text-align: center;" name="item_id"><option value="<?= $item['id'] ?>"><?= $item['item'] ?></option></select>
		                    		<p class="price"><?= rupiah($item['price']) ?>/pcs</p>
		                    		<p>Stock = <?= $item['stock'] ?> pcs</p>
		                    		<input type="number" name="qty" class="<?= $item['item'] ?> qty_item qty p-2" min="0" max="<?= $item['stock'] ?>" oninput="check(<?= $item['price'] ?>)">
		                    		<!-- <p class="pt-3">Total IDR.<span style="" type="text" name="total_price" readonly class="total_price"></span></p> -->
		                    		<br><button class="mt-3 btn btn-sm btn-outline-google" type="submit"><i class="mdi mdi-cart-plus"></i></button>
	                    		</form>
	                    	</div>
	                    </div>
                   <?php } ?>
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-12 grid-margin stretch-card">
								<div class="card">
									<div class="card-body">
                    <div class="row mb-3">
                      <div class="col-md-8">
                        <h4 class="card-title">Order</h4>                    
                      </div>
                      <div class="col-md-4 text-right">
                      </div>
                    </div>
                    <div class="row">
				          <h6 class="p-3 mb-0"><i class="mdi mdi-cart"></i> Cart</h6>
				          <table class="table table-striped">
				            <tr>
				              <th>No</th>
				              <th>Item</th>
				              <th>Qty</th>
				              <th>Total</th>
				              <th>Action</th>
				            </tr>
				          <?php 
				            $cart_data = $db->data_cart_show('order_cart', $_SESSION['id']);
				            $no = 1;
				            if (empty($cart_data)) {
				              echo "nothing items";
				            } else {
				            foreach ($cart_data as $data) { 
				              $item = $db->get_data_from_id('item',$data['item_id']);
				              ?>
				              <tr>
				                <td><?= $no++ ?></td>
				                <td><?= $item['item'] ?></td>
				                <td><?= $data['qty'] ?></td>
				                <td><?= $data['total'] ?></td>
				                <td>
				                  <a href="" class="text-warning"><i class="mdi mdi-minus-circle"></i></a>
				                  <a href="" class="text-info"><i class="mdi mdi-plus-circle"></i></a>
				                  <a href="" class="text-danger"><i class="mdi mdi-close-circle"></i></a>
				                </td>
				              </tr>
				              <?php } } ?>
				              </table>
				              <button class="btn btn-sm btn-primary mb-2 text-center">Buy Now</button>
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
		<!-- MyScript -->
		<script type="text/javascript">
			// function total() {
			// 	// body...
			// }
			function check(x) {
			$(document).ready(function() {
				$('.qty_item').change(function() {
					var qty = $('."<?=$item['item']?>"').val();
					var prc = $('.price').val();
					var total = qty*x ;
					$('.total_price').html(total);
				});
			});
			}
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