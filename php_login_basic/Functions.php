<?php

session_start();

// Checks if user is logged in. Return true if logged in and false otherwise.
function is_user_logged_in()
{
    if (isset($_SESSION['username']))
        return true;

    return false;
}

// Login user function
function login_user($username, $password)
{
    // open database connection
    $conn = connect_to_database();

    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    close_connection($conn);

    // Check if username and password are correct.
    if ($result->num_rows > 0) 
    {
        // Set the session username if the credentials are correct.
        $_SESSION['username'] = $username;

        return true;
    } 
    
    // return false if incorrect username or password
    return false;
}

function register_user($username, $password)
{
    // open database connection
    $conn = connect_to_database();

    // Check if username already exists.
    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = $conn->query($sql);

    // return false if username already exists
    if ($result->num_rows > 0) 
        return false;
    
    // Insert username to the database
    $sql = "INSERT INTO users (username, password)
    VALUES ('$username', '$password')";
    
    // return true if user has successfully inserted to the database
    if ($conn->query($sql) === TRUE) {
      return true;
    }
    
    // return false if cannot insert user.
    return false;
}

// Open database connection
function connect_to_database()
{
    // Database credentials
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "login_system";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    return $conn;
}

// Close database connection
function close_connection($conn)
{
    $conn->close();
}

?>