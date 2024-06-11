<?php
require "Configfile.php";
$id = $_POST['id'];
$username = $_POST['username'];
$firstname = $_POST['firstname'];

$sql = "UPDATE users1 SET username='$username', firstname='$firstname' WHERE id='$id'";
if ($link->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $link->error;
}

$link->close();
?>
