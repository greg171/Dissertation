
<!--/**-->
<!-- * Created by IntelliJ IDEA.-->
<!-- * User: gregp-->
<!-- * Date: 01/03/2018-->
<!-- * Time: 03:56-->
<!-- */-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Employment App Business Application View</title>
    <link rel="stylesheet" type="text/css" href="jobPosting.css">
    <link rel ="icon" sizes ="192x192" href = "\~ehb14204\employ_site\favicon.png"/>
    <link rel = "favicon" href = "\~ehb14204\employ_site\favicon.png"/>
    <link rel="stylesheet" type="text/css" href="business.css">
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
<script>
    function passID(id, code){
        document.cookie = "ID is = " +  id;
        document.cooke = "Code is = " + code;
        window.location.href = "/~ehb14204/employ_site/Business/businessProfileView.php";

    }
</script>
<?php
$jobCode = htmlspecialchars($_COOKIE["Code_is"]);
$servername = "devweb2017.cis.strath.ac.uk";
$username = "ehb14204";
$password = "aegieBu3aa2i";
$database = "ehb14204";
$conn = new mysqli($servername, $username, $password, $database);

if($conn ->connect_error){
    die("Connection Failed : ".$conn->connect_error);
}
 $sql = "SELECT * FROM `Applications` WHERE `code` = '$jobCode'";
 $result = $conn->query($sql);
if(!$result){
    die("Query Failed".$conn->error);
}
$sql2 = "SELECT * FROM `Applications` WHERE `code` = '$jobCode'";
$result2 = $conn->query($sql2);
if(!$result2){
    die("Query Failed".$conn->error);
}

$sql3 = "SELECT * FROM `shortlist` WHERE `code` = '$jobCode'";
$result3 = $conn->query($sql3);
if(!$result3){
    die("Query Failed".$conn->error);
}
?>
<div class="jumbotron text-center">
    <H1>Youth Unemployment App</H1>
    <H2>Applications for <?php echo $jobCode ?></H2>
    <h3>Applications for <?php echo $jobCode ?></h3>
</div>
<ul>
    <li><a href="businessHome.php">Home</a</li>
    <li><a href="businessProfile.php">Your Profile</a></li>
    <li style="float:right"><a href="\~ehb14204\employ_site\Seeker\loginScreen.html">Log Out</a></li>

</ul>

<h2>Applicants</h2>
<table id="myTable">
    <tr class="header">
    <tr>
        <th>Applicant Name</th>
        <th>Advisor Name</th>
        <th>View Application</th>
    </tr>
    <h2>Applications you haven't viewed yet</h2>
        <?php

        if(!$result){
            die("Query Failed ".$conn->error);
        }elseif($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                if ($row['Viewed'] == "Not Viewed" or $row['Viewed'] == NULL) {
                    $name = $row['name'];
                    $advisor = $row['advisor'];
                    $id = $row['id'];
                    $code = $row['code'];

                    $notViewedTable =

                        "   
                        <tr>
                        <td>" . $name . "</td>
                        <td>" . $advisor . "</td>
                      
                        <td <div class='buttons'>
            <a><input type='submit' value='View' id='button' onclick = 'passID(\"$id\", \"$code\")'></a>
</div></td>
                    </tr>";

                    echo $notViewedTable;
                }
            }
        }
?>
</table>
<br>
<h2>Applicants you have already Viewed</h2>
    <table id="myTable">
        <tr class="header">
        <tr>
            <th>Applicant Name</th>
            <th>Advisor Name</th>
            <th>View Application</th>
        </tr>

    <?php
    if(!$result2){
        die("Query Failed ".$conn->error);
    }elseif($result2->num_rows > 0) {
        while ($row2 = $result2->fetch_assoc()) {
            if ($row2['Viewed'] == "Viewed") {
                $name = $row2['name'];
                $advisor = $row2['advisor'];
                $id = $row2['id'];

                $viewedTable =

                    " 
                        <tr>
                        <td>" . $name . "</td>
                        <td>" . $advisor . "</td>
                      
                        <td <div class='buttons'>
            <a><input type='submit' value='View' id='button' onclick = 'passID(\"$id\")'></a>
</div></td>
                    </tr>";

                echo $viewedTable;
            }
        }
    }
  ?>
</table>
<br>
<h2>Applicants you have Shortlisted</h2>
<table id="myTable">
    <tr class="header">
    <tr>
        <th>Applicant Name</th>
        <th>Advisor Name</th>
        <th>View Application</th>
    </>

    <?php
    if(!$result3){
        die("Query Failed ".$conn->error);
    }elseif($result3->num_rows > 0) {
        while ($row3 = $result3->fetch_assoc()) {
                $name = $row3['name'];
                $advisor = $row3['advisor'];
                $id = $row3['id'];

                $shortlistTable =

                    " 
                        <tr>
                        <td>" . $name . "</td>
                        <td>" . $advisor . "</td>
                      
                        <td <div class='buttons'>
            <a><input type='submit' value='View' id='button' onclick = 'passID(\"$id\")'></a>
</div></td>
                    </tr>";

                echo $shortlistTable;
            }
    }
    ?>
</table>
<br>
<center><div class="buttons">
        <a href="businessProfile.php"><input type="submit" value="Back To Profile" id="buttons"></a>
    </div></center>

</body>
</html>