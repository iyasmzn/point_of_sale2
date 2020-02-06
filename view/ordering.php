<?php 
  session_start();
	require '/var/www/html/project/PointOfSale2/config/Database.php';
	use PointOfSale2\Database;
  if (isset($_SESSION['name'])) {
	$db = new Database();
	$data_items = $db->data_id_item('item');
  $tables = $db->data_show('tables');
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
		<style type="text/css">
			.item-card {
				transition: all 0.3s;
			}
			.item-card:hover {
				box-shadow: 0px 2px 4px gray;
			}
		</style>
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
                        <h4 class="card-title" data-aos="fade-up" data-aos-delay="400">Items</h4>                    
                      </div>
                      <div class="col-md-4 text-right">
                      </div>
                    </div>
										<div class="row" style="height: 35vw;overflow: scroll;">
                    <?php 
                    $delay = 500;
                    function rupiah($rp) {
											$res_rp = "Rp ".number_format($rp,2,',','.');
											return $res_rp;
										}
                    foreach ($data_items as $item) { 
											$cate = $db->get_data_from_id('category',$item['category_id']);
                    	?>
                    	<div class="col-sm-4 my-2" data-aos="zoom-in" data-aos-offset="0" data-aos-delay="<?= $delay+=200 ?>">
	                    	<div class="item-card bg-light mx-2 p-2 text-dark text-center" style="border-radius: 20px;text-transform: capitalize;">
	                    		<form method="post" action="../config/proccess.php?action=add_to_cart" style="border: 1px solid white;border-radius: 15px;">
	                    			<input type="hidden" name="user_id" value="<?= $_SESSION['id'] ?>">
		                    		<p class="text-muted"><?= $cate['category_name'] ?></p>
		                    		<!-- <h3 name="item_id"></h3> -->
		                    		<select class="custom-select" style="border: none;background: none;color: black;text-align: center;text-transform: capitalize;" name="item_id"><option value="<?= $item['id'] ?>"><?= $item['item'] ?></option></select>
		                    		<p class="price"><?= rupiah($item['price']) ?>/pcs</p>
		                    		<p>Stock = <?= $item['stock'] ?> pcs</p>
		                    		<input type="number" name="qty" class="<?= $item['item'] ?> qty_item qty p-2" min="0" max="<?= $item['stock'] ?>" oninput="check(<?= $item['price'] ?>)">
		                    		<!-- <p class="pt-3">Total IDR.<span style="" type="text" name="total_price" readonly class="total_price"></span></p> -->
		                    		<br><button class="my-3 btn btn-sm btn-outline-google" type="submit"><i class="mdi mdi-cart-plus"></i></button>
	                    		</form>
	                    	</div>
	                    </div>
                   <?php } ?>
										</div>
									</div>
								</div>
							</div>
							<div id="cart" data-aos="zoom-in" data-aos-offset="400" class="col-lg-12 grid-margin stretch-card">
								<div class="card">
									<div class="card-body">
                    <div class="row mb-3">
                      <div class="col-md-8">
                        <h4 class="card-title">Order</h4>                    
                      </div>
                      <div class="col-md-4 text-right">
                        <h4 class="card-title"><?= $_SESSION['name'] ?><br><span class="text-muted" style="font-size: 0.7em"><i>User</i></span></h4>                    
                      </div>
                    </div>
                    <div class="row">
				          <h6 class="p-3 mb-0"><i class="mdi mdi-cart"></i> Cart</h6>
				          <table class="table table-bordered table-hover">
				            <tr class="bg-light">
				              <th style="width: 50px;">No</th>
				              <th>Item</th>
				              <th>Qty</th>
				              <th>Total</th>
				              <th width="100px" class="text-center">Action</th>
				            </tr>
				          <?php 
				            $cart_data = $db->data_cart_show('order_cart', $_SESSION['id']);
				            $no = 1;
				            if (empty($cart_data)) {
				              echo "Nothing item";
				            } else {
				            foreach ($cart_data as $data) { 
				              $item = $db->get_data_from_id('item',$data['item_id']);
				              ?>
				              <tr>
				                <td><?= $no++ ?></td>
				                <td style="text-transform: capitalize;"><?= $item['item'] ?></td>
				                <td><?= $data['qty'] ?></td>
				                <td><?= rupiah($data['total']) ?></td>
				                <td class="text-center">
				                  <a href="" class="text-warning"><i class="mdi mdi-minus-circle"></i></a>
				                  <a href="" class="text-info"><i class="mdi mdi-plus-circle"></i></a>
				                  <a href="" class="text-danger"><i class="mdi mdi-close-circle"></i></a>
				                </td>
				              </tr>
				              <?php } } 
				              	$user_id = $_SESSION['id'];
												$qty_tot = mysqli_query($db->connect, "SELECT sum(qty) FROM order_cart WHERE user_id='$user_id'")->fetch_assoc();
												$tot_tot = mysqli_query($db->connect, "SELECT sum(total) FROM order_cart WHERE user_id='$user_id'")->fetch_assoc();
											?>
				              <tr style="font-weight: bolder;">
				              	<td colspan="2">Total</td>
				              	<td class="text-right"><?= $qty_tot['sum(qty)']; ?></td>
				              	<td class="text-center" colspan="2"><?= rupiah($tot_tot['sum(total)']); ?></td>
				              </tr>
				              </table>
				              <div class="col-md-12">
				              	<form class="mt-3" method="post" action="../config/proccess.php?action=order_user_add">
				              		<input type="hidden" name="user_id" value="<?= $_SESSION['id'] ?>">
				              		<input type="hidden" name="qty" value="<?= $qty_tot['sum(qty)']; ?>">
				              		<input type="hidden" name="total" value="<?= $tot_tot['sum(total)']; ?>">
													<div class="form-group">
													  <label for="table">Table Place</label>
		 											  <select class="form-control" id="table" name="table">
		 											  	<?php foreach ($tables as $table) { ?>
		 											    <option value="<?= $table['id'] ?>"><?= $table['tables'] ?></option>
		 											  	<?php } ?>
		 											  </select>
													</div>
													<div class="text-right w-100">													
							              <button class="btn btn-lg btn-primary mb-2 text-center mt-3"><i class="mdi mdi-cart"></i> Buy Now!</button>
													</div>			              	
					              </form>	
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