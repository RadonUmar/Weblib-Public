<?php
	session_start();
	$db = mysqli_connect("localhost", "root", "", "db"); 
	if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
		if ($_SERVER["REQUEST_METHOD"] == "POST"){
		$clicked = $_POST['submit'];
		}
		if(isset($clicked)){
			$UID = $_SESSION['uid'];
			$sql = "SELECT * FROM website_list WHERE uid = '$UID'";
if ($result=mysqli_query($db,$sql)) {
    $rowcount=mysqli_num_rows($result);
    if($rowcount == 20){
		echo "<script>alert('Maximum number of URLs is 20!')</script>";
	}
	else {
			$UID = $_SESSION['uid'];
			$UID = stripcslashes($UID);
			$UID = mysqli_real_escape_string($db, $UID);
			$URL = $_POST['URL'];
			$URL = stripcslashes($URL);
			$URL = mysqli_real_escape_string($db, $URL);
			$NAME = $_POST['name'];
			$NAME = stripcslashes($NAME);
			$NAME = mysqli_real_escape_string($db, $NAME);
			$sql = "INSERT INTO website_list (uid, URL, NAME) VALUES ('$UID', '$URL', '$NAME')";
			mysqli_query($db, $sql);
			header('location: home');
	}
		}
	}
		if (isset($_GET['del_task'])) {
			$id = $_GET['del_task'];
		
			mysqli_query($db, "DELETE FROM website_list WHERE id=".$id);
			header('location: home');
		}
	}
	else {
		header('location: login');
	}
	?>
	<!DOCTYPE html>
	<html>
	<head>
		<title>Webslibs</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Bootstrap core CSS -->
		<link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/sticky-footer-navbar/">
		<link href="https://getbootstrap.com/docs/4.0/dist/css/bootstrap.min.css" rel="stylesheet">
		<link href="https://getbootstrap.com/docs/4.0/examples/sticky-footer-navbar/sticky-footer-navbar.css" rel="stylesheet">
		<link rel="icon" href="favicon.png">
		<link href="style.css" rel="stylesheet" >
	</head>
	<body style="background-color: rgb(220, 220, 228);">
	<header>
      <!-- Fixed navbar -->
      <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="#">Webslib</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav mr-auto">
		  <li class="nav-item">
              <a class="nav-link" onclick="GDrive()">Google Drive</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" onclick="AppInt()">App integration</a>
            </li>
          </ul>
        </div>
      </nav>
    </header>
	<script>
		function GDrive() {
			alert("Save your Google Drive files as a link, store it here, then access it from anywhere!")
		}
		function AppInt() {
			alert("Store the link to your favourite apps, and open the app from here")
		}
	</script>

		<!-- Begin page content -->
		<main role="main" class="container">
		<center><img src="logo.png" width="200px"></center>
		
		<center>
		<form method="post" action="" class="input_form" autocomplete="off">
			<input type="url" name="URL" id="url" class="inp" placeholder="URL" required>
			<br>
			<br>
			<input type="text" name="name" id="name" class="inp" placeholder="Website name" required>
			<br><br>
			<button type="submit" name="submit" id="add_btn" class="add_btn">Add website</button><br><br>
			<a href="logout" class="btn btn-primary">Logout</a>
		</form>
		</center>
		<?php
		$UID = $_SESSION['uid'];
		$result= mysqli_query($db, "SELECT * FROM website_list WHERE uid='$UID'");
		echo "<center><div class='btn-group-vertical' id='content' style='width: 400px;'>";
		while($row = mysqli_fetch_array($result)){
			$a = $row['URL'];
			$b = $row['NAME'];
			$c = $row['id'];
			$favicon = $a . "/favicon.ico";
			echo "<button type='button' style='margin: 0 auto; border-style: none;' class='btn btn-outline-dark'><a style='color: white; background-color: #3a3b3c;' class='btn btn-primary' href='$a' target='_blank'>$b </a><a href=home.php?del_task=$c><img id='img' src='https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTRIlYKmHhvCaQHkvcgwXb9a0NcUlMayuADUw&usqp=CAU' style='height: 20px; width: 20px; position: absolute; right: 30px; top: 15px;'></a></button>"; 
			echo "<div style='display: inline;'>";
			#echo "<a href='$a' style='width: 300px; background-color: #3a3b3c' target='_blank' class='btn btn-primary'>$b</a>";
			#echo "<a href=home.php?del_task=$c><img id='img' src='https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTRIlYKmHhvCaQHkvcgwXb9a0NcUlMayuADUw&usqp=CAU' style='height: 24px; width: 24px; position: absolute; right: 25px'></a></button>";
			echo "</div><br>";
		}
		echo "</div>"
		?>
		<center>
			<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-4187834000182270"
     crossorigin="anonymous"></script>
<!-- ad -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-4187834000182270"
     data-ad-slot="3295916755"
     data-ad-format="auto"
     data-full-width-responsive="true"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>
		
	</center>
	</main>
	<footer class="footer">
      <div class="container">
        <span class="text-muted" style="font-size: large;">&copy Webslib 2021</span>
      </div>
    </footer>

	<!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="https://getbootstrap.com/docs/4.0/assets/js/vendor/popper.min.js"></script>
    <script src="https://getbootstrap.com/docs/4.0/dist/js/bootstrap.min.js"></script>
	<style>
	@media only screen and (max-width: 600px) {
		.btn-group-vertical {
    		max-width: 250px;
  		}
		.btn-primary {
			max-width: 200px;
		}
}
#img {
	width:25px;
  height:25px;
  position: absolute;
  right: 25px;
  object-fit:cover;
  border-radius:50%;
}
.btn-outline-dark:hover {
	background-color: white;
}
	</style>
	</body>
	</html>
