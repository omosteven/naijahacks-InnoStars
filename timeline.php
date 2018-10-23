<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>DevMinds - Timeline</title>
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
            <h5 class="card-title"><i class="fas fa-star" style="color: gold"></i> Cyber Security Science</h5>
            <h6 class="card-subtitle mb-2 text-muted">Software and Technology</h6>
            <p class="card-text text-success">Chosen as career</p>
          </div>
        </div>
      </div>
      <div class="col-12 col-lg-8">
        <div class="card appear">
          <div class="card-body">
            <h5 class="card-title">Career Timeline</h5>
            <h6 class="card-subtitle mb-2 text-muted">What do you go through during each stage of becoming awesome?</h6>
          </div>
          <div class="list-group-flush list-group">
            <a href="#secSchoolDetails" class="list-group-item list-group-item-action" data-toggle="collapse">
              <h5>Secondary School <i class="fas fa-chevron-down float-right"></i></h5>
              <p class="collapse" id="secSchoolDetails">Here you focus on Maths and Computers</p>
            </a>
            <a class="list-group-item list-group-item-action">
              <h5>University <i class="fas fa-chevron-down float-right"></i></h5>
            </a>
          </div
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