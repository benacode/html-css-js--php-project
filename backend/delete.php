<?php

// Initialize the session
session_start();

// Check if the user is already logged in, if yes then redirect him to welcome page
if(!isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}
require"configfile.php";
$id = $_POST['id'];

$sql = "DELETE FROM users1 WHERE id='$id'";
if ($link->query($sql) === TRUE) {
    $message= "Record deleted successfully";
    $status="Deleted";
} else {
    $message="Error deleting record: " . $link->error;
    $status="Not";
}

$link->close();
include "modalCard.php";
?>

