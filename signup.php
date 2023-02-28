<?php
    include_once 'header.php';
?>
       <section class="signup-form">
            <form action="includ/signup.inc.php" method="post"> 
                <!-- it is called "signup.inc.php" just to make this file
                     not a "page" that the user can see and it just has some PHP script -->
                
                <div class="container">
                    <div class="row">
                        <div class="col-md-3"></div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <h1 class="title">Sign up</h1>
                                        <label for="formGroupExampleInput" class="form-label">Name </label>
                                        <input class="form-control"  type="text" name="name" placeholder="Enter your name ... " >
                                    </div>
                                    <div class="mb-3">
                                        <label for="formGroupExampleInput2" class="form-label">Email</label>
                                        <input class="form-control" type="text"  name="email" placeholder="Enter your email ...">
                                    </div>
                                <div class="mb-3">
                                    <label for="formGroupExampleInput2" class="form-label">Username</label>
                                    <input class="form-control" type="text"  name="uid" placeholder="Enter your username ... " >
                                </div>                                                                        
                                <div class="mb-3">
                                    <label for="formGroupExampleInput2" class="form-label">Password</label>
                                    <input class="form-control"  type="password" name="pwd" placeholder="Enter your password ... ">
                                </div>     
                                <div class="mb-3">
                                    <label for="formGroupExampleInput2" class="form-label">Password Repeat</label>
                                    <input class="form-control"  type="password" name="pwdrepeat" placeholder="Repeat your password ... ">
                                </div> 
                                 <!--       ! remark ! 
                                    we use the backend to check for empty inputs because
                                    if we just add 'required' to the input tag, the user 
                                    can actually change the code in the developer tool and 
                                    then submit the form, thats why its more secure to check
                                    for it in the backend.
                                 -->
                                
                                
                                <button type="submit" name="submit"  class="btn btn-primary"> Sign Up</button>
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
                else if($_GET["error"] == "invaliduid"){
                    echo "<p>Username must only contain letters and numbers </p>";
                }
                else if($_GET["error"] == "invalidemail"){
                    echo "<p>Enter a valid email address  </p>";
                }
                else if($_GET["error"] == "passwordsdontmatch"){
                    echo "<p>passwords doesn't match </p>";
                }
                else if($_GET["error"] == "stmtfailed"){
                    echo "<p>Oops something went wrong.. try again </p>";
                }
                else if($_GET["error"] == "usernametaken"){
                    echo "<p>username is already taken, try something else</p>";
                }
                else if($_GET["error"] == "emailtaken"){
                    echo "<p>email is already linked to another account, try something else</p>";
                }
                else if($_GET["error"] == "none"){
                    echo "<p>You have signed up!</p>";
                }
            }

        ?>
        </section>



       

<?php
    include_once 'footer.php';
?>
