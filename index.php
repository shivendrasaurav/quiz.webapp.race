<?php
//index.php

$error = '';
$name = '';
$email = '';
$contact = '';
$organisation = '';
$designation = '';
$score = '';

function clean_text($string)
{
 $string = trim($string);
 $string = stripslashes($string);
 $string = htmlspecialchars($string);
 return $string;
}

if(isset($_POST["submit"]))
{
    if(empty($_POST["name"]))
    {
     $error .= '<p><label class="alert">Please Enter your Name</label></p>';
    }
    else
    {
     $name = clean_text($_POST["name"]);
     if(!preg_match("/^[a-zA-Z ]*$/",$name))
     {
      $error .= '<p><label class="alert">Only letters and white space allowed</label></p>';
     }
    }
 if(empty($_POST["email"]))
 {
  $error .= '<p><label class="alert">Please Enter your Email</label></p>';
 }
 else
 {
  $email = clean_text($_POST["email"]);
  if(!filter_var($email, FILTER_VALIDATE_EMAIL))
  {
   $error .= '<p><label class="alert">Invalid email format</label></p>';
  }
 }
 if(empty($_POST["contact"]))
 {
  $error .= '<p><label class="alert">Contact number is required</label></p>';
 }
 else
 {
  $contact = clean_text($_POST["contact"]);
 }

 if(empty($_POST["score"]))
 {
  $error .= '<p><label class="alert">Answer atleast one question</label></p>';
 }
 else
 {
  $score = clean_text($_POST["score"]);
 }

 if(empty($_POST["organisation"]))
 {
  $error .= '<p><label class="alert">Please enter your Organisation</label></p>';
 }
 else
 {
  $organisation = clean_text($_POST["organisation"]);
 }
 if(empty($_POST["designation"]))
 {
  $error .= '<p><label class="alert">Please enter your Designation</label></p>';
 }
 else
 {
  $designation = clean_text($_POST["designation"]);
 }

 if($error == '')
 {
  $file_open = fopen("contact_data.csv", "a");
  $no_rows = count(file("contact_data.csv"));
  if($no_rows > 1)
  {
   $no_rows = ($no_rows - 1) + 1;
  }
  $form_data = array(
   'sr_no'  => $no_rows,
   'name'  => $name,
   'email'  => $email,
   'contact' => $contact,
   'organisation' => $organisation,
   'designation' => $designation,
   'score' => $score
  );
  fputcsv($file_open, $form_data);
  $error = '<h3 class="alert">Avoid re-entry, as it will lead to disqualification</h3>';
  $name = '';
  $email = '';
  $contact = '';
  $organisation = '';
  $designation = '';
  $score = '';
 }
}

?>
<!DOCTYPE html>
<html>
 <head>
 <link rel="stylesheet" href="https://shivendrasaurav.github.io/race360/mars.css" />
 <style>
    .square{width:30px; height:30px; margin:5px;}
    .pad{margin:5px; width:200px; height:60px;}
    .tab{text-align:center; padding-top:12.5px;}
    .radiomark{width:28px; height:28px; padding-left:8px; padding-top:4px;}
 </style>
<script>
    function hidecf(){
        document.getElementById("contactform").style.display = "none";
        document.getElementById("quiz").style.display = "block"; 
    }
    function hidequiz(){
        document.getElementById("contactform").style.display = "block";
        document.getElementById("quiz").style.display = "none"; 
    }
</script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Quiz RACE</title>
  <script src="quiz.js"></script>
 </head>
<body onload="hidequiz();">
    <section id="body" align=center>
        <div id="contactform">
            <img src="revalogo.png" style="width:250px;"/>
            <h1>REVA Academy for Corporate Excellence</h1>
            <h2>Go Green and Win</h2>
            <h3><?php echo $error; ?></h3>
                <form method="post" id="om">
                    <input type="text" name="name" placeholder="Name" class="form-control" value="<?php echo $name; ?>" />
                    <br><br>
                    <input type="text" name="email" placeholder="Email Address" class="form-control" value="<?php echo $email; ?>" />
                    <br><br>
                    <input type="text" name="contact" placeholder="Contact Number" class="form-control" value="<?php echo $contact; ?>" />
                    <br><br>
                    <input type="text" name="organisation" placeholder="Organisation" class="form-control" value="<?php echo $organisation; ?>" />
                    <br><br>
                    <input type="text" name="designation" placeholder="Designation" class="form-control" value="<?php echo $designation; ?>" />
                    <br><br>
                    <div class="tab primary center" onclick="hidecf(); showone();">Proceed</div>
        </div>
        <div id="quiz">
        <div class="col large8 quiz left" align=left>
        <div id="one">
                <h3>Q1. What is the minimum number of weighing operations do you need to weight 31 kg of
                        Rice if you have one kg of weight stone?</h3>
                <div class="check">
                        <input type="radio" name="qone" value="5" />
                        <div class="radiomark"></div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;5
                </div><br>
                <div class="check">
                        <input type="radio" name="qone" value="3" />
                        <div class="radiomark"></div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3
                </div><br>
                <div class="check">
                        <input type="radio" name="qone" value="7" />
                        <div class="radiomark"></div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;7
                </div><br>
                <div class="check">
                        <input type="radio" name="qone" value="9" />
                        <div class="radiomark"></div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;9
                </div><br>
                <div class="primary tab right" onclick="showtwo()">Next</div>
        </div>

        <div id="two">
                <h3>Q2. A man has a certain number of small boxes to pack into parcels. If he packs 3, 4, 5 or
                        6 in a parcel, he is left with one over; if he packs 7 in a parcel, none is left over. What
                        is the number of boxes, he may have to pack?</h3>
                <div class="check">&nbsp;&nbsp;
                        <input type="radio" name="qtwo" value="Programming" />
                        <div class="radiomark"></div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;106
                </div><br>
                <div class="check">&nbsp;&nbsp;
                        <input type="radio" name="qtwo" value="Scripting" />
                        <div class="radiomark"></div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;309
                </div><br>
                <div class="check">&nbsp;&nbsp;
                        <input type="radio" name="qtwo" value="301" />
                        <div class="radiomark"></div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;301
                </div><br>
                <div class="check">&nbsp;&nbsp;
                        <input type="radio" name="qtwo" value="None" />
                        <div class="radiomark"></div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;113
                </div><br>
                <div class="primary tab left" onclick="showone()">Prev</div>
                <div class="primary tab right" onclick="showthree()">Next</div>
        </div>

        <div id="three">
                <h3>Q3. What is the smallest number of ducks that could swim in this formation - two ducks in
                        front of a duck, two ducks behind a duck and a duck between two ducks? </h3>
                <div class="check">&nbsp;&nbsp;
                        <input type="radio" name="qthree" value="Programming" />
                        <div class="radiomark"></div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;9
                </div><br>
                <div class="check">&nbsp;&nbsp;
                        <input type="radio" name="qthree" value="Scripting" />
                        <div class="radiomark"></div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;5
                </div><br>
                <div class="check">&nbsp;&nbsp;
                        <input type="radio" name="qthree" value="Assembly" />
                        <div class="radiomark"></div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;7
                </div><br>
                <div class="check">&nbsp;&nbsp;
                        <input type="radio" name="qthree" value="3" />
                        <div class="radiomark"></div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3
                </div><br>
                <div class="primary tab left" onclick="showtwo()">Prev</div>
                <div class="primary tab right" onclick="showfour()">Next</div>
        </div>

        <div id="four">
                <h3>Q4. If 200 cats kill 200 mice in 200 days, then 8 cats would kill 8 mice in how many days?</h3>
                <div class="check">&nbsp;&nbsp;
                        <input type="radio" name="qfour" value="Programming" />
                        <div class="radiomark"></div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;8 Days
                </div><br>
                <div class="check">&nbsp;&nbsp;
                        <input type="radio" name="qfour" value="Scripting" />
                        <div class="radiomark"></div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;80 Days
                </div><br>
                <div class="check">&nbsp;&nbsp;
                        <input type="radio" name="qfour" value="200" />
                        <div class="radiomark"></div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;200 Days
                </div><br>
                <div class="check">&nbsp;&nbsp;
                        <input type="radio" name="qfour" value="None" />
                        <div class="radiomark"></div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;192 Days
                </div><br>
                <div class="primary tab left" onclick="showthree();">Prev</div>
                <div class="primary tab right" onclick="showfive()">Next</div>
        </div>

        <div id="five">
                <h3>Q5. In an office, if 1 is absent rest of people can be divided into 6 equal parts and if 2 are
                        absent rest of them are divided into 7 equal parts, how many employees are there in
                        the office?</h3>
                <div class="check">&nbsp;&nbsp;
                        <input type="radio" name="qfive" value="-9" />
                        <div class="radiomark"></div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;28
                </div><br>
                <div class="check">&nbsp;&nbsp;
                        <input type="radio" name="qfive" value="37" />
                        <div class="radiomark"></div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;37
                </div><br>
                <div class="check">&nbsp;&nbsp;
                        <input type="radio" name="qfive" value="-27" />
                        <div class="radiomark"></div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;57
                </div><br>
                <div class="check">&nbsp;&nbsp;
                        <input type="radio" name="qfive" value="9" />
                        <div class="radiomark"></div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;19
                </div><br>
                <div class="primary tab left" onclick="showfour();">Prev</div>
                <div class="primary tab right" onclick="showsubmit();">Submit</div>
        </div>

        <div id="submit">
                
            <input type="text" name="score" id="b" style="display : none;">
                <h2>Are You Sure You Want To Submit? You Can't Undo This Step</h2>
                <div class="row"><div class="tab alert large pad" onclick="showfive();">No, Go Back</div>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <div class="tab success large pad" onclick="qone(); qtwo(); qthree(); qfour(); qfive(); result(); showresult(); hidenav();">Yes Submit</div></div>
        </div>

        <div id="result">
            <h2>Here Is Your Result : </h2>
            <h3 id="score"></h3>
            <input id="finish" type="submit" name="submit" class="tab primary large pad" value="Finish">
        </div>

</div>

                       <br><br>
                </form>
        </div>
    </section>
</body>
</html>

<!--    <div class="col large4 quiz right box" id="nav">
            <h3>Navigation : </h3>
            <div class="square secondary" onclick="showone();">Q1</div>
            <div class="square secondary" onclick="showtwo();">Q2</div>
            <div class="square secondary" onclick="showthree();">Q3</div><br>
            <div class="square secondary" onclick="showfour();">Q4</div>
            <div class="square secondary" onclick="showfive();">Q5</div><br>
            <div class="tab secondary" style="margin:10px;" onclick="showsubmit();">Submit</div>
            <br><br><br>
    </div>
                    <input class="tab primary" type="submit" name="submit" class="btn btn-info" value="Check Results" />

<input type="text" name="score" placeholder="Score" class="form-control" value="<?php echo $score; ?>" />
                    <br><br>
                    
                     if(empty($_POST["score"]))
 {
  $error .= '<p><label class="alert">Score Is Required</label></p>';
 }
 else
 {
  $score = clean_text($_POST["score"]);
 }
-->