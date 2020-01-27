<?php 
require './Database.php';
use PointOfSale2\Database;

$db = new Database();
$action = $_GET['action'];
if ($action == "user_add") {
	$db->user_add($_POST['name'], $_POST['age'], $_POST['email'], $_POST['password'], $_POST['address']);
	header('location:../user.php');
}
elseif ($action == "user_delete") {
	$db->user_delete($_GET['id']);
	header('location:../user.php');
}

 ?>