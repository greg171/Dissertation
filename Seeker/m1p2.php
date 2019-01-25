<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Learning Module 1, Page 2</title>
    <link rel ="icon" sizes ="192x192" href = "\~ehb14204\employ_site\favicon.png"/>
    <link rel = "favicon" href = "\~ehb14204\employ_site\favicon.png"/>
    <link rel="stylesheet" type="text/css" href="learningMod.css">
    <center><h2>What to wear?</h2></center>
    <center><p>
        Interviews are formal occasions so your choice of clothing should reflect this. <br>
        Unless you specifically know in advance that a workplace has a particular dress code, you should choose what to wear to an interview based on formality.<br>
        The key things to consider when wondering what to wear for an interview are:<br><br>

        <b>Be Prepared</b> - The day of an interview can be a little hectic so pick out what you are going to wear the day before.<br>
         Being caught in two minds over wardrobe choices on the morning of an interview can lead to unwelcome stress.
        <br>
        <br>
            <b>Do Your Laundry</b> - Noticing a stain or mark on your best interview suit at the last minute is to be avoided.<br>
            Launder or dry clean your interview clothes so that they are ready to go on the big day.<br>
            <br>
            <br>
            <b>Smarten Up</b> - If you are not in the habit of wearing a shirt and tie in your day-to-day life,<br>
            then get into the habit of pressing your shirt and knotting your neck tie<br>
            so that it does not look like the first time you have done it at the interview.<br>
            <br>
            <br>
            <b>Hair Matters</b> - Scruffy hair can make you come across as unprofessional in appearance.<br>
            Along with smart attire, you should tie your hair back with a no-nonsense accessory or have a trim.<br>
        <br>
    </p></center>

    <hr>
    <?php
    session_start();
    $id = $_SESSION['id'];
    if(isset($_POST['Submit'])){
        session_start();
        if(isset($_POST['q1'])){ $_SESSION["q1"] = $_POST['q1']; }else{ $_SESSION["q1"] = "Unanswered";}
        if(isset($_POST['q2'])){ $_SESSION["q2"] = $_POST['q2']; }else{ $_SESSION["q2"] = "Unanswered";}
        if(isset($_POST['q3'])){ $_SESSION["q3"] = $_POST['q3']; }else{ $_SESSION["q3"] = "Unanswered";}
        if(isset($_POST['q4'])){ $_SESSION["q4"] = $_POST['q4']; }else{ $_SESSION["q4"] = "Unanswered";}
        if(isset($_POST['q5'])){ $_SESSION["q5"] = $_POST['q5']; }else{ $_SESSION["q5"] = "Unanswered";}
        header('Location: m1Feedback.php');
    }
    ?>

    <center><div class="centered">
        <h2>Test Your Knowledge</h2>
        <div class="modulecontent">
            <p>Quiz</p>

            <p class="question"><b>1. What type of Handshake should you use?</b></p>
            <form method="post" name="q1">
                <input type="radio" name="q1" value="a" id="q1a"><span>Firm and quick</span><br/>
                <input type="radio" name="q1" value="b" id="q1b"><span>Weak and Long</span><br/>
                <input type="radio" name="q1" value="c" id="q1c"><span>Don't shake at all</span><br/>
                <input type="radio" name="q1" value="d" id="q1d"><span>Flat and Limp</span><br/>
                <br>

                <p class="question"><b>2. How Should you Dress?</b></p>
                <input type="radio" name="q2" value="a" id="q1a"><span>Casual </span><br/>
                <input type="radio" name="q2" value="b" id="q1b"><span>Smart Business Dress</span><br/>
                <input type="radio" name="q2" value="c" id="q1c"><span>Tracksuit</span><br/>
                <input type="radio" name="q2" value="d" id="q1d"><span>Who Cares</span><br/>
                <br>

                <p class="question"><b>3. What type of Posture should you have?</b></p>
                <input type="radio" name="q3" value="a" id="q1a"><span>Hunched</span><br/>
                <input type="radio" name="q3" value="b" id="q1b"><span>Limp</span><br/>
                <input type="radio" name="q3" value="c" id="q1c"><span>Tall and confident</span><br/>
                <input type="radio" name="q3" value="d" id="q1d"><span>Face Away</span><br/>
                <br>

                <p class="question"><b>4. How should you Speak?</b></p>
                <input type="radio" name="q4" value="a" id="q1a"><span>Quietly</span><br/>
                <input type="radio" name="q4" value="b" id="q1b"><span>Slang</span><br/>
                <input type="radio" name="q4" value="c" id="q1c"><span>Loud and Proper</span><br/>
                <input type="radio" name="q4" value="d" id="q1d"><span>Scream</span><br/>
                <br>

                <p class="question"><b>5. Do Manners Count?</b></p>
                <input type="radio" name="q5" value="a" id="q1a"><span>No</span><br/>
                <input type="radio" name="q5" value="b" id="q1b"><span>Absolutely Not</span><br/>
                <input type="radio" name="q5" value="c" id="q1c"><span>Maybe</span><br/>
                <input type="radio" name="q5" value="d" id="q1d"><span>Absolutely</span><br/>
                <br>

                <input type="submit" value="Submit" name="Submit" id="buttons">
            </form>


        </div>

        <hr>

    </div></center>


</head>
<body>

</body>
</html>