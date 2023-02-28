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
                                        <input class="form-control" type="text"  name="pwd" placeholder="Enter your password ...">
                                    </div>                                                                                                
                                    <button type="submit" name="submit"  class="btn btn-primary">Log In</button>                          
                            </div>
                            <div class="col-md-3"></div>
                        </div>
                </div>


            </form>
       </section>




<?php
    include_once 'footer.php';
?>
