<?php 
if (isset($_POST['newproject'])){
	echo "Creation of the new project";
	include 'donations/classes/newproject.php';
}
?>



<div class = "container" style = "padding-left:30px; padding-right:30px">

<form method = post>

<input type = "hidden" name = newproject value = true >

<div class = panel>
<div class = panel-heading style = "">
<h3 style = "margin:0px; padding:0px">Please fill the form below</h3>
</div>
<br>
<br>
<label>Name of cooperative</label>
<div class="input-group input-group-lg">  
   <span class="input-group-addon"></span>
  <input type="text" class="form-control input-lg" placeholder="Cooperative">
</div>

<label>Name of project</label>
<div class="input-group input-group-lg">  
  <span class="input-group-addon"></span>
  <input type="text" class="form-control input-lg" placeholder="Project">
</div>

<label>Description of the program</label>
<div class="input-group input-group-lg">  
  <span class="input-group-addon"></span>
  
  <textarea class="form-control input-lg" placeholder="Description"></textarea>
</div>

<label>Projected amount</label>
<div class="input-group input-group-lg">  
  <span class="input-group-addon"></span>
  <input type="text" class="form-control input-lg" placeholder="Amount">
</div>

<label>Contact phone</label>
<div class="input-group input-group-lg">  
  <span class="input-group-addon"></span>
  <input type="text" class="form-control input-lg" placeholder="Phone number">
</div>

<hr>

<input class = "btn btn-success" type = submit value = "Complete"> <input class = "btn btn-primary" type = button value = "Cancel">

</div>

</form>
</div>
