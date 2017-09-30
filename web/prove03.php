<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Best Store Ever!</title>
<link rel="stylesheet" type="text/css" href="prove03.css">
</head>

<body>
<div id="center">
<?php
	session_start();
	if(isset($_SESSION['cart'])){
		if(isset($_POST[button])){
			if(!in_array($_POST[button], $_SESSION['cart'])){
				$_SESSION['cart'][] = $_POST[button];
				$_SESSION['numbers'][] = $_POST[number];
			}
			else{
				$_SESSION['numbers'][array_search($_POST[button], $_SESSION['cart'])] += $_POST[number];
			}
		}
		else if(isset($_POST[backbutton])){
			//Do absolutely nothing! Not with php, anyway.
		}
		else{
			unset($_SESSION['cart']);
			unset($_SESSION['numbers']);
		}
	}
	else {
		if(isset($_POST[button])){
			$my_array = array($_POST[button]);
			$_SESSION['cart'] = $my_array;
			$my_other_array = array($_POST[number]);
			$_SESSION['numbers'] = $my_other_array;
		}
	}
?>
<form action="cart.php" method="post">
<div id="header">
    <input type="image" src="prove03Images/shoppingcart.jpg" id="cart" />
</div>
</form>
<form action="checkout.php" method="post">
<div id="secondheader">
	<button type="submit" name="submit" value="submit">Checkout</button>
</div>
</form>
<form action="itemPage.php" method="post">
	<table>
    <tr>
    	<th>
        Contact Juggling Balls
        </th>
        <th>
        </th>
        <th>
        Juggling Balls
        </th>
        <th>
        </th>
    </tr>
    <tr>
    	<td>
        <img src="prove03Images/contactjugglingballs.jpg" class="thumbnail" />
        </td>
        <td>
        <button type="submit" name="button" value="Contact Juggling Balls">Purchase</button>
    	</td>
        <td>
        <img src="prove03Images/jugglingballs.jpg" class="thumbnail" />
        </td>
        <td>
        <button type="submit" name="button" value="Juggling Balls">Purchase</button>
    	</td>
    </tr>
    <tr>
    	<th>
        Juggling Knives
        </th>
        <th>
        </th>
        <th>
        Juggling Clubs
        </th>
        <th>
        </th>
    </tr>
    <tr>
    	<td>
        <img src="prove03Images/jugglingknives.jpg" class="thumbnail" />
        </td>
        <td>
        <button type="submit" name="button" value="Juggling Knives">Purchase</button>
    	</td>
        <td>
        <img src="prove03Images/jugglingclubs.jpg" class="thumbnail" />
        </td>
        <td>
        <button type="submit" name="button" value="Juggling Clubs">Purchase</button>
    	</td>
    </tr>
    </table>
</form>
</div>
</body>
</html>