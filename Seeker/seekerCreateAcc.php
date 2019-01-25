<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
<head>
    <title>Youth Unemployment App</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel ="icon" sizes ="192x192" href = "\~ehb14204\employ_site\favicon.png"/>
    <link rel = "favicon" href = "\~ehb14204\employ_site\favicon.png"/>
    <link rel="stylesheet" type="text/css" href="loginForms.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script>
        function checkForm(){
            var errs = "";
            var enteredusername = document.forms["myform"]["newusername"];
            var entereduserpassword = document.forms["myform"]["newpassword"];
            var enteredname = document.forms["myform"]["newname"];
            var enteredage = document.forms["myform"]["newage"];

            enteredusername.style.background = "white";
            entereduserpassword.style.background = "white";
            enteredname.style.background = "white";
            enteredname.style.background = "white";

            if((enteredusername.value==null) || (enteredusername.value=="")){
                errs+="   * Username must not be empty\n";
                enteredusername.style.background = "pink";
            }

            if((entereduserpassword.value==null) || (entereduserpassword.value=="")){
                errs+="   * Password must not be empty\n";
                entereduserpassword.style.background = "pink";
            }

            if((enteredname.value==null) || (enteredname.value=="")){
                errs+="   * Name must not be empty\n";
                enteredname.style.background = "pink";
            }

            if((enteredage.value==null) || (enteredage.value=="")){
                errs+="   * Age must not be empty\n";
                enteredage.style.background = "pink";
            }

            if(errs!==""){
                alert(errs);
            }

            return (errs=="");

        }

    </script>
</head>
<body>
<div class="jumbotron text-center">
    <H1>Youth Unemployment App</H1>
    <h2>Create Account</h2>
</div>


<!-- Form to create a new account -->

<form method="post" name="myform" onsubmit="return checkForm();">

    <p class="login">
        <!--Master Password <input type="text" name="masterpassword"><br> -->
        Create Username <input type="text" name="newusername"><br>
        Create Password <input type="text" name="newpassword"><br>
        First/Last Name            <input type="text" name="newname"><br>
        Date Of Birth <input type="text" name="newage"><br><br>
        <input type="submit" value="Create Account" name="CreateAccount" id="runbuttons">
    </p>

</form>

<div class="buttons">
    <a href="loginScreen.html"><input type="submit" value="Back To Login" id="runbuttons"></a>
</div>

<?php

//connect to database

$servername = "devweb2017.cis.strath.ac.uk";
$username = "ehb14204";
$password = "aegieBu3aa2i";
$database = "ehb14204";
$conn = new mysqli($servername, $username, $password, $database);

if($conn ->connect_error){
    die("Connection Failed : ".$conn->connect_error);
}

//setup variables from$_POST

$newusername = isset($_POST['newusername']) ? $conn-> real_escape_string($_POST['newusername']): "";

$newpassword = isset($_POST['newpassword']) ? $conn-> real_escape_string(password_hash($_POST['newpassword'],PASSWORD_DEFAULT)): ""; //real escape string may cause issues

$newname = isset($_POST['newname']) ? $conn-> real_escape_string($_POST['newname']): "";
$newage = isset($_POST['newage']) ? $conn-> real_escape_string($_POST['newage']): "";
$sql1 =  "SELECT * FROM `Advisors`";
$advisorname = $conn ->query($sql1);
if(!$advisorname){
    die("Query Failed".$conn->error);
}
else if($advisorname ->num_rows > 0){
    while($row = $advisorname->fetch_assoc()){
        $max = 5;
        $min = $row["Name"];
        $number = $row["Number of Seekers"];
        if($number < $max){
            $finalAdvisor = $min;
            $finalSeekers = $number + 1;
            $sql2 = "UPDATE `Advisors` SET `Number of Seekers` = '$finalSeekers'  WHERE `Name` = '$finalAdvisor'";
        }
    }
}
$module1 = $module2 = $module3 = $module4 = $module5 = "Not Attempted";

$sql3 =  "INSERT INTO `modProgress` (`module1`, `module2`, `module3`, `module4`, `module5`) VALUES  ('$module1', '$module2', '$module3', '$module4', '$module5')";

//Query to insert a new user to the database

if(isset($_POST["CreateAccount"])){
    $duplicate = 0;
    $sql4 = "SELECT * FROM `JobSeekers`";
    $result4 = $conn->query($sql4);
    if(!$result4){
        die("Query Failed ".$conn->error);
    }else if($result4->num_rows > 0) {
        while ($row4 = $result4->fetch_assoc()) {
            $checkUser = $row4['Username'];
            if ($newusername == $checkUser) {
                $duplicate = $duplicate + 1;

            }
        }
    }
    if($duplicate == 0){
        $sql = "INSERT INTO `JobSeekers` ( `Username`, `Password`, `Name`, `Date of Birth`, `Advisor Name`) VALUES ('$newusername','$newpassword','$newname', '$newage','$finalAdvisor')";
        if($conn->query($sql) === TRUE && $conn->query($sql1) == TRUE && $conn->query($sql2) == TRUE && $conn->query($sql3) == TRUE){
            echo"<h2>Account Created!</h2>";
        } else{
            die("Error on insert ".$conn->error);
        }
    }else{
        echo "<h2>Username Taken, please choose another</h2>";
    }

}

//Close connection
$conn ->close();

?>

</body>
</html>
