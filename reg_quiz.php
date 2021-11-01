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
 
    $conn = mysqli_connect("localhost", "root", "",$username);
    if(!$conn)
    {
        echo "cool";
    }
    $sql= "CREATE TABLE IF NOT EXISTS reg_quizes( 
        id INT NOT NULL ,
        host TEXT NOT NULL ,
        q_date DATE NOT NULL , 
        starttime TIME NOT NULL , 
        endtime TIME NOT NULL , 
        duration TIME NOT NULL ,
        q_name TEXT NOT NULL )";
    mysqli_query($conn, $sql);

    $id=$_POST['submitted'];
    $sql="SELECT * FROM quizes WHERE id = '$id'";
    $result=mysqli_query($connect, $sql);
    $data=$result->fetch_assoc();

    $q_name=$data['name'];
    $host=$data['host-Email'];
    $q_date=$data['date'];
    $starttime=$data['start time'];
    $endtime=$data['end time'];
    $duration=$data['duration'];

    $sql = "INSERT INTO reg_quizes (id,host,q_date,starttime,endtime,duration,q_name)  VALUES('$id','$host','$q_date','$starttime','$endtime','$duration','$q_name')";
    mysqli_query($conn, $sql);
    echo "registered successfully";
?>