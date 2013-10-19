<?php 
include 'lib.php';

if (isset($_POST['fname'])){
	echo "Updload successful!";
	echo $_POST['fname'];
	echo $_POST['lname'];
}




?>



<form method = post>
Fname:<br>
<input name = fname><br>
<br>
Lname<br>
<input name = lname><br>
<br>
<input type = submit value = Submit>


</form>