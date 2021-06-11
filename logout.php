<?php

session_start();
$_SESSION['username'] = "";
$_SESSION['loggedin']=false;
//session_destroy();
header("location: login.php");

?>
