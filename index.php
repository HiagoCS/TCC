<?php
	session_start();
	if(!empty($_GET['h'])){
		$h = $_GET['h'];

		if (!empty($h)) {
			$query = 'UPDATE tb_user SET status = 1 WHERE MD5(id) = "'.$h.'"';
			if($GLOBALS['conn']->query($query)){
				header("Location: http://localhost/tcc_project");
			}		
		}
		else{
			echo "<script>$('form').html('<h4>Falha no cadastro!!!</h4>')</script>";
		}
	}
	
	//Here this php check the email session
	if(!empty($_SESSION['email'])){
		//If has a email saved, his ask the credentials, this script can be changed to best visual.
		echo '<script>
		verifSession();
		function verifSession(){
			$("form").html("<form></form>");
			$("form").append("<h4>Você é o '.$_SESSION['username'].'?</h4>");
			$("form").append("'."<button type='button' class='btn btn-success' id='yes'>Sim</button>".'");
			$("form").append("'."<button type='button' class='btn btn-danger' id='no'>Não</button>".'");
		}
		$("#yes").click(function(){
			verifSession();
			//Attention!! Change this line "$("form").attr" to archive how call the login function
			$("form").attr("action", "components/php/login.php");
			$("form").append("<input type='."'email'".' class='."'form-control'".' name='."'email'".' id='."'email'".' value='."'".$_SESSION['email']."'".'>");
			$("form").append("<br>");
			$("form").append("<input type='."'password'".' class='."'form-control'".' name='."'password'".' id='."'password'".' placeholder='."'Senha'".' required>");
			$("form").append("<button class='."'btn btn-success'".' id='."'logar'".'>Entrar</button>");
		});
		$("#no").click(function(){
			$("form").html("<form></form>");
		});
	</script>';
	}
?>