<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="adminhomepage.css">
    <title>Admin Page</title>
</head>

<body>
    <?php
    function bookdata($detailofbook, $tablename)
    {
        $conn = new mysqli("localhost", "root", "", "librarymanagementsystem");
        $sql = "SELECT $detailofbook FROM $tablename";
        $data = $conn->query($sql);
        $rows = $data->num_rows;
        return $rows;
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
                <a href="homepage_1.php" id="logoutstyle">logout</a>
            </nav>
        </div>

        <div style="margin-top: 100px; margin-left: 330px;">
            <div>
                <h2>Admin Dashboard</h2>
            </div>
            <table>
                <tr>
                    <td>
                        <strong>
                            <div id="D_container1">Total Books Issue</div>
                        </strong>
                    </td>
                    <td>
                        <strong>
                            <div id="D_container1" style="background-color: red;">Total Books return</div>
                        </strong>
                    </td>
                    <td>
                        <strong>
                            <div id="D_container1" style="background-color: brown;">Total Books Not Return</div>
                        </strong>
                    </td>
                </tr>
                <tr>
                    <td>
                        <strong>
                            <div id="D_container1" style="background-color: darkolivegreen;">Total Books<br><br><?php echo bookdata("book_name", "book_detail"); ?></div>
                        </strong>
                    </td>
                    <td>
                        <strong>
                            <div id="D_container1" style="background-color: tomato;">Total Authors <br><br><?php echo bookdata("Author_name", "book_Author"); ?></div>
                        </strong>
                    </td>
                    <td>
                        <strong>
                            <div id="D_container1" style="background-color: darkgreen;">Total Categories <br><br><?php echo bookdata("Category_name", "books_categories"); ?></div>
                        </strong>
                    </td>
                </tr>
            </table>
        </div>
    </form>
</body>

</html>