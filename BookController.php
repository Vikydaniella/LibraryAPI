<?php
class BookController {
    public function processRequest(string $method, ?string $id) {
  if($method == "GET") { 
    if (isset($id)) {
    }  
    else{
        $this->getBooks();
    }
  }
  elseif($method == "POST") {
echo "You are trying to post.";
  }
  else{ 
    echo "Invalid Method";
  }
}

    public function getBooks() 
    {require_once "./Database.php";
        $sql = "SELECT * from books";
        $result = $conn->query($sql);
        $rows = array();
        while ($r = mysqli_fetch_assoc($result)) {
            $rows[] = $r;
        }
        echo json_encode($rows);

    }

    public function getBook(string $id) 
    {require_once "./Database.php";
        $sql = "SELECT * from 'Library' where id=1";
        $result = $conn->query($sql);
        $rows = array();
        while ($r = mysqli_fetch_assoc($result)) {
            $rows[] = $r;
        }
        echo json_encode($rows);

    }
}