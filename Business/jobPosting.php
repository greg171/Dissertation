<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Seeker View of Job Postings</title>
    <link rel ="icon" sizes ="192x192" href = "\~ehb14204\employ_site\favicon.png"/>
    <link rel = "favicon" href = "\~ehb14204\employ_site\favicon.png"/>
    <link rel="stylesheet" type="text/css" href="jobPosting.css">
    <link rel="stylesheet" type="text/css" href="business.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>
<style>
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
    .floating-box {
        float: left;
        width: 160px;
        height: 75px;
    }
</style>

<script>
        function myFunction() {
            // Declare variables
            var input, filter, table, tr, td, i;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");

            // Loop through all table rows, and hide those who don't match the search query
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[4];
                if (td) {
                    if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }

        function myLink(company, code){
            document.cookie = "Company is = " + company;
            document.cookie = "Code is = " + code;
            console.log(company, code);
            window.location.href = "/~ehb14204/employ_site/Business/viewJob.php";

        }


    </script>
<div class="jumbotron text-center">
    <br>
    <h1>Youth Unemployment Application</h1><br>
    <h2>Live Postings</h2>
</div>
<ul>
    <li><a href="\~ehb14204\employ_site\Seeker\loggedin.php">Home</a</li>
    <li><a href = "\~ehb14204\employ_site\Seeker\aboutUs.php">About Us</a></li>
    <li><a href="\~ehb14204\employ_site\Seeker\seekersProfile.php">Your Profile</a></li>
    <li style="float:right"><a href="\~ehb14204\employ_site\Seeker\loginScreen.html">Log Out</a></li>

</ul>

<!--<div class ="container">-->

    <?php
    $servername = "devweb2017.cis.strath.ac.uk";
    $username = "ehb14204";
    $password = "aegieBu3aa2i";
    $database = "ehb14204";
    $conn = new mysqli($servername, $username, $password, $database);

    if($conn ->connect_error) {
        die("Connection Failed : " . $conn->connect_error);
    }
    $sql = "SELECT * FROM `JobPostings`";
    $result = $conn ->query($sql);

    ?>

<h2>Available Jobs</h2>
<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search by Tag..">
<table id="myTable">
    <tr class="header">
    <tr>
        <th>Job Title</th>
        <th>Company</th>
        <th>Address</th>
        <th>Job Descriptions</th>
        <th>Tag</th>
        <th>Apply</th>
    </>

    <?php
    if(!$result){
        die("Query Failed ".$conn->error);
    }
    if($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {

            $title = $row["Title"];
            $company = $row["Company"];
            $address = $row["Address"];
            $jobDes = $row["Job Descriptions"];
            $tag = $row['Tag'];
            $code = $row['code'];

            $jobtable =

                "<tr>
                        <td>" . $title . "</td>
                        <td>" . $company . "</td>
                        <td>" . $address . "</td>
                        <td>" . $jobDes . "</td>
                        <td>" . $tag . "</td>
                        <td <div class='buttons'>
            <a><input type='submit' value='Apply' id='button' onclick = 'myLink(\"$company\", \"$code\")'></a>
</div></td>
                    </tr>";

            echo $jobtable;
        }
    }

    ?>
</table>

<br>

<center><div id="buttons">
    <a href="\~ehb14204\employ_site\Seeker\loggedin.php">Home</a>
</div></center>
<br>
<br>
<div class = "containers">
    <div class="panel panel-default">
        <div class="panel-body">
            <div class = "floating-box">
                <a href="\~ehb14204\employ_site\Seeker\seekerAdvisorChat.php"><p>Adviser Chat:<p><span class="glyphicon glyphicon-envelope"></span></p></a>
            </div>
            <div class = "floating-box">
                <a href="\~ehb14204\employ_site\Seeker\aboutUs.php">About Us</a>
            </div>
            <div class = "floating-box">
                <a href="#">Privacy Policy</a>
            </div>
            <div class = "floating-box">
                <a href="#">Cookies</a>
            </div>
            <div class = "floating-box">
                <a href="http://gregpeters1.edublogs.org/">Blog</a>
            </div>
            <div class = "floating-box">
                <a href="\~ehb14204\employ_site\Seeker\learningMod.php"> Learning Modules: <p><span class="glyphicon glyphicon-education"></span></p></a>
            </div>
            <div class = "floating-box">
                <a href="#">Facebook: <p><span class= "fa fa-3x fa-facebook-square"></span></p></a>
            </div>
            <div class = "floating-box">
                <a href="#">Twitter: <p><span class="fa fa-3x fa-twitter-square"></span></p></a>
            </div>
            <div class = "floating-box">
                <a href="#">LinkedIn: <p><span class="fa fa-3x fa-linkedin-square"></span></p></a>
            </div>
        </div>
    </div>
</div>

</body>
</html>