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
        if (isset($_POST['addbook'])) {
            header("Location:http://localhost/LibraryManagementSystem/add_book.php");
        }
        if (isset($_POST['deletebook'])) {
            header("Location:http://localhost/LibraryManagementSystem/delete_book.php");
        }
    }
    $books = array();
    $conn = new mysqli("localhost", "root", "", "librarymanagementsystem");
    $sql = "SELECT * FROM book_detail";
    $data = $conn->query($sql);
    if ($data->num_rows > 0) {
        while ($rows = $data->fetch_assoc()) {
            array_push($books, $rows);
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
        <div class="container5">
            <div><span>
                    <h2 style="display: inline-block;">Book Management</h2>
                </span> <input type="submit" name="addbook" value="Add" class="addbutton" style="margin-left: 1285px;"><input type="submit" name="deletebook" value="Delete" class="deletebutton" style="background-color: darkred;"></div>
            <?php if ($data->num_rows > 0) {
                while ($rows = $data->fetch_assoc()) {
                    array_push($authors, $rows);
                } ?>
                <table>
                    <tr>
                        <th style="width: 50px;">
                            Id
                        </th>

                        <th>
                            book Name
                        </th>
                        <th>
                            Author Name
                        </th>
                        <th>
                            Category Name
                        </th>
                        <th style="width: 70px;">
                            ISBN Number
                        </th>
                        <th>
                            Created On
                        </th>
                    </tr>
                    <?php
                    foreach ($books as $element) { ?>
                        <tr>
                            <td style="width: 50px;"><?php echo $element['book_id']; ?></td>
                            <td><?php echo $element['book_name']; ?></td>
                            <td><?php echo $element['book_author']; ?></td>
                            <td><?php echo $element['book_category']; ?></td>
                            <td><?php echo $element['book_ISBN']; ?></td>
                            <td><?php echo $element['Created_on'] ?></td>
                        </tr>
                    <?php } ?>
                </table>
            <?php } ?>
        </div>
    </form>
</body>

</html>