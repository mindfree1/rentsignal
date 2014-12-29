	setInterval(function() {
	    var getTime = new Date ();
	    var getHrs = getTime.getHours ();
	    var getMins = getTime.getMinutes ();   
	    var getSecs = getTime.getSeconds ();
	    getMins = ( getMins < 10 ? "0" : "" ) + getMins;
	    getSecs = ( getSecs < 10 ? "0" : "" ) + getSecs;    
	    var timeOfDay = ( getHrs < 12 ) ? "AM" : "PM";
	    getHrs = ( getHrs > 12 ) ? getHrs - 12 : getHrs;
	    getHrs = ( getHrs == 0 ) ? 12 : getHrs;
	    var setTimer = getHrs + ":" + getMins + ":" + getSecs + " " + timeOfDay;
	    if(document.getElementById("thetime"))
	    {
	    	document.getElementById("thetime").innerHTML = setTimer;	
	    }
}, 1000);