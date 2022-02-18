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

  	function Register($name, $email, $tel, $pass, $cep, $level){
  		//First this checks if a user of the same email already exists
  		$query = 'select email, status, password from tb_user where email = "'.$email.'"';
  		$result = $GLOBALS['conn']->query($query);
  		if(($result->num_rows) != 0){
  			//If this user exists, the function checks if he has verified his account
  			$row = mysqli_fetch_assoc($result);
			if($row['status'] == 1){
				//If he is verify, enter in Login function
				Login($row['email'], $row['password']);
			}
			else{
				//Here pass the emailVerification function, which creates an email message and sends it to the user.
				emailVerification($id, $email);
			}
  		}
  		else{
  			//Here is the register query and codifiyng the password and status value
  			$query = 'INSERT INTO tb_user VALUES(null, "'.$name.'", "'.$email.'", '.$tel.', "'.md5($pass).'", "'.md5(0).'", '.$cep.', null, '.$level.')';
			if($GLOBALS['conn']->query($query)){
				$id = $GLOBALS['conn']->insert_id;
				emailVerification($id, $email);
			}
			else{
				var_dump($GLOBALS['conn']->query($query));
			}
  		}
  			

  	}

  	function Login($email, $pass){
  		//First run a query that checks the email and password
		$query = 'SELECT id, username, status FROM tb_user WHERE email = "'.$email.'" AND password = "'.$pass.'"';
		$result  = $GLOBALS['conn']->query($query);
		if(($result->num_rows) == 1){
			//If register is successfully, hes verify the status
			$row = mysqli_fetch_assoc($result);
			if($row['status'] == 1){
				//Here is all done, now the user is landing to home page and save in session hes email
				session_start();
				$_SESSION['email'] = $email;
				//Here pass the home page
				//header("Location: http://highlancer.tcc/home.php");
				exit();
			}
			else{
				emailVerification($row['id'], $email);
			}
		}
		else{
			//Adicione um retorno caso retorne menos ou mais de uma coluna
		}
  	}





?>