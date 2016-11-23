<?php
class connection {
	
	//connection username
	private $kon1 = "root";
	//connection password
	private $kon2 = "";
	//connection database
	private $kon3 = "diwanee";
	//connection host
	private $kon4 = "localhost";
		
	/*method of connection
	return connection or display an error message
	*/	
	public function connection(){
					
		$con=mysqli_connect($this->kon4, $this->kon1, $this->kon2, $this->kon3);
		
		mysqli_set_charset($con,"utf8");
		
		if (mysqli_connect_errno($con))	{
			
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}
		else { 
			
			return($con);
		}
	}
	
}

?>