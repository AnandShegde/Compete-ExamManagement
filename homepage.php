<?php
    session_start();
    if(!isset($_SESSION['loggedin']))
    {
        header("Location: index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="Extra/letter_q.png">
    <title>Compete</title>
<style>
body{
  margin: 0rem;
  padding: 0rem;
}
.topnav {
  overflow: hidden;
  background-color:#cfcccc;
  height: auto;
  width: auto;
}

.topnav a {
  float: left;
  color:black;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 22px;
}

.topnav a:hover {
  background-color:skyblue;
  color: black;
}

#login_icon{
  width: 40px;
  height: 40px;
  border-radius: 50%;
}

#log_img{
  padding-top: 8px;
  padding-right: 8px;
  cursor: pointer;
}

.flex-container {
    display: flex;
    margin-top: 2%;
    width: auto;
    justify-content: center;
    flex-direction: row;
    height: 350px;
    padding: 0.5%;
}

.flex-child1{
    border: 2px solid black;
    margin-right: 10px;
    margin-left: 10px;
    width: 70%;
    border-radius: 10px;
    text-align: center;
} 

.flex-child2{
    border: 2px solid black;
    margin-right: 10px;
    margin-left: 10px;
    width: 30%;
    border-radius: 10px;
    color:blue;
    text-align: center;
}

.flex-child2 a{
  border:2px solid black;
  color:black;
  text-decoration: none;
  border-radius: 5px;
  padding: 2%;
  width: 40%;
  display: inline-block;
  font-size: 20px;
  background-color: rgb(228, 226, 226);
}

.flex-child2 a:hover{
  background-color: rgb(109, 208, 247);
}

</style>
</head>
<body>
<div class="topnav">
  <a href="#homepage.php">🏠Home</a>
  <a href="contact.html">📞Contact</a>
  <a href="about.html">📚About</a>
  <a href="#viewprofile.php">👨‍🎓Profile</a>
  <a href="logout.php">🚪Logout</a>
  <div align="right" id="log_img">
  <img src="login_icon.jpg" alt="no image found" id="login_icon">
  </div> 
</div>
<div class="flex-container">
  <div class="flex-child1">
    HERE WE WILL BE SLIDES OF QUIZ HOSTED BY OTHER USERS
  </div>
  <div class="flex-child2">
    <h1 style="text-align: center;">QUIZ PANEL</h1><br><br>
    <a href="#Register_Quiz.php">Attempt Quiz</a><br><br>
    <a href="#Host_Quiz.php">Host Quiz</a><br><br>
    <a href="#Given_Quizs.php">Given Quizs</a><br><br>
  </div>
</div>
</body>
</html>