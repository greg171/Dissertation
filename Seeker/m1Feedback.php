<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Module 1 Answer Feedback</title>
    <link rel ="icon" sizes ="192x192" href = "\~ehb14204\employ_site\favicon.png"/>
    <link rel = "favicon" href = "\~ehb14204\employ_site\favicon.png"/>
    <link rel="stylesheet" type="text/css" href="learningMod.css">
</head>

<body>
<div class="modulecontent">
    <h2>Test Your Knowledge</h2>
    <?php
    session_start();
    $id = $_SESSION['id'];
    $complete = "Completed";
    $q1 = $_SESSION["q1"];
    $q2 = $_SESSION["q2"];
    $q3 = $_SESSION["q3"];
    $q4 = $_SESSION["q4"];
    $q5 = $_SESSION["q5"];

    $correct = 0;
    ?>

    <p class="question"><b>1. What type of Handshake should you use?</b></p>

    <span>a) Firm and quick</span><br>
    <span>b) Weak and Long</span><br>
    <span>c) Don't shake at all</span><br>
    <span>d) Flat and Limp</span><br>
    <br>
    <span>Correct Answer: a</span><br>
    <?php if($q1 === "a"){echo "<span style='color:green'><b>Your Answer: ".$q1."</b></span>"."<br>"; $correct++;} else {echo "<span style='color:red'><b>Your Answer: ".$q1."</b></span>"."<br>";} ?>

    <p class="question"><b>2. How Should you Dress?</b></p>

    <span>a) Casual </span><br>
    <span>b) Smart Business Dress </span><br>
    <span>c) Tracksuit</span><br>
    <span>d) Who Cares</span><br>
    <br>
    <span>Correct Answer: b</span><br>
    <?php if($q2 === "b"){echo "<span style='color:green'><b>Your Answer: ".$q2."</b></span>"."<br>"; $correct++;} else {echo "<span style='color:red'><b>Your Answer: ".$q2."</b></span>"."<br>";} ?>


    <p class="question"><b>3. What type of Posture should you have?</b></p>

    <span>a) Hunched</span><br>
    <span>b) Limp</span><br>
    <span>c) Tall and confident</span><br>
    <span>d) Face Away</span><br>
    <br>
    <span>Correct Answer: c</span><br>
<?php if($q3 === "c"){echo "<span style='color:green'><b>Your Answer: ".$q3."</b></span>"."<br>"; $correct++;} else {echo "<span style='color:red'><b>Your Answer: ".$q3."</b></span>"."<br>";} ?>

    <p class="question"><b>4. How should you Speak?</b></p>

    <span>a) Quietly</span><br>
    <span>b) Slang/span><br>
    <span>c) Loud and Proper</span><br>
    <span>d) Scream</span><br>
    <br>
    <span>Correct Answer: d</span><br>
    <?php if($q4 === "d"){echo "<span style='color:green'><b>Your Answer: ".$q4."</b></span>"."<br>"; $correct++;} else {echo "<span style='color:red'><b>Your Answer: ".$q4."</b></span>"."<br>";} ?>

    <p class="question"><b>5. Do Manners Count?</b></p>

    <span>a) No</span><br>
    <span>b) Absolutely Not</span><br>
    <span>c) Maybe</span><br>
    <span>d) Absolutely</span><br>
    <br>
    <span>Correct Answer: d</span><br>
    <?php if($q5 === "d"){echo "<span style='color:green'><b>Your Answer: ".$q5."</b></span>"."<br>"; $correct++;} else {echo "<span style='color:red'><b>Your Answer: ".$q5."</b></span>"."<br>";} ?>

    <?php
    echo "<span style='font-size:25px;'>Your Score: ".$correct."/5</span>";
    //connect to database
    $servername = "devweb2017.cis.strath.ac.uk";
    $username = "ehb14204";
    $password = "aegieBu3aa2i";
    $database = "ehb14204";
    $conn = new mysqli($servername, $username, $password, $database);

    if($conn ->connect_error){
        die("Connection Failed : ".$conn->connect_error);
    }

    if($correct >=4) {
        $sql2 = "UPDATE `modProgress` SET `module1`= 'Completed' WHERE `id` = $id";
        $result = $conn->query($sql2);

        if (!$result) {
            die("Query Failed " . $conn->error);
        }
    }
    ?>
    <div id="buttons">
        <br>
        <a href="learningMod.php"><button name="home">Finish</button></a>
    </div>

</body>
</html>