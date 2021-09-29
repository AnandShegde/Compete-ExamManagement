<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <h1>DARE2COMPETE</h1>
    <div class="container">
        <div class="Login">
            <h2>Login</h2>
            <form action="#" method="post"> <!--Login form-->
                Gmail ID: <input type="text" name="Email" id="Gmail"> <br>
                Password: <input type="password" name="Password"> 
                <button type="submit">Log in</button>
                <button type="submit">Forgot Password</button> <br>
            </form>
            <form action="signup.php">
                New User? <button type="submit">Sign Up</button>
            </form>
        </div>
    </div>
</body>
</html>
<?php
    $conn = mysqli_connect('localhost', 'root', '');
    $sqlQuery = 'CREATE DATABASE IF NOT EXISTS userInfo ;';
    mysqli_query($conn, $sqlQuery);
    $conn1 = mysqli_connect('localhost', 'root', '', 'userInfo');
    $query = 'CREATE TABLE IF NOT EXISTS userTable(
        uName VARCHAR(120) NOT NULL, uGmail VARCHAR(200) NOT NULL, uAge INT NOT NULL, uInstitute VARCHAR(120) NOT NULL, uPassword VARCHAR(50) ); ';
    mysqli_query($conn1, $query);
    
//    $conn = mysqli_connect('localhost', 'root', '');
//    $sql = 'CREATE DATABASE IF NOT EXISTS publications;';
//    mysqli_query($conn, $sql);
//    $conn1 = mysqli_connect('localhost', 'root', '', 'publications');
//    $query1 = 'CREATE TABLE IF NOT EXISTS authors(
//        author VARCHAR(120) NOT NULL, publisher VARCHAR(30)
//        ); ';
//    $query2 = 'CREATE TABLE IF NOT EXISTS titles( 
//        title VARCHAR(120) NOT NULL, author VARCHAR(120), year SMALLINT(6));';
//    mysqli_query($conn1, $query1);
//    mysqli_query($conn1, $query2);
?> 
