<?php
class Investor {
	private $names;
	private $project;
	private $amount;
	
	function __construct(){
		
	}
	function createInvestor(){
		mysql_query("INSERT INTO investor(names, project_id, amount) VALUES('$this->names', $this->project, $this->amount)");
	}
	function getNames(){
		return $this->names;
	}
	function getProject(){
		return $this->project;
	}
	function getAmount(){
		return $this->amount;
	}
	
	function setNames($name){
		$this->names = $name;
	}
	function setProject($project){
		$this->project = $project;		
	}
	function setAmount($amount){
		$this->amount = $amount;
	}
}


?>