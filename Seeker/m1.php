<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Module 1</title>
    <link rel ="icon" sizes ="192x192" href = "\~ehb14204\employ_site\favicon.png"/>
    <link rel = "favicon" href = "\~ehb14204\employ_site\favicon.png"/>
    <link rel="stylesheet" type="text/css" href="learningMod.css">
</head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<body>
<?php
session_start();
$id = $_SESSION['id'];
$attempted = "Attemped";
//connect to database
$servername = "devweb2017.cis.strath.ac.uk";
$username = "ehb14204";
$password = "aegieBu3aa2i";
$database = "ehb14204";
$conn = new mysqli($servername, $username, $password, $database);

if($conn ->connect_error){
    die("Connection Failed : ".$conn->connect_error);
}
$sql = "UPDATE `modProgress` SET `module1`= 'Attemped' WHERE `id` = $id";
$result = $conn ->query($sql);
if(!$result) {
    die("Query Failed " . $conn->error);
}
?>
<center><H1>Module 1: The importance of a good first impression.</H1>
<div class="centered">
    <h2>Introduction</h2>
    <div class="modulecontent">
        <p>
            First impressions count.
            Knowing how to make a good first impression in a job interview can be the difference between success and failure.<br>
            In any job interview, the first few minutes – even the first few seconds – are vital.
            If you make a bad start to a job interview this can knock your confidence and make you nervous.<br>
            This can be the start of slippery downhill slope from which it is difficult to recover.
            But even if you manage to recover your composure and go on to perform well, a bad start will also impact the employer’s impression of you.
            Get it wrong and you’re starting from a negative position. This makes it much harder to leave a great impression at the end of the interview.
            <br><br>
            A few factors to consider are:<br><br>

            - The Clothing attire you wear to the interview<br>
            - Your handshake<br>
            - The importance of eye contact<br>
            - Having questions for the interviewer<br>
            <br>
            Job interviews are not everyones strong suit, but with the help of some fail safe tips and tricks<br>
            you wil be well on your way back to employment.<br>
        </p>
        <br>

        <h2>Overview</h2>

        <p>
            The following video gives a brief overview of how to have a succesful job interview...<br><br>

            <iframe width="900" height="500" src="https://www.youtube.com/embed/watch?v=5c-7kkF-GXA=0" frameborder="0" allowfullscreen></iframe></iframe><br><br>

            You can find the original video source <a href="https://www.youtube.com/watch?v=WRsYTMWaKhE" target="_blank">here</a></a><br><br>
        </p>

    </div>

    <hr>

</div>

<div id="buttons">
    <br>
    <a href="loggedin.php"><button name="home">Home</button></a>
    <a href="m1p2.php"><button name="home">Next</button></a>
</div></center>

</body>
</html>