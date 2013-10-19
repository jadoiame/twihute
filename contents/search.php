<?php 
echo "<div style='text-align:center'><h2>Resultat de la recherche</h2></div>";
$quest = $_GET['search'];
$quest = $quest." ;;";
$questions = explode(" ", $quest);
$query = "SELECT * FROM contents WHERE text LIKE '%$questions[0]%'";
$i = 1;
while ($i<(count($questions))-1){
	if(!strpos($questions[$i], "end")){
		$query = $query." AND text LIKE '%$questions[$i]%'";
	}
	$i++;
}
$i = 0;
while ($i<(count($questions)-1)){
	if(!strpos($questions[$i], "end")){
		$query = $query." OR title LIKE '%$questions[$i]%'";
	}
	$i++;	
}
//echo $query;

$results = mysql_query($query);
$found = false;
while ($row = mysql_fetch_array($results)){
	$articleid = $row['id'];
	echo "<a href='?category=other&articleid=".$articleid."'><h4>".$row['title']."</h4></a>";
	$text = $row['text'];
	$text = substr($text, 0,300);
	$text = strip_tags($text);
	echo $text."...";
	$found = true;
}
if (!$found){
	echo "<h4>Votre recherche n'a donne aucun resultat!</h4>";
}
?>