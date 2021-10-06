<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add questions</title>
</head>
<body>
   <div class="instuction">Please give the question and four options and their answers.</div>
   
    Question:
    <form action="" method="post"><textarea name="question" id="question" cols="30" rows="10"></textarea>
    <br><br>
    Options:
    <div class="no_options">
        number of options: <input type="number" id='no_of_options' name='no_of_options' onkeyup="options();" min='2' max='5' required oninvalid="this.setCustomValidity('Enter a value between 2 and 5')">
    </div>
    <div id="optioncontainer">

    </div>
    <div></div>
    <div></div>
    <input type="submit" value="add" name="done">


    </form>

    <?php
    $X=$_POST['no_of_options'];

    echo $X;


    ?>
    <script>

        function options()
        {
            console.log('anna');
            var container= document.getElementById("optioncontainer");
            var x=document.getElementById("no_of_options").value;
            console.log(x);
            if(x>5 || x<2)
            {
                document.getElementById("no_of_options").reportValidity('2-5 options');
                console.log("here");
            }
            else
            {
                while (container.hasChildNodes()) {
                container.removeChild(container.lastChild);
            }
                for (i=1;i<=x;i++)
                {
                    var br=document.createElement("br");
                    
                    container.appendChild(document.createTextNode("Option " + (i)+": "));
                    container.appendChild(br);
                   var input=document.createElement("input");
                   input.id= "options"
                   input.type= "text";
                   input.name="option"+i; 
          
                    container.appendChild(input);

                   
                    container.appendChild(document.createElement("br"));
                    container.appendChild(document.createElement("br"));
                }
            }
        }
    </script>
</body>
</html>