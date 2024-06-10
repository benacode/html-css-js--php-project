<?php
require"configfile.php";

$sql = "SELECT id, username, firstname FROM users1";
$result = $link ->query($sql);

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    echo "id: " . $row["id"]. " - username: " . $row["username"]. " " . $row["firstname"]. "<br>";
  }
} else {
  echo "0 results";
}
$link->close();
?>