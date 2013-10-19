Welcome to twihute uploads

<?php 
if (isset($_POST['sendfile'])){
	$picture = $_FILES;
	$file = $picture['myfile']['name'];
	$file = str_replace(' ','', $file);
	$dir = 'gallery/'.$file;
	//echo $dir;
	//echo 'Photo Here'.$file;
	$cp = false;
	if ($file != ''){
		echo "attempting to copy. ";
		$cp = copy($picture['myfile']['tmp_name'], $dir);
	}
	if($cp){
		echo 'File uploaded!';
		//mysql_query("UPDATE $this->table SET thumb = '$file' WHERE id = $id");
	}
	else{
		echo "File not copied!";
		//echo 'Update failed';
	}
	
}
else{
?>

<form method = post enctype="multipart/form-data">
<input type = hidden value = sendfile name = sendfile >
<input type = file name = myfile >

<input type = submit value = save>



</form>
<?php 
}
?>