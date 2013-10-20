<div class = "container" style = "">
<div class = "navbar">
<<<<<<< HEAD
<div class = "container">
<div class = "navbar-brand" style = "margin-left:500px; padding:15px;">
<a style="font-size: 50px; color: #76cc1e; font-weight: bold; "href = "/">Twihute</a>
=======
<div class = "container" style = "<?php if (!isset($_GET['page'])){?>text-align:center<?php } ?> ">
<div class = "<?php if (isset($_GET['page'])){?>navbar-brand<?php } ?> " style = "font-weight:bold; font-size:40px;">
<a style="color:#76cc1e" href = "/">Twihute</a>
>>>>>>> 9aae6928953b5ec18efa07af50670d94b064db9b
</div>



<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
      <span class="sr-only"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
</button>

<div class="nav-collapse collapse navbar-responsive-collapse" style ="">
<?php 
if (isset($_GET['page'])){
?>
 <ul class="nav navbar-nav pull-right" style="padding-right:30px; padding-left:30px">
      <li class="<?php if (!isset($_GET['page'])){echo "";}?>"><a href="/">Home</a></li>
      <li class="<?php if ($_GET['page'] == 'aboutus'){echo "active";}?>"><a href="?page=aboutus">What is Twihute</a></li>
      <li class="<?php if ($_GET['page'] == 'discoverproject' AND !isset($_GET['open'])){echo "active";}?>"><a href="?page=discoverproject">Discover projects</a></li>
      <li class="<?php if ($_GET['page'] == 'startproject'){echo "active";}?>"><a href="?page=startproject">Start a project</a></li>
      
  </ul>
  <?php 
 }
?>

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





