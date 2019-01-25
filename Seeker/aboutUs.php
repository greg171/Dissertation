<!--/**-->
<!-- * Created by IntelliJ IDEA.-->
<!-- * User: gregp-->
<!-- * Date: 22/03/2018-->
<!-- * Time: 03:45-->
<!-- */-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Employment App Login Screen</title>
    <link rel ="icon" sizes ="192x192" href = "\~ehb14204\employ_site\favicon.png"/>
    <link rel = "favicon" href = "\~ehb14204\employ_site\favicon.png"/>
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
<div class="jumbotron text-center">
    <br>
    <h1>About Me</h1><br>
    <h2>Who I am and What I do</h2>
</div>
<ul>
    <li><a href="loggedin.php">Home</a</li>
    <li><a href = "#">About Us</a></li>
    <li><a href="seekersProfile.php">Your Profile</a></li>
    <li style="float:right">Gregory Peters</li>

</ul>


<center><img src="../../../.IdeaIC2017.2/portfolio/uni.png" alt="Strathclyde Emblem" style="width:300px;height:300px;"></center>

<center><p> This is the Youth Unemployment Application developed by Gregory Peters<br>
            as part of his 4th Year Computing Science Individual Project.<br>
            The purpose of this application is to aid young job seekers in their journey back to employment.</p><br>



    <p>The application has three different users who all have different levels of access to the application <br>
     The main user this application is centered around is the Job Seeker. When a new job seeker registers they are <br>
    assigned they're own Adviser and have different sections in which they can complete and work on to further<br>
    their knowledge on how to make the job seeking process an easier task to undertake.<br>
    A job seeker can create their own CV, completed Learning Modules which will help to write a personal statement,<br>
    what to avoid doing and the best and most affective ways to land their dream job.</p>

    <p>Thank you for visiting the application, if for any reason you wish to get in touch with the developer
    his email addres is gregory.peters.2014@uni.strath.ac.uk.</p>
</center>

<br>
<br>

<div class = "containers">
    <div class="panel panel-default">
        <div class="panel-body">

            <div class = "floating-box">
                <a href="seekerAdvisorChat.php"><p>Adviser Chat:<p><span class="glyphicon glyphicon-envelope"></span></p></a>
            </div>
            <div class = "floating-box">
                <a href="#">About Us</a>
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
                <a href="learningMod.php"> Learning Modules: <p><span class="glyphicon glyphicon-education"></span></p></a>
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
