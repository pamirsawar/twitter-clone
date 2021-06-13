<?php
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true) {
?>


  <nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
    <a class="navbar-brand" href="javascript:void(0)">Tweeter</a>
   
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

 
    <div class="collapse navbar-collapse " id="navbarNavDropdown">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="../home.php">Home <span class="sr-only">(current)</span></a>
        </li>
        <!-- <li class="nav-item">
          <a class="nav-link" href="./register.php">Register</a>
        </li> -->
        <!-- <li class="nav-item">
          <a class="nav-link" href="./login.php">Login</a>
        </li> -->
        <li class="nav-item">
          <a class="nav-link" href="../logout.php">Logout</a>
        </li>
      </ul>

      <ul class="navbar-nav">
        <li class="mr-auto nav-item active">
          <a class="nav-link" href="../profile.php"> <img src="https://img.icons8.com/metro/26/000000/guest-male.png"> 
            <?php echo $_SESSION["username"]; ?>
          </a>
        </li>
      </ul>

      <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" onkeyup="showResult(this.value)" type="text" placeholder="Search">
        <!-- <button class="btn btn-success my-2 my-sm-0" type="button">Search</button> -->
      </form>
      <ul id="searchResult" class="nav-list list-group">
    

      
    </div>
  </nav>




  
  
<?php
} else {
?>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Tweeter</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="true" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="../home">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../register.php">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../login.php">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../logout.php">Logout</a>
        </li>
      </ul>
    </div>
  </nav>
<?php
}
?>