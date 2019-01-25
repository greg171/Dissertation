<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cv Creator</title>
    <link rel ="icon" sizes ="192x192" href = "\~ehb14204\employ_site\favicon.png"/>
    <link rel = "favicon" href = "\~ehb14204\employ_site\favicon.png"/>
    <link rel="stylesheet" type="text/css" href="loginScreen.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<style type = "text/css">

    .container{
        height:80px;
        width:80px
        border: 1px solid blue;
        align:left;


    }

    .container2{
        height:80px;
        width:80px
        border: 1px solid blue;
        align:center;

    }

    .container3{
        height:80px;
        width:80px
        border: 1px solid blue;
        align:right;

    }

    </style>
<body>
<?php
session_start();
$seeker = $_SESSION['username'];
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
    <H1>Youth Unemployment App</H1>
    <h2>Welcome to the CV Creator Page </h2>
    <h3>Select the CV template you wish to use</h3>
    <h3>Once you have selected your CV, head to your Job Seeker profile to view!!</h3>
</div>

<form method = "post" name = "plainJane">
<center><div class = container>
        <h5>Option 1: The Plain Jane</h5>
        <textarea rows="4" cols="50" readonly>
Here is our first standard CV, this CV is a multi purpose displayer that will be applicable for any job application.
        </textarea><br>
        <div class="buttons">
            <a><input type="submit" value="Select this Template" id="buttons" name = "plainJane"></a>
        </div>
    </div></center>
</form><br>
<br>
<br>
<br>
<br>
<form method = "post" name = "professional">
    <center><div class = container>
            <h5>Option 2: The Profesional</h5>
            <textarea rows="4" cols="50" readonly>Slick, stylish and to the point. This template is sure to impress a variety of employers.
        </textarea><br>
            <div class="buttons">
                <a><input type="submit" value="Select this Template" id="buttons" name = "professional"></a>
            </div>
        </div></center>
</form>
<br>
<br>
<br>
<br>
<br>
<br>
<center><div class="buttons">
    <a href="loggedin.php"><input type="submit" value="Back" id="buttons"></a>
</div></center>
<?php

if(isset($_POST['plainJane'])){
  $css = "plainJane";
  $sql = "UPDATE `cvEntries` SET `css` = '$css' WHERE `id` = '$id'";
  $result = $conn->query($sql);
    echo("<script>location.href = 'loggedin.php';</script>");
  if(!$result){
      die("Query Failed " . $conn->error);
  }
}
if(isset($_POST['professional'])){
    $css = "professional";
    $sql = "UPDATE `cvEntries` SET `css` = '$css' WHERE `id` = '$id'";
    $result = $conn->query($sql);
    echo("<script>location.href = 'loggedin.php';</script>");
    if(!$result){
        die("Query Failed " . $conn->error);
    }
}




$conn->close();
?>
</body>

</html>