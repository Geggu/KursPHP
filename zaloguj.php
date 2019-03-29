<?php

	session_start();
	
	if ((!isset($_POST['login'])) || (!isset($_POST['haslo']))){
		header('Location: logowanie.php');
		exit();
	}else{
		@require_once("database.php");
		$DB = new DB();
		$database = $DB->start();
	
		$login = $_POST['login'];
		$haslo = $_POST['haslo'];
		
		$login = htmlentities($login, ENT_QUOTES, "UTF-8");
		$haslo = htmlentities($haslo, ENT_QUOTES, "UTF-8");
	
		if ($result = @$database->query(
		sprintf("SELECT * FROM users WHERE name='%s' AND password='%s'",
		mysqli_real_escape_string($database,$login),
		mysqli_real_escape_string($database,$haslo)))){
			$ilu_userow = $result->num_rows;
			if($ilu_userow>0){
				$_SESSION['zalogowany'] = true;
				
				$wiersz = $result->fetch_assoc();
				$_SESSION['id'] = $wiersz['id_user'];
				$_SESSION['name'] = $wiersz['name'];
				$_SESSION['email'] = $wiersz['email'];
				$_SESSION['group'] = $wiersz['user_group'];
				
				
				unset($_SESSION['error']);
				$result->free_result();
				header('Location: panel.php');
				
			}else{
				
				$_SESSION['error'] = '<span style="color:red">Nieprawidłowy login lub hasło!</span>';
				header('Location: logowanie.php');
				
			}
			
		}
		
		$DB->close($database);
	}
	
?>