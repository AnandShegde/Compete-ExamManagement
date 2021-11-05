<?php


if($_SERVER['REQUEST_METHOD']=='POST'){
    session_start();
    // $_SESSION['qname']= 
    $user= $_SESSION['user'];
    $host= $_SESSION['q_host_db'];
    $qname= $_SESSION['q_current_table'];
    $qnameres= $qname."responses";
    
    
   $conn1= mysqli_connect("localhost","root",'',"$host");
    // $sql= "CREATE TABLE IF NOT EXISTS `$host`.`$qname`";
    // echo $qname;
    // echo "<br>";
    // echo $host.$qname;
    $sql= "INSERT INTO `$qnameres` (`username`) VALUES ('$user');";
   if(! $conn1->query($sql))
   {
       echo $conn1->error;
   }

    $id=$conn1->insert_id;

    $answers= $_POST['values'];
    $sql= "SELECT  `correct_option` FROM `$qname`;";
   $result=  $conn1->query($sql);
   $correct= mysqli_fetch_all($result, MYSQLI_ASSOC);
   $rightans=0; 
    for ($i=1;$i<=sizeof($answers);$i++)
    {
        $j= $i-1;
        $val= $answers[$j];
        

        if($val==$correct[$j]['correct_option'])
        {   
            $rightans++;


        }

        $sql= "UPDATE `".$qnameres."` SET `$i` = '$val' WHERE `$qnameres`.`no` = $id;";
      
        if(!$conn1->query($sql))
        {
            echo $conn1->error;
        }
    }

    $sql= "ALTER TABLE `$qnameres` ADD if not exists `result` INT";
    if(!$conn1->query($sql))
    {
        echo $conn1->error;
    }
    $sql= "UPDATE `".$qnameres."` SET `result` = '$rightans' WHERE `$qnameres`.`no` = $id;";
    if(!$conn1->query($sql))
    {
        echo $conn1->error;
    }
    unset($_POST);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.anychart.com/releases/8.0.0/js/anychart-base.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <title>Document</title>
</head>
<body>
  <center><H1 > Congratulations you have got <?php echo $rightans?> questions correct</H1></center>
  <!-- <div id="container" style="width: 100%; height: 100%"></div> -->
  <canvas id="myChart" style="width:100%;max-width:600px"></canvas>

<script>
var xValues = ["Correct answers", "total questions"];
var yValues = [<?=$rightans?>,<?=sizeof($answers)?>];
 var barColors = ["red", "green"];


new Chart("myChart", {
  type: "horizontalBar",
  data: {
  labels: xValues,
  datasets: [{
    backgroundColor: barColors,
    data: yValues
  }]
},
  options: {
    legend: {display: false},
    title: {
      display: false,
      text: "World Wine Production 2018"
    },
    scales: {
      xAxes: [{ticks: {min: 0, max:<?=sizeof($answers)?>}}]
    }
  }
});
    
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
    
</script>

</body>
</html>

<?php
}
?>






