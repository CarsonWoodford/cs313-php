<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title> Mr. Habablab's Wonderous Treasures!</title>
  <link href="prove03.css" rel="stylesheet" type="text/css">
</head>

<body>
  <?php
session_start();

 $_SESSION['plutQuan'] = $_POST['plut'];
echo $_SESSION['plutQuan'];
echo "hello";
?>
</body>


</html>

