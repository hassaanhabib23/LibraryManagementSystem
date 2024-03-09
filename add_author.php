<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="category_management.css">
    <title>Categories</title>
</head>

<body>
    <?php
    $author_name = "";
    $date = "";
    $conn = new mysqli("localhost", "root", "", "librarymanagementsystem");
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $author_name = strtoupper($_POST['authorname']);
        $date = date("Y-m-d");
        $valid = true;
        if (empty($author_name)) {
            $valid = false;
            $error = "Enter Category Name";
        }
        if (is_numeric($author_name)) {
            $valid = false;
            $error = "Invalid category name";
        }
        if ($valid == true) {
            $sql1 = "SELECT Author_name FROM book_author WHERE Author_name='$author_name'";
            $data = $conn->query($sql1);
            if ($data->num_rows == 0) {
                $conn = new mysqli("localhost", "root", "", "librarymanagementsystem");
                $sql2 = "INSERT INTO book_author (Author_name,Created_on) VALUES('$author_name','$date')";
                $conn->query($sql2);
                header("Location:http://localhost/LibraryManagementSystem/author_management.php");
            } else {
                $error = "Category already exist";
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
                <a href="" class="navstyle"></a>
                <a href="" id="logoutstyle">logout</a>
            </nav>
        </div>
        <div class="container4">
            <h2>Add Author</h2><br>
            <input type="text" placeholder="Author Name" name="authorname" value="<?php echo $author_name; ?>" style="width: 430px;height: 30px;"><br><br>
            <p style="margin-left: 170px;"><?php if (isset($error)) {
                                                echo $error;
                                            } ?></p>
            <input type="submit" name="add" value="Add Author" class="addcategorybutton">
        </div>
    </form>
</body>

</html>