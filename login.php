<?php
    include_once 'header.php';
?>
       <section class="signup-form">
            <form action="includ/login.inc.php" method="post"> 
            <div class="container">
                    <div class="row">
                        <div class="col-md-3"></div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <h1 class="title">Log Into Your Account</h1>
                                        <label for="formGroupExampleInput" class="form-label">Username / Email </label>
                                        <input class="form-control"  type="text" name="name" placeholder="Enter either your username or email ... " >
                                    </div>
                                    <div class="mb-3">
                                        <label for="formGroupExampleInput2" class="form-label">Password</label>
                                        <input class="form-control" type="password"  name="pwd" placeholder="Enter your password ...">
                                    </div>                                                                                                
                                    <button type="submit" name="submit"  class="btn btn-primary">Log In</button>                          
                            </div>
                            <div class="col-md-3"></div>
                        </div>
                </div>
           </form>
           <?php

                if (isset($_GET["error"])){
                    //isset function is used to check if the user submitted the form correctly
                    if($_GET["error"] == "emptyinput"){
                        echo "<p>Fill in all the required fields ! </p>";
                    }
                    else if($_GET["error"] == "wronglogin"){
                        echo "<p>Incorrect login username </p>";
                    }
                    else if($_GET["error"] == "wrongpwd"){
                        echo "<p>Incorrect password </p>";
                    }
                }

            ?>
       </section>




<?php
    include_once 'footer.php';
?>
