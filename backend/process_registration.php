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
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Result</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font: 14px sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
    </style>
</head>
<body>
    <!-- Modal -->
    <div class="modal fade" id="messageModal" tabindex="-1" aria-labelledby="messageModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="messageModalLabel">Message</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body" id="modalMessage" data-message="<?php echo $message; ?>" data-status="<?php echo $status; ?>">
            <!-- Message will be inserted here -->
          </div>
          <div class="modal-footer">
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal" id="closeModalButton">Close</button>
          </div>
          </div>
        </div>
      </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="../js/modal.js"></script>
</body>
</html>
