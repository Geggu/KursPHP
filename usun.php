<?php
	session_start();
	if(isset($_POST["usun"]) && ($_SESSION["zalogowany"]==true) ) {
		@require_once("database.php");
		$DB = new DB();
		$usun = $_POST["usun"];
		$query = "DELETE FROM kurs WHERE ID_topic='$usun'";
		$database = $DB->start();
		$database->query($query);
		$DB->close($database);
		
		
	}
	header('Location: panel.php');
?>