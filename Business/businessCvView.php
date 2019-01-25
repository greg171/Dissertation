<!---->
<!--/**-->
<!-- * Created by IntelliJ IDEA.-->
<!-- * User: gregp-->
<!-- * Date: 01/03/2018-->
<!-- * Time: 05:14-->
<!-- */-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Employment App Business Cv View</title>
</head>
<body>
<style>
    .floating-box {
        float: left;
        width: 200px;
        height: 100px;
        display: inline-block;
    }
</style>
<?php
session_start();
$id = htmlspecialchars($_COOKIE["ID_is"]);

$servername = "devweb2017.cis.strath.ac.uk";
$username = "ehb14204";
$password = "aegieBu3aa2i";
$database = "ehb14204";
$conn = new mysqli($servername, $username, $password, $database);
$Fname = $Lname = $gender = $dob = $email = $website = $facebook = $twitter = $other = $edHistory = $empHistory = $hobbies = $personal=  "";
$achieve1 = $achieve2 = $achieve3 = $achieve4 = $achieve5 = "";
if($conn ->connect_error){
    die("Connection Failed : ".$conn->connect_error);
}
echo "Connected";
$sql = "SELECT * FROM `cvEntries` WHERE `id` = '$id'";
$result = $conn->query($sql);
if(!$result){
    die("Query Failed ".$conn->error);
}else if($result->num_rows > 0){
    while($row = $result->fetch_assoc()) {
        $Fname = $row['Fname'];
        $Lname = $row['Lname'];
        $gender = $row['Gender'];
        $dob = $row['DOB'];
        $email = $row['Email'];
        $website = $row['Website'];
        $facebook = $row['Facebook'];
        $twitter = $row['Twitter'];
        $other = $row['Other'];
        $edHistory = $row['edHistory'];
        $empHistory = $row['empHistory'];
        $hobbies = $row['hobbies'];
        $personal = $row['personal'];
        $achieve1 = $row['achievement1'];
        $achieve2 = $row['achievement2'];
        $achieve3 = $row['achievement3'];
        $achieve4 = $row['achievement4'];
        $achieve5 = $row['achievement5'];

    }
}

$sql2 = "SELECT * FROM `cvEntries` WHERE `id` = '$id'";
$result2 = $conn->query($sql2);
if(!$result2){
    die("Query Failed ".$conn->error);
}elseif($result2 ->num_rows > 0){
    while($row = $result2->fetch_assoc()){
        $css = $row['css'];
        $business = "business";
        $css = $business.$css;
            if($css == "businessplainJane"){
                $end = ".css";
                $css = $css . $end;
                echo '<link rel="stylesheet" type="text/css" href="'. $css .'">';
                echo '<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">';
            }elseif($css == "businessprofessional"){
                $end = ".css";
                $css = $css . $end;
                echo '<link rel="stylesheet" type="text/css" href="'. $css .'">';
                echo '<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">';

            }
        }

}

?>

<center><H1 style="text-decoration: underline;"><font face="Times New Roman"><?php echo $Fname ?>   <?php echo $Lname ?>'s </font> Curriculum Vitae</H1></center>
<center><h2><font face="Times New Roman"> Gender : <?php echo $gender ?></font></h2>
    <h2> Date Of Birth : <?php echo $dob ?></h2>
    <h2> Email : <?php echo $email ?></h2>
</center>
<div class="online">
    <center><h2 style="text-decoration: underline;">Online Presence</h2>
        <?php if($website != NULL){
            echo '<h4> Website :' . $website. '</h4>';
        }
        if($facebook != NULL) {
            echo '<h4> Facebook :' . $facebook . '</h4>';
        }
        if($twitter != NULL) {
            echo '<h4> Twitter :' . $twitter . '</h4>';
        }
        if($other != NULL) {
            echo '<h4> Other :' . $other . '</h4>';
        }
        ?>
    </center>
</div>
<div class="container">
    <div class="row">

        <div class="w3-cell-row">
            <div class="w3-container w3-cell w3-mobile">
                <center><h2 style="text-decoration: underline;">Education History</h2>
                    <h3><?php echo $edHistory; ?></h3></center>
            </div>
            <br>
            <div class="w3-container w3-cell w3-mobile">
                <center><h2 style="text-decoration: underline;">Employment History</h2>
                    <h3><p><?php echo $empHistory ?></p></h3></center>
            </div>
        </div>
        <div class="w3-cell-row">
            <div class="w3-container w3-cell w3-mobile">
                <center><h2 style="text-decoration: underline;">Hobbies and Interests</h2>
                    <h3><p><?php echo $hobbies ?></p></h3></center>
            </div>
            <div class="w3-container w3-cell w3-mobile">
                <center><h2 style="text-decoration: underline;">Personal Statement</h2>
                </center>
                <center><h3><p><?php echo $personal ?></p></center></h3>
                <br>
            </div>
        </div>
    </div>
</div>
<center><h2 style="text-decoration: underline;">Personal Achievements</h2></center>
<center><h3>1. <?php echo $achieve1 ?></h3></center>
<?php if($achieve2 != NULL){
    echo "<center><h3> 2. " . $achieve2 . "</h3></center>";
}
if($achieve3 != NULL){
    echo "<center><h3> 3. " . $achieve3 . "</h3></center>";
}
if($achieve4 != NULL){
    echo "<center><h3> 4. " . $achieve4 . "</h3></center>";
}
if($achieve5 != NULL){
    echo "<center><h3> 5. " . $achieve5 . "</h3></center>";
}

?>
</body>

<?php
$conn->close();
?>