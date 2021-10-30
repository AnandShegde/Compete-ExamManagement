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

    $conn = mysqli_connect("localhost", "root", "", "userInfo");
    $sqlQuery = "SELECT * FROM quizes";
    $result = mysqli_query($conn, $sqlQuery);
    $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>
<head>
    <title>Register</title>
    <style>
        .quizContainer{
            border: 1px solid black;
            padding: 10px;
        }
        
            body{
  margin: 0rem;
  padding: 0rem;
  font-family: 'Courier New', Courier, monospace;
  font-weight:600;
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
  width: 27px;
  height: 27px;
  border-radius: 50%;
}

#log_img{
  padding-top: 8px;
  padding-right: 8px;
  cursor: pointer;
}

    </style>
</head>
<body>
<div class="topnav">
            <a href="homepage.php">🏠Home</a>
            <a href="contact.php">📞Contact</a>
            <a href="about.php">📚About</a>
            <a href="viewprofile.php">👨‍🎓Profile</a>
            <a href="logout.php">🚪Logout</a>
            <div align="right" id="log_img">
            <img src="login_icon.jpg" alt="no image found" id="login_icon"><br>
            <span style="font-size:15px;color:blue;"><?php echo "$username"; ?></span>
            </div>
        </div>
    <h1>Quizes available for registration</h1>
    <div id="container">

    </div>
    <script>
        var y = document.getElementById("container");
        <?php for($i = 0; $i < sizeof($data); $i++) { ?>
            var quizBody = document.createElement("div");
            var heading = document.createElement("h1");
            var startTime = document.createElement("h2");
            var endTime = document.createElement("h2");
            var hostName = document.createElement("h2");
            var id = document.createElement("h2");
            var button = document.createElement("button");
            var quizDate = document.createElement("h2");

            quizBody.className = "quizContainer";
            heading.className = "heading";
            startTime.className = "startTime";
            endTime.className = "endTime";
            hostName.className = "hostName";
            id.className = "id";
            button.className = "btn";
            quizDate.className = "quizDate";

            heading.innerHTML = "<?= $data[$i]['name'] ?>";
            startTime.innerHTML = "<?= $data[$i]['start time'] ?>";
            endTime.innerHTML = "<?= $data[$i]['end time'] ?>";
            hostName.innerHTML = "<?= $data[$i]['host-Email'] ?>";
            id.innerHTML = "<?= $data[$i]['id'] ?>";
            button.innerHTML = "Register";
            quizDate.innerHTML = "<?= $data[$i]['date'] ?>";

            quizBody.appendChild(heading);
            quizBody.appendChild(startTime);
            quizBody.appendChild(endTime);
            quizBody.appendChild(hostName);
            quizBody.appendChild(id);
            quizBody.appendChild(button);
            quizBody.appendChild(quizDate);
            
            y.appendChild(quizBody);
        <?php } ?>
    </script>
</body>