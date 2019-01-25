<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Second Information Capture Page</title>
    <link rel ="icon" sizes ="192x192" href = "\~ehb14204\employ_site\favicon.png"/>
    <link rel = "favicon" href = "\~ehb14204\employ_site\favicon.png"/>
    <link rel="stylesheet" type="text/css" href="loginScreen.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<style>

    * {
        font-family: Arial;
    }

    .input {
        position: relative;
    }

    .tooltip {
        display: none;
        padding: 6px;
    }

    .input:hover .tooltip {
        background: blue;
        border-radius: 2px;
        bottom: -60px;
        color: white;
        display: inline;
        height: 10px;
        left: 0;
        line-height: 10px;
        position: center;
    }

    .input:hover .tooltip:before {
        display: block;
        content: "";
        top: -5px;
        width: 0;
        height: 0;
        border-left: 5px solid transparent;
        border-right: 5px solid transparent;
        position: center;
        border-bottom: 5px solid blue;
    }

     .error {color: #FF0000;}

</style>
<body>
<?php
$servername = "devweb2017.cis.strath.ac.uk";
$username = "ehb14204";
$password = "aegieBu3aa2i";
$database = "ehb14204";
$conn = new mysqli($servername, $username, $password, $database);

if($conn ->connect_error){
    die("Connection Failed : ".$conn->connect_error);
}
session_start();
$id = $_SESSION['id'];
?>
<div class="jumbotron text-center">
    <H1>Youth Unemployment App</H1>
    <h2>Thank you for providing your basic information</h2>
    <h3> Now lets talk about your education and experience history.</h3>
</div>

<?php
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
$edErr = $empErr = $hobErr = "";
$education = $employment = $hobbies = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $accepted = 0;

    if (empty($_POST["education"])) {
        $edErr = " Education History is Required";
        $accepted = $accepted + 1;
    } else {
        $education = test_input($_POST["education"]);
    }
    if (empty($_POST["employment"])) {
        $empErr = " Employment History is Required";
        $accepted = $accepted + 1;
    } else {
        $employment = test_input($_POST["employment"]);
    }
    if (empty($_POST["hobbies"])) {
        $hobErr = " List at Least One Hobbie";
        $accepted = $accepted + 1;
    } else {
        $hobbies = test_input($_POST["hobbies"]);
    }

    if($accepted == 0){
        $sql = "UPDATE `cvEntries` SET `edHistory` = '$education', `empHistory` = '$employment', `hobbies`= '$hobbies' WHERE `id` = '$id'";
        $result = $conn->query($sql);
        echo("<script>location.href = 'infoCapture3.php';</script>");
        if (!$result) {
            die("Query Failed " . $conn->error);
        }
    }
}
//?>
<center><p><span class="error">* required field.</span></p></center>
<form method="post" value="Login" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <center><span class="error">* <?php echo $edErr;?></span></center><br>
<center>Education History:
<div class="input">
     <textarea rows="4" cols="50" name = "education" spellcheck="true"><?php echo $education;?>
</textarea>
   <span class="tooltip">In this box, please enter all education qualifications earned,
    this can be either from Higher Education (University/College) or from High School or equivalent</span>

</div></center>
<br>
   <center><span class="error">* <?php echo $empErr;?></span></center><br>
<center>Employment History:
    <div class="input">
     <textarea rows="4" cols="50" name = "employment" spellcheck="true"><?php echo $employment;?>
</textarea>
        <span class="tooltip">In this box, please enter all previous jobs you have had,
        please specify what your role was, how long you undertook that role, and what specific tasks you undertook
        in this role.</span>

    </div></center><br>

   <center><span class="error">* <?php echo $hobErr;?></span></center><br>
<center>Hobbies and Interests:
    <div class="input">
     <textarea rows="4" cols="50" name = 'hobbies' spellcheck="true"><?php echo $hobbies;?>
</textarea>
<span class="tooltip">In this box, please enter any hobbies and interests you may have,
        this can be anything from sports, to activites. Employers want to know more about
        the person they may potentially hire!!</span>

</div></center>
    <center><input type="submit" value="Next Page" name="Next Page" id="buttons"></center>
</form>
<br>
<center><div class="buttons">
        <a href="CVinfoCapture.php"><input type="submit" value="Go Back" id="buttons"></a>
    </div></center>
<br>
<center><div class="buttons">
        <a href="loggedin.php"><input type="submit" value="Home" id="buttons"></a>
    </div></center>
</body>

<?php
$conn->close();
?>
</html>

