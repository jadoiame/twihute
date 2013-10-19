<?php 
if ($privilege === 'super'){
include 'statistics/statistics.php';
$statistics = new Statistics();
if (isset($_POST['password'])){
	$statistics->loadUsers();
	$statistics->changePassword($_POST['id'], $_POST['password']);
	$statistics->changePrivilege($_POST['id'], $_POST['privilege']);
}
if (isset($_POST['deleteuser'])){
	$statistics->loadUsers();
	$statistics->deleteUser($_POST['deleteuser']);
}
?>
<div style = "padding:20px; float:right;">
<!-- Top Menu -->
<a href = "?page=statistics" class = hotelButtons style = "color:black; font-size:12px; padding:10px">Home Page</a>
<a href = "?page=statistics&report=users" class = hotelButtons style = "color:black; font-size:12px; padding:10px">Users</a>
<a href = "?page=statistics&report=visitors" class = hotelButtons style = "color:black; font-size:12px; padding:10px">Visitors</a>
<a href = "?page=statistics&report=messages" class = hotelButtons style = "color:black; font-size:12px; padding:10px">News Letter</a>
<br><br><br>
<a href = "?page=statistics&report=banner" class = hotelButtons style = "color:black; font-size:12px; padding:10px">Banner Slide Show</a>

</div>

<div style = "padding:30px;margin-top:20px">
<!-- Users -->
<?php 
if ($_GET['report'] === 'users'){

?>

<p><big><strong>Tankyu Members List</strong></big></p>

<p>Below is a list of all the members with their information. You have the power to reset their password, change their privileges or delete them. The users with &quot;super privilege&quot; are the administrators. There are two categories of users: administrators and ordinary users.</p>



<?php 
	$statistics->loadUsers();
	$statistics->getUsers();
}
else if ($_GET['report'] === 'visitors'){
?>

<div>

		
		<p><big><strong>Visitors Log</strong></big></p>

		<p>View all the log records of all the visitors on this website. Every entry is recorded the first time a user gets to any page of this website. If a user does not click or visit any link for a delay of twenty minute, we assume he is a new user and a new visit record from the same visitor&#39;s browser.</p>
		
		<p>You can determine the time limit in which you want to view the records.</p>
		
		<p>&nbsp;</p>
				
				
	
<form method = post>
<input name = date1 value = "<?php if (isset($_POST['date1'])) {echo $_POST['date1'];} else{ echo date('y-m-d');}?>">
<input name = date2 value = "<?php if (isset($_POST['date2'])) {echo $_POST['date2'];} else{ echo date('y-m-d');}?>">
<input type = submit value = "Load">
</form>
</div>

<?php 
	$statistics->loadVisits();
	$statistics->getVisitStatistics();
	

}
else if ($_GET['report'] === 'messages'){
	include 'statistics/newsletter.php';
}
else if ($_GET['report'] === 'banner'){
	include 'statistics/banner.php';
}
else{
?>
<div style = "width:400px; text-align:justify">
<p><big><strong>Welcome to the Tankyu Administration Panel</strong></big></p>

<p>You are in this area because your account has administrative privileges.</p>

<p>From this area, you have all the power to make changes on the live website. Every change you make here will have effect on their respective modules and pages. Browse to which category you want to make changes in by using the top menu.</p>

<p>&nbsp;</p>

<p>&nbsp;</p>

</div>


<?php 
}
?>
</div>
<?php 
}
else{
?>
<br><br>

You can't access the content of this area
<br><br>
<?php 
}
?>
