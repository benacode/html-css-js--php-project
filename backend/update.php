<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/shadowStyle.css?v=<?php echo time(); ?>">
</head>
</head>
<body>


<?php
require"configfile.php";
$id = $_POST['id'];

// Fetch existing data to populate the update form
$sql = "SELECT * FROM users1 WHERE id='$id'";
$result = $link->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    // Populate form with existing data
    echo "<div class='wrapper'>
    <h2>Update</h2>
    <form method='post' action='process_update.php'>
    
            <input type='hidden'  name='id' value='" . $row["id"] . "'>
                  <div class='form-group'>  <label>Username</label>
            <input type='text' name='username' class='form-control' value='" . $row["username"] . "'/> 
            </div>
   <div class='form-group'>  <label>first Name</label>
   <input type='text' name='firstname' class='form-control' value='" . $row["firstname"] . "'></div>
    
             <div class='form-group'>
            <input type='submit' class='btn btn-primary' value='Update'>
            <button type='button' class='btn btn-secondary ml-2' onclick='window.location.href=\"./welcomepage.php\"'>Cancel</button>
        </div>
          </form>
          </div>";
          
} else {
    echo "Record not found";
}

$link->close();
?>
    
    </body>
</html>