<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cv information Builder</title>
    <link rel ="icon" sizes ="192x192" href = "\~ehb14204\employ_site\favicon.png"/>
    <link rel = "favicon" href = "\~ehb14204\employ_site\favicon.png"/>
    <link rel="stylesheet" type="text/css" href="loginScreen.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
</body>
<style>
    .error {color: #FF0000;}
</style>
<?php
session_start();
$id = $_SESSION['id'];
$seshName = $_SESSION['Name'];
$servername = "devweb2017.cis.strath.ac.uk";
$username = "ehb14204";
$password = "aegieBu3aa2i";
$database = "ehb14204";
$conn = new mysqli($servername, $username, $password, $database);

if($conn ->connect_error){
    die("Connection Failed : ".$conn->connect_error);
}
$FnameErr = $LnameErr = $emailErr = $genderErr = $websiteErr = $dobERR = $faceErr = $twitErr = $othErr="";
$firstname = $lastname = $email = $gender = $website = $facebook = $twitter = $other=$dob ="";


function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
// define variables and set to empty values
if ($_SERVER["REQUEST_METHOD"] == "POST") {

$accepted = 0;
if (empty($_POST["firstname"])) {
    $FnameErr = " First Name is required";
    $accepted = $accepted + 1;
} else {
    $firstname = test_input($_POST["firstname"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$firstname)) {
        $FnameErr = "Only letters and white space allowed";
        $accepted = $accepted + 1;
    }
  }
    if (empty($_POST["lastname"])) {
        $LnameErr = " Last Name is required";
        $accepted = $accepted + 1;
    } else {
        $lastname = test_input($_POST["lastname"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z ]*$/",$lastname)) {
            $LnameErr = "Only letters and white space allowed";
            $accepted = $accepted + 1;
        }
    }
    if (empty($_POST["dateofbirth"])) {
        $dobERR = "Date of Birth is required";
        $accepted = $accepted + 1;
    } else {
        $dob = test_input($_POST["dateofbirth"]);
    }
  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
      $accepted = $accepted + 1;
  } else {
    $gender = test_input($_POST["gender"]);
  }

    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
        $accepted = $accepted + 1;
    } else {
        $email = test_input($_POST["email"]);
        // check if e-mail address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $accepted = $accepted + 1;
            $emailErr = "Invalid email format";
        }
    }

    if (empty($_POST["website"])) {
        $website = "";
    } else {
        $website = test_input($_POST["website"]);
        // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
        if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
            $accepted = $accepted + 1;
            $websiteErr = "Invalid URL";
        }
    }

    if (empty($_POST["facebook"])) {
        $facebook = "";
    } else {
        $facebook = test_input($_POST["facebook"]);
        // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
        if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$facebook)) {
            $accepted = $accepted + 1;
            $faceErr = "Invalid URL for Facebook Account";
        }
    }

    if (empty($_POST["twitter"])) {
        $twitter = "";
    } else {
        $twitter = test_input($_POST["twitter"]);
        // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
        if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$twitter)) {
            $accepted = $accepted + 1;
            $twitErr = "Invalid URL for Twitter Account";
        }
    }

    if (empty($_POST["other"])) {
        $other = "";
    } else {
        $other = test_input($_POST["other"]);
        // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
        if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$other)) {
            $accepted = $accepted + 1;
            $othErr = "Invalid URL for Other Social Media Account";
        }
    }

    if($accepted == 0){
        $sql = "INSERT INTO `cvEntries` (`id`, `Fname`, `Lname`, `DOB`, `Gender`, `Email`, `Website`, `Facebook`, `Twitter`, `Other`) VALUES  ('$id', '$firstname', '$lastname','$dob', '$gender', '$email', '$website', '$facebook', '$twitter', '$other')";
        $result = $conn->query($sql);
        echo("<script>location.href = 'infoCapture2.php';</script>");
        if (!$result) {
            die("Query Failed " . $conn->error);

        }
    }

}
?>
</html>
<div class="jumbotron text-center">
    <H1>Youth Unemployment App</H1>
    <h2>Thanks for choosing the CV Creator</h2>
        <h3>Here we will need to gather your information to create your CV
        Information will be gathered in three parts, lets start with the basics.<br>
        Please fill in answers to the text boxes below.</h3>
</div>
<center><p><span class="error">* required field.</span></p></center>
<center><form method="post" name="myform" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <span class="error">* <?php echo $FnameErr;?></span><br>
        First Name: <input type="text" name="firstname" value="<?php echo $firstname;?>">
        <br><br>
        <span class="error">* <?php echo $LnameErr;?></span><br>
        Last Name: <input type="text" name="lastname" value="<?php echo $lastname;?>">
        <br><br>
        <span class="error">* <?php echo $dobERR;?></span><br>
        Date of Birth: <input type="date" name="dateofbirth" value="<?php echo $dob;?>">
        <br><br>
        <span class="error">* <?php echo $genderErr;?></span><br>
        Gender:
        <input type="radio" name="gender" <?php if (isset($gender) && $gender=="Female") echo "checked";?> value="female">Female
        <input type="radio" name="gender" <?php if (isset($gender) && $gender=="Male") echo "checked";?> value="male">Male
        <input type="radio" name="gender" <?php if (isset($gender) && $gender=="Other") echo "checked";?> value="female">Other
        <br><br>
        <span class="error"> <?php echo $emailErr;?></span><br>
        E-mail: <input type="text" name="email" value="<?php echo $email;?>">
        <br><br>
        <span class="error"><?php echo $websiteErr;?></span><br>
        Website: <input type="text" name="website" value="<?php echo $website;?>">
        <br><br>
        <span class="error"><?php echo $faceErr;?></span><br>
        Facebook: <input type="text" name="facebook" value="<?php echo $facebook;?>">
        <br><br>
        <span class="error"><?php echo $twitErr;?></span><br>
        Twitter: <input type="text" name="twitter" value="<?php echo $twitter;?>">
        <br><br>
        <span class="error"><?php echo $othErr;?></span><br>
        Other Social Media: <input type="text" name="other" value="<?php echo $other;?>">
        <br><br>

    </p>
    <br>
    <br>
        <div class="buttons">
                <input type="submit" value="Next Page" id="buttons"></a>
            </div>
    </form></center><br>

<center><div class="buttons">
        <a href="loggedin.php"><input type="submit" value="Home" id="buttons"></a>
    </div></center>



<?php
$conn->close();
?>

</body>
</html>