<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Employment App Business Profile</title>
</head>
<link rel="stylesheet" type="text/css" href="businessProfile.css">
<link rel ="icon" sizes ="192x192" href = "\~ehb14204\employ_site\favicon.png"/>
<link rel = "favicon" href = "\~ehb14204\employ_site\favicon.png"/>
<link rel="stylesheet" type="text/css" href="business.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
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
    function myLink(code){
        document.cookie = "Code is = " + code;
        window.location.href = "viewApplication.php";

    }
</script>
<?php
session_start();
$name = $_SESSION['Business Name'];
$id = $_SESSION['id'];
$address = $_SESSION['Address'];


$servername = "devweb2017.cis.strath.ac.uk";
$username = "ehb14204";
$password = "aegieBu3aa2i";
$database = "ehb14204";
$conn = new mysqli($servername, $username, $password, $database);
$noOfJobs = 0;
if($conn ->connect_error){
    die("Connection Failed : ".$conn->connect_error);
}
$sql2 = "SELECT * FROM `JobPostings` WHERE `id` = '$id'";
$result2 = $conn->query($sql2);
if(!$result2){
    die("Query Failed".$conn->error);
}
$sql = "SELECT * FROM `Business` WHERE `id` = '$id'";
$result = $conn->query($sql);
if(!$result){
    die("Query Failed".$conn->error);
}
else if($result ->num_rows > 0) {
while ($row = $result->fetch_assoc()) {
    $noOfJobs = $row['Number of Jobs'];
     }
}

?>
<div class="jumbotron text-center">
    <H1>Youth Unemployment App</H1>
    <H2>Welcome to the <?php echo $name?> Profile Page</H2>
    <h3>Company address: <?php echo $address?></h3>
</div>
<ul>
    <li><a href="businessHome.php">Home</a</li>
    <li><a href="businessProfile.php">Your Profile</a></li>
    <li style="float:right"><a href="\~ehb14204\employ_site\Seeker\loginScreen.html">Log Out</a></li>

</ul>

<h5>Number of Live Posted Jobs: <?php echo $noOfJobs ?></h5>
<h2>My Job Postings</h2>
<table id="myTable">
    <tr class="header">
        <th>Job Title</th>
        <th>Address</th>
        <th>Job Code</th>
        <th>Number of Applications recieved</th>
        <th>View Applications</th>
    </tr>

    <?php
    if(!$result2){
        die("Query Failed ".$conn->error);
    }
    if($result2->num_rows > 0) {
        while ($row = $result2->fetch_assoc()) {

            $title = $row["Title"];
            $jobDes = $row["Job Descriptions"];
            $code = $row["code"];
            $applied = $row["noOfApplied"];

            $jobtable =

                "<tr>
                        <td>" . $title . "</td>
                        <td>" . $jobDes . "</td>
                        <td>". $code .   "</td>
                        <td>". $applied .   "</td>
                        <td <div class='buttons'>
            <a><input type='submit' value='View' id='button'  onclick = 'myLink(\"$code\")'></a>
</div></td>
                    </tr>";

            echo $jobtable;
        }
    }
    ?>
</table>
    <br>
    <br>

    <div class="buttons">
        <a href="businessHome.php"><input type="submit" value="Home" id="buttons"></a>
    </div>
</body>
</html>