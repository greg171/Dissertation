<html>
<head>
    <title>Forum</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel ="icon" sizes ="192x192" href = "\~ehb14204\employ_site\favicon.png"/>
    <link rel = "favicon" href = "\~ehb14204\employ_site\favicon.png"/>
    <link rel="stylesheet" type="text/css" href="seekerChat.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
    .floating-box {
        float: left;
        width: 161px;
        height: 70px;
    }
</style>
<?php
//connect to database
$servername = "devweb2017.cis.strath.ac.uk";
$username = "ehb14204";
$password = "aegieBu3aa2i";
$database = "ehb14204";
$conn = new mysqli($servername, $username, $password, $database);

if($conn ->connect_error){
    die("Connection Failed : ".$conn->connect_error);
}
session_start();
$id = $_SESSION['id'];


$sql = "SELECT * FROM `JobSeekers` WHERE `id` = '$id'";
$result = $conn ->query($sql);
if(!$result){
    die("Query Failed ".$conn->error);
}elseif($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        $seekName = $row['Name'];
        $adName = $row['Advisor Name'];
    }
}

?>
<div class="jumbotron text-center">
    <br>
    <h1>Advisor Chat Forum</h1><br>
</div>
<ul>
    <li><a href="loggedin.php">Home</a</li>
    <li><a href = "aboutUs.php">About Us</a></li>
    <li><a href="seekersProfile.php">Your Profile</a></li>
    <li style="float:right"><a href="loginScreen.html">Log Out</a></li>

</ul>

<div class = "container">
<form method ="post">

   <center><h2>New Forum Post</h2>
    <?php
    echo "Your Advisors Name is " . $adName . " ";
    ?>
    <p class="login">

                    <textarea rows="8" cols="100" name="content" style="resize:none">
                    </textarea><br>
        <input type="submit" value="Post" name="addPost" id="button">
        <br><br><br>
    </p>
</form>
</div></body></center>

<center><a href="loggedin.php"><button class="button"id = "button">Home</button></a></center>
<br>

<?php
if(isset($_POST["addPost"])) {
    $sendTo = $adName;
    $content = $_POST['content'];
    $datePosted = date("d/m/Y");
    $timePosted = date("h:i:s");
    $prefixPosted = date("a");
    $postedBy = $seekName;

    if (!strlen(trim($_POST['content']))) {
        echo "<h4>Post must not be empty</h4>";
    } else {

        $sql2 = "INSERT INTO `AdvisorSeekerChat` (`date`, `time`, `prefix`, `posted by`, `content`, `Send To`) VALUES  ('$datePosted', '$timePosted', '$prefixPosted', '$postedBy', '$content', '$sendTo')";
        if ($conn->query($sql2) === TRUE) {
            echo("<script>location.href = 'seekerAdvisorChat.php';</script>");
        } else {
            die("Error on insert " . $conn->error);
        }
    }
}
    $sql2 = "SELECT * FROM `AdvisorSeekerChat` WHERE (`Send To` = '$adName' AND `posted by` = '$seekName') OR (`Send To` = '$seekName' AND `posted by` = '$adName') ORDER BY `date`, `time` DESC";
    $result2 = $conn->query($sql2);

//handle results

    if (!$result2) {
        die("Query Failed " . $conn->error);
    }
    if ($result2->num_rows >= 0) {
        while ($row2 = $result2->fetch_assoc()) {

            $content = $row2["content"];
            $date = $row2["date"];
            $time = $row2["time"];
            $prefix = $row2["prefix"];
            $postedBy = $row2["posted by"];
            $sent = $row2['Send To'];
            echo "<object>";
            if ($sent == $seekName) {
                echo ' <left> <p class="login">
                  Posted On: ' . $date . ' at ' . $time . ' ' . $prefix . ' From ' . $postedBy . ' To ' . $sent . '<br><br>
                <textarea name="content" rows="8" cols="100" disabled="disabled" style="background:#FA5858" style="font-family:Comic Sans MS" style="font-colour:#000000" style="border style:solid">' . $content . '</textarea><br><br><br>
                </p></left>';
            } elseif ($sent == $adName) {
                echo '<p class="login" align = "right">
                Posted On: ' . $date . ' at ' . $time . ' ' . $prefix . ' From ' . $postedBy . ' To ' . $sent . '<br><br>
                <textarea name="content" rows="8" cols="100" disabled="disabled" style="background:#A9F5E1" style="font-family:Comic Sans MS" style="font-colour:#000000" style="border style:solid">' . $content . '</textarea><br><br><br>
                </p>';
            }
            echo "</object>";

        }

}
?>

<?php

//close connection
$conn ->close();

?>
<div class = "containers">
    <div class="panel panel-default">
        <div class="panel-body">

            <div class = "floating-box">
                <a href="seekerAdvisorChat.php">Adviser Chat:  <p><center><span class="glyphicon glyphicon-envelope"></span></center></p></a>
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
                <a href="learningMod.php"> Learning Modules:  <p><span class="glyphicon glyphicon-education"></span></p></a>
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

</body>
</html>
