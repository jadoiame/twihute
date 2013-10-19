<div class = "container" style = "">
<div class = "navbar">
<div class = "container">
<div class = "navbar-brand" style = "margin-left:500px; padding:10px;">
<a style="font-size: 50px; color: #76cc1e; font-weight: bold; "href = "/">twihute</a>
</div>



<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
      <span class="sr-only"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
</button>

<div class="nav-collapse collapse navbar-responsive-collapse" style ="">

<!-- <ul class="nav navbar-nav pull-right" style="margin-right: 100px;">
      <li class="<?php if (!isset($_GET['page'])){echo "";}?>"><a href="/">Home</a></li>
      <li class="<?php if ($_GET['page'] == 'aboutus'){echo "active";}?>"><a href="?page=aboutus">What is Twihute</a></li>
      <li class="<?php if ($_GET['page'] == 'discoverproject'){echo "active";}?>"><a href="?page=discoverproject">Discover projects</a></li>
      <li class="<?php if ($_GET['page'] == 'startproject'){echo "active";}?>"><a href="?page=startproject">Start a project</a></li>
      
    </ul>-->

</div>
</div>
</div>
</div>


<div style = "margin-top:0px">


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





