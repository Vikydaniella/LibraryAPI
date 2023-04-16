<?php

require_once "BookController.php";

header("Content-type: application/json");
//echo(json_encode('Welcome to my library API'));

$requesturl = $_SERVER["REQUEST_URI"];
$requesturlparts = explode("/",$requesturl); 

$requestmethod = $_SERVER["REQUEST_METHOD"];
/*print_r($requesturl);
echo "\n";
print_r($requesturlparts);*/
if ($requesturlparts[1] != "libraryapi") {
    http_response_code(404);
exit;
}
If ($requesturlparts[2] == "books") {
    //echo(json_encode("You are requesting for books."));
    $booksController = new BookController();
    $booksController->getBooks();
    exit;
}
else { 
    http_response_code(404);
    exit;
}