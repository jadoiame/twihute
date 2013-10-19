
<div class = "container" style = "padding-left:30px; padding-right:30px">

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
      <img style = "width:200px" class="media-object" src="donations/content/girinka.jpg" alt="...">
    </a>
    <div class="media-body">
      <h4 class="media-heading"><?php echo $proj->getProjectName()?></h4>
      <?php echo $proj->getDescription()?>
    </div>
    <div style = "font-weight:bold; margin-left:200px">
   <br>    Goal: 	    <span class="badge"><?php echo number_format($proj->getAmount())?></span>
	  &nbsp&nbsp&nbsp&nbsp
	Raised:  <span class="badge">600,000 Rwf</span> 
	    
	    
	  <button class = "btn btn-success pull-right btn-small" onclick = "$('#pledge').show('slow')">Invest</button>
	</div>
	<br><br>
    <div id = pledge class = "panel pull-right" style = "display:none">    
    <div class = "panel-heading">Invest</div>
    <form method = post>
    <label>Names</label>
    <div class="input-group input-group-lg">
	  
		<input type="text" class="form-control input-lg" placeholder="Names">
	</div>
	<label>Email</label>
    <div class="input-group input-group-lg">
	  
		<input type="text" class="form-control input-lg" placeholder="Email">
	</div>
	<label>Amount</label>
    <div class="input-group input-group-lg">
	  
		<input type="text" class="form-control input-lg" placeholder="Amount">
	</div>
	<hr>
	
	<input class = "btn btn-success" type = submit value = "Invest">
	
	<input class = "btn btn-primary" type = button value = "Cancel" onclick = "$('#pledge').hide('slow')">
	
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