<?php
//This script will handle login
session_start();

$err="";
$username="";
// check if the user is already logged in
if (isset($_SESSION['username']) && $_SESSION['username']!="") {
  header("location: home.php");
  exit;
}

require_once "config.php";

// if request method is post
if ($_SERVER['REQUEST_METHOD'] == "POST") {
  if (empty(trim($_POST['username'])) || empty(trim($_POST['password']))) {
    $err = "Please enter username & password";
  } 
  else {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
  }

  if (empty($err)) {

    $sql= "SELECT * FROM users WHERE username ='$username'";

    $result=$conn->query($sql);

    if ($result->num_rows>0)
     {
        //user exist
      $row=$result->fetch_assoc();
       
          if(password_verify($password, $row['password'])) 
          {
            // this means the password is corrct. Allow user to login
         //   session_start();
            $_SESSION["username"] = $username;
            $_SESSION["id"] = $row['uid'];
            $_SESSION["loggedin"] = true;
            $_SESSION["successmsg"]="welcome ".$username."!!";
            //Redirect user to welcome page
            header("location: home.php");
          }
          $err="password incorrect";
      }else
      {   
        $err="user doest exit";
      }
    }
 }


$conn->close();
?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <style>
        .error {

            color: red;
        }
    </style>

  <title>Tweeters</title>
</head>

<body>
<?php
if (@$_GET['registered'] == 'true')
{
    echo '<div class="alert alert-success  alert-dismissible">
    <strong>Success!</strong>Registration completed please login!.
  </div>';
}?>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Tweeter</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="register.php">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="login.php">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="logout.php">Logout</a>
        </li>



      </ul>
    </div>
  </nav>
<section class="container mt-4 mx-auto">
  <div class="row">
  <div class="col-md-6 col-lg-6 col-sm-12">
    <h3>Please Login Here:</h3>
    <hr>

    <form action="" method="post">
      <div class="form-group">
        <label for="exampleInputEmail1">Username</label>
        <input type="text" name="username" value="<?=$username?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Username">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Enter Password">
      </div>
     <span class="error"><?= $err?></span>
     <div>
      <button type="submit" class="btn btn-primary">Submit</button>
     </div>
    </form>
  </div>
  </div>
</section>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>