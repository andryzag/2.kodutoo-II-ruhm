<?php 
	
	require("functions.php");
	
	//kui ei ole kasutaja id'd
	if (!isset($_SESSION["userId"])){
		
		//suunan sisselogimise lehele
		header("Location: login.php");
		
	}
	
	//kui on ?logout aadressireal siis login välja
	if (isset($_GET["logout"])) {
		
		session_destroy();
		header("Location: 0 - RoboLANDING.php");
		
	}
	
	$msg = "";
	if(isset($_SESSION["message"])){
		$msg = $_SESSION["message"];
		
		//kui ühe näitame siis kustuta ära, et pärast refreshi ei näitaks
		unset($_SESSION["message"]);
	}
	
	
	if ( isset($_POST["plate"]) && 
		isset($_POST["plate"]) && 
		!empty($_POST["color"]) && 
		!empty($_POST["color"])
	  ) {
		  
		saveCar($_POST["plate"], $_POST["color"]);
		
	}
	//saan kõik autod andmed
	$carData = getAllCars();
	echo "<pre>";
	var_dump($carData);
	echo "</pre>";
?>
<h1>Welcome!</h1>
<?=$msg;?>
<p>
	Welcome <?=$_SESSION["userEmail"];?>!
	<a href="?logout=1">Log out</a>
</p>

</form>
<h2>Investment Plan</h2>
<?php

	$html = "<table>";

	$html .= "<tr>";
		$html .= "<th>id</th>";
		$html .= "<th>plate</th>";
		$html .= "<th>color</th>";
	$html .= "</tr>";
	
	//iga liikme kohta massiivis
	foreach($carData as $c) {
		// iga auot kohta car datas kasutan seda $c ja siis plate 
		//echo $c-> plate."<br>";
		
		$html .= "<tr>";
		$html .= "<td>".$c->id."</td>";
		$html .= "<td>".$c->plate."</td>";
		$html .= "<td style='color:".$c-> carColor."'>".$c-> carColor."</td>";
	$html .= "</tr>";
		
		
	}

	$html .= "</table>";
	echo $html;
	
	
	$listHtml = "<br><br>";
	
	foreach($carData as $c){
		
		
		$listHtml .= "<h1 style='color:".$c->carColor."'>".$c->plate."</h1>";
		
	}
	
	///echo $listHtml;
	
	
	
	
	
	
	
	
	
?>
<br>
<br>
<br>
<br>
<br>
<br>



	
