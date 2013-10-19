<?php 


class Project {
	
	private $id;
	private $cooperativeName;
	private $projectName;
	private $description;
	private $amount;
	private $phone;
	
	function __construct(){
		
	}
	function createProject(){
		mysql_query("INSERT INTO project(cooperative_name, project_name, description, amount, phone_contact) 
				                         VALUES('$this->cooperativeName', '$this->projectName', '$this->description', $this->amount, $this->amount)");
	}
	function loadProject($id){
		$results = mysql_query("SELECT * FROM project WHERE id = $id");
		$project = array();
		while ($row = mysql_fetch_array($results)){
			$project = $row;
			$this->cooperativeName = $row['cooperative_name'];
			$this->projectName = $row['project_name'];
			$this->description = $row['description'];
			$this->amount = $row['amount'];
			$this->phone = $row['phone'];
		}
	}
	
	function getCooperativeName(){
		return $this->cooperativeName;
	}
	function getProjectName(){
		return $this->projectName;
	}
	function getAmount(){
		return $this->amount;
	}
	function getPhone(){
		return $this->phone;
	}
}

?>