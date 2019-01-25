<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Employment App Login Screen</title>
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
?>
<div class="jumbotron text-center">
    <br>
    <h1>Welcome Back <?php echo $name ?></h1><br>
</div>
<ul>
    <li><a href="advisorLoggedIn.php">Home</a</li>
    <li><a href="advisorProfile.php">Your Profile</a></li>
    <li style="float:right"><a href="\~ehb14204\employ_site\Seeker\loginScreen.html">Log Out</a></li>

</ul>
<div class="container">
    <div class="row">
        <div class="w3-cell-row">
            <div class="w3-container w3-cell w3-mobile">
                    <center><h3>View Your Messages</h3>
                        <p>
                            In this section you will able to check all of your messages <br>
                            from both your seekers and updates on their applications.<br>
                        </p>
                        <a href="messageHome.php"><input type="submit" value="Messages" id="runbuttons"></a></center><br>
            </div>
            <div class="w3-container w3-cell w3-mobile">
            <center><h3>View Your Profile</h3>
                <p>
                    In this section you can view all of your individual <br>
                    job seekers progress throughout the application.<br>
                </p>
            <a href="advisorProfile.php"><input type="submit" value="My Profile" id="runbuttons"></a></center>
        </div>
            <br>
            <br>

</div>
</div>
</div>
<br>
<br>
<center><div class="buttons">
        <a href="\~ehb14204\employ_site\Seeker\loginScreen.html"><input type="submit" value="Log Out" id="runbuttons"></a>
    </div></center>
</body>
</html>