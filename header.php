<?php
    session_start();
?>
<!-- this means that in every page that includes 'header.php' we will
    start the session  -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Project 01</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
    <section id="header">
        
        <div>
            <ul id="navbar">
                <a href="#" id="close">
                    <i class="fa-sharp fa-solid fa-xmark"></i>
                </a>
                <li><a class="active" href="index.php">Home</a> </li>               
                <li><a href="about.php">about</a> </li>
                <li><a href="blog.php">Blog</a> </li>
                <?php
                    if (isset($_SESSION["userid"])){
                        echo "<li><a href='profile.php'>Profile Page</a> </li>";
                        echo "<li><a href='includ/logout.inc.php'>Log  Out</a> </li>";
                    }
                    else{
                        echo "<li><a href='signup.php'>Sign up</a> </li>";
                        echo "<li><a href='login.php'>Log In</a> </li>";
                    }
                ?>
               
            </ul>
        </div>       
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>