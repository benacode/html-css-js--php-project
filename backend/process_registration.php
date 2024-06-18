<?php

// Include config file
require "Configfile.php";

// Get form data
$user_name = $_POST['username'];
$first_name = $_POST['firstname'];
$last_name = $_POST['lastname'];
$email = $_POST['email'];
$password = $_POST['password'];

// Hash the password
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Prepare and bind
$stmt = $link->prepare("INSERT INTO users1 (username, firstname, lastname, email, password) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sssss", $user_name, $first_name, $last_name, $email, $hashed_password);

// Execute the statement
if ($stmt->execute()) {
    $message = "New record created successfully";
    $status = "success";
} else {
    $message = "Error: " . $stmt->error;
    $status = "error";
}

// Close the connection
$stmt->close();
$link->close();
include "modalCard.php";
?>
