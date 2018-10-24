<?php
session_name('devminds');
session_start();
require_once('mustlogin.php');
$careers = array(
  'Cyber Security Science' => array(
    'name' => 'Cyber Security Science',
    'field' => 'Software and Technology'
  ),
  'Computer Science' => array(
    'name' => 'Computer Science',
    'field' => 'Software and Technology'
  ),
  'Robotics' => array(
    'name' => 'Robotics',
    'field' => 'Hardware and Technology'
  ),
  'Football' => array(
    'name' => 'Football',
    'field' => 'Sports'
  ),
  'Livestock Farming' => array(
    'name' => 'Livestock Farming',
    'field' => 'Agriculture'
  )
);
$shownCareers = $careers;
$searchQuery = isset($_GET['q']) ? $_GET['q'] : '';
if ($searchQuery !== '') {
  $shownCareers = array_filter($careers, function ($career) {
    $query = strtolower($_GET['q']);
    $careerName = strtolower($career['name']);
    $careerField = strtolower($career['field']);
    return stripos($careerName, $query) !== false || stripos($careerField, $query) !== false;
  });
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>DevMinds - Careers</title>
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
      <div class="col-12 mb-3 mb-lg-0">
        <div class="card">
          <form class="d-flex w-100 px-3 py-3">
            <input class="form-control" id="search-input" name="q" placeholder="Search for a nifty career" value="<?= $searchQuery ?>">
          </form>
          <div class="list-group list-group-flush appear">
            <?php foreach($shownCareers as $careerName => $career): ?>
            <a href="career.php?career=<?= urlencode($careerName); ?>" class="list-group-item list-group-item-action">
              <h5 class="card-title">
                <?php if($careerName == 'Cyber Security Science'): ?>
                <i class="fas fa-star" style="color: gold"></i>
                <?php endif; ?>
                <?= $careerName ?>
              </h5>
              <h6 class="card-subtitle mb-2 text-muted"><?= $career['field'] ?></h6>
              <?php if($careerName == 'Cyber Security Science'): ?>
              <p class="card-text text-success">Chosen as career</p>
              <?php endif; ?>
            </a>
            <?php endforeach; ?>
            <?php if(count($shownCareers) < 1): ?>
            <div class="text-center">
              <h5 class="card-title">No results found for "<?= $searchQuery ?>"</h5>
            </div>
            <?php endif; ?>
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
  <script defer src="https://use.fontawesome.com/releases/v5.4.1/js/all.js" integrity="sha384-L469/ELG4Bg9sDQbl0hvjMq8pOcqFgkSpwhwnslzvVVGpDjYJ6wJJyYjvG3u8XW7" crossorigin="anonymous"></script>
</body>
</html>