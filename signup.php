
<head>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="SignUP">
        <h2>Sign UP</h2>
        <form action="" method="post"> <!--Sign up-->
            <span class="key">Username*</span> <input type="text" name="Username" required> <br>
            <span class="key">Gmail ID*</span> <input type="text" name="Email" required> <br>
            <span class="key">Age</span> <input type="number" name="Age"  required> <br>
            <span class="key">Institute*</span><input type="text" name="Institute"  required> <br>
            <span class="key">Date of Birth</span><input type="date" name="DOB" > <br>
            <span class="key">Create Password*</span><input type="password" name="CrPassword"  required> <br>
            <span class="key">Confirm Password*</span><input type="text" name="CnPassword"  required> 
            <!--you had made it a button I needed the input so there is some discripancy in style please change -->
             <input value="Sign Up" name="sign"type="submit"></input> 
        </form>
        <form action="index.php">
            <button type="submit">Back</button>
        </form>
    </div>





<?php
$conn = mysqli_connect('localhost', 'root', '');
$sqlQuery = 'CREATE DATABASE IF NOT EXISTS userInfo ;';
mysqli_query($conn, $sqlQuery);
$conn1 = mysqli_connect('localhost', 'root', '', 'userInfo');
$query = 'CREATE TABLE IF NOT EXISTS userTable(
    uName VARCHAR(120) NOT NULL, uGmail VARCHAR(200) NOT NULL, uAge INT NOT NULL, uInstitute VARCHAR(120) NOT NULL, uPassword VARCHAR(50) ); ';
mysqli_query($conn1, $query);
@$sign= $_POST['sign'];

if($sign)
{
    
    $Username= $_POST['Username'];
    $Email= $_POST['Email'];
    $age= $_POST['Age'];
    $Insti= $_POST['Institute'];
    $password= $_POST['CrPassword'];



    $sql= "SELECT uName FROM userTable WHERE uName='$Username'";
    $sql1 ="SELECT uName FROM userTable WHERE uGmail='$Email'";
    $result= $conn1->query($sql); // for checking whether given username already exists
    $result1= $conn1->query($sql1);// for checking whether given email already exists
    if($result->num_rows>0)
    {
        echo "Username Already exists";

    }
    elseif($result1->num_rows>0)
    {
        echo "Email already exists";
        
    }



    else
    {
        $sql= "INSERT INTO userTable (uName,uGmail,uAge,uInstitute,uPassword) VALUES('$Username','$Email','$age','$Insti','$password');";
        
        if($conn1->query($sql))
        {
            //echo 'Created the account successfully';
            $msg = "Thank you for registering in our Exam management application\n\nFollowing are the information that u have entered\n username= $Username\n password= $password";
            $subject= "Thanks for signing up";
            // use wordwrap() if lines are longer than 70 characters
            $msg = wordwrap($msg,70);
            $txt = "Hello world!";
            $headers = "From: webmaster@example.com" . "\r\n" .
            "BCC: anandishegde@gmail.com";//200030041@iitdh.ac.in, 200010022@iitdh.ac.in
            // send email
            
            if(mail("$Email",$subject,$msg,$headers))
            {
                echo 'mailed successfully';
                header('Location:index.php');
                
                
            }
            else
            {
                echo "sesesfes";
            }
            header('Location:index.php');
            
        }
    }

}

?>
</body>
