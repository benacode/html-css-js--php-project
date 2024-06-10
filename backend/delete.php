<?php
require"configfile.php";
$id = $_POST['id'];

$sql = "DELETE FROM users1 WHERE id='$id'";
if ($link->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $link->error;
}

$link->close();
?>
