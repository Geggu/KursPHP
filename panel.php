<?php

	session_start();
	
	if (!isset($_SESSION['zalogowany']))
	{
		header('Location: logowanie.php');
		exit();
	}
?>
<!DOCTYPE HTML>
<html lang="pl">
	<head>
		<meta charset="UTF-8"/>
		<title>Kurs programowania</title>
		<link rel="icon" href="img/logo.png"/>
		<meta name="description" content="Strona o programowaniu"/>
		<meta name="keywords" content="programowanie, php"/>
		<meta name="author" content="Przemysław Nowak"/>
		
		<link href="css/styles.css" rel="stylesheet" type="text/css"/>
		
		
		<script src="js/validation.js"></script>
		
	</head>
	<?php
		@require_once("database.php");
		$DB = new DB();
		$database = $DB->start();	
		$array = $DB->getArray($database, "kurs");
		$DB->close($database);
		
		function getUser($id){
			$query = "SELECT name FROM users WHERE ID_user='$id'";
			$DB = new DB();
			$database = $DB->start();
			$result = $database->query($query);
			$DB->close($database);
			if($result->num_rows > 0){
				$array = $result->fetch_assoc();
				return $array["name"];
			}
		}
	?>
	<body>
		<div id="container">
			<div id="header">
				<div class="menu">
					<a href="index.php"><img src="img/logo.png" style="height: 6vh; width: 6vh; margin: 0.4vh 1.5vh 0.4vh 0.4vh; float: left;"/></a>
					<span style="float:left;">Kurs programowania</span>
					<div style="text-align: right;">
					<?php
						if((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true)){
							echo '<a class="headerbutton" href="panel.php">Panel użytkownika ' . $_SESSION['name'] . '</a>';
							echo '<a class="headerbutton" href="logout.php">Wyloguj</a>';
							
						}else{
							echo '<a class="headerbutton" href="logowanie.php">Logowanie</a>';
						}
						
					?>
					</div>
					<div style="clear: both;"></div>
				</div>
				<img src="img/header.png" style="width: 100%; height:45vh;"/>
			</div>
			<div id="contenthead">
				<div id="headsite">
					<div style="float:left; margin-right: 4vh;">
						<form action="dodaj.php" method="post">
							<p>Temat: <input type="text" name="temat" id="temat"/></p>
							Treść: <br/>
							<textarea name="content" rows="10" cols="40" id="content">Tutaj wpisz treść...</textarea><br/>
							<input type="hidden" name="idtopic" id="idtopic" value="0"/>
							
							<input type="button" onClick="sprawdzTemat(this.form)" value="Wyślij"/>
						</form>
						
						<button onclick="clearForm()">Nowy Temat</button>


						<script>
							var arrayEdit = <?php if(isset($_POST["edytuj"])) echo json_encode($array[$_POST["edytuj"]], JSON_PRETTY_PRINT); else " " ?>;
							
							if(true){
								document.getElementById("temat").value = arrayEdit.topic;
								document.getElementById("content").innerHTML = arrayEdit.content;
								document.getElementById("idtopic").value = arrayEdit.ID_topic;
							}
							
							
						</script>
					
						
						<p></p>
						
						<?php
							if(count($array) > 0){
								echo "<table border='1'>
											<tr>
												<td>Numer tematu</td>
												<td>Temat</td>
												<td>Nazwa autora</td>
												<td>Data dodania</td>
												<td>Edytuj</td>
												<td>Usuń</td>
											</tr>";
								foreach($array as $keyArray => $valArray){
									echo "<tr>";
										echo "<td>" . $valArray["ID_topic"] . "</td>";
										echo "<td>" . $valArray["topic"] . "</td>";
										echo "<td>" . getUser($valArray["ID_author"]) . "</td>";
										echo "<td>" . $valArray["date"] . "</td>";
										echo '<td><form action="panel.php" method="post"><input type="hidden" name="edytuj" value="' . $keyArray . '"/><input type="submit" value="Edytuj"/></form></td>';
										echo '<td><form action="usun.php" method="post"><input type="hidden" name="usun" value="' . $valArray["ID_topic"] . '"/><input type="submit" value="Usuń"/></form></td>';
									
									echo "</tr>";
								}
							}
						?>
						</table>
					</div>
					
					<div style="clear: both;"></div>
				</div>
				
				<div style="clear: both;"></div>
			</div>
			<div id="stopka">
				<span>Strona wykonana przez Przemysława Nowaka TZN &copy;2017</span>
			</div>
		</div>
	</body>
</html>
?>