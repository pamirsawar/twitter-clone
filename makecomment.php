<?php

session_start();
include_once "./config.php";
$comment=$_POST['comment'];
$username=$_POST['usn'];
$sql="insert into comments where tid='' and username=''"


?>