<!DOCTYPE html>

<head>
<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1">
<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;">  

<link href="template/yego/style.css" type="text/css" rel="stylesheet">
<script type="text/javascript" src="scripts/jquery.min.js"></script>
<script type="text/javascript" src="template/yego/script.js"></script>
<script type="text/javascript">

function showAll(){
	var img = new Image();
	var img2 = new Image();
	var img3 = new Image();
	var img4 = new Image();
	var img5 = new Image();
	var img6 = new Image();
	
	
	document.getElementById('progress').innerHTML = '10%';
	
	
	var img6 = new Image();
	
	//document.img1.src = "gallery/header.png";
	img.onLoad = showSite();
	//sh1();

	
	
	
	
	
	img6.src = "gallery/togo.jpg";
	img.src = "gallery/header.jpg";
	img5.src = "gallery/hotel2.jpg";
	img4.src = "gallery/rav4.jpg";
	img3.src = "gallery/deal1.jpg";
	img2.src = "gallery/tripplaner.jpg";
}

function showSite(){	
	document.getElementById('loaded').style.display = 'block';
	document.getElementById('loading').style.display = 'none';
	//document.img1.src = "gallery/header.png";	
	//document.getElementById('loading').style.display = 'block';
}

</script>

 



<title>Twihute</title>

<link REL = "SHORTCUT ICON" HREF = "template/yego/favicon.ico">







</head>

<body style = "margin:0px" onload = "show()">



<script type="text/javascript">
//alert('loading');
</script>
<div id = loading style = "display:none; height:100%; width:100%; background:white">
<table width = 100% height = 100%>
<tr>
<td align = center valign = top style = "padding:10px;" height = 100%>

<!--  <div style = "width:900px; height:95%; background:white; font-size:11px; padding:5px; border-style:solid; border-color:green; border-width:1px">  -->
 

<img name = img1 alt="" src="template/yego/loading.gif" style = "margin-top:200px; width:50px">

<div style = "font-size:11px">Please wait!<div id = takelong style = "display:none">If the page is taking too long to open, click <a href = "javascript:void(0)" onclick = "showSite()">here</a></div></div>
<div id = progress style = "margin-bottom:100px"></div>
<!-- </div>  -->
</td>


</tr>



</table>
</div>

<script type="text/javascript">
var loading = true;
var timer = 0;
//alert('Goin');

function failToLoad(){
	//loading = false;//Comment this
	//showSite();
	if(timer > 9){	
		document.getElementById('takelong').style.display = 'block';
		loading = false;
	}
	
	if(loading){
		setTimeout('failToLoad()','1000');
		timer++;
		//alert(timer);
		
	}
	
	
	
}
failToLoad();
</script>

<div id = loaded style = "display:block">
<?php
if (isset($_GET['id'])){
	if ($_GET['id'] == 'hotel'){
		include 'template/hotels/index.php';
	}
    if ($_GET['id'] == 'discover'){
		include 'template/discover/index.php';
	}
	if ($_GET['id'] == 'places'){
		include 'template/places/index.php';
	}
	if ($_GET['id'] == 'cars'){
		include 'template/cars/index.php';
	}
	if ($_GET['id'] == 'deals'){
		include 'template/deals/index.php';
	}
}
else{
	include 'template/smartphone/index.php';
}
?>
</div>

<div>
<?php 
include 'application/datepicker1/index.php';
?>   
</div>


</body>

<script type="text/javascript">
<!--

//$(document).ready(function(){
function show(){	
	/* This code is executed after the DOM has been completely loaded */
	
	showAll();
	var totWidth=0;
	var positions = new Array();	
	
	$('#slides .slide').each(function(i){
		
		/* Traverse through all the slides and store their accumulative widths in totWidth */
		
		positions[i]= totWidth;
		totWidth += $(this).width();
		
		/* The positions array contains each slide's commulutative offset from the left part of the container */
		
		if(!$(this).width())
		{
			alert("Please, fill in width & height for all your images!");
			return false;
		}
		
	});
	
	$('#slides').width(totWidth);

	/* Change the cotnainer div's width to the exact width of all the slides combined */

	$('#menu ul li a').click(function(e,keepScroll){

			/* On a thumbnail click */

			$('li.menuItem').removeClass('act').addClass('inact');
			$(this).parent().addClass('act');
			
			var pos = $(this).parent().prevAll('.menuItem').length;
			
			$('#slides').stop().animate({marginLeft:-positions[pos]+'px'},450);
			/* Start the sliding animation */
			
			e.preventDefault();
			/* Prevent the default action of the link */
			
			
			// Stopping the auto-advance if an icon has been clicked:
			if(!keepScroll) clearInterval(itvl);
	});
	
	$('#menu ul li.menuItem:first').addClass('act').siblings().addClass('inact');
	/* On page load, mark the first thumbnail as active */
	
	
	
	/*****
	 *
	 *	Enabling auto-advance.
	 *
	 ****/
	 
	var current=1;
	function autoAdvance()
	{
		if(current==-1) return false;
		
		$('#menu ul li a').eq(current%$('#menu ul li a').length).trigger('click',[true]);	// [true] will be passed as the keepScroll parameter of the click function on line 28
		current++;
	}

	// The number of seconds that the slider will auto-advance in:
	
	var changeEvery = 10;

	var itvl = setInterval(function(){autoAdvance()},changeEvery*1000);

	/* End of customizations */
}
//});


//-->
</script>


