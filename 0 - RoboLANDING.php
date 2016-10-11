<?php 
	
	require("functions.php");
	
	// kui on juba sisse loginud siis suunan data lehele
	if (isset($_SESSION["userId"])){
		
		//suunan sisselogimise lehele
		header("Location: data.php");
		
	}	
	
	$error ="";
	if ( isset($_POST["loginEmail"]) && 
		isset($_POST["loginPassword"]) && 
		!empty($_POST["loginEmail"]) && 
		!empty($_POST["loginPassword"])
	  ) {
		  
		$error = login($_POST["loginEmail"], $_POST["loginPassword"]);
		
	}
	
			//Suunan tagasi
	if (isset($_GET["story"])) {
		
		session_destroy();
		header("Location: OurStory.php");
		
	}
	
			//Suunan edasi
	if (isset($_GET["next"])) {
		
		session_destroy();
		header("Location: 1 - RoboQuestion.php");
		
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>

	<h1>Login</h1>
	<form method="POST">
		
		<input type="login" name="loginEmail" placeholder="E-mail">
		<br><br>
		
		<input type="password" name="loginPassword" placeholder="Password">
		<br><br>
		
		<input type="submit" value="Login">
		
		
	</form>
	
	
	<h1>The most tax-efficient, low-cost,
hassle-free way to invest</h1>
	<form method="POST">
		
		<a href="?next=1">Invest with Us</a>
		
		<a href="?story=1">Our Story</a>
		
	</form>

</body>
</html>