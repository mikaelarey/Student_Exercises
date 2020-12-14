<?php require_once('template/header.php'); ?>

<?php
    // Checks if user is logged in
    if (!is_user_logged_in())
        header('Location: login.php');   
?>

<h1 class="text-center mt-5">WELCOME <?php echo $_SESSION['username']; ?>!</h1>
<h4 class="text-center">Have a nice day!</h4>

<?php require_once('template/footer.php'); ?>