<?php
session_start();

//echo $_SESSION['language1'];


if (isset($_POST['language'])){	
	if (isset($_SESSION['language1'])){
		unset($_SESSION['language1']);
	}
	//echo 'Changing language';
	$_SESSION['language1'] = $_POST['lang'];
}

include 'scripts/connect_to_mysql.php';
include 'scripts/languages.php';
$success = true;
if (isset($_POST['function'])){
	if ($_POST['function'] == 'logout'){
		//echo 'We are loggin out';
		if (isset($_SESSION['rwinuser'])){
			unset($_SESSION['rwinuser']);
			unset($_SESSION['rwinpriv']);
			unset($_SESSION['rwinname']);
		}
	}
	if ($_POST['function'] == 'login'){
		//echo 'We are loging in';
		
		$email = $_POST['email'];
		$password = $_POST['password'];
		if ($row = mysql_fetch_array(mysql_query("SELECT * FROM users WHERE email = '$email' AND password = '$password'"))){
			//echo 'Login complete';
			if (isset($_SESSION['rwinuser'])){
				unset($_SESSION['rwinuser']);
				unset($_SESSION['rwinpriv']);
				unset($_SESSION['rwinname']);
			}
			$_SESSION['rwinuser'] = $email;
			//if ($row['privilege'] != ''){
			$_SESSION['rwinpriv'] = $row['privilege'];
			$_SESSION['rwinname'] = $row['fname'].' '.$row['lname'];				
			//}
		}
		else{
			$success = false;
		}
	}
	if ($_POST['function'] == 'signup'){
		//echo 'We are loging in';
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$dob = $_POST['dob'];
		$sex = $_POST['sex'];
		if (mysql_fetch_array(mysql_query("SELECT * FROM users WHERE email = '$email'"))){
			$success = false;
		}
		else {
			mysql_query("INSERT INTO users(fname, lname, email, password, dob, sex) 
			VALUES('$fname', '$lname', '$email', '$password', '$dob', '$sex')") or die(mysql_error());
			//echo 'Registration complete';
			$_SESSION['rwinuser'] = $email;
			$_SESSION['rwinpriv'] = '';
			$_SESSION['rwinname'] = $fname.' '.$lname;
		}
	}
}

$privilege = '';
$names = '';
$email = '';
if (isset($_SESSION['rwinpriv'])){
	$privilege = $_SESSION['rwinpriv'];
	//echo 'We have privilege';
}
if (isset($_SESSION['rwinname'])){
	$names = ' '.$_SESSION['rwinname'];
	$email = ' '.$_SESSION['rwinuser'];
	//echo 'We have privilege';
}
//echo $email;
if (isset($_SESSION['timeout'])){
	//echo time() - $_SESSION['timeout'];
	if (time() - $_SESSION['timeout'] > 1000){
		unset($_SESSION['temp']);
	}
}



if (isset($_POST['maintenance'])){
	if ($_POST['maintenance'] == 'fuzzyalgo'){
		$_SESSION['temp'] = 'OK';
	}
}


//if (isset($_SESSION['temp'])){
if(true){


	if (isset($_GET['liveupdate']) or isset($_POST['liveupdate'])){
		include 'application/liveupdate.php';
		$num = $_SESSION['visitno'];
		
		$duration = (time() - $_SESSION['timeout']);
		$freq = str_replace('th','',$num);
		$freq = str_replace('st','',$freq);
		$freq = str_replace('nd','',$freq);
		$freq = str_replace('rd','',$freq);
		
		$myemail = str_replace(' ','',$email);
		if($row = mysql_fetch_array(mysql_query("SELECT * FROM visitstats WHERE visits = $freq"))){
			if ($myemail == ''){
				$myemail = $row['visitor'];
			}
			mysql_query("UPDATE visitstats SET duration = (duration + $duration), visitor = '$myemail' WHERE visits = $freq") or die(mysql_error());
		}
		else{
			$d = date("y/m/d h:i:s");
			mysql_query("INSERT INTO visitstats(day, visitor, visits) VALUE('$d', '$myemail', $freq)");
		}
		$_SESSION['timeout'] = time();
		
	}
	else{
		
		$ua = strtolower($_SERVER['HTTP_USER_AGENT']);
		//if(stripos($ua,'android') !== false) { // && stripos($ua,'mobile') !== false) {
		if(false){	//header('Location: http://android.davidwalsh.name');
			//exit();
			include 'smartphone.php';
		}
		else{
		
			include 'template/index.php';
		}
	}
}
else{
?>
<table>

<tr>
<td width = 20%>


</td>
<td width = 900px style = "padding-top:100px; font-family:verdana; font-size:11px">
<h1>HIPPO SAFARIS LTD</h1>
The site is down for maintenance. If you received a test pass code, please enter it below to proceed!<br>
Le site est en phase de maintenance. Si vous avez recu un code de passe, veullez l'entrer ici bas!<br>
<form method = post action="" style = "padding:50px">
<input name = maintenance>
<input type = submit value = Enter/Entrer>
</form>

</td>
<td width = 20%>

</td>
</tr>
</table>



<?php 
}
?>
