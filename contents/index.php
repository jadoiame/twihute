<?php 
$function = "";
if(isset($_GET['function'])){
$function = $_GET['function'];


if ($function == 'signup'){
	include 'contents/signup.php';
}
}
if(isset($_GET['articleid'])){
$artid = $_GET['articleid'];
if($artid !=""){
	include 'contents/shownews.php';
}
}
if(isset($_GET['category'])){
	include 'contents/showcategories.php';	
}
?>