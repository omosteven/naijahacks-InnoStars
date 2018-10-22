<?php
if (!isset($_GET['career'])) {
  header('Location: profile.php');
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>DevMinds</title>

    <!-- preloader css -->
    <link rel="stylesheet" href="css/loader.css">
    <!-- Bootstrap core CSS -->
    <link href="css/vendor/bootstrap.min.css" rel="stylesheet">

    <!-- Overrides CSS -->
    <link href="css/overrides.css" rel="stylesheet">
    <!-- Custom styles for this page -->
    <link href="css/career.css" rel="stylesheet">

  </head>

  <body>
    <nav class="navbar navbar-dark bg-dark">
      <div class="container">
        <a class="navbar-brand" href="#">Devminds</a>
        <button class="navbar-toggler collapsed" type="button" data-toggle="overlayNav" data-target="#mainOverlayNav" aria-controls="mainOverlayNav" aria-expanded="false" aria-label="Toggle navigation">
          <span></span>
          <span></span>
          <span></span>
        </button>
      </div>
    </nav>
    <div class="overlay-navigation-wrapper" id="mainOverlayNav" role="navigation">
      <div class="overlay-navigation-content">
          <button class="overlay-navigation-close">
            <span></span>
            <span></span>
          </button>
          <a href="profile.php">Profile</a> <span class="sr-only">(active)</span></li>
      </div>
      <div class="overlay-navigation-bottom-content">
        <div class="row no-gutters">
          <div class="col" style="overflow: hidden"><a href="login.html" class="btn btn-lg btn-block btn-secondary rounded-0">Logout</a></div>
        </div>
      </div>
    </div>
    <div class="container my-3">
      <div class="row">
        <div class="col-12 col-lg-4 mb-3 mb-lg-0">
          <div class="card">
            <img class="card-img-top" src="img/cybersecurity.jpeg" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">Cyber Security Science</h5>
              <h6 class="card-subtitle mb-2 text-muted">Software and Technology</h6>
              <p class="card-text">
                Break into computers just like in the movies, except in real life.
                You'll be protecting yourself and other people from the bad guys by making all the firewalls stronger!
                Free GUIs included.
              </p>
            </div>
            <p class="px-3">Suggested based on your likes for:</p>
            <ul class="list-group list-group-flush">
              <li class="list-group-item">Mathematics</li>
              <li class="list-group-item">Analytical Thinking</li>
              <li class="list-group-item">Fighting/Defense</li>
            </ul>
            <div class="card-body text-right">
              <a href="#" class="text-danger mr-2">Dislike suggestion?</a>
              <a href="#" class="btn btn-primary">Choose career</a>
            </div>            
          </div>
        </div>
        <div class="col-12 col-lg-4 mb-3 mb-lg-0">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Suggested Mentors</h5>
              <h6 class="card-subtitle mb-2 text-muted">Get to know the badass people already in the field!</h6>
            </div>
          </div>
        </div>
        <div class="col-12 col-lg-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Fellow students</h5>
              <h6 class="card-subtitle mb-2 text-muted">These guys are similar to you and chose this as their career.</h6>
            </div>
          </div>
        </div>
      </div>
    <script src="js/vendor/jquery-3.3.1.min.js"></script>
    <script src="js/vendor/bootstrap.bundle.min.js"></script>
    <script>$(window).on('DOMContentLoaded', function () { $('#loader').addClass('leave').one('transitionend', function () { $(this).detach(); }) })</script>
    <script src="js/navbar.js"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.4.1/js/all.js" integrity="sha384-L469/ELG4Bg9sDQbl0hvjMq8pOcqFgkSpwhwnslzvVVGpDjYJ6wJJyYjvG3u8XW7" crossorigin="anonymous"></script>
  </body>
</html>