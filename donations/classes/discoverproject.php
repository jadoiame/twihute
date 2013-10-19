<?php

class Project {
	private $id;
	private $cooperativeName;
	private $projectName;
	private $description;
	private $amount = 0;
	
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
			
		}
		
		//echo $project->getProjectName();
	
		return $project;
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
	function setId($id){
		$this->id = $id;
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
	function getId(){
		return $this->id;
	}
	
	
	
}

?>