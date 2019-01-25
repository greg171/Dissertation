
<!--/**-->
<!-- * Created by IntelliJ IDEA.-->
<!-- * User: gregp-->
<!-- * Date: 03/03/2018-->
<!-- * Time: 17:17-->
<!-- */-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Employment App Advisor Seeker Message Hub</title>
    <link rel ="icon" sizes ="192x192" href = "\~ehb14204\employ_site\favicon.png"/>
    <link rel = "favicon" href = "\~ehb14204\employ_site\favicon.png"/>
    <link rel="stylesheet" type="text/css" href="messageTable.css">
    <link rel="stylesheet" type="text/css" href="messages.css">
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
    function passInfo(id, name){
        document.cookie = "Id is = " + id;
        document.cookie = "Name is = " + name;
        window.location.href = "advisorSeekerChat.php";

    }

    function passBussInfo(name, regarding){
        document.cookie = "Buss Name = " + name;
        document.cookie = "Regarding = " + regarding;
        window.location.href = "advisorBusinessChat.php";

    }

</script>
<?php
session_start();
$advisorname = $_SESSION['Name'];
$servername = "devweb2017.cis.strath.ac.uk";
$username = "ehb14204";
$password = "aegieBu3aa2i";
$database = "ehb14204";
$conn = new mysqli($servername, $username, $password, $database);

if($conn ->connect_error){
    die("Connection Failed : ".$conn->connect_error);
}



$sql = "SELECT * FROM `JobSeekers` WHERE `Advisor Name` = '$advisorname'";
$result = $conn ->query($sql);

$sql2 = "SELECT * FROM `AdvisorBusinessChat` WHERE `Send To` = '$advisorname'";
$result2 = $conn ->query($sql2);
?>
<div class="jumbotron text-center">
    <br>
    <h1>Message Inbox</h1><br>
</div>
<ul>
    <li><a href="advisorLoggedIn.php">Home</a</li>
    <li><a href="advisorProfile.php">Your Profile</a></li>
    <li style="float:right"><a href="\~ehb14204\employ_site\Seeker\loginScreen.html">Log Out</a></li>

</ul>
<h3>Seeker Messages</h3>
<center><table id="myTable">
    <tr class="header">
    <tr>
        <th>Seeker Name</th>
        <th>View Messages</th>
    </></center>


<?php
    if(!$result){
    die("Query Failed ".$conn->error);
    }elseif($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $name = $row['Name'];
            $id = $row['id'];

            $seekerMessageTable =

                "
    <tr>
        <td>" . $name . "</td>
        <td <div class='buttons'>
            <a><input type='submit' value='Send Message' id='buttons' onclick = 'passInfo(\"$id\", \"$name\")'></a>
        </div></td>
    </tr>";

            echo $seekerMessageTable;
        }
    }
?>
</table>
    <h3>Application Updates</h3>
    <table id="myTable">
        <tr class="header">
        <tr>
            <th>Business Name</th>
            <th>Regarding Seeker</th>
            <th>View Messages</th>
        </>
<?php
if(!$result2){
    die("Query Failed ".$conn->error);
}elseif($result2->num_rows > 0) {
    while ($row2 = $result2->fetch_assoc()) {
               $bussName = $row2['posted by'];
               $regarding = $row2['Regarding'];

        $updateTable =

            "   
    <tr>
        <td>" . $bussName . "</td>
        <td>" . $regarding . "</td>
        <td <div class='buttons'>
            <a><input type='submit' value='View Message' id='buttons' onclick = 'passBussInfo(\"$bussName\", \"$regarding\")'></a>
        </div></td>
    </tr>";

        echo $updateTable;
        }
    }
    ?>
    </table><br>


 <br>
<br>


            <div class="buttons">
                <a href="advisorLoggedIn.php"><input type="submit" value="Home" id="buttons"></a>
            </div>

</body>
</html>