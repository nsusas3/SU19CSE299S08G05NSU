<?php
session_start();
if (isset($_SESSION['user_id']) == true) {
    $userID = $_SESSION['user_id'];

    $query = "SELECT * from users WHERE user_id ='$userID'; ";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result);
    $id = $row['userID'];

    if (isset($_POST['submit'])) {

        include_once 'includes/dbh.inc.php';


        $bookName = mysqli_real_escape_string($conn, $_POST['bookName']);
        $authorName = mysqli_real_escape_string($conn, $_POST['authorName']);
        $publisherName = mysqli_real_escape_string($conn, $_POST['publisherName']);
        $isbnNumber = mysqli_real_escape_string($conn, $_POST['isbnNumber']);
        $bookPrice = mysqli_real_escape_string($conn, $_POST['bookPrice']);
        $bookLanguage = mysqli_real_escape_string($conn, $_POST['bookLanguage']);


        $bookImage = $_FILES['image']['name'];
        $bookImageTmpName = $_FILES['image']['tmp_name'];
        $folder = "uploads/" . $bookImage;
        move_uploaded_file($bookImageTmpName, $folder);




        $sql = "INSERT INTO bookinfo (BookName,AuthorName,PublisherName,ISBN,BookPrice,BookLanguage,BookImage,userID) VALUES ('$bookName','$authorName','$publisherName','$isbnNumber','$bookPrice','$bookLanguage','$folder','$id')";

        $data = mysqli_query($conn, $sql);

        if ($data) {
            header("Location: BookForm.php?BookInfo=inserted");
            exit();
        } else {
            echo 'not submitted';
        }
    } else {
        echo 'not submitted';
    }
}
