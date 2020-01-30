<?php 
require './Database.php';
use PointOfSale2\Database;

$db = new Database();
$action = $_GET['action'];

if ($action == "user_add") {
	$db->user_add($_POST['name'], $_POST['gender'], $_POST['age'], $_POST['email'], $_POST['password'], $_POST['address']);
	header('location:../user/user2.php');
}
elseif ($action == "user_edit") {
	$db->user_edit($_POST['name'], $_POST['gender'], $_POST['age'], $_POST['email'], $_POST['password'], $_POST['address'], $_POST['id']);
	header('location:../user/user2.php');
}
elseif ($action == "user_delete") {
	$db->user_delete($_GET['id']);
	header('location:../user/user2.php');
}
elseif ($action == "category_add") {
	$db->category_add($_POST['category']);
	header('location:../category.php');
}
elseif ($action == "category_edit") {
	$db->category_edit($_POST['category']);
	header('location:../category.php');
}
elseif ($action == "category_delete") {
	$db->category_delete($_GET['id']);
	header('location:../category.php');
}

 ?>