<?php

session_start();
include "./config.php";

$uid = $_SESSION['id'];
$id = $_GET['id'];

//unfollow if the user already follow

$sql = "select follower from followers where follower='$uid' and following='$id'";



$result = $conn->query($sql);

if ($result->num_rows > 0) {
    //delete row

    $delete = "delete from followers where follower=$uid";

    $del = $conn->query($delete);
  
    if ($del) {

        $sql="select * from followers where following='$id'";
        $result = $conn->query($sql);

    
        echo "follow ";
        echo "".$result->num_rows;    
    }
} else {

    //follow if the users dont follow each other

   $sql2="insert into followers (following,follower) values('$id','$uid')";

    $follow=$conn->query($sql2);
    
    if($follow)
    {

        $sql="select * from followers where following='$id'";
        $result = $conn->query($sql);

        echo "unfollow ";
        echo "".$result->num_rows;    

    }
}
