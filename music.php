<!DOCTYPE html>
<html>
<head>
	<title>BAD BET OFFICIAL</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="band.css">
</head>
<body>
	<ul> <!--Menu navigation bar-->
		<li id="home"><a href="band.html">bad bet</a></li>
		<li class="active"><a href="music.php">music</a></li>
		<li><a href="vlog.html">on the street</a></li>
		<li><a href="gig.html">gigs</a></li>
<!-- 		<li><a href="contact.html">find us!</a></li>
 -->	</ul>

	<div class="music"> <!--top row div-->
		<div id="demo" style="float: left; margin-right: 50px;">
			<h2>Our Demos</h2>
			<h4>Roky Said - </h4>
			<audio controls>
				<source src="assets/rokysaid.mp3" type="audio/mp3">
			</audio>
			<h4>Dani California - </h4>
			<audio controls>
				<source src="assets/danicalifornia.mp3" type="audio/mp3">
			</audio>
		</div>
		<div id="setlist" style="margin-left: 100px;">
			<h2>Our Set List</h2>
			<img src="assets/setlist.jpg" height="300" width="400" style="border: solid; border-width: 5px;">
		</div>
	</div>

	<div class="music"> <!--bottom row div-->
		<h2>Request a Song!</h2>
		<form>
			Artist:
			<input type="text" name="artist">
			Song Title:
			<input type="text" name="song">
			<input type="button" value="GO!" onClick="writeValues(form)">
		</form>
	</div>

	<script type="text/javascript"> //handles user input
		var count = 1; //tracks the number of requests
		writeValues = function(form) {
			var artist = form.artist.value;
			var song = form.song.value;
			if(artist != "" || song != ""){ // validate input
				var node = document.createElement("H5");  // Create a <h5> element
				var text = document.createTextNode(count + ". " + artist + ' - ' + song); // Create a text node
				node.appendChild(text); // Insert the text into the <h5> element
				document.body.appendChild(node); // Update the screen
				count++;
			}
		}
	</script>

	<form action = "<php $_SERVER['PHP_SELF'] ?>" method = "post">
		<h2>Want to see Bad Bet perform live?</h2>
		<h4>Enter your City and State and we'll tell you the nearest upcoming Gig!</h4>
		<textarea rows = "1" cols = "20" name = "city"></textarea>
		<textarea rows = "1" cols = "20" name = "state"></textarea>
		<input type = "submit" />
	</form>

	<?php

	// sticky form

		$City = $feedback = NULL;

		if ($_SERVER['REQUEST_METHOD'] == 'POST'){
			if (empty($_POST['city']) || empty($_POST['state'])){
				echo "<font color = 'red' ><i> Please enter both a City and State </i></font> <br />"
			}
			else {
				$city = trim($_POST['city']);
				$state = trim($_POST['state']);
				echo "<font color = 'green' size = +1>Thanks for your interest!</font>"
			}
		}



	?>

</body>
</html>
