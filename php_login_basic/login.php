<?php require_once('template/header.php'); ?>

<?php

    // For CSS use only
    $invalid_username = "";
    $invalid_password = "";

    // For validation of credentials
    $invalid_credentials = false;

    // Credentials value: By default set to empty string
    $username = "";
    $password = "";

    /*
     *  Checks if the request is POST request 
     *  triggered when you login button
     */
    if ($_SERVER['REQUEST_METHOD'] == "POST") 
    {
        // Set username and password
        $username = $_POST['username'];
        $password = $_POST['password'];

        // default value every post request/login button click event
        $invalid_credentials = false;

        // Check if either username or password are empty
        if (empty($username) || empty($password))
        {
            // apply CSS style if username is empty
            if (empty($username))
                $invalid_username = 'is-invalid';

            // apply CSS style if password is empty
            if (empty($password))
                $invalid_password = 'is-invalid';
        }
            
        // executes if username and password is valid (not empty)
        else 
        {
            // Call the login method and redirect the user to home page if credentials are correct
            if (login_user($username, $password))
                header("Location: home.php");
                
            // Set invalid credentials to true if username and password is incorrect.
            else
            {
                $invalid_username = 'is-invalid';
                $invalid_password = 'is-invalid';

                $invalid_credentials = true;
            }
                
        }
    }

?>

<div class="container mt-5">
    <div class="row d-flex justify-content-center mt-5">
        <div class="col-10 col-md-6 col-lg-4">
            <form 
                class="p-3 border" 
                method="post" 
                action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

                <h4 class="text-center py-3">Login Form</h4>

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

                <!-- Validation error form backend -->
                <?php if ($invalid_credentials): ?>
                    <p class="text-center text-danger">
                        <small>Invalid username or password</small>
                    </p>
                <?php endif; ?>

                <div class="d-flex justify-content-center">
                    <button type="submit" class="my-4 btn btn-info px-5">Login</button>
                </div>

                <p class="text-center"> Don't have an account? 
                    <a  href="register.php"> Register here</a>
                </p>
            </form>
        </div>
    </div>
</div>

<?php require_once('template/footer.php'); ?>