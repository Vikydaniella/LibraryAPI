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
    if (isset($id)) {
      $this->updateBook($id);
    }
    else{
    $this->createBooks();
  }
}
  elseif($method == "DELETE") {
    $this->deleteBook($id);
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
      $year_of_publication = $_POST['year_of_publication'];
      $category = $_POST['category'];
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
   
    private function deleteBook(string $id) {
      require_once "./Database.php";
        $sql = "DELETE FROM books WHERE id='$id'";
        $result = $conn->query($sql);
        if ($result=== TRUE) {
          echo "The record was deleted successfully";
          } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
          }
            }

            private function updateBook(string $id) {
              require_once "./Database.php";
              //print_r($_POST);
              //exit;
              $title = $_POST['title'];
              $author = $_POST['author'];
              $year_of_publication = $_POST['year_of_publication'];
              $category = $_POST['category'];
              $isbn = $_POST['isbn'];
              $quantity = $_POST['quantity'];
              $sql = "UPDATE books SET title = $title, author = $author, year_of_publication = $year_of_publication,
               category =$category, isbn =$isbn, quantity =$quantity, WHERE id='$id'";
              $result = $conn->query($sql);
                if ($result=== TRUE) {
                  echo "The record was deleted successfully";
                  } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                  }
                    }
}