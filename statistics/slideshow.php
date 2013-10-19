



<div id = slideshow style = "">
<div id = pictures style = "text-align:left;">
<img alt="" src="gallery/banner.png" style = "width:100%"> 
</div>
<div id = texts style = "position:absolute; top:50px;color:white; padding-left:10px; background: orange; padding:10px; font-weight:100; font-size:18px; left:0px; width:300px; text-align:left; padding-right:50px;  background-color:rgba(0,0,0,0.3)">
<?php 
echo $this->texts[0];
?>
</div>
</div>


<script type="text/javascript">
var pictures = new Array();
var texts = new Array();
<?php 
$len = count($this->images);
$i = 0;
while ($i < $len){
	echo "pictures[$i] = '".$this->images[$i]."';\n";
	echo "texts[$i] = '".$this->texts[$i]."';\n";
	$i++;
}
echo "var num = ".$i.";\n";
?>
var inc = 0;
function switchPicture(){
	$('#pictures').hide();
	//$('#texts').hide();
	$('#pictures').html('<img alt="" src="'+pictures[inc]+'" style = "width:100%">');
	$('#texts').html(texts[inc]);
	$('#pictures').fadeIn('slow');
	//$('#texts').fadeIn('slow');
	if(inc < num-1){
		setTimeout("switchPicture()",10000);
		inc++;
		}
	else if(num != 1){
		inc = 0;
		setTimeout("switchPicture()",10000);
		}
	//alert('Sliding');
}
switchPicture();

</script>



