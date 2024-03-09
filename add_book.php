<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="add_book.css">
    <title>Addbook</title>
</head>

<body>
    <?php

    function queryrun($colname, $tablename)
    {
        $bookdetail = array();
        $conn = new mysqli("localhost", "root", "", "librarymanagementsystem");
        $sql = "SELECT $colname FROM $tablename";
        $data = $conn->query($sql);
        if ($data->num_rows > 0) {
            while ($row = $data->fetch_assoc()) {
                array_push($bookdetail, $row);
            }
        }
        return $bookdetail;
    }
    $bookname = '';
    $authors = '';
    $category = '';
    $isbn_number = '';
    $invalid = true;
    $bool = false;
    $error = array();
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $bookname = $_POST['bookname'];
        $authors = $_POST['authors'];
        $category = $_POST['Category'];
        $isbn_number = $_POST['isbnumber'];
        if (empty($bookname)) {
            $invalid = false;
            array_push($error, "Empty Book Name");
        }
        if (empty($authors)) {
            $invalid = false;
            array_push($error, "Select Author name");
        }
        if (empty($category)) {
            $invalid = false;
            array_push($error, "Select Book Category");
        }
        if (empty($isbn_number)) {
            $invalid = false;
            array_push($error, "Empty ISBN number");
        }
        if (!empty($bookname) && is_numeric($bookname)) {
            $invalid = false;
            array_push($error, "Invalid Book name");
        }
        if ($invalid == true) {
            $conn = new mysqli("localhost", "root", "", "librarymanagementsystem");;
            $sql2 = "SELECT * FROM book_detail WHERE book_name='$bookname' AND book_author='$authors' AND book_category='$category' AND book_ISBN='$isbn_number'";
            $alldata = $conn->query($sql2);

            if ($alldata->num_rows > 0) {
                $bool = false;
                array_push($error, "This book already exist");
            }
            if ($bool == true) {
                $sql = "SELECT * FROM book_detail WHERE book_ISBN='$isbn_number'";
                $ISBN = $conn->query($sql);
                if ($ISBN->num_rows > 0) {
                    $bool = false;
                    array_push($error, "ISBN number already exist");
                } else {
                    $date = date("Y/m/d");
                    $conn = new mysqli("localhost", "root", "", "librarymanagementsystem");
                    $sql3 = "INSERT INTO book_detail (book_name,book_author,book_category,book_ISBN,Created_on) VALUES('$bookname','$authors','$category','$isbn_number','$date')";
                    $conn->query($sql3);
                    header("Location:http://localhost/LibraryManagementSystem/book_management.php");
                }
            }
        }
    }
    ?>
    <form action="" method="post">
        <div style="margin-left: 30px;">
            <p><img src="download.png" alt="" class="imagestyle"><strong>Library System</strong></p>
        </div>
        <div class="container2">
            <nav style="padding-top: 15px;">
                <a href="adminhomepage.php" class="navstyle">Home</a>
                <a href="category_management.php" class="navstyle">Category</a>
                <a href="author_management.php" class="navstyle">Author</a>
                <a href="book_management.php" class="navstyle">Book</a>
                <a href="" class="navstyle">User</a>
                <a href="" class="navstyle">Issue Book</a>
                <a href="" id="logoutstyle">logout</a>
            </nav>
        </div>
        <div class="container3">
            <h2>Add Book</h2>
            <input type="text" name="bookname" class="fields" placeholder="Book Name" value="<?php echo $bookname ?>">
            <?php
            $author_name = array();
            $author_name = queryrun("Author_name", "book_author"); ?>
            <select name="authors" class="fields" style="height: 35px;width: 247px;">
                <option value="" hidden>Select-Author</option>
                <?php foreach ($author_name as $key) { ?>
                    <option value="<?php echo $key['Author_name']; ?>" <?php if (!empty($authors)) { ?> selected <?php } ?>><?php echo $key['Author_name']; ?></option>
                <?php } ?>
            </select><br><br>
            <?php
            $category_name = array();
            $category_name = queryrun("Category_name", "books_categories"); ?>
            <select name="Category" class="fields" style="height: 35px;width: 247px;">
                <option value="" hidden>Select-Category</option>
                <?php foreach ($category_name as $key) { ?>
                    <option value="<?php echo $key['Category_name']; ?>" <?php if (!empty($category)) { ?> selected <?php } ?>><?php echo $key['Category_name']; ?></option>
                <?php } ?>
            </select>
            <input type="number" placeholder="ISBN number" class="fields" name="isbnumber" value="<?php echo $isbn_number; ?>"><br><br>
            <?php foreach ($error as $errors) { ?>
                <h5 style="color: red; margin-left: 200px;"><?php echo $errors;
                                                        } ?></h5>

                <input type="submit" value="Add Book" id="btnaddbook" name="btnaddbook">
        </div>
    </form>
</body>

</html>