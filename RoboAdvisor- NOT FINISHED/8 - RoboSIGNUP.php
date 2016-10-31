<?php 
	
	require("functions.php");
	
	// kui on juba sisse loginud siis suunan data lehele
	if (isset($_SESSION["userId"])){
		
		//suunan sisselogimise lehele
		header("Location: data.php");
		
	}
	
	//echo hash("sha512", "b");
	
	
	//GET ja POSTi muutujad
	//var_dump($_GET);
	//echo "<br>";
	//var_dump($_POST);
	
	//echo strlen("‰ˆ");
	
	// MUUTUJAD
	$signupEmailError = "";
	$signupPasswordError = "";
	$signupEmail = "";
	$signupGender = "";
	
	
	
	
	// on ¸ldse olemas selline muutja
	if( isset( $_POST["signupEmail"] ) ){
		
		//jah on olemas
		//kas on t¸hi
		if( empty( $_POST["signupEmail"] ) ){
			
			$signupEmailError = "This field cannot be empty";
			
		} else {
			
			// email olemas 
			$signupEmail = $_POST["signupEmail"];
			
		}
		
	} 
	
	if( isset( $_POST["signupPassword"] ) ){
		
		if( empty( $_POST["signupPassword"] ) ){
			
			$signupPasswordError = "This field cannot be empty";
			
		} else {
			
			// siia jıuan siis kui parool oli olemas - isset
			// parool ei olnud t¸hi -empty
			
			// kas parooli pikkus on v‰iksem kui 8 
			if ( strlen($_POST["signupPassword"]) < 8 ) {
				
				$signupPasswordError = "Password has to be atleast 8 characters";
			
			}
			
		}
		
	}
	
	// peab olema email ja parool
	// ¸htegi errorit
	
	if ( isset($_POST["signupEmail"]) && 
		 isset($_POST["signupPassword"]) && 
		 $signupEmailError == "" && 
		 empty($signupPasswordError)
		) {
		
		// salvestame ab'i
		echo "Salvestan... <br>";
		
		echo "email: ".$signupEmail."<br>";
		echo "password: ".$_POST["signupPassword"]."<br>";
		
		$password = hash("sha512", $_POST["signupPassword"]);
		
		echo "password hashed: ".$password."<br>";
		
		
		//echo $serverUsername;
		
		// KASUTAN FUNKTSIOONI
		signUp($signupEmail, $password);
		
	
	}
	
					//Suunan tagasi
	if (isset($_GET["back"])) {
		
		session_destroy();
		header("Location: 7 - RoboQuestion.php");
		
	}
				//Suunan edasi
	if (isset($_GET["signup"])) {
		
		session_destroy();
		header("Location: 0 - RoboLANDING.php");
		
	}
	
?>
<!DOCTYPE html>
<html>
<head>
	<title>Investment Management, Official Financial Advisor | NAME</title>
</head>
<body>

	<h2>HERE'S YOUR PLAN</h2>
	<br>
	<h3>Enter your email address and choose password for reviewing this investment plan.</h3>
	<form method="POST">
		
		<input type="Email" name="signupEmail" placeholder="E-mail"> <?php echo $signupEmailError; ?>
		<br><br>
		<input type="password" name="signupPassword" placeholder="Parool"> <?php echo $signupPasswordError; ?>
		<br><br>
		
		<a href="?back=1">Back</a>
		<a href="?signup=1">Get Plan</a>
		
	</form>

</body>
</html>