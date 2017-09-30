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
}
else{
	echo "cart is empty. Please add some items and try again!";
}
?>
</body>
</html>