<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Add to Cart!</title>
<link rel="stylesheet" type="text/css" href="prove03.css">
</head>

<body>
<?php
	$value = $_POST[button];
	echo "<h1>" . $value . "</h1><br>";
	$image;
	switch ($value) {
    case "Contact Juggling Balls":
        $image = contactjugglingballs;
        break;
    case "Juggling Balls":
        $image = jugglingballs;
        break;
    case "Juggling Clubs":
        $image = jugglingclubs;
        break;
	case "Juggling Knives":
        $image = jugglingknives;
        break;
    case "Pod Poi":
        $image = podpoi;
        break;
	}
	echo "<form action=\"prove03.php\" method=\"post\">
        <img src=\"prove03Images/" . $image . ".jpg\" class=\"fullsize\"/>
		<input type=\"number\" name=\"number\" title=\"Number of Items\" />
		<button type=\"submit\" name=\"button\" value=\"" . $value . "\">Add to Cart</button></form>"
?>
</body>
</html>