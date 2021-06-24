<?php

session_start();

   // echo "session".$_SESSION["loggedin"];
   include_once "./config.php";
   //include "./bootstrapcss.php";

   if ($_SESSION['loggedin'] == true) {
    $userid;

       $username = $_SESSION['username'];
       $uid = $_SESSION['id'];

       //get user name
       $user = $_GET['usn'];

       if ($user == $username) {
          // echo "error loading user";
           header("location: profile.php");
       } else {
           //find uid of userid

       
               $sql = "select * from users where username='$user'";


               $result = $conn->query($sql);
                if($result)
                {
               $row = $result->fetch_assoc();

               $userid = $row['uid'];
                }
               //echo "userid for user $user is $userid";

        


           $sql2 = "SELECT SUM(follower = '$userid') AS followerCount, SUM(following = '$userid') AS followingCount FROM followers WHERE follower = '$userid' OR following = '$userid';";


           $result = $conn->query($sql2);
           $row = $result->fetch_assoc();

           $followerCount = $row['followerCount'];
           $followingCount = $row['followingCount'];

           $sql3 = "select * from followers where following='$userid' and follower='$uid'";
           $result = $conn->query($sql3);
           $row1 = $result->fetch_assoc();
           $isfollow = "0";


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
  //  session_start();

    include_once "./bootstrapcss.php";
    include_once "./comp/nav.php";
    include_once "./timeelaspedfunction.php";

    ?>

</head>

<body>
    <?php




 
        if($result->num_rows>0)
        {
         //   if ($row1['following'] == $row1['follower']) {
                $isfollow = 1;
           // }
        }
           // echo "row:".print_r($row1);
        //    $conn->close();

           // include "config.php";


            $sql2 = "select * from users where username='$user';";
            $result = $conn->query($sql2);
            $row = $result->fetch_assoc();

            $firstname = $row['firstname'];
            $lastname = $row['lastname'];

        //    $conn->close();
    ?>




            <div class="container mt-3">

                <div class="media border p-3">
                    <img src="image/profile/profile.jpeg" alt="John Doe" class="mr-3 float-left rounded-circle " style="width:60px;">
                    <div class="media-body">
                        <div class="row ">
                            <div class="d-inline col-lg-6 col-md-6">
                                <h5 class="mt-0 pt-0"><?php echo $firstname . " " . $lastname; ?></h5>
                                <h5>@<?php
                               // print_r($row);
                                echo $row['username']; ?></h5>
                            </div>
                            <div class="d-inline col-lg-6 col-md-6">
                                <h5 id="following">FOLLOWING <strong><?php echo $followerCount; ?></strong> </h5>
                                <h5 id="followers">FOLLOWERS <strong id="followingcnt" ><?php echo $followingCount ?></strong></h5>
                            </div>
                        </div>
                        <!-- ADD FOLLOW/UNFOLLOW BUTTON LATER -->

                        <!-- <div class="btn-group-toggle" data-toggle="buttons">
                            <label class="btn btn-primary active">
                                <input id="FUbtn" type="checkbox" onclick="followUnfollow($uid)" checked> Follow
                            </label>
                        </div> -->
                        <?php

                        if ($isfollow == 0) {
                        ?>
                            <button class="btn btn-primary" id="FUbtn" onclick="followUnfollow(<?= $userid ?>)">follow</button>
                            <!-- <a class="btn btn-primary" href="./unfollowunfollow.php?id=<?= $userid ?>">follow</a> -->
                        <?php
                        } else {
                        ?>
                            <button class="btn btn-primary" id="FUbtn" onclick="followUnfollow(<?= $userid ?>)">unfollow</button>

                        <?php } ?>

                    </div>
                </div>
            </div>
            </div>

            <?php
            //include "maketweet.php";
            ?>

            <hr>
    <?php
            $_GET['usn'] = $userid;
            include "tweet.php";
        }
    } else {
        header("location:./login.php");
    }


    ?>

</body>

</html>