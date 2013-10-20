<div class="jumbotron"  style = "background:url('template/donation/photo.jpg'); background-size:cover;">
  <div class="container" style = "color:white; text-align:center">
    <h1 style = "font-size:45px">
    Financially Inspiring Agriculture.
	</h1>

	<br />
	<br />
    <a class = "btn btn-success btn-large" href="?page=discoverproject" style = "background:#76cc1e; border-radius:60px; font-size:26px;">Discover Projects</a>
  </div>
  <div class = "row" style= "">
  <div class = col-lg-2></div>
    <div class = col-lg-4 style="">
	<br />
	<h3 class="lead" style="color: white; font-weight: bold;">What is twihute?</h3>
	<p style="color: rgba(255,255,255,0.65); font-size: 16px;">Twihute is an innovative way of funding agriculture projects.<a style="color: #fff;"href="?page=aboutus">Read more..</a></p>
	</div>
	<div class = col-lg-1></div>
	<div class = col-lg-4 style="">
	<br />
	 <h3 class="lead" style="color: #fff; font-weight: bold;">Start a project.</h3>
	 <p style="color: rgba(255,255,255,0.65); font-size: 16px;">Are you a cooperative with an ingenious solution, raise funds from inspired individuals, institutions. <a style="color: #fff;" href="?page=startproject">Try it out</a></p>
	</div>
	<div class = col-lg-2></div>
  </div>
</div>

<div class = container>

<div style = "font-weight:bold; color:gray; font-size:18px">
Popular projects:
</div>
<hr>

<div class="row">
<?php 
include 'donations/classes/discoverproject.php';
$project = new Project();
$projects = $project->loadProjects();

$len = count($projects);
$i = 0;

while ($i < $len){
	$proj = $projects[$i];
?>





  <div class="col-sm-4 col-md-3">
    <div class="thumbnail">
    <div style = "width:100%; height:200px; background:url(donations/content/img/<?php echo $proj->getProjectImage()?>); background-size:cover">
    
     
    </div>
      <div class="caption">
        <h3><?php echo $proj->getProjectName()?></h3>
        <p style = "height:40px; overflow:hidden"><?php echo $proj->getDescription()?></p>
        <p><a href="?page=discoverproject&open=<?php echo $proj->getId()?>" class="btn btn-success">Read more...</a></p>
      </div>
    </div>
  </div>
    
  <?php 
  $i++;
  if ($i > 2){
  	break;
  }
  }
  ?>
</div>



</div>




