<?php
$host = "localhost";
$username = "root";
$password = "f24G8e#1234";
$database = "online_bus_registration_system";

//Creating Database connection
$con = mysqli_connect($host,$username,$password,$database);

//Check database connection
if(!$con)
{
    die("Connection Failed: ". mysqli_connect_error());
}
else {
   echo ""; 
}
?>