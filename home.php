<?php

session_start();

if (!isset($_SESSION['loggedin']) && $_SESSION['loggedin']!= false) 
{
    
    header("location: login.php");
//echo "error here";
    
    }
    else{
       
    ?>
    <!DOCTYPE html>
    <html lang="en">
    
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <?php
        include './bootstrapcss.php';
    
    
        ?>
    </head>
    
    
    <body>
    <?php 
    
        include "./config.php";
        include "./comp/nav.php";
        include "./maketweet.php";
        include "./showtweets.php";
        require_once "./timeelaspedfunction.php";
    }



    echo "in body";

if(isset($_SESSION['successmsg']) && $_SESSION['successmsg']!="" )
{
    // $username=$_SESSION["username"];
    echo ' <div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert">&times;</button>  
    ' . $_SESSION['successmsg'] . ' 
  </div>';
  $_SESSION['successmsg']="";
  
}

?>

</body>

</html>
