<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Untitled Document</title>
<link href="prove05.css" rel="stylesheet" type="text/css" />
</head>

<body>

<div class="container">
  <div class="header"><a href="#"><img src="" alt="Insert Logo Here" name="Insert_logo" width="180" height="90" id="Insert_logo" style="background-color: #C6D580; display:block;" /></a> 
    <!-- end .header --></div>
  <div class="sidebar1">
    <ul class="nav">
      <li><a href="#">Home</a></li>
      <li><a href="#">Assignments</a></li>
      <li><a href="#">Account</a></li>
      <li><a href="#">Settings</a></li>
    </ul>
    <p> The above links demonstrate a basic navigational structure using an unordered list styled with CSS. Use this as a starting point and modify the properties to produce your own unique look. If you require flyout menus, create your own using a Spry menu, a menu widget from Adobe's Exchange or a variety of other javascript or CSS solutions.</p>
    <p>If you would like the navigation along the top, simply move the ul.nav to the top of the page and recreate the styling.</p>
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
		echo '<h1>Forums:</h1><br/><br/>';
		$statement = $db->query('SELECT topic, username FROM threads AS t JOIN posts AS p ON t.threadnumber = p.threadnumber JOIN accounts AS a ON a.accountnumber = p.accountnumber');
		while ($row = $statement->fetch(PDO::FETCH_ASSOC))
		{
 	 	echo 'Topic: <a href="#">' . $row['topic'] . '</a> by: ' . $row['username'] . '<br/>';
		}
    ?>
    <p></p>
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
    <p>This .footer contains the declaration position:relative; to give Internet Explorer 6 hasLayout for the .footer and cause it to clear correctly. If you're not required to support IE6, you may remove it.</p>
    </div>
  </div>
</body>
</html>
