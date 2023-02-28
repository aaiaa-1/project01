<?php 

if (isset($_POST["submit"])){
    
    $name = $_POST["name"];
    $email = $_POST["email"];
    $username = $_POST["uid"];
    $pwd = $_POST["pwd"];
    $pwdRepeat = $_POST["pwdrepeat"];

    //error handling 
    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if( emptyInputSignup($name, $email, $username, $pwd, $pwdRepeat) != false ){ 
            //if its anything besides false then throw an error
        header("location: ../signup.php?error=emptyinput"); 
            /*sends u to the location but this time with an error message 
               indicating that error = empty input so we understand that the 
               user forgot to fill an input field*/
        exit();     
    }

    //check if the username & email that the user entered are correct
    if( invalidUid($username) != false ){ 
        header("location: ../signup.php?error=invaliduid"); 
        exit();     
    }
    if( invalidEmail($email) != false ){ 
        header("location: ../signup.php?error=invalidemail");  
        exit();     
    }
    //check if the password and the pwd repeat are matching 
    if( pwdMatch($pwd, $pwdRepeat) != false ){ 
        header("location: ../signup.php?error=passwordsdontmatch"); 
        exit();     
    }
    //check if the username is available
    if( uidExists($conn, $username, $email) != false ){ 
        header("location: ../signup.php?error=usernametaken"); 
        exit();     
    }
    createUser ($conn, $name, $email,$username, $pwd); 
}
else{
    header("location: ../signup.phpt");
    exit();
}