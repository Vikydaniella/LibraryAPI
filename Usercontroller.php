<?php
class UserController {
    public function getUser() 
    {require_once "./Database.php";
        $sql = "SELECT * from users";
        $result = $conn->query($sql);
        $rows = array();
        while ($r = mysqli_fetch_assoc($result)) {
            $rows[] = $r;
        }
        echo json_encode($rows);

    }
}