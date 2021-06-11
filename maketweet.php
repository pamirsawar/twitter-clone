<?php
include "./bootstrapcss.php";
//include "config.php";
//session_start();

$username = $_SESSION['username'];



if (!empty($_POST)) {

  $sql="insert into tweets (content, likecnt, retweetcnt,uid,timestamp) values (?,?,?,?,?)";

  $stmt=$conn->prepare($sql);

  $stmt->bind_param("siiis",$content,$likecnt,$retweetcnt,$uid,$timestamp);

  $uid = $_SESSION['id'];
  $content = htmlspecialchars($_POST["tweet"]);
  $timestamp = date("Y-m-d h:i:sa");
  $likecnt=$retweetcnt=0;

  $stmt->execute();
  $stmt->close();
 // $conn->close();

 // header("header:home.php");
}

?>



<div class="mt-3 container">
<div class="media border p-3">
  <img src="/image/profile/profile.jpeg" alt="John Doe" class="mr-3 mt-3 rounded-circle" style="width:60px;">
  <div class="media-body">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

      <div class="form-group">
        <label for="comment">Post</label>
        <textarea class="form-control" style="resize:none" placeholder="Start typing to post your thought" rows="5" id="comment" name="tweet"></textarea>
      </div>

      <input type="submit" class="btn btn-info" value="Post">
      <input type="reset" class="btn btn-danger" value="Clear">
    </form>

  </div>
</div>
</div>