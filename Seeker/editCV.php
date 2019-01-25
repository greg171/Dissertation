<!--/**-->
<!-- * Created by IntelliJ IDEA.-->
<!-- * User: gregp-->
<!-- * Date: 03/03/2018-->
<!-- * Time: 18:04-->
<!-- */-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Employment App CV Edit</title>
    <link rel ="icon" sizes ="192x192" href = "\~ehb14204\employ_site\favicon.png"/>
    <link rel = "favicon" href = "\~ehb14204\employ_site\favicon.png"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
<style>
    .error {color: #FF0000;}
</style>
<?php
session_start();
$name = $_SESSION['Name'];
$id = $_SESSION['id'];
$FnameErr = $LnameErr = $emailErr = $genderErr = $websiteErr = $dobERR = $faceErr = $twitErr = $othErr= $achErr1 = $achErr2 = $achErr3 = $achErr4 = $achErr5 = $edErr = $empErr = $hobErr = $perErr = "";
$servername = "devweb2017.cis.strath.ac.uk";
$username = "ehb14204";
$password = "aegieBu3aa2i";
$database = "ehb14204";
$conn = new mysqli($servername, $username, $password, $database);

if($conn ->connect_error){
die("Connection Failed : ".$conn->connect_error);
}

$sql = "SELECT * FROM `cvEntries` WHERE `id` = '$id'";
$result = $conn->query($sql);
if(!$result){
    die("Query Failed ".$conn->error);
}elseif($result->num_rows > 0) {
while ($row = $result->fetch_assoc()) {
      $Fname = $row['Fname'];
      $Lname = $row['Lname'];
      $dob = $row['DOB'];
      $gender = $row['Gender'];
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
      $css = $row['css'];

    }
}

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
        $Fname = test_input($_POST["firstname"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z ]*$/",$Fname)) {
            $FnameErr = "Only letters and white space allowed";
            $accepted = $accepted + 1;
        }
    }
    if (empty($_POST["lastname"])) {
        $LnameErr = " First Name is required";
        $accepted = $accepted + 1;
    } else {
        $Lname = test_input($_POST["lastname"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z ]*$/",$Lname)) {
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
    if (empty($_POST["education"])) {
        $edErr = "Education History is Required";
    } else {
        $edHistory = test_input($_POST["education"]);
    }
    if (empty($_POST["employment"])) {
        $empErr = "Employment History is Required";
    } else {
        $empHistory = test_input($_POST["employment"]);
    }
    if (empty($_POST["hobbies"])) {
        $hobErr = "Please List at least one hobby";
    } else {
        $hobbies = test_input($_POST["hobbies"]);
    }
    if (empty($_POST["personal"])) {
        $perErr = "Personal Statement is Required";
    } else {
        $personal = test_input($_POST["personal"]);
    }
    if (empty($_POST["achieve1"])) {
        $achErr1 = "List at Least One Achievement";
        $accepted = $accepted + 1;
    } else {
        $achieve1 = test_input($_POST["achieve1"]);
    }
    if (empty($_POST["achieve2"])) {
        $achErr2 = "";
    } else {
        $achieve2 = test_input($_POST["achieve2"]);
    }
    if (empty($_POST["achieve3"])) {
        $achErr3 = "";
    } else {
        $achieve3 = test_input($_POST["achieve3"]);
    }
    if (empty($_POST["achieve4"])) {
        $achErr4 = "";
    } else {
        $achieve4 = test_input($_POST["achieve4"]);
    }
    if (empty($_POST["achieve5"])) {
        $achErr5 = "";
    } else {
        $achieve5 = test_input($_POST["achieve5"]);
    }

        $css = test_input($_POST["css"]);

    if($accepted == 0){
        $sql = "UPDATE `cvEntries` SET `Fname` = '$Fname', `Lname` = '$Lname', `DOB` = '$dob', `Gender` = '$gender', `Email` = '$email', `Website` = '$website', `Facebook` = '$facebook', `Twitter` = '$twitter', `Other` = '$other', `edHistory` = '$edHistory', `empHistory` = '$empHistory', `hobbies` = '$hobbies', `personal` = '$personal', `achievement1` = '$achieve1',`achievement2` = '$achieve2',`achievement3` = '$achieve3', `achievement4` = '$achieve4',`achievement5` = '$achieve5', `css` = '$css' WHERE `id` = '$id'";
        $result = $conn->query($sql);
        echo("<script>location.href = 'loggedin.php';</script>");
        if (!$result) {
            die("Query Failed " . $conn->error);
        }
    }
}
?>
<div class="jumbotron text-center">
    <H1>Youth Unemployment App</H1>
    <h2>Below is your entered CV information, make changes to the boxes and submit where necessary.<br>
        Updates will be added to your user profile</h2>
</div>

    <center><p><span class="error">* required field.</span></p></center>
    <center><form method="post" name="myform" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <span class="error">* <?php echo $FnameErr;?></span><br>
            First Name: <input type="text" name="firstname" value="<?php echo $Fname;?>">
            <br><br>
            <span class="error">* <?php echo $LnameErr;?></span><br>
            Last Name: <input type="text" name="lastname" value="<?php echo $Lname;?>">
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
            <span class="error"><?php echo $emailErr;?></span><br>
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
            <span class="error">*<?php echo $edErr;?></span><br>
             Education History:
            <div class="input">
            <textarea rows="4" cols="50" name = "education"><?php echo $edHistory; ?>
            </textarea></div><br>
            <span class="error">*<?php echo $empErr;?></span><br>
            Employment History:
            <div class="input">
            <textarea rows="4" cols="50" name = "employment"><?php echo $empHistory; ?>
            </textarea></div><br>
            <span class="error">*<?php echo $hobErr;?></span><br>
             Hobbies:
            <div class="input">
            <textarea rows="4" cols="50" name = "hobbies"><?php echo $hobbies; ?>
            </textarea></div><br>
            <span class="error">*<?php echo $perErr;?></span><br>
            Personal Statement:
            <div class="input">
             <textarea rows="4" cols="50" name = "personal"><?php echo $personal; ?>
             </textarea>
            </div><br>
            <center>Up to five achievements you are proud of (Enter at least one):<br>
                <span class="error">* <?php echo $achErr1;?></span><br>
                1: <input type="text" name="achieve1" value="<?php echo $achieve1;?>"><br>
                <span class="error"><?php echo $achErr2;?></span><br>
                2: <input type="text" name="achieve2" value="<?php echo $achieve2;?>"><br>
                <span class="error"><?php echo $achErr3;?></span><br>
                3: <input type="text" name="achieve3" value="<?php echo $achieve3;?>"><br>
                <span class="error"><?php echo $achErr4;?></span><br>
                4: <input type="text" name="achieve4" value="<?php echo $achieve4;?>"><br>
                <span class="error"><?php echo $achErr5;?></span><br>
                5: <input type="text" name="achieve5" value="<?php echo $achieve5;?>"><br>
                <br><br>

                <center>Would you like to change your CV template?
                        Choose your template selection below.<br>
                    <select name = "css">
                        <option value="plainJane">Plain Jane</option>
                        <option value="professional">Professional</option>
                    </select>
                </center><br><br>
        <div class="buttons">
            <input type="submit" value="Submit Changes" id="buttons"></a>
        </div>


    </form></center><br>

    <center><div class="buttons">
            <a href="cvOverwrite.php"><input type="submit" value="Back" id="buttons3"></a>
        </div></center>

<?php
  $conn->close();
?>
</body>
</html>