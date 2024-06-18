<?php
require "Configfile.php";
require "SearchProcess.php";
$db = new Connection();
$search =new SearchProcess($db);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['search'])) {
        $search_username = $_POST['search_username'];
        $search_results = $search->searchUserByUsername($search_username);
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    </head>
<body>
    <div class="container">
        <h2>Search User</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <input type="text" name="search_username" placeholder="User Name" class="form-control" required>
            </div>
            <input type="submit" name="search" class="btn btn-primary" value="Search">
        </form>

        <?php if (isset($search_results)): ?>
            <h3>Search Results:</h3>
            <?php if (empty($search_results)): ?>
                <div class="alert alert-warning mt-3">No users found.</div>
            <?php else: ?>
                <table class="table table-bordered mt-3">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($search_results as $user): ?>
                            <tr>
                                <td><?php echo $user['id']; ?></td>
                                <td><?php echo $user['username']; ?></td>
                                <td><?php echo $user['password']; ?></td>
                                <td><?php echo $user['firstname']; ?></td>
                                <td><?php echo $user['lastname']; ?></td>
                                
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php endif; ?>
        <?php endif; ?>
    </div>
</body>
</html>
