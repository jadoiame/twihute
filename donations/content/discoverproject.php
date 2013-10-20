
<div class = "container" style = "padding-left:30px; padding-right:30px">

<?php 
include 'donations/classes/investor.php';
if (isset($_POST['newpledge'])){
	$names = $_POST['names'];
	$project = $_POST['project'];
	$amount = $_POST['amount'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	
	
	$investor = new Investor();
	$investor->setNames($names);
	$investor->setProject($project);
	$investor->setAmount($amount);
	$investor->setEmail($email);
	$investor->setPhone($phone);
	
	$investor->createInvestor();
	echo "<div class = ''><div class = 'alert alert-success'>Your pledge submission was created successfully. Thank you!</div></div>";
}
?>


<ul class="media-list">


<?php 

include 'donations/classes/discoverproject.php';
$project = new Project();
$projects = $project->loadProjects();

$len = count($projects);
$i = 0;

while ($i < $len){
   $proj = $projects[$i];
?>
  <li class="media">
  
    <a class="pull-left" href="#">
      <img style = "width:200px" class="media-object" src="donations/content/img/<?php echo $proj->getProjectImage()?>" alt="...">
    </a>
    <div class="media-body">
      <h4 class="media-heading"><a href = "?page=discoverproject&open=<?php echo $proj->getId()?>"><?php echo $proj->getProjectName()?></a></h4>
      
      <div><span style = "color:gray">By: </span><span style = "font-weight:bold"><?php echo $proj->getCooperativeName()?></span></div>
 	<br>	  
       
      
      <?php echo $proj->getDescription()?>
    </div>
    
    
    
    
    <div style = "font-weight:bold; margin-left:200px">
   <br>    Goal: 	    <span class="badge"><?php echo number_format($proj->getAmount())?> Rwf</span>
	  &nbsp&nbsp&nbsp&nbsp
	Raised:  <span class="badge"><?php echo number_format($proj->getRaisedAmount())?> Rwf</span> 
	    
	
	  <button class = "btn btn-success pull-right btn-small" onclick = "$('#pledge<?php echo $i?>').show('slow')">Fund</button>
	</div>
	<br><br>
    <div id = pledge<?php echo $i?> class = "well pull-right col-lg-6" style = "position:absolute; right:5%;display:none; margin-top:-100px">    
    <div class = "panel-heading"><h3 style = "margin:0px; padding:0px">My pledge</h3></div>
    <form method = post>
    <input type = hidden name = newpledge value = true>
    <input type = hidden name = project value = <?php echo $proj->getId()?>>
    <label>Your full name</label>
    <div class="input-group input-group-lg">
	    <span class = "input-group-addon"></span>
		<input name = names type="text" class="form-control input-lg" placeholder="Names">
	</div>
	<label>Email</label>
    <div class="input-group input-group-lg">
	    <span class = "input-group-addon"></span>
		<input name = email type="text" class="form-control input-lg" placeholder="Email address">
	</div>
	<label>Phone</label>
    <div class="input-group input-group-lg">
	    <span class = "input-group-addon"></span>
		<input name = phone type="text" class="form-control input-lg" placeholder="Phone number">
	</div>
	<label>Amount</label>
    <div class="input-group input-group-lg">
	    <span class = "input-group-addon"></span>
		<input name = amount type="text" class="form-control input-lg" placeholder="Amount">
	</div>
	<hr>
	
	<input class = "btn btn-success" type = submit value = "Fund">
	
	<input class = "btn btn-primary" type = button value = "Cancel" onclick = "$('#pledge<?php echo $i?>').hide('slow')">
	
    </form>
    </Div>
    <hr>
  </li>
 
  <?php 
  $i++;
  }
  ?>
</ul>
</div>