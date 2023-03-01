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
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
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
    /* the ? marks are used as placeholders for the username and email
        so when we are sending the data the database won't read the data
        as an actual CODE but it is going to see it as characters */
    //prepared statement
    $stmt =mysqli_stmt_init($conn);
    //we are initializing the statement

    /*the user is able to write in some code in the input fields 
    and if they do so they can destroy or change our database 
    so to prevent this we want to use prepared statement to make it
    more secure (the user can add :  ' --   and this makes the rest 
    of the SQL code a comment) */

    /* This helps prevent SQL injection attacks by ensuring that 
        user input is NOT DIRECTLY INCLLUDED in the SQL query. */
    if (!mysqli_stmt_prepare($stmt , $sql)){
        header("location: ../signup.php?error=stmtfailed"); 
        exit();
        //checking if we have a mistake during the preparation statement
    }
    mysqli_stmt_bind_param($stmt,"ss",$username ,$email);
    //here we are filling the placeholders with STRING variables 
    mysqli_stmt_execute($stmt);
    //executing the statement


    $resultData = mysqli_stmt_get_result($stmt);
    /* right now we are checking if the user exists in the database,
        if it does exist i do not wanna sign this person up cause it 
        already exists in the DB*/
    if ($row = mysqli_fetch_assoc($resultData)){
        /* the function means that we are fetching the data as an 
            associative array (column set to their name) and i want 
            to see if there is any user that used $resultData */
            // echo "<pre>";
            // print_r($row);
            // echo "</pre>";
        return $row;
        /*here we are setting another ! PURPOSE ! to the funciton :
        if there is data inside the DB with the username/email then 
        i want to grab the data with the username so that we keep 
        it for the LOG IN FORM  */
    }
    else{
        /*in this case we have no user in the DB with the same
         username & email*/
        $result = false ;
        return $result;
    }

    /*    --------------------IN GENERAL---------------------  */ 
    /* 
        in this function we are checking if the account already exists 
        1- if it already exists we STOP the sign up process and grab the data 
            to the log in form 
        2- if it does not exist we are continuing the sign up process 
    */

    mysqli_stmt_close($stmt);
    //closing the statement
}
//we are doing the same thing for creating the user account
function createUser($conn, $name, $email,$username, $pwd){
    $sql = "INSERT INTO users (usersName, usersEmail, usersUid, usersPwd) 
            VALUES (?,?,?,?);";
    //prepared statement
    $stmt =mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt , $sql)){
        header("location: ../signup.php?error=stmtfailed"); 
        exit();
    }
    /*if some hacker accesses the DB we would not want him to get all
    the user's passwords , so we are going to HASH the pwds to make 
    it unreadable */
    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT); 
    mysqli_stmt_bind_param($stmt,"ssss",$name, $email,$username, $hashedPwd);

    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../signup.php?error=none"); 
    exit();
}
function emptyInputLogin($username, $pwd){
    $result = "";
    if(empty($username)||empty($pwd)){
        $result = true ;
    }
    else{
        $result = false ;
    }
    return $result;  
}
function loginUser($conn, $username, $pwd){
    $uidExists = uidExists($conn ,$username ,$username);
    /* we repeated $username because we want to take the input from the user
        as either a Username or an Email*/  
    if ($uidExists === false){
        header("Location: ../login.php?error=wronglogin");
        exit();
    }
    
    /* here we are checking if he entered the right pwd */
    $pwdHashed = $uidExists["usersPwd"];
    $checkPwd = password_verify($pwd,$pwdHashed);
    if ($checkPwd === false){
        header("Location:../login.php?error=wrongpwd");
        exit();
    }
    else if($checkPwd === true){
        session_start();
        $_SESSION["userid"] = $uidExists["userSId"];
    
        $_SESSION["useruid"] = $uidExists["usersUid"];
        header("Location:../index.php");
        exit();

        /*  Session variables hold information about one single user,
            and are available to all pages in one application
            You can also use cookie, the difference is that the cookie 
            recognize the computer that just loged in mean while session 
            does not until you log in and hold your infos  
                cookies are used to store data on the client-side,
            while sessions are used to store data on the server-side */
            
    }
}