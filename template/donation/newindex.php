<?php 
include 'libraries/index.php';
?>
<script type="text/javascript" src="scripts/script.js">

</script>
<link rel="shortcut icon" type="image/x-icon" href="template/favicon(2).ico">
<link rel="stylesheet" href="template/classic/style.css" type="text/css" />
<link rel="stylesheet" href="template/productstyle.css" type="text/css" />
<div class = container id = main style = "height:100%">


<div class = "navbar navbar-default navbar-fixed-top" id = header style = "width:100%; top:0px; z-index:2500; white-space:nowrap; background:#3F5D7D;">
<div class = "container">
<div class = "navbar-brand">
<a href = "/"><img src = "template/classic/logo.png" style = "height:26px; float:left;"><span style = "color:white; font-size:26px">TorQue</span></a>
</div>
<?php if(isset($_SESSION['loggedin'])){

$name = '';
$privilege = '';
include 'libraries/company.php';
$myCompany = new Company();
if ($row31 = mysql_fetch_array(mysql_query("SELECT * FROM users WHERE username = '{$_SESSION['loggedin']}'"))){
  	 $name = $row31['lname'].' '.$row31['fname'];
  	 $privilege = $row31['privilege'];
  	 $company = $row31['company'];
  	 if ($company == ''){
  	 	$company = -1;
  	 }
  	 $myCompany->loadCompany($company);
  	 //echo $myCompany->getName();
 }
 if ($privilege == ''){
 	$privilege = 'none';
 }
?>

 <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
      <span class="sr-only"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>

<div class="nav-collapse collapse navbar-responsive-collapse pull-right" style = "font-size:15px; margin-right:20px; margin-top:10px">
<span style = "color:white; font-size:15px"><?php echo $name?></span>
 | <a href = "?function=logout" style = "color:white"> <span class="glyphicon glyphicon-log-out"></span> Logout  </a>

</div>
<?php 
}
?>
</div>
</div>

<div style = "height:100%; margin-top:25px">



<div class = "" id = center style = "position:relative;<?php if (isset($_SESSION['loggedin'])){echo 'min-height:100%'; }else{echo "height:100%";}?>; background:white">

<?php 
getRightContent();
?>



</div>



 







</div>
</div>




<script type="text/javascript">
/*
this.label2value = function(){	

	var inactive = "inactive";
	var active = "active";
	var focused = "focused";
	
	$("label").each(function(){		
		obj = document.getElementById($(this).attr("for"));
		if(($(obj).attr("type") == "text") || (obj.tagName.toLowerCase() == "textarea")){			
			$(obj).addClass(inactive);			
			var text = $(this).text();
			$(this).css("display","none");			
			$(obj).val(text);
			$(obj).focus(function(){	
				$(this).addClass(focused);
				$(this).removeClass(inactive);
				$(this).removeClass(active);								  
				if($(this).val() == text) $(this).val("");
			});	
			$(obj).blur(function(){	
				$(this).removeClass(focused);													 
				if($(this).val() == "") {
					$(this).val(text);
					$(this).addClass(inactive);
				} else {
					$(this).addClass(active);		
				};				
			});				
		};	
	});		
};
$(document).ready(function(){	
	label2value();	
});
*/
var width = $(document).width();

$(window).resize(function(){
	width = $(document).width();
	//alert(width);
	if (width < 900){
		//alert(width);
		$('#usermenu').css('float','none');
		//$('.tiles').css('width','90%');
		//$('#center').css('width','70%');
		//$('#right').css('width','100%');

		$('#crossplatform').html('');
	}
	else{
		$('#usermenu').css('float','right');
		//$('.tiles').css('width','auto');
		//$('#center').css('width','50%');
		//$('#right').css('width','20%');

		$('#crossplatform').html('<img src = "template/classic/allmobiles.png">');
		}
});


if (width < 900){
	//alert(width);
	$('#usermenu').css('float','none');
	//$('.tiles').css('width','90%');
	//$('#center').css('width','70%');
	//$('#right').css('width','100%');

	$('#crossplatform').html('');
}
else{
	$('#usermenu').css('float','right');
	//$('.tiles').css('width','auto');
	//$('#center').css('width','50%');
	//$('#right').css('width','20%');

	$('#crossplatform').html('<img src = "template/classic/allmobiles.png">');
	//$('#crossplatform').html('<img src = "template/classic/allmobiles.png">');
}

<?php 
if (!isset($_GET['function']) AND isset($_SESSION['loggedin']) AND !isset($_POST['friendmessage'])){
?>
$('html, body').animate({scrollTop:500}, 'slow');
<?php 
}
?>

</script>   


