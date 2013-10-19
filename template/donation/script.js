
var opacity = 0;
var out = true;
var over = false;
//pics[0] = 'Great';
var imgIndex = 0;
function showHotels(){
	/*
	over = true;
	if(out){
		if(opacity <= 0){
			document.getElementById('hotels').style.display='block';
			hideDiscover();
			hideTrip();
			
		}
		document.getElementById('hotels').style.opacity=opacity;
		opacity = opacity + 0.1;
		if(opacity < 0.9){
			setTimeout("showHotels()","100");
		}
		else{
			out = false;
		}
	}
	*/
}
function hideHotels(){
	//alert(opacity);
	/*
	over = false;
	if(!out){
		if(opacity <= 0){
			document.getElementById('hotels').style.display='none';
			out = true;
			
		}
		document.getElementById('hotels').style.opacity=opacity;
		setTimeout("hideHotels()","100");
		opacity = opacity - 0.05;
		
		
	}
	*/
	
}
function showSearchHotel(){
	document.getElementById('searchHotels').style.height = '80px';
	document.getElementById('search').style.display='block';
}
function showSearchDiscover(){
	document.getElementById('searchDiscover').style.height = '80px';
	document.getElementById('searchD').style.display='block';
}
function hideSearchHotel(){
	document.getElementById('searchHotels').style.height = '20px';
	document.getElementById('search').style.display='none';
}
function hideSearchDiscover(){
	document.getElementById('searchDiscover').style.height = '20px';
	document.getElementById('searchD').style.display='none';
}

var discOpacity = 0;
var discOut = true;

function showDiscover(){
	/*
	if(discOut){
		if(discOpacity <= 0){
			hideHotels();
			hideTrip();
			document.getElementById('discover').style.display='block';
			//document.getElementById('hotelsTile').style.width='146px';
			//document.getElementById('discoverTile').style.width='478px';
			//document.getElementById('discover').style.width='465px';
		}
		document.getElementById('discover').style.opacity=discOpacity;
		discOpacity = discOpacity + 0.1;
		if(discOpacity < 0.9){
			setTimeout("showDiscover()","100");
		}
		else{
			discOut = false;
		}
	}
	//document.getElementById('discoverTile').style.background='url(\'gallery/togo.jpg\')';
	*/
}
function hideDiscover(){
	/*
	if(!discOut){
		if(discOpacity <= 0){
			document.getElementById('discover').style.display='none';
			discOut = true;
		}
		//document.getElementById('hotelsTile').style.width='478px';
		//document.getElementById('discover').style.width='138px';
		//document.getElementById('discoverTile').style.width='146px';
		document.getElementById('discover').style.opacity=discOpacity;
		discOpacity = discOpacity - 0.05;
		setTimeout("hideDiscover()","100");
	}
	*/
	
}
function showBrochures(){
	/*
	hideHotels();
	hideDiscover()
	hideTrip();
	document.getElementById('cars').style.display = 'block';
	*/
}
function showDeals(){
	/*
	hideHotels();
	hideDiscover()
	hideTrip();
	document.getElementById('dealspane').style.display = 'block';
	*/
}
var tripOut = true;
var tripOpacity = 0;
function showTrip(){
	
	//tripOut = true;
	/*
	if (tripOut){
		if (tripOpacity <= 0){
			hideHotels();
			hideDiscover()	
			document.getElementById('trip').style.display='block';
			//document.getElementById('culture').style.display='none';
			//document.getElementById('deals').style.display='none';
			//document.getElementById('tripTile').style.height='304px';
			
			//document.getElementById('trip').style.height='500px';
			
		}
		document.getElementById('trip').style.opacity=tripOpacity;
		tripOpacity = tripOpacity + 0.1;
		if(tripOpacity < 0.9){
			setTimeout("showTrip()","100");
		}
		else{
			tripOut = false;
		}
	}	
	*/
}
function hideTrip(){
	/*
	if(!tripOut){
		if(tripOpacity <= 0){
			document.getElementById('trip').style.display='none';
			//document.getElementById('culture').style.display='block';
			//document.getElementById('deals').style.display='block';
			//document.getElementById('tripTile').style.height='146px';
			tripOut = true;
		}
		//document.getElementById('culture').style.display='block';
		//document.getElementById('deals').style.display='block';
		//document.getElementById('tripTile').style.height='146px';
		document.getElementById('trip').style.opacity=tripOpacity;
		tripOpacity = tripOpacity - 0.05;
		setTimeout("hideTrip()","100")
	}
	*/
}

function showEvents(){
	/*
	hideHotels();
	hideDiscover()
	hideTrip();
	*/
}
var next1 = 1;
function showPhotoApp(gallery, hotel, next){
	//alert(gallery);
	if(rooms != ''){
		order = 0;
	}
	rooms = '';
	//alert('Ok');
	next1 = next;
	//alert('Ok');
	$('#photoApp').fadeIn('slow');
	//document.getElementById('photoApp').style.display = 'block';
	//document.getElementById('photoAppBg').style.display = 'block';	
	//window.location.hash = "home";
	$('html, body').animate({scrollTop:0}, 'slow');
	//document.getElementById('photobrowser').innerHTML = 'Loading the pictures...';
	
	$.get("",{'liveupdate':'true','gallery':gallery,'hotelname':hotel,'next':next},
			function(data){	
				//$('#photobrowser').fadeOut('slow');
	        	document.getElementById('photobrowser').innerHTML = data;
	        	//$('#photobrowser').fadeIn('slow');	
	        	//$('#photoDisplay').fadeOut('slow');
	        	$('#photoDisplay').html(pics[order]);
	        	//$('#photoDisplay').fadeIn('slow');
	        	visit(toVisit[order]);
		}
	);
	
	
	
}
var rooms = '';
var roomPics = new Array();
function showRoomPhotos(gallery, hotel, next, room){
	if(rooms != ''){
		order = 0;
	}
	rooms = '';
	//alert('Ok');
	next1 = next;
	//alert('Ok');
	$('#photoApp').fadeIn('slow');
	//document.getElementById('photoApp').style.display = 'block';
	//document.getElementById('photoAppBg').style.display = 'block';	
	//window.location.hash = "home";
	$('html, body').animate({scrollTop:0}, 'slow');
	//document.getElementById('photobrowser').innerHTML = 'Loading the pictures...';
	
	var k = 0;
	$.get("",{'liveupdate':'true','roomgallerypics':gallery,'hotelname':hotel,'next':next, 'room':room},
			function(data){	
				//alert(data);
	        	var results = data+'';
	        	var element = results.split('next');
	        	//alert(element.length);
	        	while(k < element.length){
	        		roomPics[k] = element[k];
	        	    //alert(roomPics[k]);
	        		k++;
	        	}
	        	$('#photoDisplay').html(roomPics[0]);
	        	//alert(roomPics[k]);
		}
	);
	
	
	$.get("",{'liveupdate':'true','roomgallery':gallery,'hotelname':hotel,'next':next, 'room':room},
			function(data){
				//alert('downloading');
	        	document.getElementById('photobrowser').innerHTML = data;                          
		}
	);
	
}

function closePhotoApp(){
	$('#photoApp').fadeOut('slow');
	//document.getElementById('photoApp').style.display = 'none';
	//document.getElementById('photoAppBg').style.display = 'none';
	//window.location.hash = "photo";
}
var activeImg = '';

function visit(id){
	//alert(id);	
	$('html, body').animate({scrollTop:0}, 'slow');
	
	document.getElementById('imgdescription').innerHTML = '';
	document.getElementById(id).style.borderColor='blue';
	//document.getElementById('imgdescription').innerHTML = '<img style = "" alt="Click to the left to maximize the photo" src="template/yego/loading.gif">';
	
	$.get("",{'liveupdate':'true','imgRead':id,'delete':del},
			function(data){	                  		          	          
	        	//document.getElementById('selectedplaces').innerHTML = data;
	        	//document.getElementById('updatecomplete').style.display = 'block';
		        //alert('Okay');
		        document.getElementById('imgdescription').innerHTML = data;
	        	
		}
	);
	
	document.getElementById('photoDisplay').style.height = 'auto';
	activeImg = id;
	$('#photoDisplay').fadeIn('slow');
}
function checkin(){
	$('#days').val($('#days1').val());
	document.getElementById('checkin').style.display = 'block';
	window.location.hash = "home";
	booking.getTotalPrice();
		
}

function hideCheckin(){
	document.getElementById('checkin').style.display = 'none';
	window.location.hash = "checkin";
}
function login(){
	//document.getElementById('login').style.display = 'block';
	$('#login').fadeIn('slow');
	$('html, body').animate({scrollTop:265}, 'slow');
	//window.location.hash = "home";
}


function hideLogin(){
	$('#login').fadeOut('slow');
	//document.getElementById('login').style.display = 'none';
	//window.location.hash = "checkin";
}
function changeLanguage(){
	document.getElementById('language').style.display = 'block';
	window.location.hash = "home";
		
}
function hideLanguage(){
	document.getElementById('language').style.display = 'none';
}

function showMap(){
	
	document.getElementById('map').style.display = 'block';
	//document.getElementById('mapframe').src='template/hotels/geoMap.php?to='+activeHotel;
	window.location.hash = "home";
	//document.getElementById('mapframe').src='template/hotels/geoMap.php?to='+activeHotel;
}
function showAddPhoto(){
	document.getElementById('addphoto').style.display = 'block';
	window.location.hash = "home";
}
function hideMap(){
	document.getElementById('map').style.display = 'none';
	window.location.hash = "map";
}

function liveSearchHotel(place){
	var search = document.getElementById('searchText').value;
	//document.getElementById('hotelsearch').innerHTML = "Coooool";
	$.get("",{'liveupdate':'true','search':search,'placeprofile':place},
			function(data){	                  		          	          
	        	document.getElementById('hotelsearch').innerHTML = data;                          
		}
		);
	
}
function liveSearchTrip(){
	var search = document.getElementById('searchText').value;
	//alert('Processing');
	//document.getElementById('hotelsearch').innerHTML = "Coooool";
	//document.getElementById('trip').style.opacity = 1;
	$('#tripSearch').html('<img src = "template/yego/loading.gif">'); 
	$.get("",{'liveupdate':'true','searchTrip':search,'placeprofile':2},
		function(data){	                  		          	          
	        document.getElementById('tripSearch').innerHTML = data;                          
		}
	);
}
function placeToVisit(place){
	document.getElementById('updatecomplete').style.display = 'none';
	document.getElementById('updatenotification').style.display = 'block';
	var origin = document.getElementById('origin').value;
	$.get("",{'liveupdate':'true','placetovisit':place,'origin':origin},
			function(data){	                  		          	          
	        	document.getElementById('selectedplaces').innerHTML = data;
	        	document.getElementById('updatecomplete').style.display = 'block';
	        	
		}
		);
	
	//alert("visition");
}
function updateDescription(){
	
	var text = document.getElementById('imgDescr').value;
	//alert(activeHotel);
	$.get("",{'liveupdate':'true','imgUpdate':activeImg,'text':text,'activehotel':activeHotel},
			function(data){	                  		          	          
	        	//document.getElementById('selectedplaces').innerHTML = data;
	        	//document.getElementById('updatecomplete').style.display = 'block';
		        //alert('Okay');
		        document.getElementById('imgdescription').innerHTML = data;
	        	
		}
	);
	
	
}
function updateRoomPrice(price){
	$.get("",{'liveupdate':'true','img':activeImg,'priceUpdate':price,'activehotel':activeHotel},
			function(data){	                  		          	          
	        	//document.getElementById('selectedplaces').innerHTML = data;
	        	//document.getElementById('updatecomplete').style.display = 'block';
		        //alert('Okay');
		        //document.getElementById('imgdescription').innerHTML = data;
		        $('#imgdescription').html(data);
	        	
		}
	);
	//showPhotoApp();
}
function logout(){
	document.getElementById('logout').submit();
	//alert('Loging out');
}

function refreshPhotos(gallery, hotelName){
	showPhotoApp(gallery, hotelName, next1);
}
function addEvent(){
	document.getElementById('eventman').style.display = 'block';
	document.getElementById('flag').style.display = 'none';
}
function hideEvent(){
	document.getElementById('eventman').style.display = 'none';
	document.getElementById('flag').style.display = 'block';
}
var hotelClass = 'cheap';
var delay = 0;
var keyWord = '';
var breaking = false;
function searchHotels(){
	keyWord = $('#searchKeyWord').val();
	
	if(delay == 0){
		//alert(delay);
		searchHotels1();
	}
	
}
function searchHotels1(){
	//document.getElementById().innerHTML = 'Found';
	//var keyWord = document.getElementById('searchKeyWord').value;
	
	
	
	
	if(true){
		delay = 0;
		
		$('#hotelsSearch').html('<img src = "template/yego/loading.gif">'); 
		
		$.get("",{'liveupdate':'true','hotelSearch':keyWord, 'class':hotelClass},
				function(data){					
					$('#hotelsSearch').fadeIn('slow');
		        	$('#hotelsSearch').html(data); 
		        	searching = false;
			}
		);
		
		
	}
	else{
		//alert(delay);
		//
		//
		delay++;
		
		setTimeout("searchHotels1()","1000");
		
		//searchHotels();
		
	}
	
	
	
}
function searchDiscover(){
	keyWord = $('#discoverKeyWord').val();
	
	if(delay == 0){
		//alert(delay);
		searchDiscover1();
	}
	
}
function searchDiscover1(){	
	
	if(true){
		$('#discoverResults').html('<img src = "template/yego/loading.gif">'); 
		delay = 0;
		$.get("",{'liveupdate':'true','discoverSearch':keyWord},
				function(data){
					$('#discoverResults').fadeIn('slow');
					$('#discoverResults').html(data); 
					searching = false;
			}
		);
	}
	else{
		delay++;		
		setTimeout("searchDiscover1()","1000");
				
	}
}
var category = "cat1";
var page = 'accomodation';
function checkAvailability(){
	//alert('Ok');
	$('#availabilityResponse').show('slow');
	$('#availabilityResponse').html('<img style = "" alt="Click to the left to maximize the photo" src="template/yego/loading.gif">');
	//alert('Kay');
	var hotel = activeHotel;
	
	var startDate = $('#start-date').val();
	var endDate = $('#end-date').val();
	
	$('#d11').val(startDate);
	$('#d12').val(endDate);
	if(page == 'accomodation'){
	$.get("",{'liveupdate':'true','checkAvailable':hotel,'category':category,'startDate':startDate,'endDate':endDate},
			function(data){
			$('#availabilityResponse').html(data); 
		}
	);
	}
	if(page == 'packages'){
		$.get("",{'liveupdate':'true','checkAvailableBus':hotel,'category':category,'startDate':startDate,'endDate':endDate},
				function(data){
				$('#availabilityResponse').html(data); 
			}
		);
		}
	
	//
	
	
}
var order = 0;

function defiler(avance){
	//alert(end);
	
	if(rooms == ''){
	if(order >= 0 && order <= end){
		
		$('#photoDisplay').hide();
			
		//alert(order);
		if(avance > 0){
			order++;
		}
		else{
			order--;
		}
		
		
		//alert(avance);
		if(order < 0){
			order = 0;
		}
		if(order > end){
			order = end;
		}
		
		
		
		
		
		if(rooms != ''){
			//alert(rooms);
			$('#photoDisplay').html(roomPics[order]);
			showRoomsPhotos(gallery,hotelName,next+=avance,rooms);
		}
		else{
			//alert('In');
			$('#photoDisplay').html(pics[order]);
			$('#photoDisplay').fadeIn('slow');
			if(order+1 < end && order != 0){
				showPhotoApp(gallery,hotelName,next1+=avance);
			}
		}
		visit(toVisit[order]);
		
		/*if(true){
			
			if(stoper == 0){
				alert(avance);
				//showPhotoApp(gallery,hotelName,order-10);
			}			
			
			if(order % 11 == 0 && avance > 0){
				//alert('goin to download');
				showPhotoApp(gallery,hotelName,order+2);
			}
			
			
		}*/
		
		
	}
	}
	else{
		if(order >= 0 && order < roomPics.length-1){
			//alert('I am in');
			//alert(order);
			if(avance > 0){
				order++;
			}
			else{
				order--;
			}
			
			
			//alert(avance);
			if(order < 0){
				order = 0;
			}
			if(order >= roomPics.length-1){
				order = roomPics.length-2;
			}
			
			
			
			
			
			if(rooms != ''){
				//alert(rooms);
				
				$('#photoDisplay').html(roomPics[order]);
				visit('im'+(order));
				if(order != 0 && order != roomPics.length){
					showRoomsPhotos(gallery,hotelName,next+=avance,rooms);
				}
			}
			else{
				//alert('In');
				
				$('#photoDisplay').html(pics[order]);
				showPhotoApp(gallery,hotelName,next1+=avance);
			}
			
			
			
			
			
		}
		
	}
	
}
var searching = false;
function searchText(){
	//alert($("#searchtext").val());
	
	var text = $('#searchtext').val();
	keyWord = $('#searchtext').val(); 
	var code = -1;
	$('#searchtext').bind('keypress', function(e) {
		code = e.keyCode;	
	});
        if(code != 40 && !searching){
        	//alert(code);
        	searching = true;
        	$('#hotelsSearch').fadeOut('slow');
        	$('#discoverResults').fadeOut('slow');
        	setTimeout("searchHotels1()","1000");
        	setTimeout("searchDiscover1()","1000");        	
        	//searchHotels1();
        	//searchDiscover1();
        	//$('html, body').animate({scrollTop:60}, 'slow');
        	
        }
        
	
	
	

	

	
	
	//alert('all went well');
	
	
}

function searchHotels(){
	var text = $('#searchtext').val();
	keyWord = $('#searchtext').val();
	$('#searchtext').bind('keypress', function(e) {
		var code = e.keyCode;	
        if(code != 40 && !searching){
        	//alert(code);
        	searching = true;
        	$('#hotelsSearch').fadeOut('slow');
        	//$('#discoverResults').fadeOut('slow');
        	//if(keyWord != ""){
        	setTimeout("searchHotels1()","1000");
        	//}
        	//setTimeout("searchDiscover1()","1000");        	
        	//searchHotels1();
        	//searchDiscover1();
        	$('html, body').animate({scrollTop:60}, 'slow');
        	
        }
        
	});
}

function searchDiscover(){
	var text = $('#searchtext').val();
	keyWord = $('#searchtext').val();
	$('#searchtext').bind('keypress', function(e) {
		var code = e.keyCode;	
        if(code != 40 && !searching){
        	//alert(code);
        	searching = true;
        	$('#hotelsSearch').fadeOut('slow');
        	//$('#discoverResults').fadeOut('slow');
        	//if(keyWord != ""){
        	//setTimeout("searchHotels1()","1000");
        	//}
        	setTimeout("searchDiscover1()","1000");        	
        	//searchHotels1();
        	//searchDiscover1();
        	$('html, body').animate({scrollTop:60}, 'slow');
        	
        }
        
	});
}


var searchEng = new SearchEngine();
function loadAdvanceSearch(){	
	//alert(searchEng.getProvince(1).getName());
	var provinces = '<select id = prov onchange = "searchEng.loadDistricts($(\'#prov\').val());searchText()"><option val = "">Select A region</option>';
	var i = 0;
	while(i < 5){
		//alert(searchEng.getProvince(i).getName());
		provinces += '<option value = '+i+'>'+searchEng.getProvince(i).getName()+'</option>';
		i++;
	}
	provinces += '</select>';
	$('#provinces').html(provinces);
}




function SearchEngine(){
	this.price1 = 0;
	this.price2 = 5000;
	this.district = '';
	this.province = '';
	this.region = new Region();
	
	this.region.addProvinces('Kigali').addDistricts(new Array('Kicukiro','Gasabo','Nyarugenge'));
	this.region.addProvinces('East').addDistricts(new Array('Kirehe', 'Ngoma', 'Bugesera', 'Kayonza','Gicumbi'));
	this.region.addProvinces('West').addDistricts(new Array('Rusizi', 'Nyaruguru'));
	this.region.addProvinces('North').addDistricts(new Array('Rubavu','Musanze', 'Burera','Ngororero'));
	this.region.addProvinces('South').addDistricts(new Array('Huye','Muhanga','Gisagara'));
	
	this.getProvince = function(i){
		return this.region.getProvince(i);
	}
	this.loadDistricts = function(i){
		this.province = this.getProvince(i).getName();
		this.addToSearch();
		//$('#searchtext').val('{ province:'+this.getProvince(i).getName()+' }');
		var distr = this.getProvince(i).getDistricts();
		
		var districts = '<select id = distr onchange = "searchEng.loadSectors('+i+',$(\'#distr\').val());searchText()"><option value = "">All the region</option>';
		var i = 0;
		while(distr[i] != null){
			//alert(searchEng.getProvince(i).getName());
			districts += '<option value = '+distr[i].getName()+'>'+distr[i].getName()+'</option>';
			i++;
		}
		districts += '</select>';
		$('#districts').html(districts);
		
		
		
		
		//alert(distr[0].getName());
		//alert('Okey Cocky');
	}
	this.loadSectors = function(i,district){	
		this.district = district;
		this.addToSearch();
		//$('#searchtext').val('{ province:'+this.getProvince(i).getName()+' }{ district:'+district+' }');
	}
	this.setPrices = function(price1, price2){
		
		this.price1 = $('#price1').val();
		this.price2 = $('#price2').val();
		if(this.price1 == ''){
			this.price1 = 0;
		}
		if(this.price2 == ''){
			this.price2 = 0;
		}
		this.addToSearch();
	}
	this.addToSearch = function(){
		
		$('#searchtext').val('{ province:'+this.province+' }{ district:'+this.district+' }{ sprice:'+this.price1+' }{ eprice:'+this.price2+' }');
	}
	
}

function Region(){
	this.provinces = new Array();
	this.i = 0;
	this.addProvinces = function(province){
		this.provinces[this.i++] = new Province(province);	
		return this.provinces[this.i-1];
	}
	this.getProvince = function(i){
		return this.provinces[i];
	}
	
}
function Province(name){
	this.name = name;
	this.districts = new Array();
	
	this.addDistricts = function(districts){
		var i = 0;
		while(districts[i] != null){
			this.districts[i] = new District(districts[i]);	
			i++;
		}
		
	}
	this.getDistricts = function(){
		return this.districts;
	}
	this.getName = function(){
		return this.name;
	}
}
function District(name){	
	this.name = name;
	this.sectors;
	this.getName = function(){
		return this.name;
	}
}
function Sector(){
	this.name;
	this.cells;
}
function Cell(){
	this.name;
}






