<?php include 'db.php'; ?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/registration.css">
	<link rel="stylesheet" type="text/css" href="js/bootstrap.min.css">
	<title>Add Theater</title>
	<style type="text/css">
		.boxStyle {
			width: 100%;
			border: 1px solid #ccc;
			background: #FFF;
			margin: 0 0 5px;
			padding: 10px;
			font-style: normal;
			font-variant-ligatures: normal;
			font-variant-caps: normal;
			font-variant-numeric: normal;
			font-weight: 400;
			font-stretch: normal;
			font-size: 12px;
			line-height: 16px;
			font-family: Roboto, Helvetica, Arial, sans-serif;
		}
		.wrapper {
			text-align: center;
		}
		body, html {
			height: 100%;
			margin: 0;
		}
		.bg { 
			/* The image used */
			background-image: url("images/theatre.jpg");

			/* Full height */
			height: 100%; 

			/* Center and scale the image nicely */
			background-position: center;
			background-repeat: no-repeat;
			background-size: cover;
		}
	</style>
</head>

<body>
	<?php include_once "header.php"; ?>
	<div class="bg">
		<div class="container">  
			<form id="contact" action="addtheater.php" method="post" enctype="multipart/form-data">
				<input  name="TheaterName" placeholder="Theater Name" type="text" tabindex="1" required autofocus>
				<input  name="seat" placeholder="Seat" type="number" tabindex="2" required>
				<textarea name="address" placeholder="Address" tabindex="3" required></textarea>
				<input style="font-size: larger;background-color: #c2fbb8;font-family: cursive;font-weight: bold;" class="boxStyle" type="submit" name="submit" value="Add Theater"> 
			</form>
			<div class="wrapper">
				<button class="btn btn-default" onclick="document.location.href='adminpage.php'">
					<span class="glyphicon glyphicon-chevron-left"></span> BACK TO THE ADMIN PAGE
				</button>
			</div>
		</div>
	</div>
</body>
</html>

<?php 
if (isset($_POST['submit']) && !empty($_POST['submit'])) {
	$TheaterName = $_POST['TheaterName'];
	$seat = $_POST['seat'];
	$address = $_POST['address'];

	if (!empty($TheaterName) && !empty($seat) && !empty($address)) {
		$sql = "INSERT INTO theater (theaterName, seat, address) VALUES ('$TheaterName', '$seat', '$address')";
		if ($conn->query($sql) === TRUE) {
			echo "<script>alert('Theater added successfully!.');</script>";
			
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}
}
?>
