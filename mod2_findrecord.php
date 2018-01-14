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
	include 'mod2_config.php';
	include 'mod2_opendb.php';

               $lastname = (isset($_POST['LastName'])    ? $_POST['LastName']   : '');

$sql= "SELECT ContactID, FirstName, LastName, EmailAddress FROM contact where LastName = '$lastname' ";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
				echo "<b>ContactID: " . $row["ContactID"]. "</b><br>";
			  echo "<b>Name: " . $row["FirstName"]. " " . $row["LastName"]. "</b><br>";
        echo "<b>Email: " . $row["EmailAddress"]. "</b><br><hr>";
    }
} else {
    echo "Sorry there are no matches! Please check your entry and try again.";
}

mysqli_close($conn);

?>



				<div data-role="footer" data-theme="b">
	  <h4>FormParty &copy; 2017</h4>
	</div>
	</body>
</html>
