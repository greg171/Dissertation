<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Gregory's Employment App</title>
    <link rel ="icon" sizes ="192x192" href = "\~ehb14204\employ_site\favicon.png"/>
    <link rel = "favicon" href = "\~ehb14204\employ_site\favicon.png"/>
    <link rel="stylesheet" type="text/css" href="\~ehb14204\employ_site\Seeker\loginForms.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>

<body>
<div class="jumbotron text-center">
    <H1>Youth Unemployment App</H1>
    <h2>Business Login</h2>
</div>


<form method="post" name="myform">

    <p class="login">
        Enter Username <input type="text" name="username"><br>
        Enter Password <input type="password" name="password"><br><br>
        <input type="submit" value="Login" name="Login" id="runbuttons">
    </p>

</form>

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


$loginusername = isset($_POST['username']) ? $conn-> real_escape_string($_POST['username']): "";
$loginpassword = isset($_POST['password']) ? $conn-> real_escape_string($_POST['password']): "";



//issue query
$sql = "SELECT * FROM `Business`";
$result = $conn ->query($sql);



if(isset($_POST["Login"])){
    //handle results
    if(!$result){
        die("Query Failed ".$conn->error);
    }

    else if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){

            $checkLoginUsername = $row["Username"];
            $checkLoginPassword = $row["Password"];

            if(($loginusername === $checkLoginUsername) && (password_verify($loginpassword,$checkLoginPassword))){

                $name = $row["Business Name"];
                $id = $row["id"];
                $address = $row['Address'];
                $now = time();
                // server should keep session data for AT LEAST 1 hour
                ini_set('session.gc_maxlifetime', 3600);

// each client should remember their session id for EXACTLY 1 hour
                session_set_cookie_params(3600);
                session_start();
                $_SESSION['id'] = $id;
                $_SESSION['username'] = $loginusername;
                $_SESSION['Business Name']= $name;
                $_SESSION['Address'] = $address;
                header('Location: businessHome.php');

            }

        }
        ?>
        <h4>Incorrect Username or Password, please re-enter</h4>
        <?php

    }
}

?>
<?php

//close connection
$conn ->close();

?>

<div class="buttons">
    <a href="businessCreate.php"><input type="submit" value="Create New Account" id="runbuttons"></a>
</div>
<br>
<div class="buttons">
    <a href="../Seeker/loginScreen.html"><input type="submit" value="Back To Login Menu" id="runbuttons"></a>
</div>

</body>
</html>