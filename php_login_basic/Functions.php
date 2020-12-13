<?php

session_start();

// Checks if user is logged in. Return true if logged in and false otherwise.
function is_user_logged_in()
{
    if (isset($_SESSION['username']))
        return true;

    return false;
}

function connect_to_database()
{
    // Database credentials
    $servername = "localhost";
    $username = "root";
    $password = "";

    // Create connection
    $conn = new mysqli($servername, $username, $password);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    echo "connection successful";
}

?>