<?php
$category = $_GET['category'];
if ($category != "other" and $category != "search" and $category != "gallery"){
	$results4 = mysql_query("SELECT * FROM menus WHERE id = $category");
	while ($row4 = mysql_fetch_array($results4)){
		$category = $row4['name'];
                echo $category;
	}
}
if ($category == 'Nous contacter'){
	include 'contents/contactus.php';
}
else if ($category == 'A propos de nous'){
	include 'contents/aboutus.php';	
}
else if ($category == 'search'){
	include 'search.php';
}
else if ($category == 'gallery'){
	include 'gallery/index.php';
}


else{
        $category = str_replace("'","\'",$category);

	$results1 = mysql_query("SELECT * FROM menus WHERE submenu = '$category'");
	$i = 0;
	while ($row1 = mysql_fetch_array($results1)){
			$cat[$i] = str_replace("'","\'",$row1['name']);
                        if (count($cat[$i]) > 45){
                             $cat = substr($cat,0,45);
                        }
			//echo $cat[$i];
			$i++;
	}
	$query = "SELECT * FROM contents WHERE category LIKE '%$category%'";
	
	$k = 0;
	while($k < $i){
		$query = $query." OR category LIKE '%".$cat[$k]."%'";
		$k++;	
	}
        
        
	$query = $query." ORDER BY id DESC";
        //$query = str_replace("'","\'",$query);
        //echo $query;
	$results = mysql_query($query) or die(mysql_error());
	while ($row = mysql_fetch_array($results)){
		 $text = $row['text'];
		 $title = $row['title'];
		 $articleid = $row['id'];
		 $text = str_replace("../", "", $text);
	     $text = str_replace("height", "", $text);
	     $text = str_replace("<p>", "", $text);
	     $text = str_replace("</p>", "", $text);
	     //$text1 = explode(". ", $text);
	     $text = substr($text,0 ,500);
	     echo "<div class = brief><a href = '?category=other&articleid=".$articleid."'><b>".$title."</b></a><br>".$text."...<br><font color = red>".$row['date']."</font></div>";
	}
}

?>