<?php 
include 'donations/classes/discoverproject.php';
$project = new Project();
$id = $_GET['open'];
//echo $id;
$project->loadProject($id);
echo $project->getProjectName();
?>

<div class = "container">



<div class = "col-lg-6">
<h3><?php echo $project->getProjectName()?></h3>
<p><?php echo $project->getDescription()?> </p>

</div>



<div class = "col-lg-6">




 <div class="col-sm-12 col-md-3">
    <div class="thumbnail">
      <img data-src="holder.js/600x400" src = "donations/content/girinka.jpg" alt="">
      <div class="caption">
        <h3></h3>
        <p></p>
        <p><a href="#" class="btn btn-primary">Button</a></p>
      </div>
    </div>
 </div>


</div>








</div>