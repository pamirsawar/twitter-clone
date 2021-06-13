<?php
require_once "config.php";

$username = $useremail = $fname_err = $lname_err = $password = $confirm_password = "";
$username_err = $usermail_err = $fname_err = $lname_err = $password_err = $confirm_password_err = "";


function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {



    if (empty(trim($_POST['fname']))) {

        $fname_err = "first name cannot be empty";
    } else {
        $fname = test_input($_POST["fname"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z-' ]*$/", $fname)) {
            $fname_err = "Only letters and white space allowed";
        }
    }
    if (empty(trim($_POST['lname']))) {

        $lname_err = "last name cannot be empty";
    } else {
        $lname = test_input($_POST["lname"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z-' ]*$/", $lname)) {
            $lname_err = "Only letters and white space allowed";
        }
    }

    //email validation
    if (empty($_POST["useremail"])) {
        $useremail_err = "Email is required";
        $useremail = $_POST['usermail'];
    } else {
        $useremail = test_input($_POST["useremail"]);
        // check if e-mail address is well-formed
        if (!filter_var($useremail, FILTER_VALIDATE_EMAIL)) {
            $useremail_err = "Invalid email format";
        }
    }


    // Check if username is empty       

    if (empty(trim($_POST['username']))) {
        $username_err = "Username cannot be blank";
        $username = test_input($_POST['username']);
    }

    if (!empty(trim($_POST['username']))) {
        $username = test_input($_POST['username']);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[0-9a-zA-Z-' ]*$/", $username)) {
            $username_err = "no speacial charcter allowed in username";
        } else {

            $username = $_POST['username'];
            $sql = "SELECT uid FROM users WHERE username = '$username'";
            $result = $conn->query($sql);
            if ($result) {

                if ($result->num_rows == 1) {
                    $username_err = "This username is already taken";
                } else {
                    $username = trim($_POST['username']);
                  //  $username_err="";

                }
            }
        }
    }



    // Check for password
    if (empty(trim($_POST['password']))) {
        $password_err = "Password cannot be blank";
    } elseif (strlen(trim($_POST['password'])) < 6) {
        $password_err = "Password cannot be less than 6 characters";
    } else {
        $password = trim($_POST['password']);

      //  $password_err="";
    }

    // Check for confirm password field
    if (trim($_POST['password']) !=  trim($_POST['confirm_password'])) {
        $confirm_password_err = "Passwords should match";
    }else{
        $confirm_password_err="";
    }

    if (empty(trim($_POST['dob']))) {
        $dob_err = "please enter your birthdate";
        $dob = $_POST['dob'];
    } else {
        $dob = $_POST['dob'];
    }


    // If there were no errors, go ahead and insert into the database

        echo "username error: ".$username_err;


    if (empty($username_err) && empty($password_err) && empty($confirm_password_err) && empty($dob_err)) {

echo "in here";

        $sql = "INSERT INTO users (username,useremail,password,dob,firstname,lastname) VALUES (?,?,?,?,?,?)";

        $stmt = $conn->prepare($sql);
        if ($stmt) {
            $stmt->bind_param("ssssss", $param_username, $param_usermail, $param_password, $param_dob, $param_firstname, $param_lastname);
            // Set these parameters
            $param_username = $_POST['username'];
            $param_password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $param_usermail = $_POST['useremail'];
            $param_dob = $_POST['dob'];
            $param_firstname = $_POST['fname'];
            $param_lastname = $_POST['lname'];
            // Try to execute the query
            $result = $stmt->execute();
        }
        $stmt->close();
        $conn->close();
        header("location: login.php?registered=true");
    }
}

?>




<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <title>twitter</title>

    <style>
        .error {

            color: red;
        }
    </style>

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Twitter </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only"></span></a>
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

    <div class="container mt-4">
        <h3>Please Register Here:</h3>
        <hr>
        <form action="" method="post">

            <div class="form-group col-md-6">
                <label for="inputEmail4">first name </label>
                <input value="<?= $fname ?>" type="text" class="form-control" name="fname" placeholder="first name">
                <span class="error"><?= $fname_err ?></span>
            </div>
            <div class="form-group col-md-6">
                <label for="inputEmail4">last name </label>
                <input value="<?= $lname ?>" type="text" class="form-control" name="lname" placeholder="last name">
                <span class="error"><?= $lname_err ?></span>
            </div>
            <div class="form-group col-md-6">
                <label for="inputEmail4">email </label>
                <input type="text" class="form-control" name="useremail" value="<?= $useremail ?>" placeholder="Email">
                <span class="error"><?= $useremail_err ?></span>
            </div>
            <div class="form-group col-md-6">
                <label for="inputEmail4">Username</label>
                <input type="text" class="form-control" name="username" value="<?= $username ?>" placeholder="username">
                <span class="error"><?= $username_err ?></span>
            </div>
            <div class="form-group col-md-6">
                <label for="inputPassword4">Password</label>
                <input type="password" autocomplete="new-password" value="<?= $password ?>" class="form-control" name="password" id="inputPassword4" placeholder="Password">
                <span class="error"><?= $password_err ?></span>

            </div>
            <div class="form-group col-md-6">
                <label for="inputPassword4">Confirm Password</label>
                <input type="password" class="form-control" name="confirm_password" value="<?= $confirm_password ?>" id="inputPassword" placeholder="Confirm Password">
                <span class="error"><?= $confirm_password_err ?></span>
            </div>


            <div class="form-group col-md-6">
                <label for="inputEmail4">dob </label>
                <input type="date" class="form-control" name="dob" placeholder="date of birth">
            </div>


            <button type="submit" class="btn btn-primary ml-3">Sign in</button>
        </form>
    </div>

    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>

</body>

</html>