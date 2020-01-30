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
			return $query->fetch_array();
		}
		public function user_add($name, $gender, $age, $email, $password, $address)
		{
			mysqli_query($this->connect, "INSERT INTO users (name, gender, age, email, password, address) VALUES ('$name', '$gender', '$age','$email','$password','$address')");
		}
		public function user_edit($name, $gender, $age, $email, $password, $address, $id)
		{
			mysqli_query($this->connect, "UPDATE users SET name='$name', gender='$gender', age='$age', email='$email', password='$password', address='$address' WHERE id='$id'");
		}
		public function user_delete($id)
		{
			mysqli_query($this->connect, "DELETE FROM users WHERE id='$id'");
		}
		public function category_add($category_name)
		{
			mysqli_query($this->connect, "INSERT INTO category ( category_name ) VALUES ('$category_name') ");
		}
		public function get_category_id($id_category)
		{
			$category_query = mysqli_query($this->connect, "SELECT * FROM category WHERE id='$id_category'");
			return $category_query->fetch_array();
		}
		public function category_edit($id)
		{
			mysqli_query($this->connect, "UPDATE category SET category_name='$category_name'");
		}
		public function category_delete($id)
		{
			mysqli_query($this->connect, "DELETE FROM category WHERE id='$id'");
		}
		public function get_category_name($id)
		{
			$res = mysqli_query($this->connect, "SELECT * FROM category WHERE id = '$id'");
			$row = mysqli_fetch_assoc($res);
			$data = $row['category_name'];
			return $data;
			
		}
	}
 ?>