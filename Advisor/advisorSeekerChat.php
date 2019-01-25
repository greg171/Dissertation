<html>
<head>
    <title>Advisor/Seeker Chat Room</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
$advisorname = $_SESSION['Name'];

$seekId = htmlspecialchars($_COOKIE["Id_is"]);
$sendTo = htmlspecialchars($_COOKIE["Name_is"]);

        $sql = "SELECT * FROM `JobSeekers` WHERE `Advisor Name` = '$advisorname'";
        $result = $conn ->query($sql);


?>
<div class="jumbotron text-center">
    <br>
    <h1>Advisor Chat View</h1><br>
</div>
<ul>
    <li><a href="advisorLoggedIn.php">Home</a</li>
    <li><a href="advisorProfile.php">Your Profile</a></li>
    <li style="float:right"><a href="\~ehb14204\employ_site\Seeker\loginScreen.html">Log Out</a></li>

</ul>
<div class = "container">
<form method ="post">

    <p class="login">
        <h2>Send A New Message</h2>
       <center> <textarea rows="8" cols="100" name="content" style="resize:none">
                    </textarea><br>
        <input type="submit" value="Send Message" name="addPost" id="runbuttons"></center>
    <br><br>
    </p>
</form>
</div>
    <center><div class="buttons">
        <a href="messageHome.php"><input type="submit" value="Back To Inbox" id="buttons"></a>
    </div></center>
<br>
<?php

if(isset($_POST["addPost"])) {
    $content = $_POST['content'];
    $datePosted = date("d/m/Y");
    $timePosted = date("h:i:s");
    $prefixPosted = date("a");
    $postedBy = $advisorname;

    if (!strlen(trim($_POST['content']))) {
        echo "<h4>Post must not be empty</h4>";
    } else {

        $sql2 = "INSERT INTO `AdvisorSeekerChat` (`date`, `time`, `prefix`, `posted by`, `content`, `Send To`) VALUES  ('$datePosted', '$timePosted', '$prefixPosted', '$postedBy', '$content', '$sendTo')";
        echo("<script>location.href = 'advisorSeekerChat.php';</script>");
        if ($conn->query($sql2) === TRUE) {
            return;
        } else {
            die("Error on insert " . $conn->error);
        }
    }
}
//issue query

    $sql2 = "SELECT * FROM `AdvisorSeekerChat` WHERE (`Send To` = '$advisorname' AND `posted by` = '$sendTo') OR (`Send To` = '$sendTo' AND `posted by` = '$advisorname') ORDER BY `date`, `time` DESC";
    $result2 = $conn->query($sql2);


//handle results

    if (!$result) {
        die("Query Failed " . $conn->error);
    }
    if($result2->num_rows >= 0) {
            while ($row2 = $result2->fetch_assoc()) {


                    $content = $row2["content"];
                    $date = $row2["date"];
                    $time = $row2["time"];
                    $prefix = $row2["prefix"];
                    $postedBy = $row2["posted by"];
                    $sent = $row2['Send To'];

                    if($sent == $advisorname){
                        echo ' <left> <p class="login">
                  Posted On: ' . $date . ' at ' . $time . ' ' . $prefix . ' From ' . $postedBy . ' To ' . $sent . '<br><br>
                <textarea name="content" rows="8" cols="100" disabled="disabled" style="background:#FA5858" style="font-family:Comic Sans MS" style="font-colour:#000000" style="border style:solid">' . $content . '</textarea><br><br><br>
                </p></left>';
                        }elseif($postedBy == $advisorname){
                        echo '<p class="login" align = "right">
                Posted On: ' . $date . ' at ' . $time . ' ' . $prefix . ' From ' . $postedBy . ' To ' . $sent . '<br><br>
                <textarea name="content" rows="8" cols="100" disabled="disabled" style="background:#A9F5E1" style="font-family:Comic Sans MS" style="font-colour:#000000" style="border style:solid">' . $content . '</textarea><br><br><br>
                </p>';
                    }


                }
}



?>


<?php

//close connection
$conn ->close();

?>

</body>
</html>
