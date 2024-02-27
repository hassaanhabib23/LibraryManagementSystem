<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="homepage_1.css">
    <title>HomePage</title>
</head>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['btnlogin'])) {
        header("location:http://localhost/LibraryManagementSystem/login.php");
    }
    if (isset($_POST['btnsignup'])) {
        header("location:http://localhost/LibraryManagementSystem/signup_form.php");
    }
    if (isset($_POST['btnadmin'])) {
        header("location:http://localhost/LibraryManagementSystem/adminlogin.php");
    }
}
?>

<body>
    <form action="" method="post">
        <div class="container1">
            <h1 class="heading">Library Management System</h1>
            <pre class="details">
        This is simple Library Management System which use for maintain the record of the library. 
        This Library Managment System has been made by using PHP script, MySQL Database,JavaScript.
        This is PHP Project on Online Library Management System.
        </pre>
        </div>
        <div class="container2">
            <div class="container3">
                <h2>Admin Login</h2>
                <button class="buttonstyle1" name="btnadmin" name="adminlogin">Admin login</button>
            </div>
            <div class="container4">
                <h2>User Login</h2>
                <button class="buttonstyle2" name="btnlogin">User login</button>
                <button class="buttonstyle3" name="btnsignup">user Signup</button>
            </div>
        </div>
    </form>
</body>

</html>