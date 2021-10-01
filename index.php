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
    <center><p id="errors"></p></center>
    <div class="container">
        <div  id='bgm'>
        
        </div>
        <div class="Login">
            <h2>Login</h2>
            
            <form action="" method="post"> <!--Login form-->
                Email ID: <input type="text" name="Email" id="Gmail"> <br>
                Password: <input type="password" name="Password"> 
                <button type="submit" value="login" name='login'>Log in</button>
                <button type="submit">Forgot Password</button> <br>
            </form>
            <form action="signup.php">
                New User? <button type="submit">Sign Up</button>
            </form>
        </div>
    </div>




    <?php
    //pavan kumar
    $conn = mysqli_connect('localhost', 'root', '');
    $sqlQuery = 'CREATE DATABASE IF NOT EXISTS userInfo ;';
    mysqli_query($conn, $sqlQuery);
    $conn1 = mysqli_connect('localhost', 'root', '', 'userInfo');
    $query = 'CREATE TABLE IF NOT EXISTS userTable(
        uName VARCHAR(120) NOT NULL, uGmail VARCHAR(200) NOT NULL, uAge INT NOT NULL, uInstitute VARCHAR(120) NOT NULL, uPassword VARCHAR(50) ); ';
    mysqli_query($conn1, $query);
    @$sign= $_POST['sign'];
    @$login= $_POST['login'];
    if($login)
    {
        $Username= $_POST['Email'];
        $password= $_POST['Password'];
        $query= "SELECT * FROM userTable WHERE uGmail='$Username'";
        $result= $conn1->query($query);
        
        if($result->num_rows>0)
        {
            $row= $result->fetch_assoc();
            // THIS WILL LOGIN THE USER ANY SESSION RELATED ACTIVITIES THAT MUST HAPPEN DURING LOGIN SHOULD BE DONE HERE
            if($password==$row['uPassword'])
            {
                header("Location: homepage.html"); 

            }
            else
            {
                ?>
            <script>document.getElementById('errors').innerHTML="The emailid and password didn't match"</script>

            <?php
            }
        }
        else
        {
            ?>
            <script>document.getElementById('errors').innerHTML="There is no account with given email id"</script>

            <?php
        }
    }

?> 

</body>
</html>
