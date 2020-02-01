<?php 
require './Database.php';
use PointOfSale2\Database;

$db = new Database();
$action = $_GET['action'];

if ($action == "user_add") {
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

 ?>