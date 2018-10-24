<?php
session_name('devminds');
session_start();
if (!isset($_GET['career'])) {
  header('Location: profile.php');
}
require_once('mustlogin.php');
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
    <!-- Animations -->
    <link href="css/animations.css" rel="stylesheet">

  </head>

  <body>
    <?php require_once('sidebar.php'); ?>
    <div class="container my-3">
      <div class="row">
        <div class="col-12 col-lg-4 mb-3 mb-lg-0">
          <div class="card appear" id="careerInfoCard">
            <img class="card-img-top" src="img/cybersecurity.jpeg" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">Cyber Security Science</h5>
              <h6 class="card-subtitle mb-2 text-muted">Software and Technology</h6>
              <p class="card-text career-short-desc">
                Break into computers just like in the movies, except in real life.
                You'll be protecting yourself and other people from the bad guys by making all the firewalls stronger!
                Free GUIs included.
              </p>
            </div>
            <div class="card-suggestion-area">
              <p class="px-3">Suggested based on your likes for:</p>
              <ul class="list-group list-group-flush">
                <li class="list-group-item">Mathematics</li>
                <li class="list-group-item">Analytical Thinking</li>
                <li class="list-group-item">Browsing</li>
                <li class="list-group-item">Fighting/Defense</li>
              </ul>
            </div>
            <div class="card-body text-right career-selection-buttons">
              <a href="#" class="text-danger mr-2">Dislike suggestion?</a>
              <a href="timeline.php" class="btn btn-primary"><i class="fas fa-heart"></i> Choose career</a>
            </div>
          </div>
        </div>
        <div class="col-12 col-lg-8 mb-3 mb-lg-0">
          <div class="card appear">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="highlights-tab" data-toggle="tab" href="#highlights" role="tab" aria-controls="highlights" aria-selected="true">Highlights</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="opportunities-tab" data-toggle="tab" href="#opportunities" role="tab" aria-controls="opportunities" aria-selected="false">Opportunities</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="mentors-tab" data-toggle="tab" href="#mentors" role="tab" aria-controls="mentors" aria-selected="false">Mentorship</a>
              </li>
            </ul>
            <div class="tab-content" id="myTabContent">
              <div class="tab-pane fade show active appear" id="highlights" role="tabpanel" aria-labelledby="highlights-tab">
                <div class="card-body">
                  <h5 class="card-title">Career Highlights</h5>
                  <h6 class="card-subtitle mb-2 text-muted">What kind of ride are you in for?</h6>
                </div>
                <div class="list-group list-group-flush appear" id="careerHighlights">
                  <li class="list-group-item d-flex flex-column w-100">
                    <h5>Deep dives into computers and what they are.</h5>
                    <p>You'll go beyond the surface of what a computer is and go down to the awesome nitty gritty details.</p>
                  </li>
                  <li class="list-group-item d-flex flex-column w-100">
                    <h5>Studying what's behind the internet.</h5>
                    <p>Cat videos and Emmanuella are the best, but how did those videos get over to you?</p>
                  </li>
                  <li class="list-group-item d-flex flex-column w-100">
                    <h5>Dangers lurking everywhere</h5>
                    <p>Everything might seem fine and dandy on the surface, but the rabbit hole goes deep. Who's watching?</p>
                  </li>
                  <li class="list-group-item d-flex flex-column w-100">
                    <h5>Defense and Attack</h5>
                    <p>Save yourself from dangers and attack first, to eliminate dangers before they hit you, and your friends.</p>
                  </li>
                </div>
              </div>
              <div class="tab-pane fade" id="opportunities" role="tabpanel" aria-labelledby="opportunities-tab">
                <div class="card-body">
                  <h5 class="card-title">Career Opportunities</h5>
                  <h6 class="card-subtitle mb-2 text-muted">Which kinda awesome jobs can you get / create if you go for this career?</h6>
                </div>
                <div class="list-group list-group-flush appear">
                  <div class="list-group-item d-flex flex-column w-100">
                    <h5>Ethical Hacker</h5>
                    <p>Be the coolest one there is, protect your company's servers and software from the bad guys.</p>
                  </div>
                  <div class="list-group-item d-flex flex-column w-100">
                    <h5></h5>
                    <p></p>
                  </div>
                  <div class="list-group-item d-flex flex-column w-100">
                    <h5></h5>
                    <p></p>
                  </div>
                  <div class="list-group-item d-flex flex-column w-100">
                    <h5></h5>
                    <p></p>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="mentors" role="tabpanel" aria-labelledby="mentors-tab">...</div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php require_once('footer.php'); ?>
    <script src="js/vendor/jquery-3.3.1.min.js"></script>
    <script src="js/vendor/bootstrap.bundle.min.js"></script>
    <script>$(window).on('DOMContentLoaded', function () { $('#loader').addClass('leave').one('transitionend', function () { $(this).detach(); }) })</script>
    <script src="js/navbar.js"></script>
    <script>
      $(function () {
        var condensed = false
        function watchCondense () {
          var condenseId = setInterval(function () {
            if ($('html, body').scrollTop() >= 291) {
                $('#careerInfoCard').addClass('float').addClass('condensed');
                $('body').addClass('hasCardCondensed');
                condensed = true
                clearInterval(condenseId);
                setTimeout(function () { watchExpand() });
              }
          }, 100);
        }
        function watchExpand () {
          var expandId = setInterval(function () {
            if ($('html, body').scrollTop() < 291 && condensed) {
              $('#careerInfoCard').removeClass('float').removeClass('condensed');
              $('body').removeClass('hasCardCondensed');
              condensed = false
              clearInterval(expandId);
              setTimeout(function () { watchCondense() })
            }
          }, 100);
        }
        watchCondense();
      })
    </script>
    <script defer src="https://use.fontawesome.com/releases/v5.4.1/js/all.js" integrity="sha384-L469/ELG4Bg9sDQbl0hvjMq8pOcqFgkSpwhwnslzvVVGpDjYJ6wJJyYjvG3u8XW7" crossorigin="anonymous"></script>
  </body>
</html>