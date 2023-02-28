<?php

$serverName = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "phpproject01"; 


//MySQLi is an updated version of mySQL, there is also PDO 
$conn = mysqli_connect( $serverName, $dbUsername, $dbPassword, $dbName );
//the variable $conn is the connection to mysqli

if (!$conn){  //if the connection fails 
    die("Connection failed :" . mysqli_connect_error());
                                /*returns the specific error that 
                                    we're encountering */

} 