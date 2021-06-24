<?php

session_start();
include_once "./config.php";
include "./timeelaspedfunction.php";
$comment=$_POST['comment'];

$tid=$_POST['tid'];
$uid=$_SESSION['id'];
$username=$_POST['username'];

$timestamp = date("Y-m-d h:i:sa");

$sql="insert into comments (content,username,timestamp,tid,likecnt) values ('$comment','$username','$timestamp',$tid,0)";

//echo $sql;

$result1=$conn->query($sql);

$timestamp=time_elapsed_string($timestamp);

$last_id = $conn->insert_id; 

if($result1)
{
  echo " <div class='media border p-3'>
  <img src='/image/profile/profile.jpeg' alt='John Doe' class='mr-3 mt-3 rounded-circle' style='width:60px;'>
  <div class='media-body'>
      <!-- <h6 class='d-block mb-0 pb-0'></h6> -->
      <h6 class='mt-0 pt-0'><a href='/user.php?usn='$uid''>@$username</a><small><i>$timestamp</i></small></h6>
      <p><strong>$comment</strong></p>
      <!-- check when the user == comment uid   -->
      <button id='deletebtn' class='btn btn-danger btn-sm' onclick=\"deleteComment($last_id)\">delete </button>  
  </div>
</div> ";
}


// send data from js 

?>