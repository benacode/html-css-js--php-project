<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
   
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Search User</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <style>
        body{ font: 14px sans-serif; text-align: center; }
        .user-photo {
            background-color: #f0f0f0;
            padding: 20px;
            border: 2px solid #ddd;
            border-radius: 5px;
        }
    </style>
    </head>
<body>
<div class="user-photo" style="background-color: green;">
<h1 class="my-5">Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to our site.</h1>
<p>
    <a href="../resetpassword.php" class="btn btn-warning">Reset Your Password</a>
    <a href="../logout.php" class="btn btn-danger ml-3">Sign Out of Your Account</a>
    <a href="../welcomepage.php" class="btn btn-success ml-3">Back to Home</a>
</p>
</div>
    <div class="container">
        <h2>Search User</h2>
        <form id="searchForm">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="search_username" id="search_username" class="form-control" onkeyup="searchUser()" required>
            </div>
        </form>

        <h3>Search Results:</h3>
        <div id="searchResults"></div>
    </div>

    <script>
        function searchUser() {
            var search_username = $('#search_username').val();
            if (search_username.length > 0) {
                $.ajax({
                    url: "./SearchProcessAjax.php",
                    type: "POST",
                    data: { search_username: search_username },
                    dataType: "json",
                    success: function(data) {
                        if (data.length === 0) {
                            $("#searchResults").html('<div class="alert alert-warning mt-3">No users found.</div>');
                        } else {
                            var table = '<table class="table table-bordered mt-3"><thead><tr><th>ID</th><th>Username</th><th>Password</th><th>First Name</th><th>Last Name</th></tr></thead><tbody>';
                            $.each(data, function(index, user) {
                                table += '<tr><td>' + user.id + '</td><td>' + user.username + '</td><td>' + user.password + '</td><td>' + user.firstname + '</td><td>' + user.lastname + '</td></tr>';
                            });
                            table += '</tbody></table>';
                            $("#searchResults").html(table);
                        }
                    }
                });
            } else {
                $("#searchResults").html('');
            }
        }
    </script>
</body>
</html>
