<?php
/*
This file contains database configuration assuming you are running mysql using user "root" and password ""
*/

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'twitter');


// define('DB_SERVER', 'localhost');
// define('DB_USERNAME', 'id17025109_samirpawar');
// define('DB_PASSWORD', 'Qtd%Uw0B{C-r0~>f');
// define('DB_NAME', 'id17025109_twitter');


// Try connecting to the Database
$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

//Check the connection
if($conn->connect_error){
    echo 'Error: Cannot connect:'.$conn->connect_error;
}
?>
