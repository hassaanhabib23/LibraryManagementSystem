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

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['addcategory'])) {
            header("Location:http://localhost/LibraryManagementSystem/add_category.php");
        }
        if (isset($_POST['deletecategory'])) {
            header("Location:http://localhost/LibraryManagementSystem/delete_category.php");
        }
    }
    $categories = array();
    $conn = new mysqli("localhost", "root", "", "librarymanagementsystem");
    $sql = "SELECT id,Category_name,Created_on FROM books_categories";
    $data = $conn->query($sql);
    if ($data->num_rows > 0) {
        while ($rows = $data->fetch_assoc()) {
            array_push($categories, $rows);
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
        <div class="container3">
            <div><span>
                    <h2 style="display: inline-block;">Category Management</h2>
                </span> <input type="submit" name="addcategory" value="Add" class="addbutton" style="margin-left: 315px;"><input type="submit" name="deletecategory" value="Delete" class="deletebutton" style="background-color: darkred;"></div>
            <table>
                <tr>
                    <th style="width: 50px;">
                        Id
                    </th>

                    <th>
                        Category Name
                    </th>
                    <th>
                        Created On
                    </th>
                </tr>
                <?php
                foreach ($categories as $element) { ?>
                    <tr>
                        <td style="width: 50px;"><?php echo $element['id']; ?></td>
                        <td><?php echo $element['Category_name']; ?></td>
                        <td><?php echo $element['Created_on'] ?></td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </form>
</body>

</html>