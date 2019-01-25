<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Employment App Login Screen</title>
    <link rel ="icon" sizes ="192x192" href = "\~ehb14204\employ_site\favicon.png"/>
    <link rel = "favicon" href = "\~ehb14204\employ_site\favicon.png"/>
    <link rel="stylesheet" type="text/css" href="business.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
<style>
    /* Always set the map height explicitly to define the size of the div
     * element that contains the map. */
    #map {
        height: 50%;
    }
    /* Optional: Makes the sample page fill the window. */
    html, body {
        height: 100%;
        margin: 0;
        padding: 0;
    }
    /* The location pointed to by the popup tip. */
    .popup-tip-anchor {
        height: 0;
        position: absolute;
        /* The max width of the info window. */
        width: 200px;
    }
    /* The bubble is anchored above the tip. */
    .popup-bubble-anchor {
        position: absolute;
        width: 100%;
        bottom: /* TIP_HEIGHT= */ 8px;
        left: 0;
    }
    /* Draw the tip. */
    .popup-bubble-anchor::after {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        /* Center the tip horizontally. */
        transform: translate(-50%, 0);
        /* The tip is a https://css-tricks.com/snippets/css/css-triangle/ */
        width: 0;
        height: 0;
        /* The tip is 8px high, and 12px wide. */
        border-left: 6px solid transparent;
        border-right: 6px solid transparent;
        border-top: /* TIP_HEIGHT= */ 8px solid white;
    }
    /* The popup bubble itself. */
    .popup-bubble-content {
        position: absolute;
        top: 0;
        left: 0;
        transform: translate(-50%, -100%);
        /* Style the info window. */
        background-color: white;
        padding: 5px;
        border-radius: 5px;
        font-family: sans-serif;
        overflow-y: auto;
        max-height: 60px;
        box-shadow: 0px 2px 10px 1px rgba(0,0,0,0.5);
    }
</style>
<?php
session_start();
$id = $_SESSION['id'];
$name = $_SESSION['Name'];
$servername = "devweb2017.cis.strath.ac.uk";
$username = "ehb14204";
$password = "aegieBu3aa2i";
$database = "ehb14204";
$conn = new mysqli($servername, $username, $password, $database);

if($conn ->connect_error){
    die("Connection Failed : ".$conn->connect_error);
}
$compName = htmlspecialchars($_COOKIE["Company_is"]);
$jobCode = htmlspecialchars($_COOKIE["Code_is"]);
?>
<div class="jumbotron text-center">
    <H1>Youth Unemployment App</H1>
    <h2>Welcome to the <?php echo $jobCode ?> page</h2>
</div>
<?php

$sql = "SELECT * FROM `jobInfo` WHERE `jobcode` = '$jobCode'";
$result = $conn->query($sql);
if(!$result){
    die("Query Failed".$conn->error);
}elseif($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {

        $furtherInfo = $row['FurtherInfo'];
        $salary = $row['Salary'];
        $hours = $row['Hours'];
        $benefits = $row['Benefits'];
        if (trim($furtherInfo) === '') {
            $furtherInfo = "No further information provided about this job posting";

            if ($salary == "") {
                $salary = "No hourly wage information has not been provided for this job posting";
            }
            if ($hours == "") {
                $hours = "The contracted hours information has not been provided for this job posting";
            }
            if (trim($benefits) === '') {
                $benefits = "No job benefits have been provided for this posting";

            }
        }
    }
}


    echo "<br>";
    echo "<h5> Further Information: " . $furtherInfo . "</h5>";
    echo "<br>";
    echo "<h5> Hourly Wage: " . $salary . "</h5>";
    echo "<br>";
    echo "<h5>Contracted Weekly Hours: ". $hours . "</h5>";
    echo "<br>";
    echo "<h5> Job Benefits: " . $benefits . "</h5>";
    echo "<br>";
?>

<div id="dom-lng" style="display: none;">
    <?php
    $sql3 = "SELECT * FROM `JobPostings` WHERE `code` = '$jobCode'";
    $result3 = $conn->query($sql3);
    if(!$result3){
        die("Query Failed".$conn->error);
    }elseif($result3->num_rows > 0) {
        while ($row3 = $result3->fetch_assoc()) {
            $lng = $row3['Longitude'];
            echo $lng;
        }
    }
    ?>
</div>
<div id="dom-lat" style="display: none;">
    <?php
    $sql2 = "SELECT * FROM `JobPostings` WHERE `code` = '$jobCode'";
    $result2 = $conn->query($sql2);
    if(!$result2){
        die("Query Failed".$conn->error);
    }elseif($result2->num_rows > 0) {
        while ($row2 = $result2->fetch_assoc()) {
            $lat = $row2['Latitude'];
            echo $lat;
        }
    }
    ?>
</div>

<div id="content" style="display: none;">
    <?php
    $sql4 = "SELECT * FROM `JobPostings` WHERE `code` = '$jobCode'";
    $result4 = $conn->query($sql4);
    if(!$result4){
        die("Query Failed".$conn->error);
    }elseif($result4->num_rows > 0) {
        while ($row4 = $result4->fetch_assoc()) {
            $address1 = $row4['Address'];
            echo $address1;
        }
    }
    ?>
</div>
<div id="map"></div>
<script>
    var div1 = document.getElementById("dom-lat");
    var myData1 = (div1.textContent);
    var div2 = document.getElementById("dom-lng");
    var myData2 = (div2.textContent);
    var div3 = document.getElementById("content");
    var myData3 = (div3.textContent);
    var map

    function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {

            center: {lat: +myData1, lng: +myData2},
            zoom: 18
        });
        var latlng = new google.maps.LatLng(+myData1, +myData2);
        var jobPos = latlng;
        var marker = new google.maps.Marker({
            position: jobPos,
            map: map,
        });

    }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCiA7WIgBj42bO8a9m3EwWlM5pmQo2LaUM&callback=initMap"
        async defer></script>

</div>
<form method = "post">
<div class="buttons">
    <a><input type="submit" name = "Apply "value="Apply for this Job" id="buttons"></a>
</div>
</form>
<div class="buttons">
    <a href="\~ehb14204\employ_site\Business\jobPosting.php"><input type="submit" value="Back To Job Postings" id="buttons"></a>
</div>
<?php
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $sql7 = "SELECT * FROM `JobPostings` WHERE `code` = '$jobCode'";
    $result7 = $conn->query($sql7);
    if(!$result7){
        die("Query Failed" . $conn->error);
    }elseif($result7->num_rows > 0) {
while ($row7 = $result7->fetch_assoc()) {
        $applied = $row7['noOfApplied'];
    $count = 1;
    $applied = $applied + $count;
    $sql8 = "UPDATE `JobPostings` SET `noOfApplied` = '$applied' WHERE `code` = '$jobCode'";
    $result8 = $conn->query($sql8);
    if(!$result8){
        die("Query Failed number 8" . $conn->error);
    }
    }
}

    $sql6 = "SELECT * FROM `JobSeekers` WHERE `id` = '$id'";
    $result6 = $conn->query($sql6);
    if (!$result6) {
        die("Query Failed" . $conn->error);
    } else if ($result6->num_rows > 0) {
        while ($row6 = $result6->fetch_assoc()) {
            $viewed = "Not Viewed";
            $advisor = $row6['Advisor Name'];
            $sql5 = "INSERT INTO `Applications` (`id`, `name`, `code`, `advisor`, `Viewed`) VALUES ('$id', '$name', '$jobCode', '$advisor', '$viewed')";
            $result5 = $conn->query($sql5);
            if (!$result5) {
                die("Query Failed" . $conn->error);
            } else {
                echo("<script>location.href = 'jobPosting.php';</script>");
            }
        }
    }
}

$conn->close();
?>

 </body>
</html>