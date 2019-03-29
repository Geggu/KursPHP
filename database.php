<?php
class DB{
	const server = "localhost";
	const user = "root";
	const password = "";
	const database = "kurs";

	function start(){
		@$connection = new mysqli($this::server, $this::user, $this::password, $this::database);
		if(mysqli_connect_errno() != 0){
			echo "<p>Wystąpił błąd numer: " + mysqli_connect_errno() + "</p>";
		}else{
			return $connection;
		}
	}
	function getArray($db, $name){
		$query = "SELECT * FROM $name";
		if(is_null($db)){
			return;
		}
		$result = $db->query($query);
		if ($result) {
			if($result->num_rows>0){
				$array = $result->fetch_all(MYSQLI_ASSOC);
				return $array;
			}
		}
	}
	function getLengthArray($db, $name){
		$query = "SELECT * FROM $name";
		$result = $db->query($query);
		return $result->num_rows;
	}
	function close($connection){
			@$connection->close();
	}
}

?>
