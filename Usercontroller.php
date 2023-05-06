<?php
class UserController {
    public function processRequest(string $method, ?string $id) {
        if($method == "GET") { 
          if (isset($id)) {
            $this->getUser($id);
          }  
          else{
              $this->getUsers();
          }
        }
        elseif($method == "POST") {
          $this->createUsers();
        }
        else{ 
          echo "Invalid Method";
        }
      }
      

    public function getUsers() 
    {require_once "./Database.php";
        $sql = "SELECT * from users";
        $result = $conn->query($sql);
        $rows = array();
        while ($r = mysqli_fetch_assoc($result)) {
            $rows[] = $r;
        }
        echo json_encode($rows);
    }

    private function getUser(string $id) {
        require_once "./Database.php";
          $sql = "SELECT * from books where id='$id'";
          $result = $conn->query($sql);
          $rows = array();
          while ($r = mysqli_fetch_assoc($result)) {
              $rows[] = $r;
          }
          echo json_encode($rows);
  
      }
  
      private function createUsers() {
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