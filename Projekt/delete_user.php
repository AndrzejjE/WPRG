<?php

session_start();
require 'functions.php';

if (isset($_POST['delete'])) {
    $conn = connectToDatabase();

    $username = $_POST['username'];
    deleteUser($conn, $username);
    session_destroy();
    header("Location: index.php");
}
?>
