<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comment </title>

    <?



    ?>

</head>

<body>
    <?php
    include "./bootstrapcss.php";

    require_once "./timeelaspedfunction.php";

    session_start();
    $tid = $_GET['tid'];
    $uid = $_SESSION['id'];
    include "./config.php";

    $sql = "select t.uid,t.tid,t.content,t.likecnt,t.retweetcnt,t.timestamp,u.username,u.firstname,u.lastname from tweets t left join users u on t.uid=u.uid where t.tid='$tid'";


    $result = $conn->query($sql);

    $row = $result->fetch_assoc();


    ?>

    <div id="tweet<?= $tid ?>" class=" container mt-3">
        <!-- <h2>Media Object</h2>
  <p>Create a media object with the .media and .media-body classes:</p>
  -->
        <div class="media border p-3">
            <img src="/image/profile/profile.jpeg" alt="John Doe" class="mr-3 mt-3 rounded-circle" style="width:60px;">
            <div class="media-body">
                <h6 class="d-block mb-0 pb-0"><?php echo "" . $row['firstname'] . " " . $row['lastname']; ?></h6>
                <h6 id="username" class="mt-0 pt-0"><a href="/user.php?usn=<?= $row['username'] ?>">@<?php echo $row['username']; ?></a><small><i> <?php echo time_elapsed_string($row['timestamp']); ?></i></small></h6>
                <p><strong><?php echo $row['content']; ?> </strong></p>

                <?php

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
                <form action="" onsubmit="comment()">
                    <div class="form-group">
                        <label for="comment">Comment:</label>
                        <textarea style="resize: none; height: 55px;" class="form-control" rows="5" id="comment"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Comment</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>