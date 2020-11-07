
    
async function get_points (x) {
			   var promise = new Promise( async (resolve, reject) => {

			   var url = "RGnearestShopsService.php";
			   var xhr = new XMLHttpRequest();
			   xhr.open("GET",url);
			   xhr.onload = () => {
				   let result = xhr.responseText;
				   
				   resolve(result);

			   };
			   xhr.send();
		   });
		   return promise;
	   }

async function getCurrentCoordinates() {
        var promise = new Promise( async (resolve, reject) => {
        navigator.geolocation.getCurrentPosition(async result => {
            console.log(result);
            document.getElementById("display").innerHTML = 
                 "Your Latitude:" +  result.coords.latitude + "<br />" +
                 "Your Longitude:" +  result.coords.longitude + "<br /><br /> Distances:<br /><br />";

                 var cords = {
                    latitude: result.coords.latitude,
                    longitude: result.coords.longitude,
                };
        

                resolve(cords)
    });
});
    return promise;
}
    async function get_dist() {
       
        var promise = new Promise( async (resolve, reject) => {

        var points_1 = await get_points();

        var points = JSON.parse(points_1);

        var cords = await getCurrentCoordinates()

        points.map( (position, index) => {
  
            let distance  = Math.sqrt( Math.pow ((position.latitude - cords.latitude), 2) + Math.pow ((position.longitude - cords.longitude), 2) );
            document.getElementById("res").innerHTML = position.address + ": " + distance+ "<br />" + document.getElementById("res").innerHTML
            
      });
    });
    return promise;
}