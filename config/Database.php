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

// Login
		public function login_proccess($name, $password)
		{
			$res = mysqli_query($this->connect, "SELECT * FROM users WHERE name='".$name."' AND password='".$password."'");			
			return $res->fetch_assoc();
		}

// For Public 
		public function data_show($table) 
		{
			$res = mysqli_query($this->connect, "SELECT * FROM ".$table);
			while ($row = mysqli_fetch_array($res)) {
				$data[] = $row;
			}
			if (empty($data)) {
				return "";
			} else  {
			return $data;
			}
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
		public function get_data_cart_from_id($table,$id,$item)
		{
			$query = mysqli_query($this->connect, "SELECT * FROM ".$table." WHERE user_id='$id' and item_id='$item'");
			return $query->fetch_assoc();
		}
		public function add_to_cart($user, $item, $qty, $tot)
		{
			mysqli_query($this->connect, "INSERT INTO order_cart ( user_id,	 item_id, qty, total ) VALUES ('$user','$item','$qty','$tot') ");
		}
		public function order_detail_from_cart_add($category_id, $item_id, $qty, $total, $user_id, $status)
		{
			mysqli_query($this->connect, "INSERT INTO order_detail (category_id, item_id, qty, total, user_id, status, code_trx) VALUES ('$category_id', '$item_id', '$qty', '$total', '$user_id', '$status', NULL)");
		}
		public function order_detail_from_cart_update($item_id, $qty, $total, $user_id, $status)
		{
			mysqli_query($this->connect, "UPDATE order_detail SET qty='$qty', total='$total' WHERE user_id='$user_id' AND item_id='$item_id' AND status='$status'");
		}
		public function update_item_cart($qty,$item, $id, $tot)
		{
			mysqli_query($this->connect, "UPDATE order_cart SET qty='$qty', total='$tot' WHERE user_id='$id' AND item_id='$item'");
		}
		public function update_item_qty($stock,$id)
		{
			mysqli_query($this->connect, "UPDATE item SET stock='$stock' WHERE id='$id'");
		}
		// public function counting($count, $table, $user_id)
		// {
		// 	mysqli_query($this->connect, "SELECT sum(".$count.") FROM ".$table." WHERE user_id='$user_id'")->fetch_assoc();
		// }

// Order2
		public function data_id_item($table) 
		{
			$res = mysqli_query($this->connect, "SELECT * FROM ".$table." WHERE stock > 0 AND status='1'");
			while ($row = mysqli_fetch_array($res)) {
				$data[] = $row;
			}
			return $data;
		}
		public function order_user_add($user, $qty, $total, $table, $date, $code)
		{
			mysqli_query($this->connect, "INSERT INTO order_user (user_id, table_id, qty, payment, datte, code_trx) VALUES ('$user', '$table', '$qty', '$total', '$date', '$code')");
		}
		public function order_detail_from_cart_update2($code, $user)
		{
			mysqli_query($this->connect, "UPDATE order_detail SET code_trx='$code', status=1 WHERE user_id='$user' and status=0");
		}
		public function order_cart_delete($id)
		{
			mysqli_query($this->connect, "DELETE FROM order_cart WHERE user_id='$id'");
		}
		public function data_order_detail_show($table, $id, $code_trx) 
		{
			$res = mysqli_query($this->connect, "SELECT * FROM ".$table." WHERE user_id ='$id' and code_trx='$code_trx'");
			while ($row = mysqli_fetch_array($res)) {
				$data[] = $row;
			}
			if (empty($data)) {
				return "";
			} else  {
			return $data;
			}
		}
		public function get_order_data_from_code($table,$id,$code)
		{
			$query = mysqli_query($this->connect, "SELECT * FROM ".$table." WHERE user_id='$id' and code_trx='$code'");
			return $query->fetch_assoc();
		}
		public function delete_order_detail_data($code)
		{
			mysqli_query($this->connect, "DELETE FROM order_detail WHERE code_trx='$code'");
		}
		public function data_itemss($cate) 
		{
			$res = mysqli_query($this->connect, "SELECT * FROM item WHERE category_id = '$cate'");
			while ($row = mysqli_fetch_array($res)) {
				$data[] = $row;
			}
			return $data;
		}

// Random Code
		public function code_trx($num)
		{
			$char 		= "1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
			$Random 	=	"";
			for ($i=0; $i < $num; $i++) { 
			 	$index 	=	rand(0, strlen($char) - 1); 
			 	$Random .= $char[$index]; 
			 } 
			 return $Random;
		}
	}	


 ?>