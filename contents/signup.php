<h2>Registration Form</h2>
<?php 
if (isset($_POST['action'])){
if ($_POST['action'] == signup){
	$name = $_POST['names'];
	$surname = $_POST['surname'];
	$username = $_POST['username'];
	$password = $_POST['password'];
        $exist = mysql_fetch_array(mysql_query("SELECT * FROM users WHERE username = '$username'"));
        if(!$exist){
            $query = mysql_query("INSERT INTO users(fname,lname,username,password)
	    VALUES('$name','$surname','$username','$password')");
            echo 'Votre inscription est complete!';	     
        }
        else echo "Ce nom d'utilisateur a ete prise"; 	
	
}
}
else{
?>
<form method = post>
<input type = hidden name = action value = signup>
First name<br>
<input type = text name = names><br>
Last name<br>
<input type = text name = surname><br>
Email<br>
<input type = text name = email><br>
Username<br>
<input type = text name = username><br>
Password<br>
<input type = password name = password><br>
<input type = submit value = "Register">

</form>
<?php 
}

?>