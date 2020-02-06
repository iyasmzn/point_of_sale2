<?php 
require './Database.php';
use PointOfSale2\Database;

$db = new Database();
$action = $_GET['action'];

// LOGIN
if ($action == 'login_proccess') {
	session_start();
	$name = $_POST['name'];
	$password = $_POST['password'];
	$login = $db->login_proccess($name, $password);
	if (!empty($name && $password)) {
		if (!empty($login)) {
			$_SESSION['name'] = $login['name'];
			$_SESSION['email'] = $login['email'];
			$_SESSION['password'] = $login['password'];
			$_SESSION['age'] = $login['age'];
			$_SESSION['address'] = $login['address'];
			$_SESSION['id'] = $login['id'];
			header('location:../view/index.php');
		}
		else {
				header('location:/project/PointOfSale2/view/login_alert_view.php?action=wrong_password');
		}
	}
	else {
				header('location:/project/PointOfSale2/view/login_alert_view.php?action=empty');
	}
}
elseif ($action == 'signout') {
	session_start();
	session_destroy();

	header('location:/project/PointOfSale2/view/signout_view.php');
}
elseif ($action == "register") {
	$db->user_add($_POST['name'], $_POST['gender'], $_POST['age'], $_POST['email'], $_POST['password'], $_POST['address']);
	session_start();
	$name = $_POST['name'];
	$password = $_POST['password'];
	$login = $db->login_proccess($name, $password);
	$_SESSION['name'] = $login['name'];
	$_SESSION['email'] = $login['email'];
	$_SESSION['password'] = $login['password'];
	$_SESSION['age'] = $login['age'];
	$_SESSION['address'] = $login['address'];
	$_SESSION['id'] = $login['id'];

	header('location:../view/index.php');
}

// USER
elseif ($action == "user_add") {
	$db->user_add($_POST['name'], $_POST['gender'], $_POST['age'], $_POST['email'], $_POST['password'], $_POST['address']);
	header('location:../user/user.php');
}
elseif ($action == "user_edit") {
	$db->user_edit($_POST['name'], $_POST['gender'], $_POST['age'], $_POST['email'], $_POST['password'], $_POST['address'], $_POST['id']);
	header('location:../user/user.php');
}
elseif ($action == "user_delete") {
	$db->data_delete('users',$_GET['id']);
	header('location:../user/user.php');
}

// CATEGORY
elseif ($action == "category_add") {
	$db->category_add($_POST['category']);
	header('location:../category/category.php');
}
elseif ($action == "category_edit") {
	$db->category_edit($_POST['category'], $_POST['id']);
	header('location:../category/category.php');
}
elseif ($action == "category_delete") {
	$db->data_delete('category',$_GET['id']);
	header('location:../category/category.php');
}

// ITEM
elseif ($action == "item_add") {
	$db->item_add($_POST['category'], $_POST['item'], $_POST['price'], $_POST['stock'], $_POST['status']);
	header('location:../item/item.php');
}
elseif ($action == "item_edit") {
	$db->item_edit($_POST['category'], $_POST['item'], $_POST['price'], $_POST['stock'], $_POST['status'], $_POST['id']);
	header('location:../item/item.php');
}
elseif ($action == 'item_delete') {
	$db->data_delete('item', $_GET['id']);
	header('location:../item/item.php');
}

// TABLE
elseif ($action == "table_add") {
	$db->table_add($_POST['table']);
	header('location:../table/table.php');
}
elseif ($action == "table_edit") {
	$db->table_edit($_POST['table'], $_POST['id']);
	header('location:../table/table.php');
}
elseif ($action == "table_delete") {
	$db->data_delete('tables',$_GET['id']);
	header('location:../table/table.php');
}

// Cart
elseif ($action == "add_to_cart") {
	$data = $db->data_cart_show('order_cart',$_POST['user_id']);
	$data_item = $db->get_data_from_id('item',$_POST['item_id']);
	$stock_new = $data_item['stock'] - $_POST['qty'];
	foreach ($data as $daa) {	
		var_dump($daa['qty']."<br>");
			$qtyy = $daa['qty'] + $_POST['qty'];
			$total1 = $data_item['price']*$qtyy;
	}
		if ($_POST['item_id'] == $daa['item_id']) {
			$db->update_item_cart($qtyy, $_POST['item_id'],$_POST['user_id'], $total1);
			$db->update_item_qty($stock_new, $_POST['item_id']);
			header('location:../view/ordering.php');	
		}
		else {
			$total2 = $data_item['price']*$_POST['qty'];
			$db->add_to_cart($_POST['user_id'], $_POST['item_id'], $_POST['qty'], $total2);
			$db->update_item_qty($stock_new, $_POST['item_id']);
			header('location:../view/ordering.php');	
		}
	echo "qty++ = ".$qtyy;
	echo "<br>";
	echo "item = ".$data_item['item'];
	echo "<br>";
	echo "stock item = ".$data_item['stock'];
	echo "<br>";
	echo "stock item update = ".$stock_new;
}

// ORDER
elseif ($action == "order_add") {
	$data_item = $db->get_data_from_id('item',$_POST['item']);
	$price = $data_item['price'];
	$total = $_POST['qty'] * $price;
	$db->order_add($_POST['table'], $_POST['item'], $_POST['qty'], $total);
	header('location:../order/order.php');
	// var_dump($total);
	// var_dump($_POST['table']);
	// var_dump($_POST['item']);
	// var_dump($_POST['qty']);
}
elseif ($action == 'order_delete') {
	$db->data_delete('orders', $_GET['id']);
	header('location:../order/order.php');
}

// ORDER2
elseif ($action == "order_user_add") {
	$db->order_user_add($_POST['user_id'], $_POST['qty'], $_POST['total'], $_POST['table']);
	header('location:../order/order2.php');
}

 ?>