<?php 
    session_start();
    $email=$_SESSION['mail'];
    if(!isset($_SESSION['loggedin']))
    {
        header("Location: index.php");
    }
    $connect=mysqli_connect("localhost","root","","userInfo");
    $sql="SELECT * FROM usertable WHERE uGmail='$email'";
    $result=mysqli_query($connect,$sql);
    $row = $result->fetch_assoc();
    $username=$row['uName'];
 
    $conn = mysqli_connect("localhost", "root", "", $username);
    $sql= "CREATE TABLE IF NOT EXISTS 'reg_quizes' ( 
        id INT NOT NULL ,
        host TEXT NOT NULL ,
        'date' DATE NOT NULL , 
        'start time' TIME NOT NULL , 
        'end time' TIME NOT NULL , 
        duration TIME NOT NULL ,
        'name' TEXT NOT NULL );";
    mysqli_query($conn, $sql);
    $id = $_POST['submitted'];
    
    
    $sql = "SELECT * FROM quizes WHERE id = '$id'";
    $result = mysqli_query($connect, $sql);
    $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
    echo $data[0]['name'];
    $sql = "INSERT INTO reg_quizes VALUES(`$data[0]['id']`, `$data[0]['host-Email']`, `$data[0]['date']`, `$data[0]['start time']`, `$data[0]['end time']`, `$data['duration'][0]`, `$data[0]['name']`)";
    mysqli_query($conn, $sql);  
?>