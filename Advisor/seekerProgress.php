<!--/**-->
<!-- * Created by IntelliJ IDEA.-->
<!-- * User: gregp-->
<!-- * Date: 05/03/2018-->
<!-- * Time: 11:01-->
<!-- */-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Employment App Login Screen</title>
    <link rel ="icon" sizes ="192x192" href = "\~ehb14204\employ_site\favicon.png"/>
    <link rel = "favicon" href = "\~ehb14204\employ_site\favicon.png"/>
    <link rel="stylesheet" type="text/css" href="advisor.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>
<style>
    ul {
        list-style-type: none;
        margin: 0;
        padding: 0;
        overflow: hidden;
        background-color: #333;
        position: fixed;
        top: 0;
        width: 100%;
    }

    li {
        float: left;
    }

    li a {
        display: block;
        color: white;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
    }

    li a:hover {
        background-color: #111;
    }
    /* Add a gray right border to all list items, except the last item (last-child) */
    li {
        border-right: 1px solid #bbb;
    }

    li:last-child {
        border-right: none;
    }
</style>
<?php
$seekId = htmlspecialchars($_COOKIE["ID_is"]);
$seekName = htmlspecialchars($_COOKIE["Name_is"]);

$servername = "devweb2017.cis.strath.ac.uk";
$username = "ehb14204";
$password = "aegieBu3aa2i";
$database = "ehb14204";
$conn = new mysqli($servername, $username, $password, $database);
if($conn ->connect_error){
    die("Connection Failed : ".$conn->connect_error);
}
$applications = 0;
?>
<div id="mod-1" style="display: none;">
    <?php
    $count1 = 0;
    $sql = "SELECT * FROM `modProgress` WHERE `id` = '$seekId'";
    $result = $conn->query($sql);
    if(!$result){
        die("Query Failed ".$conn->error);
    }
    else if($result->num_rows > 0){
    while ($row = $result->fetch_assoc()) {
        $mod1 = $row['module1'];
        if($mod1 == "Completed") {
            $count1 = $count1 + 1;
            echo $count1;
        }else if($mod1 == "Attempted"){
            $count1 = $count1 + 2;
            echo $count1;
        }else if($mod1 == "Not Attempted"){
            $count1 = $count1 + 3;
            echo $count1;
        }
       }
    }
    ?>
</div>
<div id="mod-2" style="display: none;">
    <?php
    $count2 = 0;
    $sql2 = "SELECT * FROM `modProgress` WHERE `id` = '$seekId'";
    $result2 = $conn->query($sql2);
    if(!$result2){
        die("Query Failed ".$conn->error);
    }
    else if($result2->num_rows > 0){
        while ($row2 = $result2->fetch_assoc()) {
            $mod2 = $row2['module2'];
            if ($mod2 == "Completed") {
                $count2 = $count2 + 1;
                echo $count2;
            } else if ($mod2 == "Attempted") {
                $count2 = $count2 + 2;
                echo $count2;
            } else if ($mod2 == "Not Attempted") {
                $count2 = $count2 + 3;
                echo $count2;
            }
        }
    }
    ?>
</div>
<div id="mod-3" style="display: none;">
    <?php
    $count3 = 0;
    $sql3 = "SELECT * FROM `modProgress` WHERE `id` = '$seekId'";
    $result3 = $conn->query($sql3);
    if(!$result3){
        die("Query Failed ".$conn->error);
    }
    else if($result3->num_rows > 0){
        while ($row3 = $result3->fetch_assoc()) {
            $mod3 = $row3['module3'];
            if($mod3 == "Completed") {
                $count3 = $count3 + 1;
                echo $count3;
            }else if($mod3 == "Attempted"){
                $count3 = $count3 + 2;
                echo $count3;
            }else if($mod3 == "Not Attempted"){
                $count3 = $count3 + 3;
                echo $count3;
            }
        }
    }
    ?>
</div>
<div id="mod-4" style="display: none;">
    <?php
    $count4 = 0;
    $sql4 = "SELECT * FROM `modProgress` WHERE `id` = '$seekId'";
    $result4 = $conn->query($sql4);
    if(!$result4){
        die("Query Failed ".$conn->error);
    }
    else if($result4->num_rows > 0){
        while ($row4 = $result4->fetch_assoc()) {
            $mod4 = $row4['module4'];
            if($mod4 == "Completed") {
                $count4 = $count4 + 1;
                echo $count4;
            }else if($mod4 == "Attempted"){
                $count4 = $count4 + 2;
                echo $count4;
            }
            else if($mod4 == "Not Attempted"){
                $count4 = $count4 + 3;
                echo $count4;
            }
        }
    }
    ?>
</div>
<div id="mod-5" style="display: none;">
    <?php
    $count5 = 0;
    $sql5 = "SELECT * FROM `modProgress` WHERE `id` = '$seekId'";
    $result5 = $conn->query($sql5);
    if(!$result5){
        die("Query Failed ".$conn->error);
    }
    else if($result5->num_rows > 0){
        while ($row5 = $result5->fetch_assoc()) {
            $mod5 = $row5['module5'];
            if($mod5 == "Completed") {
                $count5 = $count5 + 1;
                echo $count5;
            }else if($mod5 == "Attempted"){
                $count5 = $count5 + 2;
                echo $count5;
            }
            else if($mod5 == "Not Attempted"){
                $count5 = $count5 + 3;
                echo $count5;
            }
        }
    }
    ?>
</div>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">

    // Load the Visualization API and the piechart package.
    google.charts.load('current', {packages: ['corechart', 'bar']});

    // Set a callback to run when the Google Visualization API is loaded.
    google.charts.setOnLoadCallback(drawChart);

    // Callback that creates and populates a data table,
    // instantiates the pie chart, passes in the data and
    // draws it.
    var comp1 = document.getElementById("mod-1");
    var myData1 = comp1.textContent;
    if(myData1 == 1){
        var dataColor1 = 'color:green';
        var comp1 = 2;
    }else if(myData1 == 2){
        var dataColor1 = 'color:yellow';
        var comp1 = 1.5;
    }else if(myData1 == 3){
        var dataColor1 = 'color:red';
        var comp1 = 1;
    }
    var comp2 = document.getElementById("mod-2");
    var myData2 = comp2.textContent;
    if(myData2 == 1){
        var dataColor2 = 'color:green';
        var comp2 = 2;
    }else if(myData2 == 2){
        var dataColor2 = 'color:yellow';
        var comp2 = 1.5;
    }else if(myData2 == 3){
        var dataColor2 = 'color:red';
        var comp2 = 1;
    }
    var comp3 = document.getElementById("mod-3");
    var myData3 = comp3.textContent;
    if(myData3 == 1){
        var dataColor3 = 'color:green';
        var comp3 = 2;
    }else if(myData3 == 2){
        var dataColor3 = 'color:yellow';
        var comp3 = 1.5;
    }else if(myData3 == 3){
        var dataColor3 = 'color:red';
        var comp3 = 1;
    }
    var comp4 = document.getElementById("mod-4");
    var myData4 = comp4.textContent;
    if(myData4 == 1){
        var dataColor4 = 'color:green';
        var comp4 = 2;
    }else if(myData4 == 2){
        var dataColor4 = 'color:yellow';
        var comp4 = 1.5;
    }else if(myData4 == 3){
        var dataColor4 = 'color:red';
        var comp4 = 1;
    }
    var comp5 = document.getElementById("mod-5");
    var myData5 = comp5.textContent;
    if(myData5 == 1){
        var dataColor5 = 'color:green';
        var comp5 = 2;
    }else if(myData5 == 2){
        var dataColor5 = 'color:yellow';
        var comp5 = 1.5;
    }else if(myData5 == 3){
        var dataColor5 = 'color:red';
        var comp5 = 1;
    }
    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Module', 'Progress', {role: 'style'}],
            ['Module 1', comp1, dataColor1],
            ['Module 2', comp2, dataColor2],
            ['Module 3', comp3, dataColor3],
            ['Module 4', comp4, dataColor4],
            ['Module 5', comp5, dataColor5]
        ]);
        var options = {
            title: "Job Seeker Module Progress",
            width: 600,
            height: 400,
            bar: {groupWidth: "95%"},
            legend: { position: "none" },
        };
        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.BarChart(document.getElementById('chart_div'));
        chart.draw(data, options);
    }
</script>
<!--Div that will hold the pie chart-->

    <div class="jumbotron text-center">
        <br>
        <H1>Youth Unemployment App</H1>
        <h2>Seeker Progress For: <?php echo $seekName ?> </h2>
    </div>
    <ul>
        <li><a href="advisorLoggedIn.php">Home</a</li>
        <li><a href="advisorProfile.php">Your Profile</a></li>
        <li style="float:right"><a href="\~ehb14204\employ_site\Seeker\loginScreen.html">Log Out</a></li>

    </ul>
<center><div id="chart_div" style="width:800; height:700"></div>
    <?php

   $sql6 = "SELECT * FROM `cvEntries` WHERE `id` = '$seekId'";
   $result6 = $conn->query($sql6);
if(!$result6){
    die("Query Failed ".$conn->error);
}
else if($result6->num_rows > 0) {
  echo "<h4>" . $seekName . " has already generated  a CV </h4>";
}else{
    echo "<h4>" . $seekName . " has not yet generated a CV </h4>";
}

$sql7 = "SELECT * FROM `Applications` WHERE `id` = '$seekId'";
$result7 = $conn->query($sql7);
if(!$result7){
    die("Query Failed ".$conn->error);
}else if($result7->num_rows > 0) {
while($row7 = $result7->fetch_assoc()) {
    if($row7['id'] == $seekId){
        $applications = $applications + 1;
    }else{
        return;
    }
  }
}

echo "<h4> " . $seekName . " has " . $applications . " applications currently under consideration </h4>";
?>
    <div id="chart_div"></div>
<br>
<br>
<center><div class="buttons">
    <a href="advisorProfile.php"><input type="submit" value="Back To Profile" id="buttons"></a>
</div></center>
</body>
</html>