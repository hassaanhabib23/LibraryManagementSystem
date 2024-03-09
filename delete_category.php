<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="category_management.css">
    <title>deleteCategory</title>
</head>

<body>
    <?php
    $categories = array();
    $conn = new mysqli("localhost", "root", "", "librarymanagementsystem");
    $sql = "SELECT Category_name FROM books_categories";
    $data = $conn->query($sql);
    if ($data->num_rows > 0) {
        while ($rows = $data->fetch_assoc()) {
            array_push($categories, $rows);
        }
    }
    $error = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $category_name = $_POST['selectedcategory'];
        $valid = true;
        if (empty($category_name)) {
            $valid = false;
            $error = "Select Category";
        }
        if (isset($_POST['deletecategory'])) {
            if ($valid == true) {
                $conn = new mysqli("localhost", "root", "", "librarymanagementsystem");
                $sql = "DELETE FROM books_categories where Category_name='$category_name'";
                $conn->query($sql);
                header("Location:http://localhost/LibraryManagementSystem/category_management.php");
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
            <h2>Delete Category</h2>
            <select name="selectedcategory" id="selectstyle">
                <option value="">Select Category</option>
                <?php foreach ($categories as $key) { ?>
                    <option value="<?php echo $key['Category_name']; ?>"><?php echo $key['Category_name']; ?></option>
                <?php } ?>
            </select>
            <input type="submit" name="deletecategory" value="Delete" class="addcategorybutton" style="    margin-left: 80px;width: 95px;height: 37px"><br><br>
            <h4 style="color:red;margin-left: 50px;"><?php echo $error; ?></h4>
        </div>
    </form>
</body>

</html>