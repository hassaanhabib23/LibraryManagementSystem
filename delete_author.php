<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="category_management.css">
    <title>AuthorCategory</title>
</head>

<body>
    <?php
    $authors = array();
    $conn = new mysqli("localhost", "root", "", "librarymanagementsystem");
    $sql = "SELECT Author_name FROM book_author";
    $data = $conn->query($sql);
    if ($data->num_rows > 0) {
        while ($rows = $data->fetch_assoc()) {
            array_push($authors, $rows);
        }
    }
    $error = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $author_name = $_POST['selectedauthor'];
        $valid = true;
        if (empty($author_name)) {
            $valid = false;
            $error = "Select Author";
        }
        if (isset($_POST['deleteauthor'])) {
            if ($valid == true) {
                $conn = new mysqli("localhost", "root", "", "librarymanagementsystem");
                $sql = "DELETE FROM book_author where Author_name='$author_name'";
                $conn->query($sql);
                header("Location:http://localhost/LibraryManagementSystem/author_management.php");
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
                <a href="category_management.php" class="navstyle">Category</a>
                <a href="author_management.php" class="navstyle">Author</a>
                <a href="" class="navstyle">Book</a>
                <a href="" class="navstyle">User</a>
                <a href="" class="navstyle">Issue Book</a>
                <a href="" class="navstyle"></a>
                <a href="" id="logoutstyle">logout</a>
            </nav>
        </div>
        <div class="container4">
            <h2>Delete Author</h2>
            <select name="selectedauthor" id="selectstyle">
                <option value="">Select Author</option>
                <?php foreach ($authors as $key) { ?>
                    <option value="<?php echo $key['Author_name']; ?>"><?php echo $key['Author_name']; ?></option>
                <?php } ?>
            </select>
            <input type="submit" name="deleteauthor" value="Delete" class="addcategorybutton" style="    margin-left: 80px;width: 95px;height: 37px"><br><br>
            <h4 style="color:red;margin-left: 50px;"><?php echo $error; ?></h4>
        </div>
    </form>
</body>

</html>