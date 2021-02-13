<?php
require "includes/header.php"
?>

<main>
    <link rel="stylesheet" href="../css/signup.css">
    <div class="bg-cover">
        <div class="h-100 container center-me">
            <div class="my-auto">
                <div class="signup-form">
                    <form action="includes/signup-helper.php" method="post">

                        <form>

                            <img class="mb-4" src="/docs/5.0/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">
                            <h1 class="h3 mb-3 fw-normal">Please sign up</h1>
                            <p class="hint-text"> Create your account</p>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col">
                                        <input type="text" class="form-control" name="fname" placeholder="First Name" required autofocus>
                                    </div>
                                    <div class="col">
                                        <input type="text" class="form-control" name="lname" placeholder="Last Name" required autofocus>
                                    </div>
                                </div>
                            </div>
                             <input type="text" class="form-control" name="uname" placeholder="Username" required autofocus>

                            <label for="inputEmail" class="visually-hidden">Email address</label>
                            <input type="email" id="inputEmail" class="form-control" name="email" placeholder="Email address" required autofocus>

                            <label for="inputPassword" class="visually-hidden">Password</label>
                            <input type="password" id="inputPassword" class="form-control" name="pwd" placeholder="Password" required>
                            
                            <label for="inputPassword" class="visually-hidden">Confirm Password</label>
                            <input type="password" id="inputPassword" class="form-control" name="con-pwd" placeholder="Confirm Password" required>

                            <!-- <div class="checkbox mb-3">
                                <label>
                                    <input type="checkbox" value="remember-me"> Remember me
                                </label>
                            </div> -->

                            <button class="w-100 btn btn-lg btn-primary" name="signup-submit" type="submit">Sign up</button>
                            <p class="mt-5 mb-3 text-muted">&copy; 2020–9999</p>
                        </form>
                </div>

            </div>
        </div>
    </div>
</main>