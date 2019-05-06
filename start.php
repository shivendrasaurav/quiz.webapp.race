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
     $error .= '<p><label class="text-danger">Please Enter your Designation</label></p>';
    }
    else
    {
     $name = clean_text($_POST["name"]);
     if(!preg_match("/^[a-zA-Z ]*$/",$name))
     {
      $error .= '<p><label class="text-danger">Only letters and white space allowed</label></p>';
     }
    }
 if(empty($_POST["email"]))
 {
  $error .= '<p><label class="text-danger">Please Enter your Email</label></p>';
 }
 else
 {
  $email = clean_text($_POST["email"]);
  if(!filter_var($email, FILTER_VALIDATE_EMAIL))
  {
   $error .= '<p><label class="text-danger">Invalid email format</label></p>';
  }
 }
 if(empty($_POST["contact"]))
 {
  $error .= '<p><label class="text-danger">Contact number is required</label></p>';
 }
 else
 {
  $contact = clean_text($_POST["contact"]);
 }
 if(empty($_POST["score"]))
 {
  $error .= '<p><label class="text-danger">Contact number is required</label></p>';
 }
 else
 {
  $score = clean_text($_POST["score"]);
 }
 if(empty($_POST["organisation"]))
 {
  $error .= '<p><label class="text-danger">Please enter your Organisation</label></p>';
 }
 else
 {
  $organisation = clean_text($_POST["organisation"]);
 }
 if(empty($_POST["designation"]))
 {
  $error .= '<p><label class="text-danger">Please enter your Organisation</label></p>';
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
  $error = '<label class="text-success">Thank you for contacting us</label>';
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
  <title>How to Store Form data in CSV File using PHP</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://shivendrasaurav.github.io/MARS/mars.css" />
 </head>
 <body>
  <br />
  <div class="container">
   <h2 align="center">How to Store Form data in CSV File using PHP</h2>
   <br />
   <div class="col-md-6" style="margin:0 auto; float:none;">
    <form method="post">
     <h3 align="center">Contact Form</h3>
     <br />
     <?php echo $error; ?>
     <div class="form-group">
      <label>Enter Name</label>
      <input type="text" name="name" placeholder="Enter Name" class="form-control" value="<?php echo $name; ?>" />
     </div>
     <div class="form-group">
      <label>Enter Email</label>
      <input type="text" name="email" class="form-control" placeholder="Enter Email" value="<?php echo $email; ?>" />
     </div>
     <div class="form-group">
      <label>Enter contact</label>
      <input max=11111111111 min=9999999999 type="number" name="contact" class="form-control" placeholder="Enter contact" value="<?php echo $contact; ?>" />
     </div>
     <label>Enter Organisation</label>
      <input type="text" name="organisation" placeholder="Enter Organisation Name" class="form-control" value="<?php echo $organisation; ?>" />
     </div>
     <label>Enter Designation</label>
      <input type="text" name="designation" placeholder="Enter Your Designation" class="form-control" value="<?php echo $designation; ?>" />
     </div>
     <label>Enter Score</label>
      <input type="text" name="score" placeholder="Enter Score" class="form-control" value="<?php echo $score; ?>" />
     </div>

     <div class="form-group" align="center">
      <input type="submit" name="submit" class="btn btn-info" value="Submit" />
     </div>
    </form>
   </div>
  </div>
 </body>
</html>