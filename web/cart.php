<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Your Items</title>
</head>

<body>
<?php
session_start();
if(isset($_SESSION['cart'])){
	$count = 0;
	echo "In your cart, you have:";
	foreach($_SESSION['cart'] as $value){
		echo "<p>" . $_SESSION['numbers'][$count] . " " . $value . "</p>";
		$count++;
	}
	if(isset($_POST[checkout])){
		echo "<form action=\"confirmation.php\" method=\"post\">
		<input type=\"text\" name=\"address\" />
		<button type=\"submit\" name=\"purchase\" value=\"placeholder\">Make purchase</button></form>";
	}
}
else{
	echo "cart is empty. Please add some items and try again!";
}
?>
</body>
<form action="prove03.php" method="post">
<button type="submit" name="backbutton" value="placeholder">Return to browse</button>
</form>
</html>