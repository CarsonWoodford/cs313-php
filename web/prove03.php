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
	}
	else {
	}
?>
<form action="itemPage.php" method="post">
	<table>
    <tr>
    	<td>
        <img src="modelingimage.png" />
        <input type="submit" name="button" value="model" />
    	</td>
    </tr>
    </table>
</form>
</body>
</html>