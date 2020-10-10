<html>
	<head>
		<title>Measurer</title>
		<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
		<script>
			function setTimer() {
				window.setInterval(async function(){
					var url = "simulateData.php";
					
					var response = await fetch(url);
					var result = await response.text();
					
					result = JSON.parse(result);
					$("#results").html(result.time + " "
									   + result.value + "<br />" + 
								$("#results").html());	
					
				},3000);
				
				
			}
		</script>
	</head>
	<body onload="setTimer();">
		<h1>Simulated data visualization</h1>
		<div id="results"></div>
	</body>
</html>