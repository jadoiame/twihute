<?php
class Hotel {
	private $id;
	private $name;
	private $image;
	private $text;
	private $gallery;
	private $realGallery;
	private $latitude;
	private $longitude;
	private $rooms;
	private $nearbyLocations;
	private $location;
	private $table;
	private $owner;
	private $phone;
	private $order;
	private $comments;
	
	function __construct(){
		$this->table = 'hotels';
		if($_GET['page'] === 'attractions'){
			$this->table = 'discover';
		}
		if($_GET['page'] === 'packages'){
			$this->table = 'packages';
		}
	}
	function getRoomsValues(){
		return $this->rooms;
	}
	
	function getMyHotels($email){
		$results = mysql_query("SELECT * FROM $this->table WHERE email = '$email' ORDER BY id DESC");
		while($row = mysql_fetch_array($results)){
			echo '<div class = hotelsList style = "margin-left:30px; margin-top:5px;  width:90%; height:auto; border-style:solid; border-color:#81BEF7;"><a style = "color:#002448; text-decoration:underline" href = "?page='.$_GET['page'].'&profile='.$row['id'].'">'.$row['name'].'</a></div>';
		}
	}
	function getAllHotels(){
		$results = mysql_query("SELECT * FROM $this->table ORDER BY id DESC");
		while($row = mysql_fetch_array($results)){
			echo '<div class = hotelsList style = "margin-left:30px; margin-top:5px; width:90%; height:auto; border-style:solid; border-color:#81BEF7;"><a style = "color:#002448; text-decoration:underline; font-weight:bold; font-size:12px" href = "?page='.$_GET['page'].'&profile='.$row['id'].'">'.$row['name'].'</a>
					<br>Registered By:'.$this->getOwnerName($row['email']).'
					</div>';
		}
	}
	function getOwnerName($email){
		$email = str_replace(' ','',$email);
		$results = mysql_query("SELECT * FROM users WHERE email = '$email'");
		$val = 'Unknown';
		while($row = mysql_fetch_array($results)){
			$val = $row['fname'].' '.$row['lname'];
		}
		return $val;
	}
	
	function loadContent($id){
		$results = mysql_query("SELECT * FROM $this->table WHERE id = $id");
		while($row = mysql_fetch_array($results)){
			$this->id = $id;
			$this->name = $row['name'];
			$this->image = $row['thumb'];
			$this->text = $row['description'];
			$this->comments = $row['comments'];
			$this->gallery = 'gallery/hotels/'.$row['gallery'];
			if($_GET['page'] === 'attractions'){
				$this->gallery = 'gallery/places/'.$row['gallery'];
			}
			if($_GET['page'] === 'packages'){
				$this->gallery = 'gallery/packages/'.$row['gallery'];
			}
			$this->realGallery = $row['gallery'];
			$this->longitude = $row['longitude'];
			$this->latitude = $row['latitude'];
			$this->owner = $row['email'];
			$this->phone = $row['phone'];
			$this->order = $row['ordering'];
			$this->rooms[0][0] = $row['cat1'];
			$this->rooms[1][0] = $row['cat2'];
			$this->rooms[2][0] = $row['cat3'];
			$this->rooms[3][0] = $row['cat4'];
			$this->rooms[0][1] = $row['descr1'];
			$this->rooms[1][1] = $row['descr2'];
			$this->rooms[2][1] = $row['descr3'];
			$this->rooms[3][1] = $row['descr4'];
			$this->location = $row['location'];
			$results1 = mysql_query("SELECT * FROM nearby WHERE hotel = $this->id");
			if($_GET['page'] === 'attractions'){
				$results1 = mysql_query("SELECT * FROM nearby WHERE discover = $this->id");
			}
			
			$i = 0;
			while($row1 = mysql_fetch_array($results1)){
				$this->nearbyLocations[$i] = $row1['discover'];
				if($_GET['page'] === 'attractions'){
					$this->nearbyLocations[$i] = $row1['hotel'];
				}
				$i++;		
			}
		}
	}
	function getOwner(){
		return $this->owner;
	}
	function getPhone(){
		return $this->phone;
	}
	function getOrder(){
		return $this->order;
	}
	function getName(){
		return $this->name;
	}
	function getComments(){
		return $this->comments;
	}
	function getProfileImage(){
		if($this->image != ''){
			return '<img style = "width:100%" src ="'.$this->gallery.'/'.$this->image.'" alt = "profile pic">';
		}
		else{
			return '<div style = "background:whitesmoke; height:300px; font-weight:bold; font-size:10px">Add a picture or other content by pressing the edit button</div>';
		}
	}
	
	function getMap(){
		$map = '
		<div style = "width:300px; height:300px; overflow: hidden">
		
		<iframe width = 100% height = 100% style = "border-width:0px; overflow:hidden" src = "profiles/googleMap.php?long='.$this->longitude.'&lat='.$this->latitude.'&hotelname='.$hotelName.'">
		
		</iframe>
		</div>';
		return $map;
	}
	function getText(){
		return $this->text;
	}
	function getPrices(){
		return $this->rooms;
	}
	function getRooms(){
		$rooms = '<table style = "font-size:12px">';
		if($this->rooms[0][0] > 0){
			$rooms = $rooms.'<tr><td><div style="padding-right:20px;float:left"><a href = "javascript:void(0)" onclick = "showRoomPhotos(gallery,\''.$this->name.'\',1,\''.$this->rooms[0][0].'\')">'.$this->rooms[0][0].' Rwf</a></div></td><td><div>'.$this->rooms[0][1].'</div></td></tr>';
		}
		if($this->rooms[1][0] > 0){
			$rooms = $rooms.'<tr><td><div style="padding-right:20px;float:left"><a href = "javascript:void(0)" onclick = "showRoomPhotos(gallery,\''.$this->name.'\',1,\''.$this->rooms[1][0].'\')">'.$this->rooms[1][0].' Rwf</a></div></td><td><div>'.$this->rooms[1][1].'</div></td></tr>';
		}
		if($this->rooms[2][0] > 0){
			$rooms = $rooms.'<tr><td><div style="padding-right:20px;float:left"><a href = "javascript:void(0)" onclick = "showRoomPhotos(gallery,\''.$this->name.'\',1,\''.$this->rooms[2][0].'\')">'.$this->rooms[2][0].' Rwf</a></div></td><td><div>'.$this->rooms[2][1].'</div></td></tr>';
		}
		if($this->rooms[3][0] > 0){
			$rooms = $rooms.'<tr><td><div style="padding-right:20px;float:left"><a href = "javascript:void(0)" onclick = "showRoomPhotos(gallery,\''.$this->name.'\',1,\''.$this->rooms[3][0].'\')">'.$this->rooms[3][0].' Rwf</a></div></td><td><div>'.$this->rooms[3][1].'</div></td></tr>';
		}
		$rooms = $rooms.'</table>';
		return $rooms;
	}
	function getOldNearby(){
		$nearby = '';
		$j = count($this->nearbyLocations);
		$i = 0;
		if ($j > $i){
			$query = "SELECT * FROM discover";
			if($_GET['page'] === 'attractions'){
				$query = "SELECT * FROM hotels";
			}
			
			while($i < $j){
				if($i == 0)	{			
					$query = $query.' WHERE id = '.$this->nearbyLocations[$i];
				}
				else{
					$query = $query.' OR id = '.$this->nearbyLocations[$i];
				}
				$i++;
			}
		
			
			$results = mysql_query($query);
			while($row = mysql_fetch_array($results)){
				if($_GET['page'] === 'accomodation'){
					$nearby = $nearby.'<a href = "?page=attractions&profile='.$row['id'].'"><div class = hotelButtons style = "float:left; overflow:hidden; height:120px; width:120px;text-align:center; margin:5px;font-size:10px"><img height = 90px src = "gallery/places/'.$row['gallery'].'/'.$row['thumb'].'"><br>'.$row['name'].'</div></a>';
				}
				if($_GET['page'] === 'attractions'){
					$nearby = $nearby.'<a href = "?page=accomodation&profile='.$row['id'].'"><div class = hotelButtons style = "float:left; overflow:hidden; height:120px; width:120px;text-align:center; margin:5px;font-size:10px"><img height = 90px src = "gallery/hotels/'.$row['gallery'].'/'.$row['thumb'].'"><br>'.$row['name'].'</div></a>';
				}
			}
		}
		return '<table><tr><td>'.$nearby.'</td></tr></table>';
	}
	function getNearby(){
		$nearby1 = '';
		$nearby2 = '';
		$this->location = str_replace(', ',',',$this->location);
		$nearby = explode(',',$this->location);
		$long = count($nearby);
		$results = '';
		$results1 = '';
		//echo 'Found';
		$numb = 0;
		$numb1 = 0;
		while($long > 0 and $numb < 10){
			//echo $long;
			$found[$numb];
			$found1[$numb1];
			if($_GET['page'] === 'attractions'){
				$query = "SELECT * FROM packages WHERE location LIKE '%{$nearby[$long-1]}%'";
				$query1 = "SELECT * FROM discover WHERE location LIKE '%{$nearby[$long-1]}%' AND id != {$_GET['profile']}";
				$i = 0;
				while($i < $numb){
					$query = $query." AND id != $found[$i]";
					if($found1[$i] != ''){
						//$query1 = $query1." AND id != $found1[$i]";
					}
					$i++;
				}
				$i = 0;
				while($i < $numb1){
					//$query = $query." AND id != $found[$i]";
					//if($found1[$i] != ''){
					$query1 = $query1." AND id != $found1[$i]";
					//}
					$i++;
				}
				
				$query = $query." ORDER BY id DESC";
				$query1 = $query1." ORDER BY id DESC";
				$results = mysql_query($query);
				$results1 = mysql_query($query1);
			}
			if($_GET['page'] === 'accomodation'){
				$query = "SELECT * FROM hotels WHERE location LIKE '%{$nearby[$long-1]}%' AND id != {$_GET['profile']}";
				$query1 = "SELECT * FROM discover WHERE location LIKE '%{$nearby[$long-1]}%'";
				$i = 0;
				while($i < $numb){
					$query = $query." AND id != $found[$i]";
					if($found1[$i] != ''){
						//$query1 = $query1." AND id != $found1[$i]";
					}
					$i++;
				}
				$i = 0;
				while($i < $numb1){
					//$query = $query." AND id != $found[$i]";
					//if($found1[$i] != ''){
					$query1 = $query1." AND id != $found1[$i]";
					//}
					$i++;
				}
				
				$query = $query." ORDER BY id DESC";
				$query1 = $query1." ORDER BY id DESC";
				$results = mysql_query($query);
				$results1 = mysql_query($query1);
				
			}
			if($_GET['page'] === 'packages'){
				$query = "SELECT * FROM packages WHERE location LIKE '%{$nearby[$long-1]}%'";
				$query1 = "SELECT * FROM discover WHERE location LIKE '%{$nearby[$long-1]}%'";
				$i = 0;
				while($i < $numb){
					$query = $query." AND id != $found[$i]";
					if($found1[$i] != ''){
						//$query1 = $query1." AND id != $found1[$i]";
					}
					$i++;
				}
				$i = 0;
				while($i < $numb1){
					//$query = $query." AND id != $found[$i]";
					//if($found1[$i] != ''){
					$query1 = $query1." AND id != $found1[$i]";
					//}
					$i++;
				}
				$query = $query." AND id != {$_GET['profile']}";
				$query = $query." ORDER BY id DESC";
				$query1 = $query1." ORDER BY id DESC";
				$results = mysql_query($query);
				$results1 = mysql_query($query1);
			}
			
			while($row = mysql_fetch_array($results)){
				if($this->location === ''){
					break;
				}
				$found[$numb] = $row['id'];
				$numb++;
				if($_GET['page'] === 'accomodation'){
					$nearby1 = $nearby1.'<a href = "?page=accomodation&profile='.$row['id'].'"><div class = hotelButtons style = "float:left; overflow:hidden; height:120px; width:120px;text-align:center; margin:5px;font-size:10px"><img height = 90px src = "gallery/hotels/'.$row['gallery'].'/'.$row['thumb'].'"><br>'.$row['name'].'</div></a>';
				}
				if($_GET['page'] === 'attractions'){
					//echo 'Found';
					$nearby1 = $nearby1.'<a href = "?page=packages&profile='.$row['id'].'"><div class = hotelButtons style = "float:left; overflow:hidden; height:120px; width:120px;text-align:center; margin:5px;font-size:10px"><img height = 90px src = "gallery/packages/'.$row['gallery'].'/'.$row['thumb'].'"><br>'.$row['name'].'</div></a>';
				}
				if($_GET['page'] === 'packages'){
					//echo 'Found';
					$nearby1 = $nearby1.'<a href = "?page=packages&profile='.$row['id'].'"><div class = hotelButtons style = "float:left; overflow:hidden; height:120px; width:120px;text-align:center; margin:5px;font-size:10px"><img height = 90px src = "gallery/packages/'.$row['gallery'].'/'.$row['thumb'].'"><br>'.$row['name'].'</div></a>';
				}
			}
			//if($_GET['page'] === 'packages'){
				while($row = mysql_fetch_array($results1)){
					if($this->location === ''){
						break;
					}
					$found1[$numb1] = $row['id'];
					$numb1++;
					if($_GET['page'] === 'accomodation'){
						$nearby2 = $nearby2.'<a href = "?page=attractions&profile='.$row['id'].'"><div class = hotelButtons style = "float:left; overflow:hidden; height:120px; width:120px;text-align:center; margin:5px;font-size:10px"><img height = 90px src = "gallery/places/'.$row['gallery'].'/'.$row['thumb'].'"><br>'.$row['name'].'</div></a>';
					}
					if($_GET['page'] === 'attractions'){
						//echo 'Found';
						$nearby2 = $nearby2.'<a href = "?page=attractions&profile='.$row['id'].'"><div class = hotelButtons style = "float:left; overflow:hidden; height:120px; width:120px;text-align:center; margin:5px;font-size:10px"><img height = 90px src = "gallery/places/'.$row['gallery'].'/'.$row['thumb'].'"><br>'.$row['name'].'</div></a>';
					}
					if($_GET['page'] === 'packages'){
						//echo 'Found';
						$nearby2 = $nearby2.'<a href = "?page=attractions&profile='.$row['id'].'"><div class = hotelButtons style = "float:left; overflow:hidden; height:120px; width:120px;text-align:center; margin:5px;font-size:10px"><img height = 90px src = "gallery/places/'.$row['gallery'].'/'.$row['thumb'].'"><br>'.$row['name'].'</div></a>';
					}
				}
			//}
			$long--;
		}
		if($_GET['page'] != 'accomodation'){
			return '<table><tr><td>Related Deals<td></tr></td></tr><tr><td>'.$nearby1.'</td></tr></table><table><tr><td>Nearby Attractions</td></tr><tr><td>'.$nearby2.'</td></tr></table>';
		}
		else{
			return '<table><tr><td>Nearby Attractions<td></tr></td></tr><tr><td>'.$nearby2.'</td></tr></table><table><tr><td>Nearby Accommodations</td></tr><tr><td>'.$nearby1.'</td></tr></table>';
		}
	}
	function getLocation(){
		return $this->location;
	}
	function getLongitude(){
		return $this->longitude;
	}
	function getLatitude(){
		return $this->latitude;		
	}
	function getGallery(){
		return $this->realGallery;
	}
	function getGalleryLink(){
		return $this->gallery;
	}
	function setLocation($id, $newLocation){
		mysql_query("UPDATE $this->table SET location = '$newLocation' WHERE id = $id");
	}
	function setName($id, $newName){
		mysql_query("UPDATE $this->table SET name = '$newName' WHERE id = $id");
	}
	function setOwner($id, $newOwner){
		mysql_query("UPDATE $this->table SET email = '$newOwner' WHERE id = $id");
	}
	function setPhone($id, $newOwner){
		mysql_query("UPDATE $this->table SET phone = '$newOwner' WHERE id = $id");
	}
	function setOrder($id, $newOwner){
                echo $newOwner.' Owner';
                if($newOwner != 0){
		    mysql_query("UPDATE $this->table SET ordering = (ordering + 1) WHERE ordering >= $newOwner");
		    mysql_query("UPDATE $this->table SET ordering = '$newOwner' WHERE id = $id");
                }
		else{
		    $this->removeOrder($id);			
		}
	}
	function removeOrder($id){
		echo 'Reseting order';
		mysql_query("UPDATE $this->table SET ordering = '' WHERE id = $id");
	}
	
	function setText($id, $newText){
		mysql_query("UPDATE $this->table SET description = '$newText' WHERE id = $id");
	}
	function addPicture($picture){
		$file = $picture['newphotos']['name'];
		$file = str_replace(' ','', $file);
		$dir = $this->gallery.'/'.$file;
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
	function setProfilePicture($id, $picture){
		$file = $picture['photos']['name'];
		$file = str_replace(' ','', $file);
		$dir = $this->gallery.'/'.$file;
		//echo $dir;
		//echo 'Photo Here'.$file;
		$cp = false;
		if ($file != '')
			$cp = copy($picture['photos']['tmp_name'], $dir);
		if($cp){
			//echo 'Photo Updated';
			
			mysql_query("UPDATE $this->table SET thumb = '$file' WHERE id = $id");
			$gpsInfo = $this->getGpsInfo($dir);
			if($this->longitude === '' or $this->latitude === '' and $gpsInfo[0] != ''){				
				//echo 'Coordinates found: '.$gpsInfo[0].' '.$gpsInfo[1];
				$this->setCoordinates($id, $gpsInfo[1], $gpsInfo[0]);
			}
			
		}
		else{
			//echo 'Update failed';		
		}
		
	}
	function deleteImage($img){
		unlink($this->gallery.'/'.$img);
		echo 'Image deletede';
	}
	function changeGallery($id, $gallery){
		if($gallery != $this->realGallery){
			//echo $this->gallery;
			if($_GET['page'] === 'accomodation'){
				mkdir('gallery/hotels/'.$gallery,0755);	
			}	
			if($_GET['page'] === 'attractions'){
				echo 'Creation of new lib';
				mkdir('gallery/places/'.$gallery,0755);
			}
			if($_GET['page'] === 'packages'){
				echo 'Creation of new lib';
				mkdir('gallery/places/'.$gallery,0755);
			}
			mysql_query("UPDATE $this->table SET gallery = '$gallery' WHERE id = $id");
		}
	}
	function setCoordinates($id, $longitude, $latitude){
		//echo 'Setting coordinates '.$longitude.' '.$latitude;		
		mysql_query("UPDATE $this->table SET longitude = '$longitude', latitude = '$latitude' WHERE id = $id");
	}
	function setPrice($id, $price, $description){
		if($price[1] == ''){
			$price[1] = 0;
		}	
		$query = "UPDATE $this->table SET $price[0] = $price[1], $description[0] = '$description[1]' WHERE id = $id";
		//echo $query;	
		mysql_query($query) or die(mysql_error());
		
	}
	function registerAccomodation($name, $location, $email, $lang){
		$email = str_replace(' ','',$email);
		$t = time();
		//mysql_query("INSERT INTO $this->table(name, location, email, gallery, language) VALUES('$name', '$location', '$email', '$t','$lang')") or die(mysql_error());
		if($_GET['page'] === 'accomodation'){
			echo 'Creation of new lib';
			mkdir('gallery/hotels/'.$t,0755);
		}
		else if($_GET['page'] === 'attractions'){
			echo 'Creation of new lib';
			mkdir('gallery/places/'.$t,0755);
		}
		else if($_GET['page'] === 'packages'){
			echo 'Creation of new lib';
			mkdir('gallery/packages/'.$t,0755);
		}
		else{
			//echo 'Creation of a new lib from sms';			
			mkdir('../gallery/packages/'.$t,0755);
			$this->table = 'packages';
		}
		
		mysql_query("INSERT INTO $this->table(name, location, email, gallery, language) VALUES('$name', '$location', '$email', '$t','$lang')") or die(mysql_error());
		
		$id = -1;
		if($row = mysql_fetch_array(mysql_query("SELECT * FROM $this->table ORDER BY id DESC"))){
			$id = $row['id'];
			//break;
		}
		return $id;
		
	}
	function deleteProfile($id){
		mysql_query("DELETE FROM $this->table WHERE id = $id");
	}
	function getGpsInfo($image){
		include 'profiles/exif.php';
		$gpsInfo = array();
		//$latitude = '';
		//$longitude = '';
		$gpsInfo[0] = $latitude;
		$gpsInfo[1] = $longitude;
		
		
		return $gpsInfo;
	}
	function postComments($id, $comment){
		$comment = strip_tags($comment,'<a><b><br>');
		//echo 'Trying to post';
		$oldComments = $this->comments;
		$comment = $oldComments.$comment;
		mysql_query("UPDATE $this->table SET comments = '$comment' WHERE id = $id") or die(mysql_error());
	}
	function setComments($id, $comment){
		echo 'Setting comments';
		mysql_query("UPDATE $this->table SET comments = '$comment' WHERE id = $id") or die(mysql_error());
	}
	function sendEmail($emails, $text){
	
		$to      = $emails;
		$names = $_POST['names'];
		$subject = 'Invitation from:'.$names.' '.$this->name;
		$str = $str = $_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"];
		$message = $names.' invited you to read an article: '.$text.': <br><br><a href = "'.$str.'">'.$str.'</a>';
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$headers .= 'From: invitation@twihute.com' . "\r\n" .
				'Reply-To: '.$this->owner.'' . "\r\n" .
				'X-Mailer: PHP/' . phpversion();
		
		$sent = mail($to, $subject, $message, $headers);
		if($sent){
			echo 'Your invitations are sent to emails.';
		}
		else{
			if($to != ''){
				echo 'We have a connection error. Please try again';
			}
			
			//echo $str;
		}
				
	}
	
	function sendSms($numbers, $text){
		$to      = $numbers;
		$names = $_POST['names'];
		$str = $str = $_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"];
		$str = str_replace('&','%26', $str);
		$subject = 'Invitation from:'.$str.' '.$this->name.'. By '.$names;
		
		$message = $subject.': "'.$text.'"';
		
		//echo $message;
		include 'profiles/bulksms.php';
		$to = str_replace(', ',',',$to);
		
		$to = str_replace(' ,',',',$to);
		
		$phones = explode(',', $to);
		$i = 0;
		$len = count($phones);
		while($i < $len){
			//echo $phones[$i];
			$sent =sendText($phones[$i], $message);
			$i++;
		}
		if($sent){
			echo 'Your invitations are sent to Sms.';
		}
		else{
			echo 'Your invitations are not sent to Sms';
				
			//echo $str;
		}
	}
	
}
