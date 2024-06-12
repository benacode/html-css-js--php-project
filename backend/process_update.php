<?php
require "Configfile.php";
$id = $_POST['id'];
$username = $_POST['username'];
$firstname = $_POST['firstname'];

$sql = "UPDATE users1 SET username='$username', firstname='$firstname' WHERE id='$id'";
if ($link->query($sql) === TRUE) {
    $message="Record updated successfully";
    $status="Updated";
} else {
      $message="Error updating record: " . $link->error;
      $status="Not";
    
}

$link->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update</title>
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
            <button type="button" class="btn btn-secondary" data-dismiss="modal" id="closeModalButton"  >Close</button>
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

