<?php 
    $connection = mysqli_connect("localhost", "root", "", "userinfo");
    $query = "SELECT * FROM `quizanandishegde@gmail.com`;";
    $result = mysqli_query($connection, $query);
    $questionSet = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $noOfQuestions = sizeof($questionSet); 
    //0 -> Question, 1->option1, 2->option2, 3->option3, 4->option4, 5->rightOption
?>

<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@200&display=swap" rel="stylesheet">
    <style>
       body{
            background-image: url("bg.jpg");
            background-size: cover;
        }
        #output{
            font-family: 'Source Sans Pro', sans-serif;
            font-size: 30px;
            color: rgb(16, 1, 60);
            font-weight: bold;
            text-align: center;
        }
        #navbuttons{
            width: 350px;
            box-sizing: border-box;
            margin-left: 10%;
            /* float: right; */
        }
        .buttonHolder{
            display: flex;
            margin-left: 25%;
        }
        .controls{
            padding: 15px;
            margin: 15px;
            font-size: 18px;
            border-radius: 6px;
            align-items: center;
            margin-left: 5%;
            background-color: rgb(250, 240, 225);
            color: rgb(37, 140, 224);
            float: left;
        }
        .controls:hover{
            color: rgb(236, 236, 236);
            transition: 0.4s;
            font-weight: bolder;
            background-color: rgb(30, 96, 36);
        }
        .options{
            font-size: 20px;
            padding-left: 15px;
            color: rgb(16, 1, 60);
        }
        .question{
            font-size: 25px;
            margin-bottom: 10px;
            color: teal;
        }
        h1{
            font-family: 'Source Sans Pro', sans-serif;
            font-size: 100px;
            transform: scale(1, 1);
            color: #20546d;
            text-shadow:6px 6px 40px rgb(57, 130, 154);
        }
        .Qcontainer{
            font-family: 'Source Sans Pro', sans-serif;
            font-weight: bold;
            margin-bottom: 50px;
            margin-left: 20%;
            background-color: rgb(250, 240, 225);
            min-width: 70%;
            max-width: 70%;
            padding: 2%;
            border-radius: 15px;
            box-shadow: 5px 5px 25px black;
        }
        input[type='radio']:after {
            width: 15px;
            height: 15px;
            border-radius: 15px;
            top: -2px;
            left: -1px;
            position: relative;
            background-color: #d1d3d1;
            content: '';
            display: inline-block;
            visibility: visible;
            border: 2px solid white;
        }
        input[type='radio']:checked:after {
            width: 18px;
            height: 18px;
            border-radius: 18px;
            top: -2px;
            left: -1px;
            position: relative;
            background-color: green;
            content: '';
            display: inline-block;
            visibility: visible;
            border: 2px solid white;
        }
        .opdiv{
            padding: 8px;
        }
        .navbutton{
            width: 50px;
            height: 50px;
            border-radius: 25px;
            margin: 3px;
            font-size: 25px;
            color: teal;
            background-color: rgb(250, 240, 225);
        }
        .navbutton:hover{
            background-color: green;
            color: white;
        }
        #grandp{
            display: flex;
        }
      
    </style>
</head>

<body>
    <h1 style="text-align: center;">Quiz Name</h1>
    <div id="grandp">
        <div id="qnp">
            <div id="parent">
    
            </div>
            <div class="buttonHolder">
                <button class="controls" onclick="previous()">Previous</button>
                <button class="controls" onclick="next()">Next</button>
                <button class="controls">Mark for review</button>
            </div>
        </div>
        <div id="navButtons">
    
        </div>
    </div>
    <p id="output"></p>
    <script>
        let parent = document.getElementById("parent");
        let x= <?= $noOfQuestions?>;
        console.log(x);
        
        i=0;
        
            
        
        <?php for( $i=0; $i< $noOfQuestions ; $i++){ ?>
       
            var questionBody = document.createElement("div");
            questionBody.className = "Qcontainer";
            var question = document.createElement("div");

            var divop1 = document.createElement("div");
            var divop2 = document.createElement("div");
            var divop3 = document.createElement("div");
            var divop4 = document.createElement("div");
            var option1 = document.createElement("input");
            var option2 = document.createElement("input");
            var option3 = document.createElement("input");
            var option4 = document.createElement("input");
            var o4 = document.createElement("span");
            var o3 = document.createElement("span");
            var o2 = document.createElement("span");
            var o1 = document.createElement("span");
            console.log(<?=$i?>);
            i++;

            divop1.className = "opdiv";
            divop2.className = "opdiv";
            divop3.className = "opdiv";
            divop4.className = "opdiv";

            

            option1.className = "buttons";
            option2.className = "buttons";
            option3.className = "buttons";
            option4.className = "buttons";


            option1.type = "radio";
            option2.type = "radio";
            option3.type = "radio";
            option4.type = "radio";

            option1.name = "circle"+i;
            option2.name = "circle"+i;
            option3.name = "circle"+i;
            option4.name = "circle"+i;


            divop1.appendChild(option1);
            divop2.appendChild(option2);
            divop3.appendChild(option3);
            divop4.appendChild(option4);

            
            o1.innerHTML = "A. "+ "<?= $questionSet[$i]['option1'] ?>";
            
            o2.innerHTML = "B. "+ "<?= $questionSet[$i]['option2'] ?>";
            
            o3.innerHTML = "C. "+ "<?= $questionSet[$i]['option3'] ?>"; 
            
            o4.innerHTML = "D. "+ "<?= $questionSet[$i]['option4'] ?>";

            o1.className = "options";
            o2.className = "options";
            o3.className = "options";
            o4.className = "options";


            divop1.appendChild(o1);
            divop2.appendChild(o2);
            divop3.appendChild(o3);
            divop4.appendChild(o4);

            question.innerHTML = i+". "+ "<?= $questionSet[$i]['question'] ?>";
            question.className = "question";

            questionBody.appendChild(question);
            questionBody.appendChild(divop1);
            questionBody.appendChild(divop2);
            questionBody.appendChild(divop3);
            questionBody.appendChild(divop4);
            parent.appendChild(questionBody);

       <?php }?>
        let questionArray = document.getElementById("parent").childNodes;
        for(let i=2; i<=questionArray.length-1; i++){
            questionArray[i].style.display = "none";
        }
        let buttonsParent = document.getElementById("navButtons");
        for(let i = 1; i < questionArray.length; i++){
            let y = document.createElement("button");
            y.className = "navButton";
            y.innerHTML = i;
            buttonsParent.appendChild(y);
        }
        var i = 1;
        currentBlue();
        for(let i=2; i<=questionArray.length-1; i++){
            questionArray[i].style.display = "none";
        }
        var i = 1;
        function next(){
            if(i == questionArray.length-1){
                questionArray[i].style.display = "none";
                questionArray[1].style.display = "block";
                currentYellow();
                // hoverGreen();
                i = 1;
                currentBlue();
                // hoverGreen();
                return;
            }
            questionArray[i].style.display = "none";
            currentYellow();
            questionArray[i+1].style.display = "block";
            i++;
            currentBlue();
        }
        function previous(){
            if(i==1){
                questionArray[i].style.display = "none";
                currentYellow();
                questionArray[questionArray.length-1].style.display = "block";
                i = questionArray.length-1;
                currentBlue();
                return;
            }
            questionArray[i].style.display = "none";
            currentYellow();
            questionArray[i-1].style.display = "block";
            i--;
            currentBlue();
        }
        function currentBlue(){
            let navButtons = document.getElementById("navButtons");
            let buttonArray = navButtons.childNodes;
            buttonArray[i].style.background = "blue";
            buttonArray[i].style.color = "white";
        }
        function currentYellow(){
            let navButtons = document.getElementById("navButtons");
            let buttonArray = navButtons.childNodes;
            buttonArray[i].style.background = "rgb(250, 240, 225)";
            buttonArray[i].style.color = "teal";
        }
        // function hoverGreen(){
        //     buttonArray[i].style.hover.background = "green";
        // }
        var time = 600;
        var output = document.getElementById("output")
        function display(){
            if(time == 0){
                clearInterval(event);
            }
            let min = parseInt(time/60);
            let sec = time%60;
            if(parseInt(min/10)==0){
                min = '0' + min;
            }
            if(parseInt(sec/10)==0){
                sec = '0' + sec;
            }
            output.innerHTML = "Time left : "+min+":"+sec;
            time--;
        }
        let event = setInterval(display, 1000);
    </script>
    
</body>

