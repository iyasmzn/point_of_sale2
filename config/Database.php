<?php 
	namespace PointOfSale2;

	/**
	 * 
	 */
	class Database 
	{
		public $connect;
		function __construct()
		{
			$this->connect = mysqli_connect('localhost', 'root', 'iyasmzn7', 'tugas_PointOfSale2');
		}
		public function data_show($table) 
		{
			$res = mysqli_query($this->connect, "SELECT * FROM ".$table);
			while ($row = mysqli_fetch_array($res)) {
				$data[] = $row;
			}
			return $data;
		}
		public function get_data_from_id($table,$id)
		{
			$query = mysqli_query($this->connect, "SELECT * FROM ".$table." WHERE id='$id'");
			return $query->fetch_assoc();
		}
		public function user_add($name, $gender, $age, $email, $password, $address)
		{
			mysqli_query($this->connect, "INSERT INTO users (name, gender, age, email, password, address) VALUES ('$name', '$gender', '$age','$email','$password','$address')");
		}
		public function user_edit($name, $gender, $age, $email, $password, $address, $id)
		{
			mysqli_query($this->connect, "UPDATE users SET name='$name', gender='$gender', age='$age', email='$email', password='$password', address='$address' WHERE id='$id'");
		}
		public function category_add($category_name)
		{
			mysqli_query($this->connect, "INSERT INTO category ( category_name ) VALUES ('$category_name') ");
		}
		public function category_edit($category_name,$id)
		{
			mysqli_query($this->connect, "UPDATE category SET category_name='$category_name' WHERE id='$id'");
		}
		public function item_add($category_id, $item, $price, $stock, $status)
		{
			mysqli_query($this->connect, "INSERT INTO item ( category_id, item, price, stock, status ) VALUES ('$category_id', '$item', '$price', '$stock', '$status') ");
		}
		public function item_edit($category_id, $item, $price, $stock, $status, $id)
		{
			mysqli_query($this->connect, "UPDATE item SET category_id='$category_id', item='$item', price='$price', stock='$stock', status='$status' WHERE id='$id'");
		}
		public function data_delete($table, $id)
		{
			mysqli_query($this->connect, "DELETE FROM ".$table." WHERE id='$id'");
		}
	}
 ?>