<?php


class Statistics {
	private $visits;
	private $users;
	
	function loadVisits(){
		$date1 = date('y-m-d');
		$date2 = date('y-m-d');
		
		$results = mysql_query("SELECT * FROM visitstats WHERE day >= '$date1' AND duration > 0 ORDER BY id DESC");
		if (isset($_POST['date1'])){
			$date1 = $_POST['date1'];
			$date2 = $_POST['date2'];
			$results = mysql_query("SELECT * FROM visitstats WHERE day >= '$date1' AND day <= '$date2' AND duration > 0 ORDER BY id DESC");
		}
		$i = 0;
		while($row = mysql_fetch_array($results)){
			$this->visits[$i] = $row;
			$i++;
		}
	}
	function loadUsers(){
		$results = mysql_query("SELECT * FROM users");
		$i = 0;
		while($row = mysql_fetch_array($results)){
			$this->users[$i] = $row;
			$i++;
		}
	}
	function getVisitStatistics(){
		$len = count($this->visits);
		$i = 0;
		
		echo '<table style = "float:left; margin-right:50px; font-size:11px; border-collapse: separate; border-spacing: 10px 5px;"><tr style = "font-weight:bold; height:30px">';
		echo '<td>No</td><td>Time</td><td>Visitor</td><td>Visitor No.</td><td>Duration</td><tr>';
		while($i < $len){
			echo '<tr><td>'.($i+1).'</td><td>'.$this->visits[$i]['day'].'</td><td>'.$this->visits[$i]['visitor'].'</td><td align = right>'.$this->visits[$i]['visits'].'</td><td align = right>'.$this->visits[$i]['duration'].' Sec</td></tr>';
			$i++;
		}
		echo '</tr></table>';
		$this->getTopTenVisitors();
	}
	
	function getTopTenVisitors(){		
		?>
		
		<div style = "padding:10px;">
		<table style = " border-collapse: separate; border-spacing: 10px 5px;">		
		<tr>
		<td colspan = 5>
		<div style = "font-weight:bold;">
		Top Ten Visitors
		</div>
		</td></tr>
		
		
		<tr style = "font-weight:bold"><td>No</td><td>Email</td><td>Duration</td></tr>
		
		
		
		
		
		
		<?php 
		
		$emails = $this->getVisitorsEmails();
		$sortedEmails = $this->sortEmails($emails);
		$i = 0;
		$len = count($emails);
		while ($i < $len){
			echo '<tr><td>'.($i+1).'</td><td>'.$sortedEmails[$i][0].'</td><td>'.$sortedEmails[$i][1].' Sec.</td></tr>';
			if ($i > 9){
				break;
			}
			$i++;
		}
		
		
		?>
		</table>
		
		
		</div>
		<?php 
		
		
	}
	
	function getVisitorsEmails(){
		$i = 0;
		$len = count($this->visits);
		$foundEmails = array();
		$j = 0;
		while ($i < $len){
			if(!$this->findEmail($this->visits[$i]['visitor'], $foundEmails) and $this->visits[$i]['visitor'] != ''){
				$foundEmails[$j] = $this->visits[$i]['visitor'];
				$j++;
				//echo $this->visits[$i]['visitor'].' '.$this->getTotalDuration($this->visits[$i]['visitor']).'<br>';
			}
			
			$i++;
		}
		return $foundEmails;
	}
	function sortEmails($emails){
		$emails_duration = array();
		$durations = array();
		$i = 0;
		$len = count($emails);
		while ($i < $len){
			$durations[$i] = $this->getTotalDuration($emails[$i]);
			$emails_duration[$i][0] = $emails[$i];
			$emails_duration[$i][1] = $durations[$i];
			$i++;
		}
		$temp = 0;
		$i = 0;
		while ($i < $len-1){
			$j = $i + 1;
			$temp = $emails_duration[$i];
			while ($j < $len){
				if ($emails_duration[$j][1] > $temp[1])	{
					$temp = $emails_duration[$j];
					$emails_duration[$j] = $emails_duration[$i];
					$emails_duration[$i] = $temp;
				}	
				$j++;	
			}			
			$i++;
		}
		return $emails_duration;
	}
	function findEmail($email, $emails){
		$i = 0;
		$len = count($emails);
		//echo $len;
		$found = false;
		while ($i < $len){
			if ($email == $emails[$i]){
				$found = true;
				break;
			}
			$i++;
		}
		return $found;
	}
	function getTotalDuration($email){
		$i = 0;
		$len = count($this->visits);
		$duration = 0;
		while ($i < $len){
			if ($email == $this->visits[$i]['visitor']){
				$duration += $this->visits[$i]['duration'];
			}
			$i++;
		}
		return $duration;
	}
	
	function getUsers(){
		$len = count($this->users);
		$i = 0;
		echo '<table style = "font-size:11px"><tr class = hotelButtons style = "font-weight:bold; height:30px">';
		echo '<td>No</td><td>First Name</td><td>Last Name</td><td>Email</td><td>Password/Privilege</td><td>Phone</td><td>Action</td></tr><tr>';
		while($i < $len){
			echo '<tr><td>'.($i+1).'</td><td>'.$this->users[$i]['fname'].'</td><td>'.$this->users[$i]['lname'].'</td><td>'.$this->users[$i]['email'].'</td><td><form method = post><input type = password name = password value = "'.$this->users[$i]['password'].'"><input name = privilege value = '.$this->users[$i]['privilege'].' ><input type = hidden name = id value = "'.$this->users[$i]['id'].'"><input type = submit value = "Save"></form></td><td style = "width:100px;text-align:right"><form method = post><input type = hidden name = deleteuser value = "'.$this->users[$i]['id'].'"><input id = "id'.$i.'" style = "display: none;background:maroon; color:white" class = hotelButtons type = submit value = "Delete"></form></td><td><a href = "javascript:void(0)" onclick = "$(\'#id'.$i.'\').show()">Delete</a></td></tr>';
			$i++;
		}
		echo '</tr></table>';
		//return $this->users;
	}
	function changePassword($id, $newPassword){
		mysql_query("UPDATE users SET password = '$newPassword' WHERE id = $id");
		echo 'New Password set!';
	}
	function changePrivilege($id, $newPrivilege){
		mysql_query("UPDATE users SET privilege = '$newPrivilege' WHERE id = $id");
		echo 'New Password set!';
	}
	function deleteUser($id){
		mysql_query("DELETE FROM users WHERE id = $id");
		echo 'User Deleted';
	}
	
	
}

?>