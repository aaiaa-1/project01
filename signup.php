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
                                <button type="submit" name="submit"  class="btn btn-primary"> Sign Up</button>
                            </div>
                            <div class="col-md-3"></div>
                        </div>
                </div>
            </form>
       </section>



       

<?php
    include_once 'footer.php';
?>
