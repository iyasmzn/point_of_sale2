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

// For Public 
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
		public function data_delete($table, $id)
		{
			mysqli_query($this->connect, "DELETE FROM ".$table." WHERE id='$id'");
		}

// User
		public function user_add($name, $gender, $age, $email, $password, $address)
		{
			mysqli_query($this->connect, "INSERT INTO users (name, gender, age, email, password, address) VALUES ('$name', '$gender', '$age','$email','$password','$address')");
		}
		public function user_edit($name, $gender, $age, $email, $password, $address, $id)
		{
			mysqli_query($this->connect, "UPDATE users SET name='$name', gender='$gender', age='$age', email='$email', password='$password', address='$address' WHERE id='$id'");
		}

// Category
		public function category_add($category_name)
		{
			mysqli_query($this->connect, "INSERT INTO category ( category_name ) VALUES ('$category_name') ");
		}
		public function category_edit($category_name,$id)
		{
			mysqli_query($this->connect, "UPDATE category SET category_name='$category_name' WHERE id='$id'");
		}

// Item
		public function item_add($category_id, $item, $price, $stock, $status)
		{
			mysqli_query($this->connect, "INSERT INTO item ( category_id, item, price, stock, status ) VALUES ('$category_id', '$item', '$price', '$stock', '$status') ");
		}
		public function item_edit($category_id, $item, $price, $stock, $status, $id)
		{
			mysqli_query($this->connect, "UPDATE item SET category_id='$category_id', item='$item', price='$price', stock='$stock', status='$status' WHERE id='$id'");
		}

// Table
		public function table_add($table)
		{
			mysqli_query($this->connect, "INSERT INTO tables ( tables ) VALUES ('$table') ");
		}
		public function table_edit($table,$id)
		{
			mysqli_query($this->connect, "UPDATE tables SET tables='$table' WHERE id='$id'");
		}

// Cart
		public function data_cart_show($table, $id) 
		{
			$res = mysqli_query($this->connect, "SELECT * FROM ".$table." WHERE user_id ='$id'");
			while ($row = mysqli_fetch_array($res)) {
				$data[] = $row;
			}
			if (empty($data)) {
				return "";
			} else  {
			return $data;
			}
		}
		public function add_to_cart($user, $item, $qty, $tot)
		{
			mysqli_query($this->connect, "INSERT INTO order_cart ( user_id,	 item_id, qty, total ) VALUES ('$user','$item','$qty','$tot') ");
		}
		public function update_item_cart($qty,$item, $id, $tot)
		{
			mysqli_query($this->connect, "UPDATE order_cart SET qty='$qty', total='$tot' WHERE user_id='$id' AND item_id='$item'");
		}
		public function update_item_qty($stock,$id)
		{
			mysqli_query($this->connect, "UPDATE item SET stock='$stock' WHERE id='$id'");
		}
		public function counting($count, $table,$user_id)
		{
			mysqli_query($this->connect, "SELECT COUNT('$count') FROM '$table' WHERE user_id = '$user_id'");
		}

// Order
		public function order_add($table, $item, $qty, $tot)
		{
			mysqli_query($this->connect, "INSERT INTO orders (item_id, qty, table_place, total) VALUES ('$item', '$qty', '$table', '$tot')");
		}
		public function data_id_item($table) 
		{
			$res = mysqli_query($this->connect, "SELECT * FROM ".$table." WHERE stock > 0 AND status='1'");
			while ($row = mysqli_fetch_array($res)) {
				$data[] = $row;
			}
			return $data;
		}

// Login
		public function login_proccess($name, $password)
		{
			$res = mysqli_query($this->connect, "SELECT * FROM users WHERE name='".$name."' AND password='".$password."'");			
			return $res->fetch_assoc();
		}
	}	
 ?>