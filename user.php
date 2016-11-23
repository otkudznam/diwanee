<?php

	require_once('connection.php');

/*
class user
*/

class user {
	
	/*
	method for login user
	parametars $username username
	parametars $password password
	*/
	public function	userLogin($data) {
		
		$userCounter = 0;

		$username=$data['username'];
		/*not supported by my xampp (PHP version 5.4...)*/
		//$password=password_hash($data['password'], PASSWORD_DEFAULT);
		$password=md5($data['password']);

		$conn=$this->makeConnection();
		
		$stmt = $conn->prepare('SELECT ID, USERNAME, PASSWORD FROM USERS WHERE USERNAME=? AND PASSWORD=?');
		$stmt->bind_param("ss", $username, $password);
		$stmt->execute();

		$result=$stmt->get_result();
		
		$result=$result->fetch_all(MYSQLI_ASSOC);

		foreach ($result as $key => $value) {
			
			$userCounter++;
		}

		if($userCounter==1) {

			$_SESSION['user']=$result[0]['ID'];
		}

		return $result;
	}
	
	/*
	method for register user
	parametars $username username
	*/
	public function	userRegister($data) {

		$username=$data['username'];
		/*not supported by my xampp (PHP version 5.4...)*/
		//$password=password_hash($data['password'], PASSWORD_DEFAULT);
		$password=md5($data['password']);
		$mail=$data['mail'];
		$name=$data['name'];
		$lastname=$data['lastname'];
		
		if($username!="" && $password!="" && $mail!="" && $name!="" && $lastname!="") {

			$userCounter = 0;

			$conn=$this->makeConnection();
			
			$stmt = $conn->prepare('INSERT INTO users (username, password, name, lastname, mail) VALUES (?, ?, ?, ?, ?)');
			$stmt->bind_param("sssss", $username, $password, $name, $lastname, $mail);
			
			if($stmt->execute()) {

				$stmt = $conn->prepare('SELECT ID, USERNAME, PASSWORD FROM USERS WHERE USERNAME=? AND PASSWORD=?');
				$stmt->bind_param("ss", $username, $password);
				$stmt->execute();

				$result=$stmt->get_result();
				
				$result=$result->fetch_all(MYSQLI_ASSOC);

				foreach ($result as $key => $value) {
					
					$userCounter++;
				}

				if($userCounter==1) {

					$_SESSION['user']=$result[0]['ID'];
				}

			}
			else {

				$result= array();
			}
		}
		else {

			$result= array();
		}
				
		return $result;
	}

	/*
	method for listing users
	*/
	public function	userList($id="") {
		
		$userCounter = 0;

		$conn=$this->makeConnection();

		if($id!=""){
			
			$stmt = $conn->prepare('SELECT NAME, LASTNAME, TIMESTAMP FROM USERS WHERE ID=? ORDER BY TIMESTAMP DESC');
			$stmt->bind_param("i", $id);	
		}
		else{

			$stmt = $conn->prepare('SELECT NAME, LASTNAME, TIMESTAMP FROM USERS WHERE 1=1 ORDER BY TIMESTAMP DESC');
		}
		
		$stmt->execute();

		$result=$stmt->get_result();
		
		$result=$result->fetch_all(MYSQLI_ASSOC);

		return $result;

	}

	/*
	HELP FUNCTIONS
	*/

	/*
	make connection
	return connection object
	*/
	private function makeConnection(){

		$conn = new connection;
		
		return $conn->connection();
		
	}

	/*
	works for prepare statements PHP version below 5
	$reult parametar object of prepared statement
	result $array associative array
	*/
	private function aray($result) {    
	    
	    $array = array();
	    
	    $result->store_result();
	        
	    $variables = array();
	    $data = array();
	    $meta = $result->result_metadata();
	        
	    while($field = $meta->fetch_field())
	        $variables[] = &$data[$field->name]; // pass by reference
	        
	    call_user_func_array(array($result, 'bind_result'), $variables);
	        
	    $i=0;
	    while($result->fetch())
	        {
	            $array[$i] = array();
	            foreach($data as $k=>$v)
	                $array[$i][$k] = $v;
	            $i++;
	        }
	    
	    return $array;
	}
												
}
?>