<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Employment App Login Screen</title>
    <link rel ="icon" sizes ="192x192" href = "\~ehb14204\employ_site\favicon.png"/>
    <link rel = "favicon" href = "\~ehb14204\employ_site\favicon.png"/>
    <link rel="stylesheet" type="text/css" href="loginScreen.css">
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
$id = $_SESSION['id'];

$servername = "devweb2017.cis.strath.ac.uk";
$username = "ehb14204";
$password = "aegieBu3aa2i";
$database = "ehb14204";
$conn = new mysqli($servername, $username, $password, $database);

if($conn ->connect_error){
    die("Connection Failed : ".$conn->connect_error);
}
?>
<div class="jumbotron text-center">
    <br>
    <h2><?php echo $name?>, you already have a CV created, you can either Overwrite it, or edit the information you have already entered</h2>
</div>
<ul>
    <li><a href="loggedin.php">Home</a</li>
    <li><a href = "aboutUs.php">About Us</a></li>
    <li><a href="seekersProfile.php">Your Profile</a></li>
    <li style="float:right"><a href="loginScreen.html">Log Out</a></li>

</ul>

<div class="container">
    <div class="row">
        <div class="col-sm-4">
            <h3>Overwrite Previous Submission</h3>
            <form method = "post" value = "Overwrite">
                <a><input type="submit" value="Overwrite Cv" id="buttons"></a>
            </form>
        </div>

        <div class="col-sm-4">
            <h3>Edit Previous Submission</h3>
            <a href = "editCV.php"><input type="submit" value="Edit previous Submission" id="buttons"></a>
        </div>

        <div class="col-sm-4">
            <h3>Back To Home Page</h3>
            <a href = "loggedin.php"><input type="submit" value="Back" id="buttons"></a>
        </div>

    </div>
</div>

<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $sql = "DELETE FROM `cvEntries` WHERE `id` = '$id'";
    $result = $conn->query($sql);
    echo("<script>location.href = 'CVinfoCapture.php';</script>");
    if(!$result){
        die("Query Failed ".$conn->error);
    }
}

$conn->close();
?>
</body>
</html>