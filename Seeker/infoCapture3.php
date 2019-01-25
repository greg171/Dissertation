<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Third Information Capture Page</title>
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
    <h2>Thank you for providing your Education/Employment history and hobbies</h2>
    <h3> In this section we look to make your CV a little more personal</h3>
</div>


<?php
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
$stateErr = $achErr1 = $achErr2 = $achErr3 = $achErr4 = $achErr5 = "";
$statement = $achieve1 = $achieve2 = $achieve3 = $achieve4 = $achieve5 =  "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $accepted = 0;
    if (empty($_POST["statement"])) {
        $stateErr = "Personal Statement is Required";
        $accepted = $accepted + 1;
    } else {
        $statement = test_input($_POST["statement"]);
    }
    if (empty($_POST["achieve1"])) {
        $achErr1 = "List at least One Achievement";
        $accepted = $accepted + 1;
    } else {
        $achieve1 = test_input($_POST["achieve1"]);
        }

    if (empty($_POST["achieve2"])) {
        $achieve2 = "";
    } else {
        $achieve2 = test_input($_POST["achieve2"]);
    }
    if (empty($_POST["achieve3"])) {
        $achieve3 = "";
    } else {
        $achieve3 = test_input($_POST["achieve3"]);
    }
    if (empty($_POST["achieve4"])) {
        $achieve4 = "";
    } else {
        $achieve4 = test_input($_POST["achieve4"]);
    }
    if (empty($_POST["achieve5"])) {
        $achieve5 = "";
    } else {
        $achieve5 = test_input($_POST["achieve5"]);
    }
if($accepted == 0){
    $sql = "UPDATE `cvEntries` SET `personal` = '$statement', `achievement1` = '$achieve1', `achievement2` = '$achieve2', `achievement3` = '$achieve3', `achievement4` = '$achieve4', `achievement5` = '$achieve5' WHERE `id` = '$id'";
    $result = $conn->query($sql);
    echo("<script>location.href = 'CVcreator.php';</script>");
    if (!$result) {
        die("Query Failed " . $conn->error);
    }
}
}

?>
<center><p><span class="error">* required field.</span></p></center>
<form method="post" value="Login"  action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <center><span class="error">* <?php echo $stateErr;?></span></center><br>
    <center>What would make you a good employee?:
        <div class="input">
     <textarea rows="4" cols="100" name = "statement"><?php echo $statement?>
</textarea>
            <span class="tooltip">In this box, you will want to explain to any potential employer reading what would
            make you a desirable worker for them. Looks to include examples of how you work in a team, high pressure situations,
                how you solve problems in a working enviroment and what traits of your personality benefit you in a working enviroment.</span>
        </div></center><br>
    <br>
    <center>Up to five achievements you are proud of (Enter at least one):<br>
            <span class="error">* <?php echo $achErr1;?></span><br>
            1: <input type="text" name="achieve1" value="<?php echo $achieve1;?>">
            <span class="error"><?php echo $achErr2;?></span><br>
            2: <input type="text" name="achieve2" value="<?php echo $achieve2;?>">
            <span class="error"> <?php echo $achErr3;?></span><br>
            3: <input type="text" name="achieve3" value="<?php echo $achieve3;?>">
            <span class="error"> <?php echo $achErr4;?></span><br>
            4: <input type="text" name="achieve4" value="<?php echo $achieve4;?>">
            <span class="error"> <?php echo $achErr5;?></span><br>
            5: <input type="text" name="achieve5" value="<?php echo $achieve5;?>">
            <br><br>
            <span class="tooltip">In these boxes, please enter up to five achievements from either your professional
                or personal life that you think an employer would also find interesting about you.</span>

        </center><br>

    <center><input type="submit" value="Finish" name="Check" id="buttons"></center>
</form>
<br>
<center><div class="buttons">
        <a href="infoCapture2.php"><input type="submit" value="Go Back" id="buttons"></a>
    </div></center>
</body>

<?php
$conn->close();
?>
</html>

