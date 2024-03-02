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
    }
    ?>
    <form action="" method="post">
        <div style="margin-left: 30px;">
            <p><img src="download.png" alt="" class="imagestyle"><strong>Library System</strong></p>
        </div>
        <div class="container2">
            <nav style="padding-top: 15px;">
                <a href="category_management.php" class="navstyle">Category</a>
                <a href="" class="navstyle">Author</a>
                <a href="" class="navstyle">Location Rack</a>
                <a href="" class="navstyle">Book</a>
                <a href="" class="navstyle">User</a>
                <a href="" class="navstyle">Issue Book</a>
                <a href="" class="navstyle"></a>
                <a href="" id="logoutstyle">logout</a>
            </nav>
        </div>
        <div>
            <div><span>Category Management</span> <input type="submit" name="addcategory" value="Add"></div>
            <table>
                <tr>
                    <th>
                        Category Name
                    </th>
                    <th>
                        Created On
                    </th>
                    <th>
                        Action
                    </th>
                </tr>
            </table>
        </div>
    </form>
</body>

</html>