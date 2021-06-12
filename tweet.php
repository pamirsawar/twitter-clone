<?php
//delete later
include_once "bootstrapcss.php";

//session_start();

if (isset($_GET['usn'])) {
  // echo "showing tweets of user =".$_GET['usn'];
  $userid = $_GET['usn'];


  require_once "./timeelaspedfunction.php";

//  include "config.php";

  $sql = "select t.tid,t.uid,t.content, t.likecnt, t.retweetcnt, t.timestamp, u.username, u.firstname, u.lastname from tweets t LEFT JOIN users u on t.uid=u.uid where t.uid='$userid' ORDER BY t.timestamp desc";

  //$sql ="select * from tweets where uid='$userid'";

  $result = $conn->query($sql);
  //$rows=mysqli_fetch_array($result);

  if ($result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {
      $tid = $row['tid'];
?>









      <div id="tweet<?=$tid?>" class="container mt-3">
        <!-- <h2>Media Object</h2>
    <p>Create a media object with the .media and .media-body classes:</p>
    -->
        <div class="media border p-3">
          <img src="/image/profile/profile.jpeg" alt="John Doe" class="mr-3 mt-3 rounded-circle" style="width:60px;">
          <div class="media-body">
            <h6 class="d-block mb-0 pb-0"><?php echo "" . $row['firstname'] . " " . $row['lastname']; ?></h6>
            <h6 class="mt-0 pt-0">@<?php echo $row['username']; ?><small><i> <?php echo time_elapsed_string($row['timestamp']); ?></i></small></h6>
            <p><strong><?php echo $row['content']; ?> </strong></p>
            <button id="btn<?=$tid?>" class="btn btn-sm btn-danger" onclick="like(<?=$tid?>)"><?php echo "likes " . $row['likecnt']; ?>
            </button> <button class="btn btn-sm btn-success"><?php echo "retweet " . $row['retweetcnt']; ?> </button>
            <?php
            if ($_SESSION['id'] == $row['uid']) {
              
              // echo "user id in session ".$_SESSION["id"];
              //echo "this is tweet id:".$row['tid'];
              //                            echo "<a class=' btn btn-sm btn-warning' href='/deletetweet.php?tid=$tid'> Delete tweet</a>";

            ?><a id="delete" class="delete btn btn-sm btn-warning" onclick="deleteTweet(<?= $tid ?>)">Delete tweet</a>

            <?php
            }
            ?>
          </div>
        </div>
      </div>

    <?php }
  } else {
    echo "no tweets from you!! ";
  }
  //$conn->close();


  $_GET['usn'] = "";
} else {


  $userid = $_SESSION['id'];
  $username = $_SESSION['username'];


  require_once "./timeelaspedfunction.php";

//  include "config.php";

  $sql = "select t.uid,t.content, t.likecnt, t.retweetcnt, t.timestamp, u.username, u.firstname, u.lastname from tweets t LEFT JOIN users u on t.uid=u.uid where t.uid='$userid' ORDER BY t.timestamp desc";

  //$sql ="select * from tweets where uid='$userid'";

  $result = $conn->query($sql);
  //$rows=mysqli_fetch_array($result);

  if ($result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {

    ?>






      <div class="container mt-3">
        <!-- <h2>Media Object</h2>
  <p>Create a media object with the .media and .media-body classes:</p>
  -->
        <div class="media border p-3">
          <img src="/image/profile/profile.jpeg" alt="John Doe" class="mr-3 mt-3 rounded-circle" style="width:60px;">
          <div class="media-body">
            <h6 class="d-block mb-0 pb-0"><?php echo "" . $row['firstname'] . " " . $row['lastname']; ?></h6>
            <h6 class="mt-0 pt-0">@<?php echo $username; ?><small><i> <?php echo time_elapsed_string($row['timestamp']); ?></i></small></h6>
            <p><strong><?php echo $row['content']; ?> </strong></p>
            <button class="btn btn-sm btn-danger"><?php echo "likes " . $row['likecnt']; ?></button> <button class="btn btn-sm btn-success"><?php echo "retweet " . $row['retweetcnt']; ?> </button>
          <?php /*

            if ($userid == $row['uid']) {
              $tid = $row['tid'];

              //    echo "<a class=' btn btn-sm btn-warning' href='./deletetweet.php?tid=$tid'> Delete tweet</a>";  onclick="deleteTweet($tid)"
            ?>
              <button id="delete" class='btn btn-sm btn-warning' onclick="deleteTweet($tid)"> Delete tweet</button>
              <p id="txtHint"></p>
            <?php
            }
          
          */
          ?>

          </div>
        </div>
      </div>

<?php }
  } else {
    echo "no tweets from you!! ";
  }
  $conn->close();
}
?>