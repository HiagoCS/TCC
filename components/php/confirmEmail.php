<?php
	include('conn.php');
	$h = $_GET['h'];

	if (!empty($h)) {
		$query = 'UPDATE tb_user SET status = 1 WHERE MD5(id) = "'.$h.'"';
		if($GLOBALS['conn']->query($query)){
			//Adicione um retorno de sucesso + um redirecionamento de página, recomendo a tela de login;
			//header("Location: http://highlancer.tcc");
		}
		
	}
	else{
		//Adicione um retorno de falha da verificação
	}
?>