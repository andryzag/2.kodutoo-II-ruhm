<?php 
	
	require("functions.php");
	
		//DIRECTING USER TO DATA PAGE IF ALREADY LOGGED IN
	if (isset($_SESSION["userId"])){
		
		//DIRECTING TO DATA PAGE
		header("Location: data.php");
		
	}
	
	// VALUES
	$signupQ1 = "";
	
	
	// FIRST QUESTION
	if( isset( $_POST["signupQ1"] ) ){
		
		if(!empty( $_POST["signupQ1"] ) ){
		
			$signupQ1 = $_POST["signupQ1"];
			
		}
		
	} 
	

				//Suunan tagasi
	if (isset($_GET["back"])) {
		
		session_destroy();
		header("Location: 0 - RoboLANDING.php");
		
	}
				//Suunan edasi
	if (isset($_GET["confirm"])) {
		
		session_destroy();
		header("Location: 2 - RoboQuestion-AGE.php");
		
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Investment Management, Official Financial Advisor | NAME </title>
</head>
<body>

	<h3>Lets get to know you...</h3>
	<br>
	<h2>What are you looking for in a financial advisor?</h2>
	<form method="POST">

		<?php if($signupQ1 == "Q1-1") { ?>
			<input type="radio" name="signupQ1" value="Q1-1" checked> I'd like to create a diversified investment portfolio<br>
		<?php }else { ?>
			<input type="radio" name="signupQ1" value="Q1-1"> I'd like to create a diversified investment portfolio<br>
		<?php } ?>
		
		<?php if($signupQ1 == "Q1-2") { ?>
			<input type="radio" name="signupQ1" value="Q1-2" checked> I'd like to save money on my taxes<br>
		<?php }else { ?>
			<input type="radio" name="signupQ1" value="Q1-2"> I'd like to save money on my taxes<br>
		<?php } ?>
		
		<?php if($signupQ1 == "Q1-3") { ?>
			<input type="radio" name="signupQ1" value="Q1-3" checked> I'd like someone to completely manage my investments, so that i don't have to<br>
		<?php }else { ?>
			<input type="radio" name="signupQ1" value="Q1-3"> I'd like someone to completely manage my investments, so that i don't have to<br>
		<?php } ?>

		<?php if($signupQ1 == "Q1-4") { ?>
			<input type="radio" name="signupQ1" value="Q1-4" checked> I'd like to match or beat the performance of the markets<br>
		<?php }else { ?>
			<input type="radio" name="signupQ1" value="Q1-4"> I'd like to match or beat the performance of the markets<br>
		<?php } ?>
		<br>
		<a href="?back=1">Back</a>
		<a href="?confirm=1">Confirm</a>
		
	</form>

</body>
</html>