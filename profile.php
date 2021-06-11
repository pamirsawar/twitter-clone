<?php
session_start();

include_once "comp/nav.php";
require_once "bootstrapcss.php";
include "config.php";
if ($_SESSION['loggedin'] == true)
{
$username = $_SESSION['username'];
$uid = $_SESSION['id'];



$sql = "SELECT SUM(follower = '$uid') AS followerCount, SUM(following = '$uid') AS followingCount FROM followers WHERE follower = '$uid' OR following = '$uid';";


$result=$conn->query($sql);
$row=$result->fetch_assoc();

$followerCount=$row['followerCount'];
$followingCount=$row['followingCount'];

//$conn->close();

//include "config.php";


$sql2 = "select * from users where uid='$uid';";
$result=$conn->query($sql2);
$row=$result->fetch_assoc();

$firstname=$row['firstname'];
$lastname=$row['lastname'];

//$conn->close();
?>




<div class="container mt-3">
 
<div class="media border p-3">
    <img src="image/profile/profile.jpeg" alt="John Doe" class="mr-3 float-left rounded-circle " style="width:60px;">
    <div class="media-body">
        <div class="row ">
            <div class="d-inline col-lg-6 col-md-6">
                <h5 class="mt-0 pt-0"><?php echo $firstname." ".$lastname;?></h5>
                <h5>@<?php echo $row['username']; ?></h5>
            </div>
            <div class="d-inline col-lg-6 col-md-6">
                <h5>FOLLOWERS <strong><?php echo $followerCount; ?></strong> </h5>
                <h5> FOLLOWING <strong><?php echo $followingCount ?></strong></h5>
            </div>
        </div>
        <!-- ADD FOLLOW/UNFOLLOW BUTTON LATER -->

    </div>
</div>
</div>
</div>

<?php
include "maketweet.php";
?>
<hr>
<?php
$_GET['usn']=$uid;
include_once "tweet.php";

}
else
{
    header("location:./login.php");
}
?>