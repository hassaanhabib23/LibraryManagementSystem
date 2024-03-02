<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="category_management.css">
    <title>Categories</title>
</head>

<body>
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
        <div style="border: 3px solid yellow; display: inline-block;margin-top: 150px; margin-left: 230px;">
            <h3>Add Category</h3>
            <input type="text" placeholder="Category Name" name="categoryname"><br><br>
            <input type="submit" name="add" value="Add Category">
        </div>
    </form>
</body>

</html>