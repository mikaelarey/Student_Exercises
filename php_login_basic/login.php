<?php require_once('template/header.php'); ?>

<?php

    // For CSS use only
    $invalid_username = "";
    $invalid_password = "";

    connect_to_database();

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
                        name="username">
                    <div class="invalid-feedback">
                        Please enter a username.
                    </div>
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <input 
                        class="form-control <?php echo $invalid_password; ?>"
                        type="password"
                        name="password">
                    <div class="invalid-feedback">
                        Please enter a password.
                    </div>
                </div>

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