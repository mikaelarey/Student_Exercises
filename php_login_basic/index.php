<?php

require_once('Functions.php');

if (is_user_logged_in())
    header('Location: home.php');

else
    header('Location: login.php');

?>