	
	function get_coordinates_list() {
		$.get("AA_02.php")
			.done(function(data){
			document.getElementById("datalist").innerHTML = data;
		});
	}
	function get_selfposition() {
		navigator.geolocation.getCurrentPosition( result => {
		document.getElementById("display").innerHTML = 
			"Latitude:" +  result.coords.latitude + "<br />" +
			"Longitude:" +  result.coords.longitude + "<br />";
		});
	}
	function get_distances() {
		navigator.geolocation.getCurrentPosition( result => {
			$.get("AA_02.php?d=1",{latitude:result.coords.latitude,longitude:result.coords.longitude})
				.done(function(data){
		document.getElementById("datalist").innerHTML = data;
			});
		});
		
	}