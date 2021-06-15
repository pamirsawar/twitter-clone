<?php
require_once "./timeelaspedfunction.php";
session_start();
$tid = $_GET['tid'];
$id = $_SESSION['id'];
include "./config.php";

$sql = "select t.uid,t.tid,t.content,t.likecnt,t.retweetcnt,t.timestamp,u.username,u.firstname,u.lastname from tweets t left join users u on t.uid=u.uid where t.tid='$tid'";


$result = $conn->query($sql);

$row = $result->fetch_assoc();


?>
<!DOCTYPE html>
<html lang="en">
<?php

include "./bootstrapcss.php";

?>



<body>


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

                $username = $row['username'];

                $sql2 = "select * from likes where tid='$tid' and uid='$id'";

                $result2 = $conn->query($sql2);

                //echo "mysql error".$conn->error;

                if ($result2->num_rows) {

                    $flag = "liked";
                } else {
                    $flag = "like";
                }
                ?>

                <button id="btn<?= $tid ?>" class="btn btn-sm btn-danger" onclick="like(<?= $tid ?>)"><?= $flag ?> <?php echo "" . $row['likecnt']; ?> </button>
                <!-- <button class="btn btn-sm btn-success"><?php // echo "retweet " . $row['retweetcnt']; 
                                                            ?> </button> -->

                <?php
                if ($id == $row['uid']) {
                    // $tid = $row['tid'];

                    //  echo "<a class=' btn btn-sm btn-warning' href='/deletetweet.php?tid=$tid'> Delete tweet</a>";
                ?>
                    <a id="delete" class="delete btn btn-sm btn-warning" onclick="deleteTweet(<?= $tid ?>)">Delete tweet</a>

                <?php
                }
                ?>
                <hr>
                <!-- show comments-->


                <div>

                    <!-- <div id="comments"> -->
                    <ul id="commentDiv" class="list-group">
                        <?php

                        $sql1 = "select * from comments where tid=$tid order by timestamp";

                        $result1 = $conn->query($sql1);

                        while ($row1 = $result1->fetch_assoc()) {

                        ?>
                            <li class="comment-list">
                                <div class="media border p-3">
                                    <img src="/image/profile/profile.jpeg" alt="John Doe" class="mr-3 mt-3 rounded-circle" style="width:60px;">
                                    <div class="media-body">
                                        <!-- <h6 class="d-block mb-0 pb-0"><?php //echo "" . $row1['username']; 
                                                                            ?></h6> -->
                                        <h6 class="mt-0 pt-0"><a href="/user.php?usn=<?= $row1['username'] ?>">@<?php echo $row1['username']; ?></a><small><i> <?php echo time_elapsed_string($row1['timestamp']); ?></i></small></h6>
                                        <p><strong><?php echo $row1['content']; ?> </strong></p>

                                    </div>
                                </div>
                            </li>
                        <?php
                        }
                        ?>
                        <div id="showComment"></div>
                        <ul>
                            <!-- </div> -->
                </div>

                <!-- delete name attribute later -->

                <div class="form-group">
                    <!-- <label for="comment">Comment:</label> -->
                    <textarea style="resize: none; height: 55px;" placeholder="type comment here" class="form-control" rows="5" id="comment" name="comment"></textarea>
                </div>
                <input type="hidden" id="tid" name="tid" value="<?= $tid ?>">
                <input type="hidden" id="username" name="username" value="<?= $username ?>">

                <button type="submit" onclick="commentTweet()" class="btn btn-primary">Comment</button>
                <!-- </form> -->

                <!-- <div id="showComment"></div> -->
            </div>
        </div>
    </div>
</body>

</html>