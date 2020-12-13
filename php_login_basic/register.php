<?php require_once('template/header.php'); ?>

<div class="container mt-5">
    <div class="row d-flex justify-content-center mt-5">
        <div class="col-10 col-md-6 col-lg-4">
            <form 
                class="p-3 border"
                method="post" 
                action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                
                <h4 class="text-center py-3">Register Form</h4>

                <div class="form-group">
                    <label>First Name</label>
                    <input type="text" class="form-control">
                </div>

                <div class="form-group">
                    <label>Last Name</label>
                    <input type="text" class="form-control">
                </div>

                <div class="form-group">
                    <label>Username</label>
                    <input type="text" class="form-control">
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control">
                </div>

                <div class="form-group">
                    <label>Retype Password</label>
                    <input type="password" class="form-control">
                </div>

                <div class="d-flex justify-content-center">
                    <button type="submit" class="my-4 btn btn-info px-5">Register</button>
                </div>

                <p class="text-center"> 
                Already have an account? 
                    <a  href="login.php"> Login here</a>
                </p>
            </form>
        </div>
    </div>
</div>

<?php require_once('template/footer.php'); ?>