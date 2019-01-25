<!---->
<!--/**-->
<!-- * Created by IntelliJ IDEA.-->
<!-- * User: gregp-->
<!-- * Date: 01/03/2018-->
<!-- * Time: 04:23-->
<!-- */-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Employment App Business Profile View</title>
    <link rel ="icon" sizes ="192x192" href = "\~ehb14204\employ_site\favicon.png"/>
    <link rel = "favicon" href = "\~ehb14204\employ_site\favicon.png"/>
    <link rel="stylesheet" type="text/css" href="business.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
session_start();
$bussName = $_SESSION['Business Name'];
$bussID = $_SESSION['id'];

$id = htmlspecialchars($_COOKIE["ID_is"]);
$code = htmlspecialchars($_COOKIE["Code_is"]);
$gender = $email = $facebook = $twitter = $other = "Seeker has not provided this Information";
$mod1 = $mod2 = $mod3 = $mod4 = $mod5 = "";
$servername = "devweb2017.cis.strath.ac.uk";
$username = "ehb14204";
$password = "aegieBu3aa2i";
$database = "ehb14204";
$conn = new mysqli($servername, $username, $password, $database);

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
    $viewed = "Viewed";
    $sql3 = "UPDATE `Applications` SET `Viewed` = '$viewed' WHERE `code` = '$code' AND `name` = '$name'";
    $result3 = $conn->query($sql3);
    if(!$result3){
        die("Query Failed ".$conn->error);
    }
$sql2 = "SELECT * FROM `cvEntries` WHERE `id` = '$id'";
$result2 = $conn ->query($sql2);
if(!$result2){
die("Query Failed ".$conn->error);
}elseif($result2->num_rows >0) {
    while ($row2 = $result2->fetch_assoc()) {
        if ($row2['Gender'] == NULL) {
            $gender = "Seeker has not entered their Gender";
        } else {
            $gender = $row2['Gender'];
        }
        if ($row2['Email'] == NULL) {
            $email = "Seeker has not entered their Email";
        } else {
            $email = $row2['Email'];
        }
        if ($row2['Website'] == NULL) {
            $website = "Seeker has not entered their Website";
        } else {
            $website = $row2['Website'];
        }
        if ($row2['Facebook'] == NULL) {
            $facebook = "Seeker has not entered their Facebook";
        } else {
            $facebook = $row2['Facebook'];
        }
        if ($row2['Twitter'] == NULL) {
            $twitter = "Seeker has not entered their Twitter";
        } else {
            $twitter = $row2['Twitter'];
        }
        if ($row2['Other'] == NULL) {
            $other = "Seeker has not entered any other Social Media Accounts";
        } else {
            $other = $row2['Other'];
        }

    }
}

$sql4 = "SELECT * FROM `modProgress` WHERE `id` = '$id'";
$result4 = $conn->query($sql4);
if(!$result4){
    die("Query Failed ".$conn->error);
}elseif($result4->num_rows >0) {
    while ($row4 = $result4->fetch_assoc()) {

        if ($row4['module1'] == "Completed") {
            $mod1 = "<p>Module 1 Completed: <span class=\"glyphicon glyphicon-star\"></span></p>";
        }
        if ($row4['module2'] == "Completed") {
            $mod2 = "<p>Module 2 Completed: <span class=\"glyphicon glyphicon-star\"></span></p>";
        }
        if ($row4['module3'] == "Completed") {
            $mod3 = "<p>Module 3 Completed: <span class=\"glyphicon glyphicon-star\"></span></p>";
        }
        if ($row4['module4'] == "Completed") {
            $mod4 = "<p>Module 4 Completed: <span class=\"glyphicon glyphicon-star\"></span></p>";
        }
        if ($row4['module5'] == "Completed") {
            $mod5 = "<p>Module 5 Completed: <span class=\"glyphicon glyphicon-star\"></span></p>";
        }
    }
}
?>
<div class="jumbotron text-center">
    <H1>Youth Unemployment App</H1>
    <h2>Welcome to Your Applicants Profile</h2>
</div>
<ul>
    <li><a href="businessHome.php">Home</a</li>
    <li><a href="businessProfile.php">Your Profile</a></li>
    <li style="float:right"><a href="\~ehb14204\employ_site\Seeker\loginScreen.html">Log Out</a></li>

</ul>
<div class = "container">
    <div id = "row">

        <div id = "frame">
            <iframe src = "businessCvView.php" height="1000" width="700" style="border:none" sandbox">
            </iframe>
        </div>
<h5>Date of Birth: <?php echo $dob;?></h5><br>
<h5>Advisor Name: <?php echo $advisor;?></h5><br>
<h5>Gender: <?php echo $gender ?></h5><br>
<h5>Email: <?php echo $email ?></h5><br>
<h5>Facebook: <?php echo $facebook ?></h5><br>
<h5>Twitter: <?php echo $twitter ?></h5><br>
<h5>Other: <?php echo $other ?></h5><br>

        <h3><span style="text-decoration: underline;">Completed Modules:</span></h3>
        <?php echo $mod1; ?>
        <?php echo $mod2; ?>
        <?php echo $mod3; ?>
        <?php echo $mod4; ?>
        <?php echo $mod5; ?>


</div>
</div>
<center><form method = "post">
    <input type="submit" value="Shortlist Application" name="shortlist" id="buttons">
</form></center>
<center><form method = "post">
    <input type="submit" value="Discard Application" name="discard" id="buttons">
</form></center>

<center><div class="buttons">
        <a href="viewApplication.php"><input type="submit" value="Back To Applications" id="buttons"></a>
    </div></center>

<?php
if(isset($_POST['discard'])) {
    $datePosted = date("d/m/Y");
    $timePosted = date("h:i:s");
    $prefixPosted = date("a");
    $content = "We regret to inform you that your Job Seeker " . $name . " has been unsuccesful from our selection process for job ". $code . " please do not let this deter your Job Seeker from applying to us in the future";
    $sql6 = "INSERT INTO `AdvisorBusinessChat` (`id`, `date`, `time`, `prefix`, `posted by`, `content`, `Send To`, `Regarding`) VALUES ('$bussID', '$datePosted', '$timePosted', '$prefixPosted', '$bussName', '$content', '$advisor', '$name')";
    $result6 = $conn->query($sql6);
    if(!$result6) {
        die("Query Failed " . $conn->error);
    }
    $sql5  = "SELECT * FROM `shortlist` WHERE (`code` = '$code' AND `name` = '$name')";
    $result5 = $conn->query($sql5);
    if(!$result5) {
        die("Query Failed " . $conn->error);
    }else{
        $sql6 = "DELETE FROM `shortlist` WHERE (`code` = '$code' AND `name` = '$name')";
        $result6 = $conn->query($sql6);
        if(!$result6) {
            die("Query Failed " . $conn->error);
        }
    }
    $sql4 = "DELETE FROM `Applications` WHERE (`code` = '$code' AND `name` = '$name')";
    $result4 = $conn->query($sql4);
    $sql7 = "SELECT * FROM `JobPostings` WHERE `code` = '$code'";
    $result7 = $conn->query($sql7);
if(!$result7) {
    die("Query Failed number 7 " . $conn->error);
}elseif($result7->num_rows >0) {
    while ($row7 = $result7->fetch_assoc()) {
        $count = 1;
        $noOfApplied = $row7['noOfApplied'];
        echo "Number of Applied = " . $noOfApplied;
        $newApplied = $noOfApplied - $count;
        echo "Number is = " .  $newApplied;

        $sql8 = "UPDATE `JobPostings` SET `noOfApplied` = '$newApplied' WHERE `code` = '$code'";
        $result8 = $conn->query($sql8);
        if (!$result8) {
            die("Query Failed " . $conn->error);
        } else {
            echo("<script>location.href = 'viewApplication.php';</script>");
        }
    }
}
}

if(isset($_POST['shortlist'])) {
    $datePosted = date("d/m/Y");
    $timePosted = date("h:i:s");
    $prefixPosted = date("a");
    $content = "We are pleased to inform you that your Job Seeker " . $name . " has been shortlisted for our job ". $code . " we shall be in touch shortly with the next steps to take";
    $sql6 = "INSERT INTO `AdvisorBusinessChat` (`id`, `date`, `time`, `prefix`, `posted by`, `content`, `Send To`, `Regarding`) VALUES ('$bussID', '$datePosted', '$timePosted', '$prefixPosted', '$bussName', '$content', '$advisor', '$name')";
    $result6 = $conn->query($sql6);
    if(!$result6) {
    die("Query Failed " . $conn->error);
    }
    $sql5 = "INSERT INTO `shortlist` (`id`, `name`, `code`, `advisor`) VALUES ('$id', '$name', '$code', '$advisor')";
    $result5 = $conn->query($sql5);
    if(!$result5){
        die("Query Failed ".$conn->error);
    }else{
        echo("<script>location.href = 'viewApplication.php';</script>");
    }
}
?>
</body>
</html>