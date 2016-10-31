<?php 
	
	require("functions.php");
	
		// kui on juba sisse loginud siis suunan data lehele
	if (isset($_SESSION["userId"])){
		
		//suunan sisselogimise lehele
		header("Location: data.php");
		exit();
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
		header("Location: 3 - RoboQuestion-INC.php");
		
	}
				//Suunan edasi
	if (isset($_GET["confirm"])) {
		
		session_destroy();
		header("Location: 5 - RoboQuestion-LIQ.php");
		
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
	<h2>Which of the following best describes your household?</h2>
	<form method="POST">

		<?php if($signupQ1 == "Q1-1") { ?>
			<input type="radio" name="signupQ1" value="Q1-1" checked> Single income, no dependents<br>
		<?php }else { ?>
			<input type="radio" name="signupQ1" value="Q1-1"> Single income, no dependents<br>
		<?php } ?>
		
		<?php if($signupQ1 == "Q1-2") { ?>
			<input type="radio" name="signupQ1" value="Q1-2" checked> Single income, at least one dependent<br>
		<?php }else { ?>
			<input type="radio" name="signupQ1" value="Q1-2"> Single income, at least one dependent<br>
		<?php } ?>
		
		<?php if($signupQ1 == "Q1-3") { ?>
			<input type="radio" name="signupQ1" value="Q1-3" checked> Dual income, no dependent<br>
		<?php }else { ?>
			<input type="radio" name="signupQ1" value="Q1-3"> Dual income, no dependent<br>
		<?php } ?>

		<?php if($signupQ1 == "Q1-4") { ?>
			<input type="radio" name="signupQ1" value="Q1-4" checked> Dual income, at least one dependent<br>
		<?php }else { ?>
			<input type="radio" name="signupQ1" value="Q1-4"> Dual income, at least one dependent<br>
		<?php } ?>
		
			<?php if($signupQ1 == "Q1-4") { ?>
			<input type="radio" name="signupQ1" value="Q1-4" checked> Retired or financially independent<br>
		<?php }else { ?>
			<input type="radio" name="signupQ1" value="Q1-4"> Retired or financially independent<br>
		<?php } ?>
		
		<br>
		
		<a href="?back=1">Back</a>
		<a href="?confirm=1">Confirm</a>
		
	</form>

</body>
</html>