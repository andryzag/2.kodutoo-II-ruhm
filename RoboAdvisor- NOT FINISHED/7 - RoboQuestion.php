<?php 
	
	require("functions.php");
	
	
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
		header("Location: 6 - RoboQuestion.php");
		
	}
				//Suunan edasi
	if (isset($_GET["confirm"])) {
		
		session_destroy();
		header("Location: 8 - RoboSIGNUP.php");
		
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Investment Management, Official Financial Advisor | NAME</title>
</head>
<body>

	<h4>Lets get to know you...</h4>
	<br>
	<h2>The global stock market is often volatile. If your entire investment portfolio lost 10% of its value in a month during a market decline, what would you do? </h2>
	<h3>Your behavior during a market downturn is important to understanding your risk tolerance.</h3>
	<form method="POST">

		<?php if($signupQ1 == "Q1-1") { ?>
			<input type="radio" name="signupQ1" value="Q1-1" checked> Sell all of your investments<br>
		<?php }else { ?>
			<input type="radio" name="signupQ1" value="Q1-1"> Sell all of your investments<br>
		<?php } ?>
		
		<?php if($signupQ1 == "Q1-2") { ?>
			<input type="radio" name="signupQ1" value="Q1-2" checked> Sell some<br>
		<?php }else { ?>
			<input type="radio" name="signupQ1" value="Q1-2"> Sell some<br>
		<?php } ?>
		
		<?php if($signupQ1 == "Q1-3") { ?>
			<input type="radio" name="signupQ1" value="Q1-3" checked> Keep all<br>
		<?php }else { ?>
			<input type="radio" name="signupQ1" value="Q1-3"> Keep all<br>
		<?php } ?>
		
				<?php if($signupQ1 == "Q1-3") { ?>
			<input type="radio" name="signupQ1" value="Q1-3" checked> Buy more<br>
		<?php }else { ?>
			<input type="radio" name="signupQ1" value="Q1-3"> Buy more<br>
		<?php } ?>
		
		<br>
		
		<a href="?back=1">Back</a>
		<a href="?confirm=1">Confirm</a>
		
	</form>

</body>
</html>