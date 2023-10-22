<?php
session_start();
$print_err = " ";
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
  header('location: home');
}
else {
if ($_SERVER["REQUEST_METHOD"] == "POST"){
$username = $_POST['username'];
$password_1 = $_POST['password'];
$confirm_password = $_POST['confirm_password'];
$errors = 0;

$con = mysqli_connect('localhost', 'root', '', 'db');
$username = mysqli_real_escape_string($con, $username);
$password_1 = mysqli_real_escape_string($con, $password_1);
$confirm_password = mysqli_real_escape_string($con, $confirm_password);

  if ($password_1 != $confirm_password) {
	$errors++;
   }
  if($errors==0){
      $password_insert = md5($password_1);
      $sql = "INSERT INTO user_info (username, password)
              VALUES ('$username', '$password_insert')";
      mysqli_query($con, $sql);
  	$_SESSION['username'] = $username;
        $_SESSION['loggedin'] = true;
	$sql2 = "SELECT id FROM user_info WHERE username = '$username' AND password = '$password_insert'";
	$result2 = mysqli_query($con, $sql2);
	if(mysqli_num_rows($result2) > 0 ){
	$row = mysqli_fetch_assoc($result2); 
	$_SESSION['uid'] = $row['id'];
	}
  	header('location: login');
  }
  else{
      $print_err = "Passwords do not match";
  }
}
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="favicon.png">
    <!-- Bootstrap core CSS -->
    <link href="https://getbootstrap.com/docs/4.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="https://getbootstrap.com/docs/4.0/examples/floating-labels/floating-labels.css" rel="stylesheet">
</head>
<body>
<form class="form-signin" action="" method="post">
      <div class="text-center mb-4">
        <a href="index"><img class="mb-4" href="index" src="download.png" alt="" width="210" height="190" style="width:100px;
  height:100px;
  object-fit:cover;
  border-radius:50%;"></a>
        <h1 class="h3 mb-3 font-weight-normal">Signup to Webslib</h1>
        <?php echo "<h style='font-size: 17px'><center>$print_err</center></h>"; ?>
      </div>

      <div class="form-label-group">
        <input type="text" name="username" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
        <label for="inputEmail">Username</label>
      </div>

      <div class="form-label-group">
        <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
        <label for="inputPassword">Password</label>
      </div>

      <div class="form-label-group">
        <input type="password" name="confirm_password" id="inputPassword" class="form-control" placeholder="Confirm Password" required autofocus>
        <label for="inputPassword">Confirm Password</label>
      </div>

      <button class="btn btn-lg btn-primary btn-block" type="submit">Sign up</button>
      <br>
      <center><p>Already a member?<a href="login"> Login now.</a></p></center>
      <p class="mt-5 mb-3 text-muted text-center">&copy; Webslib</p>
    </form>

</body>
</html>
