<?php
class BookController {
    public function processRequest(string $method, ?string $id) {
  if($method == "GET") { 
    if (isset($id)) {
      $this->getBook($id);
    }  
    else{
        $this->getBooks();
    }
  }
  elseif($method == "POST") {
    $this->createBooks();
  }
  else{ 
    echo "Invalid Method";
  }
}

    private function getBooks() 
    {require_once "./Database.php";
        $sql = "SELECT * from books";
        $result = $conn->query($sql);
        $rows = array();
        while ($r = mysqli_fetch_assoc($result)) {
            $rows[] = $r;
        }
        echo json_encode($rows);
    }

    private function getBook(string $id) {
      require_once "./Database.php";
        $sql = "SELECT * from books where id='$id'";
        $result = $conn->query($sql);
        $rows = array();
        while ($r = mysqli_fetch_assoc($result)) {
            $rows[] = $r;
        }
        echo json_encode($rows);

    }

    private function createBooks() {
      require_once "./Database.php";
      print_r($_POST);
      $title = $_POST['title'];
      $author = $_POST['author'];
      $category = $_POST['year_of_publication'];
      $isbn = $_POST['isbn'];
      $quantity = $_POST['quantity'];
      $sql = "INSERT INTO books(title, author, category, year_of_publication, isbn, quantity)
VALUES ('$title', '$author', '$category', '$year_of_publication', '$isbn', '$quantity')";
$result = $conn->query($sql);
if ($result=== TRUE) {
  echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
    }
    
}