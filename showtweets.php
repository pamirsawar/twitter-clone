<?php


//delete this later

include_once "./config.php";
require_once "./timeelaspedfunction.php";
//session_start();
$id = $_SESSION['id'];
//$sql="select * from tweets where uid='$id' or uid in (select following from followers where follower='$id');";

try {
    $sql = "select t.uid,t.tid,t.content,t.likecnt,t.retweetcnt,t.timestamp,u.username,u.firstname,u.lastname from tweets t left join users u on t.uid=u.uid where t.uid='$id' or t.uid in (select following from followers f where f.follower='$id') ORDER BY t.timestamp desc";
    $result = $conn->query($sql);



    if ($result->num_rows > 0) {

        while ($row = $result->fetch_assoc()) {
            $tid = $row['tid'];
?>


            <div id="tweet<?= $tid ?>" class=" container mt-3">
                <!-- <h2>Media Object</h2>
  <p>Create a media object with the .media and .media-body classes:</p>
  -->
                <div class="media border p-3">
                    <img src="/image/profile/profile.jpeg" alt="John Doe" class="mr-3 mt-3 rounded-circle" style="width:60px;">
                    <div class="media-body">
                        <h6 class="d-block mb-0 pb-0"><?php echo "" . $row['firstname'] . " " . $row['lastname']; ?></h6>
                        <h6 class="mt-0 pt-0"><a href="/user.php?usn=<?= $row['username'] ?>">@<?php echo $row['username']; ?></a><small><i> <?php echo time_elapsed_string($row['timestamp']); ?></i></small></h6>
                        <p><strong><?php echo $row['content']; ?> </strong></p>

                        <?php

                        $sql2 = "select * from likes where tid='$tid' and uid='$id'";

                        $result2 = $conn->query($sql2);

                        if ($result2->num_rows) {

                            $flag = "liked";
                        } else {
                            $flag = "like";
                        }
                        ?>

                        <button id="btn<?= $tid ?>" class="btn btn-sm btn-danger" onclick="like(<?= $tid ?>)"><?= $flag ?> <?php echo "" . $row['likecnt']; ?> </button>

                        <?php
                        //comment count
                        $sql3 = "select * from comments where tid='$tid'";
                        $result3 = $conn->query($sql3);
                        ?>

                        <a href="/comment.php?tid=<?= $tid ?>" class="btn btn-sm btn-success"><?php echo "add comment " . $result3->num_rows; ?> </a>

                        <?php
                        if ($id == $row['uid']) {
                            // $tid = $row['tid'];

                            //  echo "<a class=' btn btn-sm btn-warning' href='/deletetweet.php?tid=$tid'> Delete tweet</a>";
                        ?>



                            <a id="delete" class="delete btn btn-sm btn-warning" onclick="deleteTweet(<?= $tid ?>)">Delete tweet</a>

                        <?php
                        }
                        ?>

                    </div>
                </div>
            </div>

<?php
        }
    }
} catch (Exception $e) {
    echo $e->getTraceAsString();
}
$conn->close();

?>