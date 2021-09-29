<head>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="SignUP">
        <h2>Sign UP</h2>
        <form action="index.php" method="POST"> <!--Sign up-->
            Username: <input type="text" name="Username"> <br>
            Gmail ID: <input type="text" name="Email"> <br>
            Age: <input type="number" name="Age"> <br>
            Insititute: <input type="text" name="Institute"> <br>
            Date of Birth: <input type="date" name="DOB"> <br>
            Create Password: <input type="password" name="CrPassword"> <br>
            Confirm Password: <input type="text" name="CnPassword"> 
            <input type="submit" name="sign" value="Sign Up" id="Sign_up"></input> 
        </form>
        <form action="index.php">
            <button type="submit">Back</button>
        </form>
    </div>
</body>
