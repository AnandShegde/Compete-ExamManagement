<?php
    session_start();
    $id = $_POST['submitted'];
    $username = $_SESSION['user'];
    $conn = mysqli_connect("localhost", "root", "", $username);
    $sql = "SELECT * FROM reg_quizes WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);
    $data = $result->fetch_assoc();
    $q_name =  $data['q_name'];
    $host = $data['host'];
    $connh = mysqli_connect("localhost", "root", "", $host);
    $tableName = $q_name."responses";
    $sql = "SELECT * FROM $tableName WHERE username = '$username'";
    $result = mysqli_query($connh, $sql);
    $data1 = $result->fetch_assoc();
    echo $data1['username'];
?>
<head>
    <style>

    </style>
</head>
<body>
    <h1><?php echo $data1['result']; ?></h1>
</body>
