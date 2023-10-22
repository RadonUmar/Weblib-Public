<?php
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    header('location: home');
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.png">

    <title>Webslibs</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/album/">

    <!-- Bootstrap core CSS -->
    <link href="https://getbootstrap.com/docs/4.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="https://getbootstrap.com/docs/4.0/examples/album/album.css" rel="stylesheet">
  </head>

  <body>

    <header>
      
      </div>
      <div class="navbar navbar-dark bg-dark box-shadow">
        <div class="container d-flex justify-content-between">
          <a href="#" class="navbar-brand d-flex align-items-center">
            
            <strong>Webslib</strong>
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
            
          </button>
          <nav class="navbar navbar-light bg-light">
  <form class="form-inline" action="login" method="post">
    <div class="input-group">
      <div class="input-group-prepend">
        <span class="input-group-text" id="basic-addon1">@</span>
      </div>
      <form action="login.php" method="post">
      <input type="text" name="username" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
      <input type="password" name="password" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1">
      <button class="btn" type="submit">Login</button>
      </form>
    </div>
  </form>
</nav>
        </div>
      </div>
    </header>

    <main role="main">

      <section class="jumbotron text-center">
        <div class="container" style="">
        <img src="download.png" style="margin: -2%; overflow:hidden;" height="100px">
          <h1 class="jumbotron-heading" style="color: blue;">Webslib</h1>
          <p class="lead text-muted">A simple yet powerful free online tool to store all the websites you like and access them from anywhere.</p>
          <p>
            <a href="login" class="btn btn-primary my-2">Login</a>
            <a href="signup" class="btn btn-secondary my-2">Signup</a>
          </p>
        </div>
      </section>

      <div class="album py-5 bg-light">
        <div class="container">

          <div class="row">
            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <img class="card-img-top" src="logo.png" alt="Card image cap" height="300px" width="720px">
                <div class="card-body">
                  <p class="card-text">Webslibs is a free online tool where you can bookmark websites you like and access them from anywhere.</p>
                  <div class="d-flex justify-content-between align-items-center">
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <img class="card-img-top" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSVCB0rzdrIskowMFVo8gs9Zl4BzJ-pGyEo8A&usqp=CAU" alt="Card image cap" height="300px">
                <div class="card-body">
                  <p class="card-text">Google drive - First, create a link to your documents and store it on webslib. Now, you can access them from anywhere.</p>
                  <div class="d-flex justify-content-between align-items-center">
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <img class="card-img-top" src="https://icon-library.com/images/lock-icon-transparent-background/lock-icon-transparent-background-10.jpg" alt="Card image cap" height="300px">
                <div class="card-body">
                  <p class="card-text">Security - Webslib is a very secure platform, using password hashing and storing your links securely</p>
                  <div class="d-flex justify-content-between align-items-center">
                  </div>
                </div>
              </div>
            </div>

    </main>

    <footer class="text-muted">
      <div class="container">
        <p class="float-right">
          <a href="#">Back to top</a>
        </p>
        <p>Webslibs &copy; 2021</p>
        <p>Directories <br><strong><a href="login">Login</a></strong><br><strong><a href="signup">Signup</a></strong>
      </div>
    </footer>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../assets/js/vendor/popper.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <script src="../../assets/js/vendor/holder.min.js"></script>
  </body>
</html>

