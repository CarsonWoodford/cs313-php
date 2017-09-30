<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Add to Cart!</title>
</head>

<body>
<?php
	$value = $_POST[button];
	echo "<h1>" . $value . "</h1><br>";
	echo "<form action=\"prove03.php\" method=\"post\">
        <img src=\"modelingimage.png\" />
        <input type=\"submit\" name=\"button\" value=\"Add to Cart\" /></form>"
?>
</body>
</html>