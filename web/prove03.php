<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Best Store Ever!</title>
<link rel="stylesheet" type="text/css" href="prove03.css">
</head>

<body>
<?php
	session_start();
	if(isset($_SESSION['cart'])){
		if(!in_array($_POST[button], $_SESSION['cart'])){
			$_SESSION['cart'][] = $_POST[button];
			$_SESSION['numbers'][] = $_POST[number];
			//Number will have to change!
		}
		else{
			$_SESSION['numbers'][array_search($_POST[button], $_SESSION['cart'])] += $_POST[number];
			//Number will have to change!
		}
		echo count($_SESSION['cart']) . $_SESSION['numbers'][0];
	}
	else {
		if(isset($_POST[button])){
			$my_array = array($_POST[button]);
			$_SESSION['cart'] = $my_array;
			$my_other_array = array($_POST[number]);
			//Number will have to change!
			$_SESSION['numbers'] = $my_other_array;
			echo count($_SESSION['cart']) . $_SESSION['numbers'][0];
		}
	}
?>
<form action="itemPage.php" method="post">
	<table>
    <tr>
    	<td>
        <img src="modelingimage.png" class="thumbnail" />
        <button type="submit" name="button" value="model">Models</button>
    	</td>
    </tr>
    </table>
</form>
</body>
</html>