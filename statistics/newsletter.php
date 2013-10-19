<script type="text/javascript" src = "profiles/ckeditor/ckeditor.js">

</script>

<?php 
if (isset($_POST['message'])){
	$newsLetter = new NewsLetter();
	$newsLetter->setSubject($_POST['subject']);
	$newsLetter->setMessage($_POST['message']);
	$newsLetter->broadcastEmails();
	//$res = send_simple_message();
	//echo $res;
	
	
}
class NewsLetter{
	private $emails = array();
	private $names = array();
	private $subject;
	private $message;
	
	function getAllEmails(){
		$results = mysql_query("SELECT * FROM users WHERE email != ''");
		$i = 0;
		while ($row = mysql_fetch_array($results)){
			
			$this->emails[$i] = $row['email'];
			$this->names[$i] = $row['fname'].' '.$row['lname'];
			//echo $this->names[$i].' '.$this->emails[$i].'<br>';
			$i++;
		}
	}	
	function broadcastEmails(){
		$this->getAllEmails();
		$len = count($this->emails);
		$i = 0;
		while($i < $len){
			$message = str_replace('%name%',$this->names[$i],$this->message);
			//echo $message;
			$this->sendEmail($this->emails[$i++], $this->subject, $message);
		}
	}
	
	function sendEmail($email, $subject, $message){
		$subject = $subject;
		$message = $message;		
		$headers = "Content-type: text/html\r\nFrom:info@tankyu.rw\nReply-To:info@tankyu.rw\r\n";
		$headers .= "Return-Path: Information <info@tankyu.rw>\r\n";
		$headers .= "Organization: Tankyu Rwanda\r\n";
		
		
		//$emailsent = @mail("$email", "$subject", "$message",$headers);
		$emailsent = $this->send_mailgun_message("$email", "$subject", "$message");
		if ($emailsent){
			echo 'Email sent to: '.$email.'<br>';
		}
		else{
			echo 'Failure to send to: '.$email.'<br>';
		}
	}
	function setMessage($message){
		$this->message = $message;
	}
	function setSubject($subject){
		$this->subject = $subject;
	}
	
	function send_mailgun_message($email, $subject, $message) {
		$ch = curl_init();
	
		curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
		curl_setopt($ch, CURLOPT_USERPWD, 'api:key-609qfqdijz4r98qvzf0x287ndlbtgme3');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
		curl_setopt($ch, CURLOPT_URL, 'https://api.mailgun.net/v2/tankyu.mailgun.org/messages');
		curl_setopt($ch, CURLOPT_POSTFIELDS, array('from' => 'Tankyu Information <info@tankyu.rw>',
		'to' => $email,
		'subject' => $subject,
		'text' => $message,
		'html' => '<html>'.$message.'</html>',));
	
		$result = curl_exec($ch);
		curl_close($ch);
		//echo 'Awesome, this is sent';
		//echo $result;
		if($result){
			//echo 'Awesome, this is sent';
		}
		else{
			//echo 'Failure to send';
		}
	
		return $result;
	}
	
	
	
}





?>


<div style = "margin-top:50px">
<table>
<tr>
<td valign = top>
<a href = "?page=statistics&report=messages&action=compose" class = hotelButtons style = "color:white; background:orange; padding-left:50px; padding-right:50px; font-size:12px;">Compose</a><br><br>
<!-- 
<a href = "?page=statistics&report=messages&action=sent" class = hotelButtons style = "color:black; font-size:12px; padding-right:120px">Sent</a><br><br>
<a href = "?page=statistics&report=messages&action=draft" class = hotelButtons style = "color:black; font-size:12px; padding-right:110px">Drafts</a>
 -->
</td>
<td valign = top style = "padding-left:30px">
<?php 
if (!isset($_GET['action'])){
?>
<div style = "width:400px; text-align:justify">
<p><big><strong>Tankyu E-News Letter</strong></big></p>

<p>Broadcast emails to all the registered member of Tankyu.rw</p>

<p>This is a light weight simple news letter that sends emails to all the members of this website. Compose your email in the nicely designed rich text editor, add pictures and links from different sources and keep your members posted with relevant content.</p>

<p>&nbsp;</p>
</div>

<?php 
}
else if ($_GET['action'] == 'compose'){
?>
<form method = post style = "font-size:12px">
To:<br>
<input value = "All contacts" readonly = readonly name = emails class = hotelButtons style = "width:500px; border-color:gray"><br>
Subject:<Br>
<input name = subject class = hotelButtons style = "width:500px; border-color:gray"><br>
Text<br>
<textarea class = ckeditor id = message name = message style = "width:500px; height:200px; border-color:orange; font-weight:normal"></textarea>


<br>
<input type = submit class = hotelButtons value = "Send" style = "background:#084B8A; color:white">
 | 
<a class = hotelButtons style = "color:black" href = "?page=statistics&report=messages">Cancel</a>
</form>
<?php 
}
?>

</td>

</tr>


</table>

</div>

