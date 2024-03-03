<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login Form </title>
    <link rel="stylesheet" href="login_style.css">
</head>

<body>
    <script>
        window.history.pushState(null, null, window.location.href);
        window.onpopstate = function() {
            window.history.go(1);
        };
    </script>
    <?php
    $username = "";
    $password = "";
    $login_errors = array();
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST['username'];
        $password = $_POST['passwords'];

        $is_valid = true;
        if (empty($username)) {
            $is_valid = false;
            array_push($login_errors, "Enter username");
        }
        if (empty($password)) {
            $is_valid = false;
            array_push($login_errors, "Enter Password");
        }

        if ($is_valid == true) {
            if ($username == "admin" && $password == "1234") {
                array_push($login_errors, "login Successfully");
                header("Location:http://localhost/LibraryManagementSystem/adminhomepage.php");
            } else {
                array_push($login_errors, "Invalid username or password");
            }
        }
    }
    ?>
    <div class="container">
        <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" style="text-align:center">
            <h2 class="loginheading">Admin Login</h2>
            <input type="text" name="username" placeholder="username" class="fieldStyling" autocomplete="off" value="<?php echo $username; ?>"><br><br>
            <input type="password" name="passwords" placeholder="Password" class="fieldStyling" value="4545"><br><br>
            <button class="buttonStyling" name="btnlogin"><strong>Login</strong></button><br><br>
        </form>
        <ul style="color: red; list-style-type: none;"><?php foreach ($login_errors as $errors) { ?>
                <li><?php echo $errors ?></li>
            <?php } ?>
        </ul>
    </div>
</body>

</html>