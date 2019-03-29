<!doctype HTML>
<html>
	<head>
		<meta charset="UTF-8"/>
		<title>Kurs programowania</title>
		<meta name="description" content="Strona o programowaniu"/>
		<meta name="keywords" content="programowanie, php"/>
		<meta name="author" content="Przemysław Nowak"/>
		
		<link href="css/styles.css" rel="stylesheet" type="text/css"/>
		
	</head>
	<?php
		@require_once("database.php");
		$DB = new DB();
		$database = $DB->start();
		$array = $DB->getArray($database, "kurs");
		$DB->close($database);
		function getContent($id){
			$query = "SELECT content FROM kurs WHERE ID_topic='$id'";
			$DB = new DB();
			$database = $DB->start();
			$result = $database->query($query);
			$DB->close($database);
			if($result->num_rows > 0){
				$array = $result->fetch_assoc();
				return $array["content"];
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
						session_start();
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
				<div class="content">
					<?php
						if(isset($_GET['id'])){
							
							echo getContent($_GET['id']);
						}
					?>
				</div>
				<div class="menu">
					<?php
						foreach($array as $key => $valarray){
							echo "<a class='menubotton' href='?id=" . $valarray['ID_topic'] ."'>" . $valarray['topic'] . "</a><br/>";
							
						}
					?>
					
				</div>
				<div style="clear: both;"></div>
			</div>
			<div id="stopka">
				<span>Strona wykonana przez Przemysława Nowaka TZN &copy;2017</span>
			</div>
		</div>
	</body>
</html>