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
        $firstname = $_POST['author_fname'];
        $lastname = $_POST['author_lname'];
        $sql = "INSERT INTO Authors(author_fname, author_lname)
  VALUES ('author_fname', 'author_lname')";
      }
  }