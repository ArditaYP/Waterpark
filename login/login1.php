<?php
require 'functions.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>web</title>

    <!-- Font -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <h1>Log in</h1>
    <form action="" method="post">
        <div class="form-group">
            <label for="nama">Username</label>
            <input type="nama" name="nama" id="nama" required>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" required>
        </div>

        <button type="submit" name="masukBtn">Log in</button>
    </form>

    <span>don't have an account yet? <a href="signup.php">Sign up here</a></span>
</body>

</html>