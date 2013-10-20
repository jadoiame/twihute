<?php

class Project {
	private $id;
	private $profileImage = '';
	private $cooperativeName;
	private $projectName;
	private $description;
	private $amount = 0;
	private $raisedAmount = 0;
	
	function __construct(){
		
	}
	function loadProjects(){
		$projects = array();
		$i = 0;
		$results = mysql_query("SELECT * FROM project");
		while ($row = mysql_fetch_array($results)){
			$projects[$i] = new Project();
			$projects[$i]->setProjectName($row['project_name']);
			$projects[$i]->setCooperativeName($row['cooperative_name']);
			$projects[$i]->setDescription($row['description']);
			$projects[$i]->setAmount($row['amount']);
			$projects[$i]->setId($row['id']);
			$projects[$i]->setProfileImage($row['profile_img']);
			$amt = $projects[$i]->loadRaisedAmount($row['id']);
			$projects[$i]->setRaisedAmount($amt);
			$i++;
		}
		
		return $projects;
	}
	
	function sortProjects(){
		$projects = array();
		$i = 0;
		$results = mysql_query("SELECT * FROM project ORDER BY raised_amount DESC");
		while ($row = mysql_fetch_array($results)){
			$projects[$i] = new Project();
			$projects[$i]->setProjectName($row['project_name']);
			$projects[$i]->setCooperativeName($row['cooperative_name']);
			$projects[$i]->setDescription($row['description']);
			$projects[$i]->setAmount($row['amount']);
			$projects[$i]->setId($row['id']);
			$projects[$i]->setProfileImage($row['profile_img']);
			$amt = $projects[$i]->loadRaisedAmount($row['id']);
			$projects[$i]->setRaisedAmount($amt);
			$i++;
		}
	
		return $projects;
	}
	
	function loadProject($id){
		$project;
		$i = 0;
		$results = mysql_query("SELECT * FROM project WHERE id = $id");
		while ($row = mysql_fetch_array($results)){
			$project = new Project();
			$project->setProjectName($row['project_name']);
			$project->setCooperativeName($row['cooperative_name']);
			$project->setDescription($row['description']);
			$project->setAmount($row['amount']);
			$project->setId($row['id']);
			$project->setProfileImage($row['profile_img']);
			
		}
		
		//echo $project->getProjectName();
	
		return $project;
	}
	function loadRaisedAmount($id){
		$results = mysql_query("SELECT * FROM investor WHERE project_id = $id");
		$amount = 0;
		while ($row = mysql_fetch_array($results)){
			$amount += $row['amount'];
		}
		return $amount;
	}
	function saveProject(){
		mysql_query("UPDATE project SET project_name = '$this->projectName', description = '$this->description', profile_img = '$this->profileImage' WHERE id = $this->id");
	}
		
	function deleteProject(){
		mysql_query("DELETE FROM project WHERE id = $this->id");
	}
	
	
	
	function setProjectName($name){
		$this->projectName = $name;		
	}
	function setCooperativeName($name){
		$this->cooperativeName = $name;
	}
	function setDescription($description){
		$this->description = $description;
	}
	function setAmount($amount){
		$this->amount = $amount;
	}
	function setRaisedAmount($amount){
		$this->raisedAmount = $amount;
	}
	function setId($id){
		$this->id = $id;
	}
	function setUploadedProfileImage($image){		
		$thumbnail = $_FILES['projectimage']['name'];
		$c = copy($_FILES['projectimage']['tmp_name'], "donations/content/img/".$thumbnail);
		$this->profileImage = $thumbnail;		
	}
	function setProfileImage($image){
		$this->profileImage = $image;
	}
	
	
	function getProjectName(){
		return $this->projectName;
	}
	function getCooperativeName(){
		return $this->cooperativeName;
	}
	function getDescription(){
		return $this->description;
	}
	function getAmount(){
		return $this->amount;
	}
	function getRaisedAmount(){
		return $this->raisedAmount;
	}
	function getId(){
		return $this->id;
	}
	function getProjectImage(){
		return $this->profileImage;
	}
	
	
	
	
}

?>