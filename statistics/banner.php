<?php 
//include 'statistics/classes.php';
?>


<p><big><strong>Tankyu Banner</strong></big></p>

<p>This module control the top banner of your website. You can add images, text and links from this area</p>
<form>

</form>
<?php 
$banner = new Banner();
if (isset($_POST['newphotos1'])){
	$banner->addPicture($_FILES);
}
if (isset($_POST['newslide'])){
	if($_POST['newslide']>0){
		echo 'Editing banner';
		$banner->editBanner($_POST['newslide'], $_POST['link'], $_POST['text'], $_POST['order']);
	}
	else{
		$banner->addBanner($_POST['link'], $_POST['text'], $_POST['order']);
	}
}
if (isset($_GET['deletebanner'])){
	echo 'Deleting banner';
	$banner->deleteBanner($_GET['deletebanner']);
}
$banner->loadBanner();
$banner->getGalleryModule();
$banner->getSlideBuilder();
//$banner->showSlideShow();
?>


