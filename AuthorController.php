<?php
class AuthorController {
    public function processRequest(string $method, ?string $id) {
        if($method == "GET") { 
          if (isset($id)) {
            $this->getAuthor($id);
          }  
          else{
              $this->getAuthors();
          }
        }
        elseif($method == "POST") {
          $this->createAuthors();
        }
        else{ 
          echo "Invalid Method";
        }
      }
    
    private function getAuthors() 
    {require_once "./Database.php";
        $sql = "SELECT * from books";
        $result = $conn->query($sql);
        $rows = array();
        while ($r = mysqli_fetch_assoc($result)) {
            $rows[] = $r;
        }
        echo json_encode($rows);

    }
    private function getAuthor(string $id) {
        require_once "./Database.php";
          $sql = "SELECT * from books where id='$id'";
          $result = $conn->query($sql);
          $rows = array();
          while ($r = mysqli_fetch_assoc($result)) {
              $rows[] = $r;
          }
          echo json_encode($rows);
  
      }
  
      private function createAuthors() {
        require_once "./Database.php";
        print_r($_POST);
        $title = $_POST['title'];
        $author = $_POST['author'];
        $category = $_POST['year_of_publication'];
        $isbn = $_POST['isbn'];
        $quantity = $_POST['quantity'];
        $sql = "INSERT INTO Books(title, author, category, year_of_publication, isbn, quantity)
  VALUES ('title', 'author', 'category', 'year_of_publication', 'isbn', 'quantity')";
      }
  }