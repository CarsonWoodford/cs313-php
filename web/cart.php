<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Your Items</title>
<link rel="stylesheet" type="text/css" href="prove03.css">
</head>

<body>
<?php
session_start();
if(isset($_SESSION['cart'])){
	if(isset($_POST[toremove])){
		unset($_SESSION['cart'][array_search($_POST[toremove], $_SESSION['cart'])]);
	}
	$count = 0;
	echo "<table><tr><td>In your cart, you have:";
	foreach($_SESSION['cart'] as $value){
		echo "<p>" . $_SESSION['numbers'][$count] . " " . $value . "</p>";
		$count++;
	}
	echo "</td><td><form action=\"cart.php\" method=\"post\">";
	echo "<select name=\"toremove\">";
	foreach($_SESSION['cart'] as $value){
		echo "<option value=\"" . $value. "\">" . $value . "</p>";
		$count++;
	}
	echo "</select><button type=\"submit\" name=\"remove\" value=\"placeholder\">Remove item</button></form></td></tr></table>";
	if(isset($_POST[submit])){
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