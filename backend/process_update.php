<?php

// Initialize the session
session_start();

// Check if the user is already logged in, if yes then redirect him to welcome page
if(!isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}
require "Configfile.php";
$id = $_POST['id'];
$username = $_POST['username'];
$firstname = $_POST['firstname'];

$sql = "UPDATE users1 SET username='$username', firstname='$firstname' WHERE id='$id'";
if ($link->query($sql) === TRUE) {
    $message="Record updated successfully";
    $status="Updated";
} else {
      $message="Error updating record: " . $link->error;
      $status="Not";
    
}

$link->close();
include "modalCard.php";
?>