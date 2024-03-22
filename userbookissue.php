<!DOCTYPE html>
<?php session_start() ?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="userbookissue.css">
    <title>Issue Book</title>
</head>

<body>
    <?php

    $categories = array();
    $books = array();
    $errors = array();
    $invalid = true;
    $invalid2 = true;
    $conn = new mysqli("localhost", "root", "", "librarymanagementsystem");
    $sql = "SELECT * FROM book_detail";
    $data = $conn->query($sql);
    if ($data->num_rows > 0)
        while ($result = $data->fetch_assoc()) {
            array_push($categories, $result);
        }
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $category = $_POST['category'];
        $conn = new mysqli("localhost", "root", "", "librarymanagementsystem");
        $sql2 = "SELECT book_name FROM book_detail WHERE book_category='$category'";
        $data2 = $conn->query($sql2);
        if ($data2->num_rows > 0)
            while ($result = $data2->fetch_assoc()) {
                array_push($books, $result);
                $invalid2 = false;
            }
        if (empty($_POST['category'])) {
            $invalid = false;
            array_push($errors, "Select category");
        }


        // if (empty($_POST['author_name'])) {
        //     $invalid = false;
        //     array_push($errors, " Select Author");
        // } 
        else {
            // if ($invalid == true) {
            //     $email=$_SESSION['email'];
            //     $bookname=$_POST['book_name'];
            //     $authorname=$_POST['author_name'];
            //     $conn=new mysqli("localhost","root","","librarymanagementsystem");
            //     foreach ($books as $element3){

            //     }
            //     $sql="SELECT * FROM bookissue_detail WHERE book_name='$bookname'AND author_name='$authorname'";
            //     $data=$conn->query($sql);
            //     if($data->num_rows>0){
            //         $invalid2=false;
            //         array_push($errors,"Book already issued");
            //     }
            //     else{
            //         if($invalid2==true){
            //             $conn=new mysqli("localhost","root","","librarymanagementsystem");
            //         $sql2="INSERT  INTO bookissue_detail"
            //                         }
            //     }

            // }
        }
    }
    ?>
    <form action="" method="post">
        <div style="margin-left: 30px;">
            <p><img src="download.png" alt="" class="imagestyle"><strong>Library System</strong></p>
        </div>
        <div class="container2">
            <nav style="padding-top: 15px;">
                <a href="" class="navstyle">Issue Book</a>
                <a href="" class="navstyle">Search Book</a>
                <a href="" class="navstyle">Profile</a>
                <a href="" style="margin-left: 800px;" class="navstyle">Logout</a>
            </nav>
        </div>
        <div class="headingstyle">
            <h2>Issue Book</h2>
        </div>
        <div class="container3">
            <select name="category" class="fieldstyle">
                <option value="" hidden>Select-category</option>
                <?php foreach ($categories as $element1) { ?>
                    <option value="<?php echo $element1['book_category'] ?>" <?php if (isset($_POST['btnbook'])) {
                                                                                    if ($category == $element1['book_category']) { ?> selected <?php }
                                                                                                                                        } ?>><?php echo $element1['book_category']; ?></option>
                <?php } ?>
            </select><br><br>
            <?php if ($invalid2 == false) { ?>
                <select name="book_name" class="fieldstyle">
                    <option value="" hidden>Select-Book</option>
                    <?php foreach ($books as $element2) { ?>
                        <option value="<?php echo $element2['book_name'] ?>" <?php if (isset($_POST['btnbook'])) {
                                                                                    if ($bookname == $element2['book_name']) { ?> selected <?php }
                                                                                                                                    } ?>><?php echo $element2['book_name'] ?></option>
                    <?php } ?>
                </select><br><br><br>
            <?php } ?>
            <ul>
                <?php foreach ($errors as $error) { ?>
                    <li><?php echo $error; ?></li>
                <?php } ?>
            </ul>


            <input type="submit" value="Book Me" class="btnbookstyle" name="btnbook">
        </div>
    </form>
</body>

</html>