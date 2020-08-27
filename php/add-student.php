<?php
//index.php

$error = '';
$id = '';
$name = '';
$email = '';
$gender = '';
$dob = '';
$city = '';
$state = '';
$qual = '';
$stream = '';

function clean_text($string)
{
 $string = trim($string);
 $string = stripslashes($string);
 $string = htmlspecialchars($string);
 return $string;
}

if(isset($_POST["submit"]))
{
 if(empty($_POST["id"]))
 {
  $error .= '<p><label class="text-danger">Student ID is required</label></p>';
 }
 else
 {
  $id = clean_text($_POST["id"]);
 }

 if(empty($_POST["name"]))
 {
  $error .= '<p><label class="text-danger">Please Enter your Name</label></p>';
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
 if(empty($_POST["gender"]))
 {
  $error .= '<p><label class="text-danger">Gender is required</label></p>';
 }
 else
 {
  $gender = clean_text($_POST["gender"]);
 } 
 if(empty($_POST["city"]))
 {
  $error .= '<p><label class="text-danger">City is required</label></p>';
 }
 else
 {
  $city = clean_text($_POST["city"]);
 }
 if(empty($_POST["state"]))
 {
  $error .= '<p><label class="text-danger">State is required</label></p>';
 }
 else
 {
  $state = clean_text($_POST["state"]);
 }
 if(empty($_POST["qual"]))
 {
  $error .= '<p><label class="text-danger">Qualification is required</label></p>';
 }
 else
 {
  $qual = clean_text($_POST["qual"]);
 }
 if(empty($_POST["stream"]))
 {
  $error .= '<p><label class="text-danger">Stream is required</label></p>';
 }
 else
 {
  $stream = clean_text($_POST["stream"]);
 }

 if($error == '')
 {
  $file_open = fopen("students.csv", "a");
  $form_data = array(
   'id' => $id,
   'name'  => $name,
   'email'  => $email,
   'gender' => $gender,
   'city' => $city,
   'state' => $state,
   'qual' => $qual, 
   'stream' => $stream
  );
  fputcsv($file_open, $form_data);
  $error = '<label class="text-success">Successfully added details.</label>';
  $id = '';  
  $name = '';
  $email = '';
  $gender = '';
  $dob = '';  
  $city = '';
  $state = '';
  $qual = '';
  $stream = '';
 }
}

?>
<!DOCTYPE html>
<html>
 <head>
  <title>Form Filling</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 </head>
 <body>
  <br />
  <div class="container">
    <div class="col-md-6" style="margin:0 auto; float:none;">
    <form method="post">
     <h3 align="center">Contact Form</h3>
     <br />
     <?php echo $error; ?>
	<div class="form-group">
      <label>Student ID</label>
      <input type="text" name="id" placeholder="Enter Student ID" class="form-control" value="<?php echo $id; ?>" />
     </div>

     <div class="form-group">
      <label>Student Name</label>
      <input type="text" name="name" placeholder="Enter Student Name" class="form-control" value="<?php echo $name; ?>" />
     </div>
     <div class="form-group">
      <label>Email</label>
      <input type="text" name="email" class="form-control" placeholder="Enter Email" value="<?php echo $email; ?>" />
     </div>
<div class="form-group">
<label>Gender</label>
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male
</div>
     <div class="form-group">
<label>Date Of Birth</label>
  <select size="1" name="dob" value="Year">
   <option>Year</option>
   <option>1980</option>
   <option>1981</option>
   <option>1982</option>
   <option>1982</option>
   <option>1983</option>
   <option>1984</option>
   <option>1985</option>
   <option>1986</option>
   <option>1987</option>
   <option>1988</option>
   <option>1989</option>
   <option>1990</option>
   <option>1991</option>
   <option>1992</option>
   <option>1993</option>
   <option>1994</option>
   <option>1995</option>
   <option>1996</option>
   <option>1997</option>
   <option>1998</option>
   <option>1999</option>
   <option>2000</option>
   <option>2001</option>
   <option>2002</option>
   <option>2003</option>
   <option>2004</option>
   <option>2005</option>
   <option>2006</option>
   <option>2007</option>
   <option>2008</option>
   <option>2009</option>
   <option>2010</option>
</select>
  <select size="1" name="dob" value="month">  
  <option>month</option>
   <option>jan</option>
   <option>feb</option>
   <option>mar</option>
   <option>apr</option>
   <option>may</option>
   <option>june</option>
   <option>july</option>
   <option>Aug</option>
   <option>Sep</option>
   <option>Oct</option>
   <option>Nov</option>
   <option>Dec</option>
</select>
<select size="1" name="dob" value="date">
   <option>date</option>
   <option>1</option>
   <option>2</option>
   <option>3</option>
   <option>4</option>
   <option>5</option>
   <option>6</option>
   <option>7</option>
   <option>8</option>
   <option>9</option>
   <option>10</option>
   <option>11</option>
   <option>12</option>
   <option>13</option>
   <option>14</option>
   <option>15</option>
   <option>16</option>
   <option>17</option>
   <option>18</option>
   <option>19</option>
   <option>20</option>
   <option>21</option>
   <option>22</option>
   <option>23</option>
   <option>24</option>
   <option>25</option>
   <option>26</option>
   <option>27</option>
   <option>28</option>
   <option>29</option>
   <option>30</option>
   <option>31</option>
</select>
</div>
	<div class="form-group">
      <label>Enter City</label>
      <input type="text" name="city" class="form-control" placeholder="Enter City" value="<?php echo $city; ?>" />
     </div>
     <div class="form-group">
      <label>Enter State</label>
      <textarea name="state" class="form-control" placeholder="Enter State"><?php echo $state; ?></textarea>
     </div>
<div class="form-group">
      <label>Enter Qualification</label>
      <input type="text" name="qual" placeholder="Enter Qualification" class="form-control" value="<?php echo $qual; ?>" />
     </div>
<div class="form-group">
      <label>Enter Stream</label>
      <input type="text" name="stream" placeholder="Enter Stream" class="form-control" value="<?php echo $stream; ?>" />
     </div>

     <div class="form-group" align="center">
      <input type="submit" name="submit" class="btn btn-info" value="Submit" />
     </div>
    </form>
   </div>
  </div>
 </body>
</html>