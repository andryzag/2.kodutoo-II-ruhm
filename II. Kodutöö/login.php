<?php 

/////////////////////////////////////////////////////////////////////////////////////////
/// MVP:
/// Veebirakendus- Get Things Done
/// Kasutajatel on võimalus lisada endale ülesandeid ja märkida neid tehtuks.
/// 
/// Teise faasi arendus:
/// Veebirakendus saadab reminderi, kui midagi on lähedale jõudmas või tegemata.
/// Lisandub tabel/kalender. 
///
/// Kolmanda faasi arendus:
/// Kasutajal on võimalik teiste kasutajatega suhelda ja neid lisada endale sõbraks.
///
/// Neljanda faasi arendus:
/// Kasutajal on võimalus leida enda tegemata ülesandele tegija teiste kasutajate seast.
///
/// Viienda faasi arendus:
/// Kasutaja saab läbi veebirakenduse tehtud töö eest tasuda ja kinnitada tellimuse.
/// 
/// Lõpp toode:
/// Kasutaja saab pidada ülevaadet enda ülesannete üle ning leida nendele soovi korral
/// tegija. Kui kasutaja soovib või postitada koheselt mõne tellimuse ja leida ülesande 
/// täitja ning tasuda tehtud töö eest läbi veebirakenduse.
///
/// LOGIN SCREEN ////////////////////////////////////////////////////////////////////////

	require("functions.php");
	
	// kui on juba sisse loginud siis suunan data lehele
	if (isset($_SESSION["userId"])){
		
		//suunan sisselogimise lehele
		header("Location: data.php");
		exit();
		
	}
	

	//echo hash("sha512", "b");
	
	
	//GET ja POSTi muutujad
	//var_dump($_GET);
	//echo "<br>";
	//var_dump($_POST);
	
	//echo strlen("äö");
	
	// MUUTUJAD
	$loginEmailError = "";
	$loginEmail = "";
	$loginPasswordError = "";
	$loginPassword = "";
	$signupEmailError = "";
	$signupPasswordError = "";
	$signupEmail = "";
	$signupGender = "";
	
		// on üldse olemas selline muutja
	if( isset( $_POST["loginEmail"] ) ){
		
		//jah on olemas
		//kas on tühi
		if( empty( $_POST["loginEmail"] ) ){
			
			$loginEmailError = "This area is required";
			
		} else {
			
			// email olemas 
			$loginEmail = $_POST["loginEmail"];
			
		}
		
	} 
	
	if( isset( $_POST["loginPassword"] ) ){
		
		if( empty( $_POST["loginPassword"] ) ){
			
			$loginPasswordError = "Password is required";
			
		} else {
			
			// siia jõuan siis kui parool oli olemas - isset
			// parool ei olnud tühi -empty
			
			// kas parooli pikkus on väiksem kui 8 
			if ( strlen($_POST["loginPassword"]) < 8 ) {
				
				$loginPasswordError = "Password has to be at least 8 characters";
			
			}
			
		}
		
	}

	// on üldse olemas selline muutja
	if( isset( $_POST["signupEmail"] ) ){
		
		//jah on olemas
		//kas on tühi
		if( empty( $_POST["signupEmail"] ) ){
			
			$signupEmailError = "This area is required";
			
		} else {
			
			// email olemas 
			$signupEmail = $_POST["signupEmail"];
			
		}
		
	} 
	
	if( isset( $_POST["signupPassword"] ) ){
		
		if( empty( $_POST["signupPassword"] ) ){
			
			$signupPasswordError = "Password is required";
			
		} else {
			
			// siia jõuan siis kui parool oli olemas - isset
			// parool ei olnud tühi -empty
			
			// kas parooli pikkus on väiksem kui 8 
			if ( strlen($_POST["signupPassword"]) < 8 ) {
				
				$signupPasswordError = "Password has to be at least 8 characters";
			
			}
			
		}
		
	}
	
	
	// peab olema email ja parool
	// ühtegi errorit
	
	if ( isset($_POST["signupEmail"]) && 
		 isset($_POST["signupPassword"]) && 
		 $signupEmailError == "" && 
		 empty($signupPasswordError)
		) {
		
		// salvestame ab'i
		echo "Saving... <br>";
		
		echo "email: ".$signupEmail."<br>";
		echo "password: ".$_POST["signupPassword"]."<br>";
		
		$password = hash("sha512", $_POST["signupPassword"]);
		
		echo "password hashed: ".$password."<br>";
		
		
		//echo $serverUsername;
		
		// KASUTAN FUNKTSIOONI
		$signupEmail = cleanInput($signupEmail);
		
		signUp($signupEmail, cleanInput($password));
		
	
	}
	
	
	$error ="";
	if ( isset($_POST["loginEmail"]) && 
		isset($_POST["loginPassword"]) && 
		!empty($_POST["loginEmail"]) && 
		!empty($_POST["loginPassword"])
	  ) {
		  
		$error = login(cleanInput($_POST["loginEmail"]), cleanInput($_POST["loginPassword"]));
		
	}
	

?>
<head>
<link rel="stylesheet" href="pikaday.css">
<link rel="stylesheet" href="site.css">
<link rel="stylesheet" href="theme.css">
<link rel="stylesheet" href="triangle.css">
</head>
<!DOCTYPE html>
<html>
<head>
	<title>Login or Sign-Up</title>
</head>
<body>

	<h1>Login</h1>
	<form method="POST">
		<p style="color:red;"><?=$error;?></p>
	
		<input type="text" name="loginEmail" placeholder="E-Mail"  value="<?=$loginEmail;?>"> <?php echo $loginEmailError; ?>
		<br>
		<input type="password" name="loginPassword" placeholder="Password"> <?php echo $loginPasswordError; ?>
		<br><br>
		
		<input type="submit" value="Login">
		
		
	</form>
	
	
	<h1>Sign-Up</h1>
	<form method="POST">
		
		<input name="signupEmail" type="text" placeholder="E-Mail" value="<?=$signupEmail;?>"> <?=$signupEmailError;?>
		<br>
		<input type="password" name="signupPassword" placeholder="Password"> <?php echo $signupPasswordError; ?>
		<br><br>
		
		<input type="submit" value="Sign-Up">
		
		
	</form>

</body>
</html>