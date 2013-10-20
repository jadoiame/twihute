<?php
class Investor {
	private $names;
	private $project;
	private $amount;
	private $email;
	private $phone;
	
	function __construct(){
		
	}
	function createInvestor(){
		mysql_query("INSERT INTO investor(names, project_id, amount, email, phone_contact) VALUES('$this->names', $this->project, $this->amount, '$this->email', '$this->phone')");
		mysql_query("UPDATE project SET raised_amount = 1 WHERE raised_amount = ''") or die(mysql_error());
		mysql_query("UPDATE project SET raised_amount = (raised_amount + 1) WHERE id = $this->project") or die(mysql_error());
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
	function setEmail($email){
		$this->email = $email;
	}
	function setPhone($phone){
		$this->phone = $phone;
	}
}


?>