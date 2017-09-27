<?php
session_start();

 $_SESSION['plutQuan'] = $_POST['plut'];
echo $_SESSION['plutQuan'];
?>