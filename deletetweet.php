<?php

include_once "config.php";
$tid= $_POST['tid'];


$sql="delete from tweets where tid='$tid'";

if($conn->query($sql))
{
  echo "tweet deleted";
}


?>



