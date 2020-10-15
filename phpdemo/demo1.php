<h1>Hello from PHP!</h1>
<?php 
	$x = 2;
	$y = 2;
	$z = $x + $y;
	//echo "Result is $z";
	$now = date("H:i:s");
	$hour = date("H");
	if ($hour < 12) {
		$greeting = "Good morning";
	}
	else {
		$greeting = "Good day";
	}
	
	for($i =0; $i < 5; $i++) {
		echo($i."<br ?>");
	}		
?>

<h2>Result is <?=$z?> </h2>
<h1>Current time is <?=$now ?> </h1>
<h3><?=$greeting?>!</h3>