<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>FunForums</title>
<link href="prove05.css" rel="stylesheet" type="text/css" />
</head>

<body>

<div class="container">
  	<div class="header"><a href="#"><img src="" alt="LogoPlaceholder" name="Insert_logo" width="180" height="90" id="Insert_logo" style="background-color: #C6D580; display:block;" /></a> 
    <!-- end .header --></div>
  	<div class="sidebar1">
    <ul class="nav">
      	<li><a href="prove05.php">Home</a></li>
      	<li><a href="assignments.html">Assignments</a></li>
      	<?php
		if(isset($_SESSION['user']) && !empty($_SESSION['user'])){
			echo '<li><a href="account.php">Account</a></li>';
		} else{
			echo '<li><a href="login.php">Account</a></li>';
		}
        ?>
      	<li><a href="#">Settings</a></li>
    </ul>
    <p></p>
    <p></p>
    </div>
    
    
    
  <div class="content">
  	<?php
		ini_set('display_errors', 1);
		ini_set('display_startup_errors', 1);
		error_reporting(E_ALL);
		
		$db = null;
	
		$dbUrl = getenv('DATABASE_URL');

		$dbopts = parse_url($dbUrl);

		$dbHost = $dbopts["host"];
		$dbPort = $dbopts["port"];
		$dbUser = $dbopts["user"];
		$dbPassword = $dbopts["pass"];
		$dbName = ltrim($dbopts["path"],'/');

		try
		{
			$db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);
			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
		}
		catch (PDOException $ex)
		{
    		echo "$ex";
    		die();
		}
	
		echo '<h1>' . $_POST["submission"] . '</h1><br/>';
		$statement = $db->query('SELECT username, postcontent FROM threads AS t JOIN posts AS p ON t.threadnumber = p.threadnumber JOIN accounts AS a ON a.accountnumber = p.accountnumber WHERE t.topic = \'' . $_POST["submission"] . '\';');
		while ($row = $statement->fetch(PDO::FETCH_ASSOC))
		{
			echo $row['username'] . ':<br>';
			echo '<p>' . $row['postcontent'] . '</p>';
		}
		echo '<form method="post" action="reply.php">';
		echo '<button name="replybutton" value="'.$_POST["submission"].'">Reply to thread!</button>';
		echo '</form>';
    ?>
    <h2></h2>
    <p></p>
    <h3></h3>
    <p></p>
    <p></p>
    <p></p>
    <h4></h4>
    <p></p>
    </div>
    
    
    
  <div class="footer">
    <p></p>
    </div>
  </div>
</body>
</html>
