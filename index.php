<!doctype HTML>
<?php
	 header('Content-Type: text/html; charset=utf-8');
	
	
?>
<html>
	<head>
		<meta charset="UTF-8"/>
		<title>Kurs programowania</title>
		<link rel="icon" href="img/logo.png"/>
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
				<div id="headsite">
					<div style="float:left; margin-right: 4vh;">
						<h1>Kurs PHP:</h1>
						<ul>
						<?php
							foreach($array as $key => $valarray){
								echo "<a class='menubotton' href='temat.php?id=" . $valarray['ID_topic'] ."'>" . $valarray['topic'] . "</a><br/>";
							
							}
						?>
						</ul>
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