<!--/**-->
<!-- * Created by IntelliJ IDEA.-->
<!-- * User: gregp-->
<!-- * Date: 02/03/2018-->
<!-- * Time: 14:37-->
<!-- */-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Employment App Advisor to Business Chat</title>
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
session_start();
$name = $_SESSION['Name'];
$postedBy = htmlspecialchars($_COOKIE["Buss_Name"]);
$regarding = htmlspecialchars($_COOKIE["Regarding"]);
$servername = "devweb2017.cis.strath.ac.uk";
$username = "ehb14204";
$password = "aegieBu3aa2i";
$database = "ehb14204";
$conn = new mysqli($servername, $username, $password, $database);

if($conn ->connect_error){
    die("Connection Failed : ".$conn->connect_error);
}
$sql = "SELECT * FROM `AdvisorBusinessChat` WHERE `Send To` = '$name'";
$result = $conn->query($sql);
if (!$result) {
    die("Query Failed " . $conn->error);
}

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
    <center><form method ="post">
    <h2>Application Updates</h2>
        <p class="login">

                    <textarea rows="8" cols="100" name="content" style="resize:none">
                    </textarea><br>
            <input type="submit" value="Post" name="addPost" id="runbuttons">
            <br><br>
        </p>
</form></center>
    <center><div class="buttons">
    <a href="advisorLoggedIn.php"><input type="submit" value="Back To Menu" id="buttons"></a>
</div></center><br>
</div>


<?php
        if($result->num_rows >= 0) {
        while ($row = $result->fetch_assoc()) {
            $date = $row['date'];
            $time = $row['time'];
            $prefix = $row['prefix'];
            $content = $row['content'];
            echo ' <left> <p class="login">
                 Posted On: ' . $date . ' at ' . $time . ' ' . $prefix . ' From ' . $postedBy . ' To ' . $name . ' Regarding: ' . $regarding . '<br><br>
                <textarea name="content" rows="8" cols="100" disabled="disabled" style="background:#FA5858" style="font-family:Comic Sans MS" style="font-colour:#000000" style="border style:solid">' . $content . '</textarea><br><br><br>
                </p></left>';
        }
}
?>
</body>
</html>