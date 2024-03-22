<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="userhomepagestyle.css">
    <title>User</title>
</head>

<body>
    <?php
    $books = array();
    $conn = new mysqli("localhost", "root", "", "librarymanagementsystem");
    $sql = "SELECT book_ISBN,book_name FROM book_detail WHERE book_ISBN=78";
    $data = $conn->query($sql);
    if ($data->num_rows > 0)
        while ($result = $data->fetch_assoc()) {
            array_push($books, $result);
        }
    ?>
    <form action="" method="post">
        <div style="margin-left: 30px;">
            <p><img src="download.png" alt="" class="imagestyle"><strong>Library System</strong></p>
        </div>
        <div class="container2">
            <nav style="padding-top: 15px;">
                <a href="userbookissue.php" class="navstyle">Issue Book</a>
                <a href="" class="navstyle">Search Book</a>
                <a href="" class="navstyle">Profile</a>
                <a href="" style="margin-left: 800px;" class="navstyle">Logout</a>
            </nav>
        </div>
        <div class="container3">
            <h2 style="display: inline-block;">Books List</h2>
            <table>
                <tr>
                    <th>ISBN Number</th>
                    <th>Book Name</th>
                    <th>Author Name</th>
                    <th>Category Name</th>
                    <th>Created On</th>
                </tr>
                <tr>
                    <?php foreach ($books as $element) { ?>
                        <td><?php echo $element['book_ISBN']; ?></td>
                        <td><?php echo $element['book_name']; ?></td>
                        <!-- <td><?php echo $element['book_author']; ?></td>
                        <td><?php echo $element['book_category']; ?></td>
                        <td><?php echo $element['Created_on']; ?></td> -->
                    <?php } ?>
                </tr>
            </table>
        </div>
    </form>
</body>

</html>