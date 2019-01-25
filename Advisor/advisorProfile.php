<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Job Advisor Profile</title>
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
<script>
function progress(id, name){
document.cookie = "ID is = " + id;
document.cookie = "Name is = " + name;
window.location.href = "seekerProgress.php";

}
</script>
<?php
session_start();
$name = $_SESSION['Name'];

$servername = "devweb2017.cis.strath.ac.uk";
$username = "ehb14204";
$password = "aegieBu3aa2i";
$database = "ehb14204";
$conn = new mysqli($servername, $username, $password, $database);
if($conn ->connect_error){
    die("Connection Failed : ".$conn->connect_error);
}
$sql = "SELECT * FROM `Advisors` WHERE `Name` = '$name'";
$result = $conn ->query($sql);
if(!$result){
    die("Query Failed ".$conn->error);
}

else if($result->num_rows > 0){
    while($row = $result->fetch_assoc()) {
        $id = $row['id'];
        $no = $row['Number of Seekers'];
    }
}

$sql2 = "SELECT * FROM `JobSeekers` WHERE `Advisor Name` = '$name'";
$result2 = $conn->query($sql2);


?>

<div class="jumbotron text-center">
    <br>
    <H1>Youth Unemployment App</H1>
    <h2>Advisor Profile for <?php echo $name ?></h2>
    <h2> Number of Active Seekers: <?php echo $no ?> </h2>
</div>
<ul>
    <li><a href="advisorLoggedIn.php">Home</a</li>
    <li><a href="advisorProfile.php">Your Profile</a></li>
    <li style="float:right"><a href="\~ehb14204\employ_site\Seeker\loginScreen.html">Log Out</a></li>

</ul>


<h3>Seeker's Learning Module Progress</h3>
<center><table id="myTable">
    <tr class="header">
    <tr>
        <th>Seeker Name</th>
        <th>View Progress</th>
    </>
    <?php
    if(!$result2){
        die("Query Failed ".$conn->error);
    }elseif($result2->num_rows > 0) {
        while ($row2 = $result2->fetch_assoc()) {
            $seekName = $row2['Name'];
            $id = $row2['id'];
     $seekerProgressTable =

                "
    <tr>
        <td>" . $seekName . "</td>
        <td <div class='buttons'>
            <a><input type='submit' value='View Progress' id='runbuttons' onclick = 'progress(\"$id\", \"$seekName\")'></a>
        </div></td>
    </tr>";

            echo $seekerProgressTable;
        }
    }
    ?>
</table></center>
<br>
<center><div class="runbuttons">
    <a href="advisorLoggedIn.php"><input type="submit" value="Home" id="buttons"></a>
</div></center>

<?php
$conn->close();
?>
</body>
</html>