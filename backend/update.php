<?php
require"configfile.php";
$id = $_POST['id'];

// Fetch existing data to populate the update form
$sql = "SELECT * FROM users1 WHERE id='$id'";
$result = $link->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    // Populate form with existing data
    echo "<form method='post' action='process_update.php'>
            <input type='hidden' name='id' value='" . $row["id"] . "'>
            Username: <input type='text' name='username' value='" . $row["username"] . "'><br>
            First Name: <input type='text' name='firstname' value='" . $row["firstname"] . "'><br>
            <input type='submit' value='Update'>
          </form>";
} else {
    echo "Record not found";
}

$link->close();
?>
