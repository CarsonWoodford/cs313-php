<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Your purchase</title>
<link rel="stylesheet" type="text/css" href="prove03.css">
</head>

<body>
You have purchased
<?php
	session_start();
	$count = 0;
	foreach($_SESSION['cart'] as $value){
		echo "<p>" . $_SESSION['numbers'][$count] . " " . $value . "</p>";
		$count++;
	}
	echo "<br>It will be shipped to " 
	. filter_input(INPUT_POST, 'address', FILTER_SANITIZE_STRING) . ", " 
	. filter_input(INPUT_POST, 'city', FILTER_SANITIZE_STRING) . ", " 
	. filter_input(INPUT_POST, 'state', FILTER_SANITIZE_STRING) .
	".<br> Thank you for your purchase!";
?>
</body>
</html>