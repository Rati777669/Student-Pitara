
<?php
include 'conn.php';
if(isset($_POST['username']))
{
  $username=$_POST['username'];
  $email=$_POST['email'];
  $password=$_POST['password'];
  if (isset($_POST['username'])) {
    

if (!empty($username) || !empty($email) || !empty($phone) || !empty($password)) {
  if (isset($_POST['password']) && $_POST['password'] !== $_POST['conpassword']) {
    echo "<script type='text/javascript'>alert('Admin Registerd not'); window.location.href = 'register.php';</script>";
  } 
  else{
    $query = @mysqli_query($con, "SELECT * FROM user_details WHERE email='$email' LIMIT 1;");
    if (mysqli_num_rows($query) > 0) {
      $row = mysqli_fetch_assoc($query);
      if ($email == isset($row['email'])) {
        echo "<script type='text/javascript'>alert('Email already exists');</script>";
      }
    } else {
      $ins = mysqli_query($con, "INSERT INTO user_details(adminname,email,password) values('$username','$email','$password')");
      if ($ins > 0) {
        echo "<script type='text/javascript'>alert('You are successfully registered.'); window.location.href = 'login.php';</script>";
      } else {
        echo "An error in database query";
      }
    }
} 
}else {
  echo "All fields are required";
}
}}
?>