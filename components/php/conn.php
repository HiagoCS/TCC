<?php
	//Variables to connect into database
	$server = "localhost";
	$username = "root";
	$pass = "hiago@1504";
	$db = "tcc";

	//If connection failed returns error, else returns nothing
	$conn = new mysqli($server, $username, $pass, $db);
	if ($conn->connect_error) {
 	 die("Connection failed: " . $conn->connect_error);
	}

	//Function to list items for insert into tb_user->level
	function listLevels(){
		$query = 'SELECT * FROM tb_levels WHERE id != 1';
		$result = $GLOBALS['conn']->query($query);
		if(($result->num_rows) > 0){
			while ($row = mysqli_fetch_assoc($result)) {
				echo $row['name'].' ';
			}
		}
		else{
			//Adicione um retorno caso não encontre Niveis
		}
  	}
?>