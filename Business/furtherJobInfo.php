
<!--/**-->
<!-- * Created by IntelliJ IDEA.-->
<!-- * User: gregp-->
<!-- * Date: 25/02/2018-->
<!-- * Time: 03:15-->
<!-- */-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Further Job Posting Info</title>
    <link rel ="icon" sizes ="192x192" href = "\~ehb14204\employ_site\favicon.png"/>
    <link rel = "favicon" href = "\~ehb14204\employ_site\favicon.png"/>
    <link rel="stylesheet" type="text/css" href="business.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
<script>
    function checkForm(){
        var errs = "";
        var enteredRequire = document.forms["myform"]["info"];
        var enteredSalary = document.forms["myform"]["salary"];
        var enteredHours = document.forms["myform"]["hours"];
        var enteredBenefit = document.forms["myform"]["benefit"];

        enteredRequire.style.background = "white";
        enteredSalary.style.background = "white";
        enteredHours.style.background = "white";
        enteredBenefit.style.background = "white";

        if((enteredRequire.value==null) || (enteredRequire.value=="")){
            errs+="   * Job Requirements must not be empty\n";
            enteredRequire.style.background = "pink";
        }

        if((enteredSalary.value==null) || (enteredSalary.value=="")){
            errs+="   * Salary must not be empty\n";
            enteredSalary.style.background = "pink";
        }

        if((enteredHours.value==null) || (enteredHours.value=="")){
            errs+="   * Hours must not be empty\n";
            enteredHours.style.background = "pink";
        }

        if((enteredBenefit.value==null) || (enteredBenefit.value=="")){
            errs+="   * Benefits must not be empty, if not added job benefits then enter n/a\n";
            enteredTag.style.background = "pink";
        }

        if(errs!==""){
            alert(errs);
        }

        return (errs=="");

    }

</script>
<?php
session_start();
$code = $_SESSION['code'];
$id = $_SESSION['id'];
$name = $_SESSION['Business Name'];

$servername = "devweb2017.cis.strath.ac.uk";
$username = "ehb14204";
$password = "aegieBu3aa2i";
$database = "ehb14204";
$conn = new mysqli($servername, $username, $password, $database);

if($conn ->connect_error){
    die("Connection Failed : ".$conn->connect_error);
}

?>
<div class="jumbotron text-center">
    <H1>Youth Unemployment App</H1>
    <h2>Lets Get Some More Information</h2>
</div>

<form method="post" name="myform" onsubmit="return checkForm();">

    <center>What does the job require?:
        <div class="input">
     <textarea rows="4" cols="50" name = 'info' spellcheck="true">
     </textarea>
        </div></center>
      <center> Salary per hour <input type="text" name="salary"><br><br></center>
       <center> Hours per Week <input type = "text" name = "hours"><br><br></center>
    <center>Does the job come with any benefits?:
        <div class="input">
     <textarea rows="4" cols="50" name = 'benefit' spellcheck="true">
     </textarea>
        </div></center>
    <center><input type="submit"  value="Submit Further Job Information" name="furtherInfo" id="runbutton"></center>
    </form>


<?php
if ($_SERVER["REQUEST_METHOD"] == "POST"){

    $servername = "devweb2017.cis.strath.ac.uk";
    $username = "ehb14204";
    $password = "aegieBu3aa2i";
    $database = "ehb14204";
    $conn = new mysqli($servername, $username, $password, $database);

    if($conn ->connect_error){
        die("Connection Failed : ".$conn->connect_error);
    }
    if(isset($_POST['info']) == ""){
        $furtherInfo = NULL;
    }else{
        $furtherInfo = isset($_POST['info']) ? $conn->real_escape_string($_POST['info']) : "";
    }
    $salary = isset($_POST['salary']) ? $conn->real_escape_string($_POST['salary']) : "";
    $hours = isset($_POST['hours']) ? $conn->real_escape_string($_POST['hours']) : "";
    if(isset($_POST['benefit'])){
        $benefit = NULL;
    }else{
        $benefit = isset($_POST['benefit']) ? $conn->real_escape_string($_POST['benefit']) : "";
    }

  $sql = "INSERT INTO `jobInfo` (`id`, `jobcode`, `Company`, `FurtherInfo`, `Salary`, `Hours`, `Benefits`) VALUES ('$id', '$code', '$name', '$furtherInfo', '$salary', '$hours', '$benefit')";
  $result = $conn->query($sql);
  if(!$result){
          die("Query Failed".$conn->error);

  }else{
      echo("<script>location.href = 'businessHome.php';</script>");
  }
}
?>
</body>
</html>