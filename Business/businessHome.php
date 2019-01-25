<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Business Home Page</title>
    <link rel ="icon" sizes ="192x192" href = "\~ehb14204\employ_site\favicon.png"/>
    <link rel = "favicon" href = "\~ehb14204\employ_site\favicon.png"/>
    <link rel="stylesheet" type="text/css" href="business.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
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
$name = $_SESSION['Business Name'];
$address = $_SESSION['Address'];
?>
<div class="jumbotron text-center">
    <H1>Youth Unemployment App</H1>
    <h2>Welcome back <?php echo $name;?></h2>
    <h3><?php echo $address?></h3>
</div>
<ul>
    <li><a href="businessHome.php">Home</a</li>
    <li><a href="businessProfile.php">Your Profile</a></li>
    <li style="float:right"><a href="\~ehb14204\employ_site\Seeker\loginScreen.html">Log Out</a></li>

</ul>
<div class="container">
    <div class="row">

        <div class="w3-cell-row">
            <div class="w3-container w3-cell w3-mobile">
                <p>
                    In this section you will be able to post <br>
                    a new job vacancy for job seekers to apply for.<br>
                </p>
    <div class="buttons">
        <a href="jobCreate.php"><input type="submit" value="Post New Job" id="buttons"></a>
    </div>
            </div>
            <div class="w3-container w3-cell w3-mobile">
                <p>
                    Head to your profile to check all the applications <br>
                    you have posted to find your new employee.<br>
                </p>
    <div class="buttons">
    <a href="businessProfile.php"><input type="submit" value="View My Profile" id="buttons"></a>
     </div>
            </div>
            <div class="w3-container w3-cell w3-mobile">
                <p>
                    Here you can check your messages with job <br>
                    advisers regarding their job seekers application. <br>
                </p>
    <div class="buttons">
    <a href="businessHome.php"><input type="submit" value="View Messages" id="buttons"></a>
    </div>
            </div>
        </div>
    </div>
</div>
<br>
<br>
<div class="buttons">
    <a href="\~ehb14204\employ_site\Seeker\loginScreen.html"><input type="submit" value="Log Out" id="buttons"></a>
</div>
</body>
</html>