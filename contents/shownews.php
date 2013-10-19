<?php

$results = mysql_query("SELECT * FROM contents WHERE id = $artid");
while ($row = mysql_fetch_array($results)){
	$title = $row['title'];
	$text = $row['text'];
	$permission = $row['permission'];
	$author = $row['author'];
	$date = $row['date'];
	//echo $permission;
}
if(isset($_SESSION['user'])){


	if($_SESSION['expiration'] == false and $permission == 'protected'){
		$text = str_replace("../", "", $text);
		echo "<div style = 'text-align:center'><h2>".$title."</h2></div>";
		echo "Par <font color = blue>".$author.", ".$date."</font>";
		echo $text;
		
	}
	else if ($_SESSION['expiration'] == false and $permission == 'public'){
		$text = str_replace("../", "", $text);
		echo "<div style = 'text-align:center'><h2>".$title."</h2></div>";
		echo "Par <font color = blue>".$author.", ".$date."</font>";
		echo $text;
	}
	else if ($_SESSION['expiration'] == true and $permission == 'public'){
		$text = str_replace("../", "", $text);
		echo "<div style = 'text-align:center'><h2>".$title."</h2></div>";
		echo "Par <font color = blue>".$author.", ".$date."</font>";
		echo $text;
	}
	else if ($_SESSION['expiration'] == true and $permission == 'protected'){
		echo "<h2>Vous devez recharger votre compte</h2>";
	}

}
else if($permission == 'public'){
	$text = str_replace("../", "", $text);
	echo "<div style = 'padding:15px'>";
	echo "<div style = 'text-align:left'><h3>".$title."</h3></div>";
	echo "<div style = 'text-align:right'>Par <font color = blue>".$author.", ".$date."</font></div>";
	echo $text;
	
	echo "</div>";
}
else echo "<h2>Votre compte doit etre verifie. Veuillez entrer votre nom d'utilisateur et votre mot de passe.";


?>