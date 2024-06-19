<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
  .circular-photo {
  border-radius: 50%;
  width: 150px;
  height: 150px;
  object-fit: cover;
}
.user-photo {
            background-color: #f0f0f0;
            padding: 20px;
            border: 2px solid #ddd;
            border-radius: 5px;
        }
</style>
</head>
<body>
    
</body>
</html>

<?php
require"configfile.php";
$user_id =$_SESSION["username"];
$photo = '';
if (!empty($user_id)) {
    // Sanitize user input
    $user_id = $link->real_escape_string($user_id);

    // Prepare and execute SQL query
    $stmt = $link->prepare("SELECT photo FROM users1 WHERE username = ?");
    $stmt->bind_param("s", $user_id);
    
    if ($stmt->execute()) {
        $stmt->bind_result($photo);
        $stmt->fetch();
        $stmt->close();
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>

<?php if (!empty($photo) && file_exists($photo)): ?>
        <div class="user-photo">
            <h3><?php echo htmlspecialchars($_SESSION["username"]); ?></h3>
            <img src="<?php echo htmlspecialchars($photo); ?>" alt="Profile Photo" class="circular-photo">
        </div>
    <?php elseif (!empty($user_id)): ?>
        <p>No photo found or file does not exist.</p>
    <?php endif; ?>

