<div class = "container">

<?php 
include 'donations/classes/discoverproject.php';
$project = new Project();
$id = $_GET['open'];

$pr = $project->loadProject($id);

if (isset($_POST['changeproject'])){
	$name = $_POST['projectname'];
	$description = $_POST['description'];
	$image = $_FILES;

	$pr->setProjectName($name);
	$pr->setDescription($description);
	$pr->setId($id);
	if ($image['projectimage']['name'] != ''){
		$pr->setUploadedProfileImage($image);
	}
	
	$pr->saveProject();
}

//echo $id;
if (isset($_GET['delete'])){
	$project->setId($id);
	$project->deleteProject();
}
$pr = $project->loadProject($id);

?>




<ol class="breadcrumb">
  <li><a href="/">Home</a></li>
  <li><a href="?page=discoverproject">Projects</a></li>
  <li class="active">Project</li>
</ol>



<div id = changeproject style = "display:none" class = "well">

<form method = post enctype="multipart/form-data">

<input type = hidden name = changeproject value = true>


<label>Project image</label>
<div class="input-group">
  
  <input name = projectimage type="file" class="form-control">
</div>


<label>Project name</label>
<div class="input-group">
  <span class="input-group-addon"></span>
  <input name = projectname type="text" class="form-control" placeholder="Name" value = "<?php echo $pr->getProjectName();?>">
</div>

<label>Project description</label>
<div class="input-group">
  <span class="input-group-addon"></span>
  <textarea name = description class="form-control" placeholder="Text"><?php echo $pr->getDescription();?></textarea>
</div>

<hr>

 <input class = "btn btn-primary" type = reset value = "Cancel" onclick = "$('#changeproject').hide('slow')" > <input class = "btn btn-success" type = submit value = "Save changes" >

 <a href = "?page=discoverproject&open=<?php echo $pr->getId()?>&delete=true" class = "btn btn-danger pull-right">Delete</a>
 <div style = "clear:both"></div>
</form>


</div>



<div class = "col-lg-6">
<h3><?php echo $pr->getProjectName()?></h3>
<div><span style = "color:gray">By: </span><span style = "font-weight:bold"><?php echo $pr->getCooperativeName()?></span></div>
<br>
<p><?php echo $pr->getDescription()?> </p>

</div>



<div class = "col-lg-6">




 <div class="col-sm-12 col-md-3">
    <div class="thumbnail">
      <img data-src="" style = "width:100%" src = "donations/content/img/<?php echo $pr->getProjectImage()?>" alt="Select a pricture">
      <div class="caption">
        <h3></h3>
        <p></p>
        <p><a href = "javascript:void(0)" onclick = "$('#changeproject').show('slow')" href="#" class="btn btn-default pull-right">Change</a></p>
      <div style = "clear:both"></div>
      </div>
    </div>
 </div>


</div>








</div>