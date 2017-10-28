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
			if(isset($_POST['postcontent']) && !empty($_POST['postcontent'])){
				if(isset($_POST['isupdate'])){
					$statement = $db->prepare('UPDATE posts SET postcontent = \''.$_POST['postcontent'].'\' WHERE postcontent = \''.$_POST['isupdate'].'\'');
					$statement->execute();
					$_SESSION['topic'] = $_POST['topic'];
					header("Location: thread.php");
					die();
				}
				else{
					$statement = $db->prepare('INSERT INTO posts (postnumber, accountnumber, postcontent, postdate, threadnumber) VALUES (DEFAULT, (SELECT accountnumber FROM accounts WHERE username = \''.$_SESSION['user'].'\'), \''.$_POST['postcontent'].'\', CURRENT_DATE, (SELECT threadnumber FROM threads WHERE topic = \''.$_POST['topic'].'\'))');
					$statement->execute();
					$_SESSION['topic'] = $_POST['topic'];
					header("Location: thread.php");
					die();
				}
			}
			else{
				if(isset($_POST['edit']) && !empty($_POST['edit'])){
					echo '<h1>Edit your post!</h1><br/>';
					echo '<form method="post" action="reply.php">';
					echo '<input type="hidden" name="topic" value="'.$_POST['replybutton'].'">';
					echo '<input type="text" class="lrgtxtbox" name="postcontent" value="'.$_POST['edit'].'">';
					echo '<input type="hidden" name="isupdate" value="'.$_POST['edit'].'">';
					echo '<input type="submit" value="Post reply!">';
					echo '</form>';
				}
				else{
					echo '<h1>Make a reply</h1><br/>';
					echo '<form method="post" action="reply.php">';
					echo '<input type="hidden" name="topic" value="'.$_POST['replybutton'].'">';
					echo '<input type="text" class="lrgtxtbox" name="postcontent">';
					echo '<input type="submit" value="Post reply!">';
					echo '</form>';
				}
			}
		}
    ?>
    
  <div class="footer">
  </div>
</body>
</html>
