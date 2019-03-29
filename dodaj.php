<?php
	header('Content-Type: text/html; charset=utf-8');
	function val($str1, $str2){
		if($str1 == " " || $str2 == " "){
			header('Location: panel.php');
		}else{
			return 0;
		}
	}
	session_start();
	if(isset($_POST["temat"]) && isset($_POST["content"]) && $_SESSION["zalogowany"]==true ){
		$temat = $_POST["temat"];
		$content = $_POST["content"];
		val($temat, $content);
		@require_once("database.php");
		$DB = new DB();
		$date = date("Y-m-d");
		$id = $_SESSION["id"];
		if(isset($_POST["idtopic"]) && ($_POST["idtopic"]!=0)){
			$idtopic = $_POST["idtopic"];
			$query="UPDATE kurs SET topic='$temat', content='$content', ID_author='$id', date='$date' WHERE ID_topic='$idtopic'";
			
		}else{
			$query = "INSERT INTO kurs(topic, content, ID_author, date, verified) VALUES('$temat', '$content', '$id', '$date', 1 )";
		}
		$database = $DB->start();
		$database->query($query);
		$DB->close($database);
		header('Location: panel.php');
		
	}else{
		header('Location: panel.php');
	}

?>

