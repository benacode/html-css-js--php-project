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
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["photo"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
$check = getimagesize($_FILES["photo"]["tmp_name"]);
if($check !== false) {
    $uploadOk = 1;
} else {
    $mesg = " File is not an image.";
    $uploadOk = 0;
}
if (file_exists($target_file)) {
    $mesg = "file already exists.";
    $uploadOk = 0;
}
if ($_FILES["photo"]["size"] > 500000) {
    $mesg = "your file is too large.";
   $uploadOk = 0;
}

 if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" 
&& $imageFileType != "gif" ) {
        $mesg = "only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
} 

if ($uploadOk == 0) {
    $message = "Error: Sorry, your file was not uploaded. ".$mesg ;
    $status = "error";
} else {
    if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
$stmt = $link->prepare("INSERT INTO users1 (username, firstname, lastname, email, password,photo) VALUES (?, ?, ?, ?, ?,?)");
$stmt->bind_param("ssssss", $user_name, $first_name, $last_name, $email, $hashed_password, $target_file);

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
        } else {
            $message = "Error: Sorry, there was an error uploading your file.";
            $status = "error";
        }
    }

$link->close();
include "modalCard.php";
?>
