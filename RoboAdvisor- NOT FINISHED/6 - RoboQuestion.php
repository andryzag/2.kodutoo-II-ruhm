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
		header("Location: 5 - RoboQuestion-LIQ.php");
		
	}
				//Suunan edasi
	if (isset($_GET["confirm"])) {
		
		session_destroy();
		header("Location: 7 - RoboQuestion.php");
		
	}
	
?>
<!DOCTYPE html>
<html>
<head>
	<title>Investment Management, Official Financial Advisor | NAME</title>
</head>
<body>

	<h3>Lets get to know you...</h3>
	<br>
	<h2>When deciding how to invest your money, which do you care about more?</h2>
	<form method="POST">

		<?php if($signupQ1 == "Q1-1") { ?>
			<input type="radio" name="signupQ1" value="Q1-1" checked> Maximizing gains<br>
		<?php }else { ?>
			<input type="radio" name="signupQ1" value="Q1-1"> Maximizing gains<br>
		<?php } ?>
		
		<?php if($signupQ1 == "Q1-2") { ?>
			<input type="radio" name="signupQ1" value="Q1-2" checked> Minimizing losses<br>
		<?php }else { ?>
			<input type="radio" name="signupQ1" value="Q1-2"> Minimizing losses<br>
		<?php } ?>
		
		<?php if($signupQ1 == "Q1-3") { ?>
			<input type="radio" name="signupQ1" value="Q1-3" checked> Both equally<br>
		<?php }else { ?>
			<input type="radio" name="signupQ1" value="Q1-3"> Both equally<br>
		<?php } ?>
		
		<br>
		
		<a href="?back=1">Back</a>
		<a href="?confirm=1">Confirm</a>
		
	</form>

</body>
</html>