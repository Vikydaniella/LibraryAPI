<?php

require_once "BookController.php";
require_once "AuthorController.php";
require_once "UserController.php";

header("Content-type: application/json");
//echo(json_encode('Welcome to my library API'));

$requesturl = $_SERVER["REQUEST_URI"];
$requestMethod = $_SERVER["REQUEST_METHOD"];
$requesturlparts = explode("/",$requesturl); 
$id = $requesturlparts[3]; 

/*$requestmethod = $_SERVER["REQUEST_METHOD"];
print_r($requesturl);
echo "\n";
print_r($requesturlparts);
exit;*/

if ($requesturlparts[1] != "libraryapi") {
    http_response_code(404);
exit;
}
if ($requesturlparts[2] == "books") {
    //echo(json_encode("You are requesting for books."));
    $booksController = new BookController();
    $booksController->processRequest($requestMethod,$id);
    exit;
}
 elseif ($requesturlparts[2] == "author") {
    //echo(json_encode("You are searching for an anthor."));
    $authorController = new AuthorController();
    $authorController->getAuthor();
    exit;
}

elseif ($requesturlparts[2] == "user") {
    //echo(json_encode("You are searching for a user."));
    $userController = new UserController();
    $userController->getuser();
    exit;
}

else { 
    http_response_code(404);
    exit;
}