async function getListGeographicPoints() {
    let url = 'DCHService.php';
    return fetch(url)
        .then(res => res.json());
}

async function getGeographicCoordinates() {
    return new Promise((res, rej) => {
        navigator.geolocation.getCurrentPosition(res, rej);
    });
}

async function getDistance() {
    let listGeoPoints = await getListGeographicPoints();
    console.log(listGeoPoints);
    let geoCoordinates = await getGeographicCoordinates();
    console.log(geoCoordinates.coords);
    var res = [];
    var R = 6371;
    for (let i = 0; i < listGeoPoints.length; i++) {
        var pla = listGeoPoints[i].latitude
        var cla = geoCoordinates.coords.latitude
        var plo = listGeoPoints[i].longitude
        var clo = geoCoordinates.coords.longitude
        var d = Math.pow( (pla - cla),2) + Math.pow( (plo - clo),2)
        res.push(listGeoPoints[i].address + " " + d*R + " km <br />")
    }
    return res;
}