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
		public function user_data() 
		{
			$res = mysqli_query($this->connect, 'SELECT * FROM users');
			while ($row = mysqli_fetch_array($res)) {
				$data[] = $row;
			}
			return $data;
		}
		public function user_add($name, $age, $email, $password, $address)
		{
			mysqli_query($this->connect, "INSERT INTO users (name, age, email, password, address) VALUES ('$name', '$age','$email','$password','$address')");
		}
		public function user_delete($id)
		{
			mysqli_query($this->connect, "DELETE FROM users WHERE id='$id'");
		}
		public function category_data() 
		{
			$res = mysqli_query($this->connect, 'SELECT * FROM category');
			while ($row = mysqli_fetch_array($res)) {
				$data[] = $row;
			}
			return $data;
		}
		public function category_add($category_name)
		{
			mysqli_query($this->connect, "INSERT INTO category ( category_name ) VALUES ('$category_name') ");
		}
		public function category_delete($id)
		{
			mysqli_query($this->connect, "DELETE FROM category WHERE id='$id'");
		}
		public function item_data() 
		{
			$res = mysqli_query($this->connect, "SELECT * FROM item");
			while ($row = mysqli_fetch_array($res)) {
				$data[] = $row;
			}
			return $data;
		}
		public function get_category_name($id)
		{
			$res = mysqli_query($this->connect, "SELECT category_name FROM category WHERE id = '$id'");
			while ($row = mysqli_fetch_assoc($res)) {
				$data = $row['category_name'];
			}
			return $data;
			
		}
	}
 ?>