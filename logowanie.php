<!doctype HTML>
<?php
	session_start();
	
	if ((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true))
	{
		header('Location: panel.php');
		exit();
	}

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
		
		<script src="js/validation.js"></script>
	</head>
	<body>
		<div id="container">
			<div id="header">
				<div class="menu">
					<a href="index.php"><img src="img/logo.png" style="height: 6vh; width: 6vh; margin: 0.4vh 1.5vh 0.4vh 0.4vh; float: left;"/></a>
					<span style="float:left;">Kurs programowania</span>
					<div style="text-align: right;">
						<a class="headerbutton"href="logowanie.php">Logowanie</a>
					</div>
					<div style="clear: both;"></div>
				</div>
				<img src="img/header.png" style="width: 100%; height:45vh;"/>
			</div>
			<div id="contenthead">
				<div id="loginpanel">
					<div style="float:left; margin-right: 4vh;">
						<form action="zaloguj.php" method="POST">
							Login: <input type="text" name="login"/><br/>
							Hasło: <input type="password" name="haslo"/><br/>
							<input type="button" onClick="sprawdzLogin(this.form)" value="Zaloguj"/>
						</form>
						<?php if(isset($_SESSION['error']))	echo $_SESSION['error']; ?>
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