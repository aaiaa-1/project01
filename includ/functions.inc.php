<?php

//if its a pure PHP file u do not need the closing tags 

function emptyInputSignup($name, $email, $username, $pwd, $pwdRepeat){
    $result = "";
    if(empty($name)||empty($email)||empty($username)||empty($pwd)||empty($pwdRepeat)){
        $result = true ;
    }
    else{
        $result = false ;
    }
    return $result;  
}

function invalidUid($username){
    $result = "";
    if(!preg_match("/^[a-zA-Z0-9]*$/" , $username)){
        $result = true ;
    }
    else{
        $result = false ;
    }
    return $result;  
}
function invalidEmail($email){
    $result = "";
    if(filter_var($email, FILTER_VALIDATE_EMAIL)){
        //This is a built-in function that checks the email validation 
        $result = true ;
    }
    else{
        $result = false ;
    }
    return $result;  
}
function pwdMatch($pwd ,$pwdRepeat){
    $result = "";
    if($pwd !== $pwdRepeat){
       //if the 2 passwords don't match
        $result = true ;
    }
    else{
        $result = false ;
    }
    return $result;  
}
function uidExists($conn ,$username ,$email){
    $sql = "SELECT * FROM users WHERE usersUid = ? OR usersEmail = ? ;";
    //prepared statement
    $stmt =mysqli_stmt_init($conn);
    /*the user is able to write in some code in the input fields 
    and if they do so they can destroy or change our database 
    so to prevent this we want to use prepared statement to make it
    more secure */
    if (!mysqli_stmt_prepare($stmt , $sql)){
        header("location: ../signup.php?error=stmtfailed"); 
        exit();
    }
    mysqli_stmt_bind_param($stmt,"ss",$username ,$email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)){
        return $row;
    }
    else{
        $result = false ;
        return $result;
    }
    mysqli_stmt_close($stmt);
}
function createUser($conn, $name, $email,$username, $pwd){
    $sql = "INSERT INTO users (usersName, usersEmail, usersUid, usersPwd) 
            VALUES (?,?,?,?);";
    //prepared statement
    $stmt =mysqli_stmt_init($conn);
    /*the user is able to write in some code in the input fields 
    and if they do so they can destroy or change our database 
    so to prevent this we want to use prepared statement to make it
    more secure */
    if (!mysqli_stmt_prepare($stmt , $sql)){
        header("location: ../signup.php?error=stmtfailed"); 
        exit();
    }
    mysqli_stmt_bind_param($stmt,"ss",$username ,$email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)){
        return $row;
    }
    else{
        $result = false ;
        return $result;
    }
    mysqli_stmt_close($stmt);
}