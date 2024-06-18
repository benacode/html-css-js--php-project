<?php
require "Configfile.php";
require "SearchProcess.php";

header('Content-Type: application/json');

$db = new Connection();
$search =new SearchProcess($db);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $search_username = $_POST['search_username'];
    $search_results = $search->searchUserByUsername($search_username);
    echo json_encode($search_results);
}

$db->close();

?>
