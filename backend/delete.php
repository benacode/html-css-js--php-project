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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Result</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/shadowStyle.css ?v=<?php echo time(); ?>">
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
    <script src="../js/modal.js "></script>
</body>
</html>

