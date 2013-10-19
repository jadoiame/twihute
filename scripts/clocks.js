
function updateTime(startH,startM,startS,startY,startMo,startD,div){

	var currentDate = new Date();
	var currentTime = currentDate.getTime();
	
	var timeSinceStart = currentTime - startTime;

	var newTime = new Date();
	newTime.setFullYear(startY);
	newTime.setMonth(startMo-1);
	newTime.setDate(startD);	
	newTime.setHours(startH);
	newTime.setMinutes(startM);
	newTime.setSeconds(startS + timeSinceStart/1000 );

	var h = newTime.getHours();
	var m = newTime.getMinutes();
	var s = newTime.getSeconds();

	var y = newTime.getFullYear();
	var mo = newTime.getMonth();
	var d = newTime.getDate();

	var ampm='am';
	if( h >= 12){
		ampm = 'pm';
		if( h > 12){
			h -= 12;
		}
	}
	if( h == 0){
		h = 12;
	}

	// add a zero in front of numbers<10
	m = padTime(m);
	s = padTime(s);
	
	if(div=='time_Irvine'){
		document.getElementById('leftDate').innerHTML = d+' '+getMonthName(mo)+' '+padYear(y);
	}
	if(div=='time_Hong_Kong'){
		document.getElementById('rightDate').innerHTML = d+' '+getMonthName(mo)+' '+padYear(y);
	}
	
	document.getElementById(div).innerHTML = h+':'+m+':'+s+' '+ampm;
	setTimeout('updateTime('+startH+','+startM+','+startS+','+startY+','+startMo+','+startD+',"'+div+'")',500);
}

function getMonthName(mo){	
	switch(mo){
		case 0: return "January"; break;
		case 1: return "February"; break;
		case 2: return "March"; break;
		case 3: return "April"; break;
		case 4: return "May"; break;
		case 5: return "June"; break;
		case 6: return "July"; break;
		case 7: return "August"; break;
		case 8: return "September"; break;
		case 9: return "October"; break;
		case 10: return "November"; break;
		case 11: return "December"; break;
	}
	return '';	
}

function padYear(y){
	y = parseInt(y)-2000;
	if(y<10){
		y = '0' + y;
	}
	return y;
}

function padTime(i){
	if (i<10){
		i="0" + i;
	}
	return i;
}