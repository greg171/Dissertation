<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Logged in Seeker</title>
    <link rel ="icon" sizes ="192x192" href = "\~ehb14204\employ_site\favicon.png"/>
    <link rel = "favicon" href = "\~ehb14204\employ_site\favicon.png"/>
    <link rel="stylesheet" type="text/css" href="seeker.css">
    <link rel="stylesheet" type="text/css" href="seekerHome.css">
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
<?php
session_start();
$seeker = $_SESSION['username'];
$name = $_SESSION['Name'];
$sId = $_SESSION['id'];

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
            <h1>Welcome Back <?php echo $name ?></h1><br>
            <h2>This is your Home Page, get working below</h2>
        </div>
<ul>
    <li><a href="loggedin.php">Home</a</li>
    <li><a href = "aboutUs.php">About Us</a></li>
    <li><a href="seekersProfile.php">Your Profile</a></li>
    <li style="float:right"><a href="loginScreen.html">Log Out</a></li>

</ul>
    <!-- Begin Navbar -->
<div class="container">
    <div class="row">

        <div class="w3-cell-row">
            <div class="w3-container w3-cell w3-mobile">
                <center><h2>CV Creator</h2>
                    <p>
                        In this section you will be required to enter  <br>
                        various bits of information and choose a template<br>
                        in order to generate a CV that will be displayed on your profile <br>
                    </p>
                    <form method = "post" value = "Create Cv">
                        <br>
                        <a><input type="submit" value="Head to CV creator" id="button"></a>
                    </form>
            </div>
            <br>
            <div class="w3-container w3-cell w3-mobile">
                <center><h2>Learning Modules</h2>
                    <p>
                        In this section we have helpful modules to help <br>
                        with CV writing, job interviews and the do's and don'ts when job hunting.<br>
                        As each module is completed achievements are added to your profile! <br>
                    </p>
                    <div class="button">
                        <a href="learningMod.php"><input type="submit" value="Head to Learning Modules" id="button"></a>
                    </div>
            </div>
            <br>
            <div class="w3-container w3-cell w3-mobile">
                <center><h2>View Job Postings</h2>
                    <p>
                        Click Here to view our live job postings <br>
                        Take advantage of our two click apply feature, but make sure you have a CV created first! <br>
                        <br>
                        <br>
                    </p>
                    <a href="\~ehb14204\employ_site\Business\jobPosting.php"><input type="submit" value="View Job Vacancies" id="button"></a></center>
            </div>
        </div>
    </div>
</div>
<br>
<br>
<div class="container">
    <div class="row">
        <div class="w3-container w3-cell w3-mobile">
                <center><h2>Chat to Your Adviser</h2>
                <p>
                    Click here to Chat to Your Adviser.<br>
                    Your Adviser is useful for advice and guidance.<br>
                    They will also give feedback on applications<br>
                </p>
                    <a href="seekerAdvisorChat.php"><input type="submit" value="View Job Vacancies" id="button"></a></center>
        </div>
        <div class="w3-container w3-cell w3-mobile">
                  <center><h2>View Your Profile Here</h2>
                    <p>
                        Click here to View Your Profile.<br>
                        Your Profile is used as your Job Application.<br>
                    </p>
                    <div class="buttons">
                        <br>
                        <a href="seekersProfile.php"><input type="submit" value="Head to Your Profile" id="button"></a></center>
        </div>
            </div>
    </div>
</div>
<br>
<br>
  <center><div class="button">
    <a href="loginScreen.html"><input type="submit" value="Log Out" id="button"></a>
  </div></center>
<br>
   <div class = "containers">
    <div class="panel panel-default">
        <div class="panel-body">

            <div class = "floating-box">
            <a href="seekerAdvisorChat.php"><center><p>Adviser Chat:<p><span class="glyphicon glyphicon-envelope"></span></p></center></a>
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
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $sql = "SELECT * FROM `cvEntries` WHERE `id` = '$sId'";
            $result = $conn->query($sql);
            if (!$result) {
                die("Query Failed " . $conn->error);
            } else if ($result->num_rows > 0) {
                echo("<script>location.href = 'cvOverwrite.php';</script>");
            } else {
                echo("<script>location.href = 'CVinfoCapture.php';</script>");
            }
        }
        ?>
</body>
</html>