<?php

class banner{
	private $id = array();
	private $img = array();
	private $text = array();

	function loadBanner(){
		$results = mysql_query("SELECT * FROM banner ORDER BY ordering");
		$i = 0;
		while ($row = mysql_fetch_array($results)){
			$this->id[$i] = $row['id'];
			$this->img[$i] = $row['img'];
			$this->text[$i++] = $row['text'];
		}
	}
	function addBanner($img, $text, $order){
		mysql_query("INSERT INTO banner(img, text, ordering) VALUES('$img','$text', $order)");
	}
	function editBanner($id,$img, $text, $order){
		mysql_query("UPDATE banner SET img = '$img', text = '$text', ordering = $order WHERE id = $id") or die(mysql_error());
	}
	function deleteBanner($id){
		mysql_query("DELETE FROM banner WHERE id = $id") or die(mysql_error());
	}
	function uploadImg($img){
		$name = 'banner.png';

		return $name;
	}
	function display(){
		$slideShow = new SlideShow($this->img, $this->text);
		$slideShow->show();
	}
	function getGalleryModule(){
		if(isset($_GET['del'])){
			unlink('gallery/banner/'.$_GET['del']);
			echo '<b style = "color:red">Image deleted</b>';
		}

		?>
			
			<div  class = hotelButtons >
			Add a new File<br>
			
			<form method = post enctype="multipart/form-data">
			<input type = hidden name = newphotos1 value = true >
			<input name = newphotos type = file style = "height:30px; width:200px" value = "">
			<br>
			<input type = submit value = "Upload">
			</form>
			</div>
			<div style = "background:white">
			<?php 
			if ($handle = opendir('gallery/banner/')) {
				echo "File Explorer<br>";
				echo " <br>";
	
				/* Ceci est la façon correcte de traverser un dossier. */
				while (false !== ($entry = readdir($handle))) {
					echo "<a href = 'gallery/banner/$entry'>$entry</a> [<a style = color:red href = '?page=statistics&report=banner&del=$entry'>Delete</a>] | ";
				}	
	
	
				closedir($handle);
			}
			?>
			</div>	
			<?php 
			
			
		}
		function getSlideBuilder(){
			?>
			<br><br>
			<div>
			<form method="post">
			Copy and paste the Image Link here:<br>
			<input type = hidden id = newslide name = newslide value = -1 >
			<input class = "hotelButtons" id = link name = link style = "border-color:orange; width:500px" ><br>
			Add text here:<br>
			<textarea class = "hotelButtons" id = text name = text style = "border-color:orange; width:500px" ></textarea><br>
			Set the order here:<br>
			<input class = "hotelButtons" id = ordering name = order style = "border-color:orange; width:50px" ><br>
			
			<input type = "submit" value = "Save"> | <input type = "reset" value = Reset>
			</form>
			<br><Br>
			<div>
			<?php 
			$results = mysql_query("SELECT * FROM banner ORDER BY ordering");
			while ($row = mysql_fetch_array($results)){
			?>
			<div>
			<?php 
			echo '<img src="'.$row['img'].'" style = "height:50px">';
			?>	
			</div>	
			<div>
			<?php 
			echo $row['text'];
			?>	
			</div>	
			<div>
			<a href = "javascript:void(0)" onclick = "$('#newslide').val('<?php echo $row['id']?>'); $('#link').val('<?php echo $row['img']?>'); $('#text').val('<?php echo $row['text']?>'); $('#ordering').val('<?php echo $row['ordering']?>');">Edit</a> | <a href = "?page=statistics&report=banner&deletebanner=<?php echo $row['id']?>">Delete</a>
			</div>		
						
			<?php
			}
			?>
			</div>
			</div>
			<?php 
		}
		
		function addPicture($picture){
			$file = $picture['newphotos']['name'];
			$file = str_replace(' ','', $file);
			$dir = 'gallery/banner/'.$file;
			//echo $dir;
			//echo 'Photo Here'.$file;
			$cp = false;
			if ($file != ''){
				//echo $dir;
				$cp = copy($picture['newphotos']['tmp_name'], $dir);
			}
			if($cp){
				//echo 'Photo Updated';
				//mysql_query("UPDATE $this->table SET thumb = '$file' WHERE id = $id");
			}
			else{
				//echo 'Update failed';
			}
		}
		
		function showSlideShow(){
			//echo $this->img[0];
			$slideShow = new SlideShow($this->img, $this->text);
			$slideShow->show();
		}
		
	
}

class SlideShow{
	private $images = array();
	private $texts = array();
	
	function __construct($images, $text){
		$this->images = $images;
		$this->texts = $text;
	}
	
	function show(){
		//echo $this->texts[0];
		//echo 'Images here';
		include 'statistics/slideshow.php';

	}
}



?>