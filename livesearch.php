<?php

require_once "config.php";
session_start();

$key=$_GET['q'];

$sql="select username from users where username like '%$key%'";

$result=$conn->query($sql);

while($row=$result->fetch_assoc())
{
    echo " ".$row['username'];
}
