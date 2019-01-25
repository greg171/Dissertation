<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add a new Vacancy</title>
    <link rel ="icon" sizes ="192x192" href = "\~ehb14204\employ_site\favicon.png"/>
    <link rel = "favicon" href = "\~ehb14204\employ_site\favicon.png"/>
    <link rel="stylesheet" type="text/css" href="business.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>
<style>
    #map{
        display:none;
    }
     .error {color: #FF0000;}
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
$companyName = $_SESSION["Business Name"];
$address = $_SESSION["Address"];
$id = $_SESSION['id'];
$count = 0;
$servername = "devweb2017.cis.strath.ac.uk";
$username = "ehb14204";
$password = "aegieBu3aa2i";
$database = "ehb14204";
$conn = new mysqli($servername, $username, $password, $database);

if($conn ->connect_error){
    die("Connection Failed : ".$conn->connect_error);
}
$jobTitle = $jobDes = $type = $code = $type = "";
$titleErr = $desErr = $tagErr = $codeErr = $tagErr = "";
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
if(isset($_POST["CreateJob"])) {
$accepted = 0;
if (empty($_POST["jobtitle"])) {
    $titleErr = " Job Title is required";
    $accepted = $accepted + 1;
} else {
    $jobTitle = test_input($_POST["jobtitle"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$jobTitle)) {
        $titleErr = "Only letters and white space allowed";
        $accepted = $accepted + 1;
    }
}
    if (empty($_POST["jobdes"])) {
        $desErr = " Job Description is required";
        $accepted = $accepted + 1;
    } else {
        $jobDes = test_input($_POST["jobdes"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z ]*$/",$jobDes)) {
            $desErr = "Only letters and white space allowed";
            $accepted = $accepted + 1;
        }
    }

    if (empty($_POST["tag"])) {
        $tagErr = " Search Tag is required";
        $accepted = $accepted + 1;
    } else {
        $type = test_input($_POST["tag"]);
    }
if (empty($_POST["code"])) {
    $codeErr = " Job Code is required";
    $accepted = $accepted + 1;
} else {
  $code = test_input($_POST["code"]);
}

$compName = isset($_POST['companyname']) ? $conn->real_escape_string($_POST['companyname']) : ""; //real escape string may cause issues
$compAddress = isset($_POST['companyaddress']) ? $conn->real_escape_string($_POST['companyaddress']) : "";
// get latitude, longitude and formatted address
$data_arr = geocode($address);
// if able to geocode the address
if ($data_arr) {
    $latitude = $data_arr[0];
    $longitude = $data_arr[1];
} else {
    $latitude = NULL;
    $longitude = NULL;
}

$_SESSION['code'] = $code;

    $duplicate = 0;
    $sql3 = "SELECT * FROM `JobPostings`";
    $result3 = $conn->query($sql3);
    if(!$result3){
        die("Query Failed ".$conn->error);
    }else if($result3->num_rows > 0) {
        while ($row3 = $result3->fetch_assoc()) {
            $checkCode = $row3['code'];
            if ($code == $checkCode) {
                $duplicate = $duplicate + 1;
            }
        }
    }
    if($duplicate > 0) {
        echo "<h2>Job Code Taken, please choose another</h2>";
    }else if($duplicate == 0 && $accepted == 0){

        $sql1 = "SELECT * FROM `Business` WHERE `id` = '$id'";
        $result = $conn->query($sql1);
        if (!$result) {
            die("Query Failed" . $conn->error);
        } else if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $number = $row["Number of Jobs"];
                $finalJobs = $number + 1;
                $sql2 = "UPDATE `Business` SET `Number of Jobs` = '$finalJobs'  WHERE `id` = '$id'";
                $result2 = $conn->query($sql2);
                if (!$result2) {
                    die("Query Failed" . $conn->error);
                }
            }
        }
        $sql = "INSERT INTO `JobPostings` (`id`, `Title`, `Company`, `Address`, `Job Descriptions`, `Latitude`, `Longitude`, `Tag`, `code`) VALUES  ('$id', '$jobTitle','$compName','$compAddress', '$jobDes', '$latitude', '$longitude', '$type', '$code')";
        if ($conn->query($sql) === TRUE) {
            echo("<script>location.href = 'furtherJobInfo.php';</script>");
        } else {
            die("Error on insert " . $conn->error);
        }
    }

}
?>
<div class="jumbotron text-center">
    <H1>Youth Unemployment App</H1>
    <h2>Create New Job Post</h2>
  </div>
<ul>
    <li><a href="businessHome.php">Home</a</li>
    <li><a href="businessProfile.php">Your Profile</a></li>
    <li style="float:right"><a href="\~ehb14204\employ_site\Seeker\loginScreen.html">Log Out</a></li>

</ul>
<p><span class="error">* required field.</span></p>
<form method="post" name="myform" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

    <p class="newJob">
        <span class="error">* <?php echo $titleErr;?></span><br>
       <h5> Job Title <input type="text" name="jobtitle"value="<?php echo $jobTitle;?>"></h5>
       <h5>Company Name <input type="text" name="companyname"value = "<?php echo $companyName;?>"></h5>
       <h5>Company Address <input type="text" name="companyaddress" value = "<?php echo $address;?>"></h5>
        <span class="error">* <?php echo $desErr;?></span><br>
        Job Description <input type="text" name="jobdes"value="<?php echo $jobDes;?>"><br>
        <span class="error">* <?php echo $tagErr;?></span><br>
        Tag <input type="text" name="tag" value="<?php echo $type;?>"><br>
        <span class="error">* <?php echo $codeErr;?></span><br>
        Unique Job Code: <input type = "text" name = "code"value="<?php echo $code;?>"><br><br>
        <input type="submit"  value="Create Job Posting" name="CreateJob" id="buttons">
    </p>

</form>

<?php

$conn->close();

?>

<?php
// function to geocode address, it will return false if unable to geocode address
function geocode($address){

    // url encode the address
    $Newaddress = urlencode($address);

    // google map geocode api url
    $url = "https://maps.googleapis.com/maps/api/geocode/json?address={$Newaddress}&key=AIzaSyDKAYmy7aWXS9-aItE7BXwR00DmSM8xspY";

    // get the json response
    $resp_json = file_get_contents($url);

    // decode the json
    $resp = json_decode($resp_json, true);

    // response status will be 'OK', if able to geocode given address
    if($resp['status']=='OK'){

        // get the important data
        $lati = isset($resp['results'][0]['geometry']['location']['lat']) ? $resp['results'][0]['geometry']['location']['lat'] : "";
        $longi = isset($resp['results'][0]['geometry']['location']['lng']) ? $resp['results'][0]['geometry']['location']['lng'] : "";

        // verify if data is complete
        if($lati && $longi){

            // put the data in the array
            $data_arr = array();

            array_push(
                $data_arr,
                $lati,
                $longi
            );

            return $data_arr;

        }else{
            return false;
        }

    }

    else{
        echo "<strong>ERROR: {$resp['status']}</strong>";
        return false;
    }
}
?>

<div class="buttons">
    <a href="businessHome.php"><input type="submit" value="Back To Home Page" id="buttons"></a>

</div>
</body>
</html>