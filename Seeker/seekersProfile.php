<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Job Seekers Profile</title>
    <link rel ="icon" sizes ="192x192" href = "\~ehb14204\employ_site\favicon.png"/>
    <link rel = "favicon" href = "\~ehb14204\employ_site\favicon.png"/>
    <link rel="stylesheet" type="text/css" href="profile.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
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
<body>

<?php
session_start();
$id = $_SESSION['id'];

$servername = "devweb2017.cis.strath.ac.uk";
$username = "ehb14204";
$password = "aegieBu3aa2i";
$database = "ehb14204";
$conn = new mysqli($servername, $username, $password, $database);
$name = $dob = $advisor = $username = $gender = $email = $website= $facebook = $twitter = $other = "Please enter in the CV information Capture";
$mod1 = $mod2 = $mod3 = $mod4 = $mod5 = "";
if($conn ->connect_error){
    die("Connection Failed : ".$conn->connect_error);
}

$sql = "SELECT * FROM `JobSeekers` WHERE `id` = '$id'";
$result = $conn ->query($sql);
if(!$result){
    die("Query Failed ".$conn->error);
}

else if($result->num_rows > 0){
while($row = $result->fetch_assoc()) {
    $name = $row['Name'];
    $dob = $row['Date of Birth'];
    $advisor = $row['Advisor Name'];
    $username = $row['Username'];

}
}
$sql2 = "SELECT * FROM `cvEntries` WHERE `id` = '$id'";
$result2 = $conn ->query($sql2);
if(!$result2){
    die("Query Failed ".$conn->error);
}elseif($result2->num_rows >0){
    while($row2 = $result2->fetch_assoc()){
        if($row2['Gender'] == NULL){
            $gender = "User has not entered their Gender";
        }else{
            $gender = $row2['Gender'];
        }
        if($row2['Email'] == NULL){
           $email = "User has not entered their email";
        }else{
            $email = $row2['Email'];
        }if($row2['Website'] == NULL){
           $website == "User has not entered a website";
        }else{
            $website = $row2['Website'];
        }
        if($row2['Facebook'] == NULL){

        }else{
            $facebook = $row2['Facebook'];
        }
        if($row2['Twitter'] == NULL){

        }else{
            $twitter = $row2['Twitter'];
        }
        if($row2['Other'] == NULL){

        }else{
            $other = $row2['Other'];
        }

    }

}

$sql4 = "SELECT * FROM `modProgress` WHERE `id` = '$id'";
$result4 = $conn->query($sql4);
if(!$result4){
    die("Query Failed ".$conn->error);
}elseif($result4->num_rows >0){
    while($row4 = $result4->fetch_assoc()) {

        if($row4['module1'] == "Completed"){
            $mod1 = "<p>Module 1 Completed: <span class=\"glyphicon glyphicon-star\"></span></p>";
        }
        if($row4['module2'] == "Completed"){
            $mod2 =  "<p>Module 2 Completed: <span class=\"glyphicon glyphicon-star\"></span></p>";
        }
        if($row4['module3'] == "Completed"){
            $mod3 =  "<p>Module 3 Completed: <span class=\"glyphicon glyphicon-star\"></span></p>";
        }
        if($row4['module4'] == "Completed"){
            $mod4 = "<p>Module 4 Completed: <span class=\"glyphicon glyphicon-star\"></span></p>";
        }
        if($row4['module5'] == "Completed"){
            $mod5= "<p>Module 5 Completed: <span class=\"glyphicon glyphicon-star\"></span></p>";
        }
    }
}

?>
<div class="jumbotron text-center">
    <br>
    <h1><?php echo $name?>'s Seeker Profile</h1><br>
</div>
<ul>
    <li><a href="loggedin.php">Home</a</li>
    <li><a href = "aboutUs.php">About Us</a></li>
    <li><a href="seekersProfile.php">Your Profile</a></li>
    <li style="float:right"><a href="loginScreen.html">Log Out</a></li>

</ul>
<div class = "container">
<h3 id = "row">
    <div id = "frame">
        <iframe src = "cvView.php" height="1000" width="700" style="border:none" sandbox">
        </iframe>
    </div>

    <h4>Date of Birth: <?php echo $dob;?></h4><br>
    <h4>Advisor Name: <?php echo $advisor;?></h4><br>
    <h4>Gender: <?php echo $gender ?></h4><br>
    <h4>Email: <?php echo $email ?></h4><br>
    <h4>Facebook: <?php echo $facebook ?></h4><br>
    <h4>Twitter: <?php echo $twitter ?></h4><br>
    <h4>Other: <?php echo $other ?></h4><br>

    <h3><span style="text-decoration: underline;">Completed Modules:</span></h3>
    <?php echo $mod1; ?>
    <?php echo $mod2; ?>
    <?php echo $mod3; ?>
    <?php echo $mod4; ?>
    <?php echo $mod5; ?>

</div>
</div>
<!--</--<form method="post" enctype="multipart/form-data" name = "addPic">-->
<!--    <label for="fileToUpload" id="buttons" style="margin-left: 5vw; margin-right: 5vw;">Add Profile Picture</label>-->
<!--    <input type="file" name="fileToUpload" id="fileToUpload">-->
<!--    <input type="submit" value="Create Account" name="Create Picture" id="buttons">-->
<!--</form>-->
<!--<img src="\~ehb14204\employ_site\docs\Images\--><?//=$picture ?><!--" alt="--><?//=$name?><!--'s Profile Picture'" />-->

<div class="buttons">
    <a href="loggedin.php"><input type="submit" value="Home" id="button"></a>
</div><br>

<div class = "containers">
<div class="panel panel-default">
    <div class="panel-body">
        <div class = "floating-box">
            <a href="seekerAdvisorChat.php"><p>Adviser Chat:<p><center><span class="glyphicon glyphicon-envelope"></span></center></p></a>
        </div>
        <div class = "floating-box">
            <a href="aboutUs.php">About Us</a>
        </div>
        <div class = "floating-box">
            <a href="#">Privacy Policy</a>
        </div>
        <div class = "floating-box">
            <a href="#">Cookies</a>
        </div>
        <div class = "floating-box">
            <a href="http://gregpeters1.edublogs.org/">Blog Link</a>
        </div>
        <div class = "floating-box">
            <a href="learningMod.php"> Learning Modules: <p><center><span class="glyphicon glyphicon-education"></span></center></p></a>
        </div>
        <div class = "floating-box">
            <a href="#">Facebook: <p><span class= "fa fa-3x fa-facebook-square"></span></p></a>
        </div>
        <div class = "floating-box">
            <a href="#">Twitter: <p><span class="fa fa-3x fa-twitter-square"></span></p></a>
        </div>
        <div class = "floating-box">
            <a href="#">LinkedIn: <p><span class="fa fa-3x fa-linkedin-square"></span></p></a>
        </div>
    </div>
</div>
</div>

<?php

$conn ->close();
?>
</body>
</html>