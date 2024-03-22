<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="deletebook.css">
    <title>Deletebook</title>
</head>

<body>
    <?php
    $deletebookname = array();
    $conn = new mysqli("localhost", "root", "", "librarymanagementsystem");
    $sql = "SELECT book_name,book_ISBN FROM book_detail";
    $data = $conn->query($sql);
    if ($data->num_rows > 0) {
        while ($result = $data->fetch_assoc()) {
            array_push($deletebookname, $result);
        }
    }
    $errors = array();
    $invalid = true;
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $bookname = $_POST['bookname'];
        $ISBN = $_POST['ISBNnumber'];
        if (empty($_POST['bookname'])) {
            $invalid = false;
            array_push($errors, "Select Book Name");
        }
        if (empty($_POST['ISBNnumber'])) {
            $invalid = false;
            array_push($errors, "Select Author Name");
        }
        if ($invalid == true) {
            echo 5;

            $conn = new mysqli("localhost", "root", "", "librarymanagementsystem");
            $sql2 = "DELETE FROM book_detail WHERE book_name='$bookname' AND book_ISBN='$ISBN'";
            $conn->query($sql2);
            if ($conn->query($sql2) === TRUE) {
                echo "Record deleted successfully";
            }
            header("Location:http://localhost/LibraryManagementSystem/book_management.php");
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
            <h2>Delete Book</h2>
            <select name="bookname" class="selectstyle">
                <option value="">Select-Book</option>
                <?php foreach ($deletebookname as $element) { ?>
                    <option value="<?php echo $element['book_name'] ?>"><?php echo $element['book_name'] ?></option>
                <?php } ?>
            </select><br><br>
            <select name="ISBNnumber" class="selectstyle">
                <option value="">Select-ISBN</option>
                <?php foreach ($deletebookname as $element) { ?>
                    <option value="<?php echo $element['book_ISBN'] ?>"><?php echo $element['book_ISBN'] ?></option>
                <?php } ?>
            </select><br>
            <?php foreach ($errors as $error) { ?>
                <h5 style="margin-left: 230px;color: red;"><?php echo $error;
                                                        } ?></h5>
                <input type="submit" value="Delete" class="deletebutton">
        </div>
    </form>
</body>

</html>