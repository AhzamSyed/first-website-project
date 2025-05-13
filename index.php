<?php

$insert = false;
if(isset($_POST['name'])){
$server= "localhost";
$username = "root";
$password = "";

$con = mysqli_connect($server,$username,$password);

if(!$con){
    die("connection to database has failed due to".mysqli_connect_errno());
}
// echo "Success connected to db";
$name = $_POST['name'];
$gender = $_POST ['gender'];
$age = $_POST ['age'];
$email = $_POST ['email'];
$phone = $_POST ['phone'];
$desc = $_POST ['desc'];

$sql = "INSERT INTO `trip`.`trip` ( `name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES ( '$name', '$age', '$age', '$email', '$phone', '$desc', current_timestamp());";
// echo $sql;

if($con -> query($sql) == true){
    // echo "successfully inserted";
    $insert = true;
}
else{
    echo "ERROR : $sql <br> $con -> error";
}
$con -> close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Welcome to Travel Form</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <img class="bg" src="img\bg.jpg" alt="">
  <div class="container">
    <h1>Welcome to Karachi US Trip Travel Form</h1>
    <p>Enter your details and submit this form to confirm your participation in the trip</p>
    <?php
    if($insert == true){
    echo "<p class='submitMsg'> Thanks  for submitting your form. We're happy to see you joining us for the US trip.</p>";
    }
    ?>
    <form action="index.php" method="post">
      <input type="text" name="name" placeholder="Enter your name" >  
      <input type="text" name="age" placeholder="Enter your age" >
      <input type="text" name="gender"  placeholder="Enter your gender" >
      <input type="text" name="email" placeholder="Enter your email" >
      <input type="text" name="phone" placeholder="Enter your phone number" >
      <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter your message"></textarea>
      <button class="btn">Submit</button>
    </form>
  </div>
  <script src="index.js"></script>
</body>
</html>