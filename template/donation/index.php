<div class = "container" style = "">
<div class = "navbar navbar-inverse navbar-fixed-top">
<div class = "navbar-brand" style = "margin-right:100px">
<a href = "/"><img src = "" style = ""><span style = "color:white; font-size:26px; margin:0px; padding:0px">Twihute</span></a>
</div>



<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
      <span class="sr-only"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
</button>

<div class="nav-collapse collapse navbar-responsive-collapse" style = "">

<ul class="nav navbar-nav">
      <li class="<?php if (!isset($_GET['page'])){echo "active";}?>"><a href="/">Home</a></li>
      <li class="<?php if ($_GET['page'] == 'aboutus'){echo "active";}?>"><a href="?page=aboutus">What is Twihute</a></li>
      <li class="<?php if ($_GET['page'] == 'discoverproject'){echo "active";}?>"><a href="?page=discoverproject">Discover projects</a></li>
      <li class="<?php if ($_GET['page'] == 'startproject'){echo "active";}?>"><a href="?page=startproject">Start a project</a></li>
      
    </ul>

</div>
</div>


<div style = "margin-top:80px">


<?php 
if (isset($_GET['page'])){
	if ($_GET['page'] == 'startproject'){
		include 'donations/content/newproject.php';
	}
	if ($_GET['page'] == 'discoverproject'){
		include 'donations/content/discoverproject.php';
	}
	if ($_GET['page'] == 'aboutus'){
		include 'donations/content/aboutus.php';
	}
}
else{
	include 'donations/content/homepage.php';
}
?>


</div>

<hr>




</div>

