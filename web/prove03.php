<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Best Store Ever!</title>
</head>

<body>
<?php
	session_start();
	if(isset($_SESSION['cart'])){
		$_SESSION['cart'][] = $_POST[button];
		$_SESSION['numbers'][] = 1;
		echo count($_SESSION['cart']);
	}
	else {
		if(isset($_POST[button])){
			$my_array = array($_POST[button]);
			$_SESSION['cart'] = $my_array;
			$my_other_array = array(1);
			$_SESSION['numbers'] = $my_other_array;
			echo count($_SESSION['cart']);
		}
	}
?>
<form action="itemPage.php" method="post">
	<table>
    <tr>
    	<td>
        <img src="modelingimage.png" />
        <button type="submit" name="button" value="model">Models</button>
    	</td>
    </tr>
    </table>
</form>
</body>
</html>