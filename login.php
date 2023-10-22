<?php
session_start();
$error = " ";
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    header('location: home');
}
else {
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = $_POST['username'];
    $password = $_POST['password'];
    //Username/Password incorrect error
    $con = mysqli_connect('localhost', 'root', '', 'db');

    //mysql injection prevention
    $username = stripcslashes($username);
    $password = stripcslashes($password);
    $username = mysqli_real_escape_string($con, $username);
    $password = mysqli_real_escape_string($con, $password);
    $password = md5($password);

    $sql = "SELECT * FROM user_info WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $count = mysqli_num_rows($result);

    if($count==1){
       session_start();
       $_SESSION['loggedin'] = true;
       $_SESSION['uid'] = $row['id'];
       header('location: home');
}  
    else{
        $error .= "Username or Password is incorrect";
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
    <!-- Bootstrap core CSS -->
    <link href="https://getbootstrap.com/docs/4.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="https://getbootstrap.com/docs/4.0/examples/floating-labels/floating-labels.css" rel="stylesheet">
    <link rel="icon" href="favicon.png">
</head>
<body>

<form class="form-signin" action="login.php" method="post">
      <div class="text-center mb-4">
       <a href="index"><img class="mb-4" src="download.png" alt="" width="100" height="80" style="width:100px;
  height:100px;
  object-fit:cover;
  border-radius:50%;"></a>
        <h1 class="h3 mb-3 font-weight-normal">Login to Webslibs</h1>
        <?php echo "<p>$error</p>"; ?>
      </div>

      <div class="form-label-group">
        <input type="text" name="username" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
        <label for="inputEmail">Username</label>
      </div>

      <div class="form-label-group">
        <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
        <label for="inputPassword">Password</label>
      </div>

      <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
      <br>
      <center><p>Not yet a member?<a href="signup"> Signup now.</a></p></center>
      <p class="mt-5 mb-3 text-muted text-center">&copy; 2017-2018</p>
    </form>

</body>
</html>
