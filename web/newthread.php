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
	<?php
	if(isset($_SESSION['user']) && !empty($_SESSION['user'])){
		echo '<p class="fltrt">Logged in as: ' . $_SESSION['user'] . '.</p>';
	} else{
		echo '<p class="fltrt">Not logged in.</p>';
	}
	?>
  	</div>
  	<div class="sidebar1">
    <ul class="nav">
    	<li><a href="prove05.php">Home</a></li>
      	<li><a href="assignments.html">Assignments</a></li>
        <?php
		if(isset($_SESSION['user']) && !empty($_SESSION['user'])){
			echo '<li><a href="#">Account</a></li>';
		} else{
			echo '<li><a href="login.php">Account</a></li>';
		}
        ?>
      	<li><a href="logout.php">Signout</a></li>
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
		
		if(isset($_SESSION['user']) && !empty($_SESSION['user'])){
			if(isset($_POST['threadtitle']) && !empty($_POST['threadtitle']) && isset($_POST['postcontent']) && !empty($_POST['postcontent'])){
				//ADD AN IF STATEMENT STOPPING DUPLICATE THREAD TITLES
				$statement = $db->query('SELECT topic FROM threads WHERE topic = \''.$_POST['threadtitle'].'\'');
				$count = 0;
				while ($row = $statement->fetch(PDO::FETCH_ASSOC))
				{
					$count+=1;
				}
				if($count == 0){
					$statement = $db->prepare('INSERT INTO threads (threadnumber, topic) VALUES (DEFAULT, \''.$_POST['threadtitle'].'\');');
					$statement->execute();
					$statement = $db->prepare('INSERT INTO posts (postnumber, accountnumber, postcontent, postdate, threadnumber) VALUES (DEFAULT, (SELECT accountnumber FROM accounts WHERE username = \''.$_SESSION['user'].'\'),\''.$_POST['postcontent'].'\', CURRENT_DATE, (SELECT threadnumber FROM threads WHERE topic = \''.$_POST['threadtitle'].'\'))');
					$statement->execute();
					echo 'Thread created. Click here to go to it.';
					echo '<form method="post" action="thread.php">';
					echo '<input type="submit" value="'.$_POST['threadtitle'].'" name="submission">';
					echo '</form>';
				}
				else {
					echo '<h1>Thread title already used</h1><br/>';
					echo '<form action="newthread.php" method="post">';
					echo 'Thread title: <input type="text" name="threadtitle"><br>';
					echo 'Post contents: <input type="text" class="lrgtxtbox" name="postcontent"><br>';
					echo '<input type="submit">';
					echo '</form>';
				}
			} else {
				echo '<h1>New Thread:</h1><br/>';
				echo '<form action="newthread.php" method="post">';
				echo 'Thread title: <input type="text" name="threadtitle"><br>';
				echo 'Post contents: <input type="text" class="lrgtxtbox" name="postcontent"><br>';
				echo '<input type="submit">';
				echo '</form>';
			}
		}
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
