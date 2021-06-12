<?php

session_start();
include "config.php";
$tid=$_GET['tid'];
$uid=$_SESSION['id'];


$sql="select * from likes where tid='$tid' and uid='$uid'";

$result=$conn->query($sql);

//echo "mysql error".$conn->error;

if($result->num_rows)
{
    
   // echo "tweet is liked by user already";
    $sql2="delete from likes where tid='$tid' and uid='$uid'";
    
    $result=$conn->query($sql2);

    //echo "delet query error:".$conn->error;

    if($result)
    {
        $sql4="update tweets set likecnt = (select count(tid) from likes where tid='$tid') where tid='$tid'";
        $result=$conn->query($sql4);
        
        $sql="select * from tweets where tid=$tid";
        $result=$conn->query($sql);
        $likecnt=$result->num_rows;
  //  echo "update query error:".$conn->error;

        //echo "like ".$likecnt;
        echo "like";
    }
}
else{

    //echo "tweet is being liked";
        
        $sql3="insert into likes(tid,uid) values($tid,$uid)";
   
        $result=$conn->query($sql3);

        if($result)
        {

            $sql4="update tweets set likecnt = (select count(uid) from likes where tid='$tid') where tid='$tid'";

            $result=$conn->query($sql4);
         
        $sql="select * from tweets where tid=$tid";
        $result=$conn->query($sql);
        $likecnt=$result->num_rows;

         
        //    echo "dislike ".$likecnt;
            echo "dislike";
    }
    }
//$conn->close();
//$result=$conn->query($sql);
?>