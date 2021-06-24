<?php

include "./config.php";
$cid=$_POST['cid'];

$sql="delete from comments where cid='$cid'";

$result=$conn->query($sql);

if($result)
{
    echo 1;
}


?>