<?php require_once('template/header.php'); ?>

<?php

    // Optional: For Successful registration notification only (CSS)
    $registered = false;
    if (isset($_GET['registered']))
        $registered = $_GET['registered'];

    // For CSS use only
    $invalid_username        = "";
    $invalid_password        = "";
    $invalid_retype_password = "";

    // For validation of credentials
    $invalid_credentials = false;

    // Credentials value: By default set to empty string
    $username        = "";
    $password        = "";
    $retype_password = "";

    /*
     *  Checks if the request is POST request 
     *  triggered when you login button
     */
    if ($_SERVER['REQUEST_METHOD'] == "POST") 
    {
        // Set username and password
        $username        = $_POST['username'];
        $password        = $_POST['password'];
        $retype_password = $_POST['retype_password'];

        // default value every post request/login button click event
        $invalid_credentials = false;

        // Check if either username or password are empty
        if (empty($username) || empty($password) || empty($retype_password))
        {
            // apply CSS style if username is empty
            if (empty($username))
                $invalid_username = 'is-invalid';

            // apply CSS style if password is empty
            if (empty($password))
                $invalid_password = 'is-invalid';

            
            // apply CSS style if retype password is empty
            if (empty($retype_password))
                $invalid_retype_password = 'is-invalid';

        }
            
        // executes if username and password is valid (not empty)
        else 
        {
            // Check if password and retype password did not match
            if ($password !== $retype_password)
                $invalid_retype_password = 'is-invalid';
    
            else 
            {
                // Call the register method to register new user
                if (register_user($username, $password))
                    header("Location: register.php?registered=true");
                
                // Set invalid credentials to true if username already exists.
                else
                {
                    $invalid_username = 'is-invalid';
                    $invalid_credentials = true;
                }
            }
                
        }
    }

?>

<div class="container mt-5">
    <div class="row d-flex justify-content-center mt-5">
        <div class="col-10 col-md-6 col-lg-4">

            <!-- Optional: For successful registration notification only, For CSS styles only -->
            <?php if ($registered): ?>
                <div class="alert alert-primary" role="alert">
                    <h4 class="text-center">Successfuly registered</h4>
                </div>

                <div class="d-flex justify-content-center my-5">
                    <a href="login.php" class="btn btn-info px-5">Login</a>
                </div>
            <?php endif; ?>

            <?php if (!$registered): ?>
                <form 
                    class="p-3 border"
                    method="post" 
                    action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                    
                    <h4 class="text-center py-3">Register Form</h4>

                    <div class="form-group">
                        <label>Username</label>
                        <input 
                            class="form-control <?php echo $invalid_username; ?>"
                            type="text" 
                            value="<?php echo $username; ?>"
                            name="username">

                        <!-- For CSS styles only -->
                        <?php if (!$invalid_credentials): ?>
                            <div class="invalid-feedback">
                                Please enter a username.
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <input 
                            class="form-control <?php echo $invalid_password; ?>"
                            type="password"
                            value="<?php echo $password; ?>"
                            name="password">

                        <!-- For CSS styles only -->
                        <?php if (!$invalid_credentials): ?>
                            <div class="invalid-feedback">
                                Please enter a password.
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="form-group">
                        <label>Retype Password</label>
                        <input 
                            class="form-control <?php echo $invalid_retype_password; ?>"
                            type="password"
                            value="<?php echo $retype_password; ?>"
                            name="retype_password">

                        <!-- For CSS styles only -->
                        <?php if (!$invalid_credentials): ?>
                            <div class="invalid-feedback">
                                Two passwords did not match.
                            </div>
                        <?php endif; ?>
                    </div>

                    <!-- Validation error form backend -->
                    <?php if ($invalid_credentials): ?>
                        <p class="text-center text-danger">
                            <small>Invalid credentials. username already exists.</small>
                        </p>
                    <?php endif; ?>

                    <div class="d-flex justify-content-center">
                        <button type="submit" class="my-4 btn btn-info px-5">Register</button>
                    </div>

                    <p class="text-center"> 
                    Already have an account? 
                        <a  href="login.php"> Login here</a>
                    </p>
                </form>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php require_once('template/footer.php'); ?>