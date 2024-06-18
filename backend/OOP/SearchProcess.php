<?php
class SearchProcess{
    private $db;
    public function __construct ($dbConnection)
    {
        $this->db=$dbConnection;
    }
    public function searchUserByUsername($username) {
        $stmt = $this->db->connection->prepare("SELECT * FROM users1 WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return [];
        }

        $stmt->close();
    }
}

?>