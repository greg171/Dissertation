
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
<head>
    <title>Youth Unemployment App</title>
    <link rel ="icon" sizes ="192x192" href = "\~ehb14204\employ_site\favicon.png"/>
    <link rel = "favicon" href = "\~ehb14204\employ_site\favicon.png"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="seeker.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    .floating-box {
        float: left;
        width: 165px;
        height: 75px;
    }
</style>
<body>
<div class="jumbotron text-center">
    <br>
    <h1>User Learning Hub</h1><br>
    <h2>Below are the Learning Modules, Get To Work</h2>
</div>
<ul>
    <li><a href="loggedin.php">Home</a</li>
    <li><a href = "aboutUs.php">About Us</a></li>
    <li><a href="seekersProfile.php">Your Profile</a></li>
    <li style="float:right"><a href="loginScreen.html">Log Out</a></li>

</ul>

<?php
session_start();
$id = $_SESSION['id'];
//connect to database
$servername = "devweb2017.cis.strath.ac.uk";
$username = "ehb14204";
$password = "aegieBu3aa2i";
$database = "ehb14204";
$conn = new mysqli($servername, $username, $password, $database);

if($conn ->connect_error){
    die("Connection Failed : ".$conn->connect_error);
}

$sql = "SELECT * FROM `modProgress` WHERE `id` = $id";
$result = $conn ->query($sql);
if(!$result){
    die("Query Failed ".$conn->error);
     }else if($result->num_rows > 0){
                while($row = $result->fetch_assoc()) {
                    $module1 = $row['module1'];
                    $module2 = $row['module2'];
                    $module3 = $row['module3'];
                    $module4 = $row['module4'];
                    $module5 = $row['module5'];
                }

}
?>
<div class="container">
    <div class="row">
        <div class="w3-cell-row">
            <div class="w3-container w3-cell w3-mobile">
              <center><h2>The Importance of a Good First impression</h2>
                <p>
                    A look into the importance of a good first impression <br>
                    when going for a job interview, looking specifically <br>
                    at the importance of a good handshake, eye contact etc <br>
                </p>
                <p><a href="m1.php"><button class="button"id = "button">Start Module</button></a></p>
                  <?php echo $module1 ?></center>
        </div>
            <div class="w3-container w3-cell w3-mobile">
                <center><h2>How to Ace your Personal Statement</h2>
                <p>
                    Critical Advice and Examples to really drive <br>
                    your personal statement to be the best it can be.<br>
                </p>
                    <br>
                <br>
                <p><a href="#"><button class="button"id = "button">Start Module</button></a></p>
                <?php echo $module2 ?></center>
            </div>
            <div class="w3-container w3-cell w3-mobile">
                <center><h2>Introduction to the STAR Process</h2>
                <p>
                    This module will cover the steps and<br>
                    processes of the STAR process.<br>
                    A recommended guide to interview success.
                </p>
                    <br>
                <p><a href="#"><button class="button"id = "button">Start Module</button></a></p>
                <?php echo $module3 ?></center>
        </div>
    </div>
</div>
    <br>
    <br>
    <div class="container">
        <div class="row">
        <div class="w3-container w3-cell w3-mobile">
                    <center><h2>Why Employers Want to Know You</h2>
                    <p>
                        In this module we look at the importance of<br>
                        making your CV a more personal document.<br>
                    </p>
                    <p><a href="#"><button class="button"id = "button">Start Module</button></a></p>
                <?php echo $module4 ?></center>
        </div>
            <div class="w3-container w3-cell w3-mobile">
                    <center><h2>The Do' and Dont's of Job Hunting</h2>
                    <p>
                        This module is full of helpful tips<br>
                        and tricks to be succesful when Job Hunting <br>
                    </p>
                    <p><a href="#"><button class="button" id = "button">Start Module</button></a></p>
                <?php echo $module5 ?></center>
        </div>
        </div>
        </div>
    </div>
</div>
</div>



<br>
<center><div id="buttons">
    <br>
    <a href="loggedin.php"><button name="home"  id = "button">Home</button></a>
</div></center>
<br>

<div class = "containers">
    <div class="panel panel-default">
        <div class="panel-body">
            <div class = "floating-box">
                <a href="seekerAdvisorChat.php"><p>Adviser Chat:<p><span class="glyphicon glyphicon-envelope"></span></p></a>
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
                <a href="http://gregpeters1.edublogs.org/">Blog</a>
            </div>
            <div class = "floating-box">
                <a href="learningMod.php"> Learning Modules: <p><span class="glyphicon glyphicon-education"></span></p></a>
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
