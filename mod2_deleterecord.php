<html>
		<head>
	<title>Find a record</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="styles/custom.css" />
<link rel="stylesheet" href="themes/rasmussenthemeroller.min.css" />
<link rel="stylesheet" href="themes/jquery.mobile.icons.min.css" />
<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile.structure-1.4.5.min.css" />
<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
<script src="javascript/storage.js"></script>
</head>
	<body>
		<div id="page" data-role="page" data-theme="b" >
	<div data-role="header" data-theme="b">
<h1>
	Find a record
		</h1>	</div>
				<div data-role="content">
	<?php
	include 'mod2_config_sampledb.php';
	include 'mod2_opendb.php';

               $id= (isset($_POST['id'])    ? $_POST['id']   : '');

$sql= "	SELECT id, fname, lname, address, city, state, zip from customers WHERE id = $id LIMIT 1";

$result = mysqli_query($conn, $sql);


if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
				echo "<b>Record successfully found:</b><br>";
				echo "<b>ID: " . $row["id"]. "</b><br>";
        echo "<b>Name: " . $row["fname"]. " " . $row["lname"]. "</b><br>";
				echo "<b>Address: " . $row["address"]. "</b><br>";
				echo "<b>City: " . $row["city"]. "</b><br>";
				echo "<b>State: " . $row["state"]. "</b><br>";
				echo "<b>Zip: " . $row["zip"]. "</b><br><hr>";
				echo "<br><b>Record successfully DELETED!</b><br>";

    }
} else {
    echo "Sorry there are no matches! Please check your entry and try again.";
}

$sql= "	DELETE FROM customers WHERE id = $id";

$result = mysqli_query($conn, $sql);

mysqli_close($conn);

?>



				<div data-role="footer" data-theme="b">
	  <h4>FormParty &copy; 2017</h4>
	</div>
	</body>
</html>
