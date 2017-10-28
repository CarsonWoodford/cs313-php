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
  	</div>
  	<div class="sidebar1">
   	<ul class="nav">
      	<li><a href="prove05.php">Home</a></li>
      	<li><a href="assignments.html">Assignments</a></li>
      	<?php
			if(isset($_SESSION['user']) && !empty($_SESSION['user'])){
			echo '<li><a href="#p">Account</a></li>';
		} else{
			echo '<li><a href="login.php">Account</a></li>';
		}
        ?>
      	<li><a href="#">Settings</a></li>
    </ul>
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
		
		
		
		if(isset($_POST['username']) && !empty($_POST['username'])){
			if(isset($_POST['password']) && !empty($_POST['password'])){
				$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
				$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
				$user_password_hash = password_hash($password, PASSWORD_BCRYPT);
				if(isset($_POST['Submit'])){
					$statement = $db->query('SELECT username FROM accounts WHERE username = \'' . $username . '\' AND password = \'' . $user_password_hash . '\'');
					if(isset($statement) && !empty($statement)){
						while ($row = $statement->fetch(PDO::FETCH_ASSOC))
						{
							$_SESSION['user'] = $row['username'];
							echo '<h1>Successfully Logged in!</h1><br/>';//probably wont be seen, but just in case the below command takes a moment I threw it in anyway.
							header("Location: prove05.php");
							die();
						}
					}
				}
				else {
					$statement = $db->prepare('INSERT INTO accounts (accountnumber, username, password) VALUES (DEFAULT, \'' . $username . '\', \'' . $user_password_hash . '\')');
					$statement->execute();
					$_SESSION['user'] = $username;
					header("Location: prove05.php");
					die();
				}
			}
		}
		if(!(isset($_SESSION['user']) && !empty($_SESSION['user']))){
			if(isset($_POST['username'])){
				echo '<h1>Invalid username/password</h1><br/>';
			} else {
				echo '<h1>Please log in</h1><br/>';
			}
			echo '<form action="login.php" method="post">';
			echo '<p>Username: <input type="text" name="username"></p>';
			echo '<p>Password: <input type="password" name="password"></p>';
			echo '<input type="submit" name="Submit" value="Submit">';
			echo '<input type="submit" value="Make Account">';
			echo '</form>';
		}
    ?>
    
 
    
  	<div class="footer">
  	</div>
	</div>
</div>
</body>
</html>
