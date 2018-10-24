<?php
function array_flatten($array) {
  $return = array();
  foreach ($array as $key => $value) {
    if (is_array($value)){ $return = array_merge($return, array_flatten($value));}
    else {$return[$key] = $value;}
  }
  return $return;
}
$statesData = file_get_contents('data/states.json');
$statesJSON = json_decode($statesData);
$states = array_map(function ($state) {
  return $state->states->name;
}, $statesJSON);
$hometowns = array_map(function ($state) {
  $locals = $state->states->locals;
  $local_names = array_map(function ($local) { return $local->name; }, $locals);
  return $local_names;
}, $statesJSON);
$hometowns = array_flatten($hometowns);
sort($hometowns);
$levelsOfEducation = array('Primary School', 'Secondary School', 'Undergraduate');
$skills = array("Writing", "Browsing", "Handwork", "Sports", "Cooking", "Leadership", "Music", "Organization", "Analytical Thinking", "Programming", "Dancing", "Drawing&Artwork", "Talking", "Fighting/Defense", "Teamwork");
$subjects = array("Mathematics", "English Language", "Chemistry", "Physics", "Biology", "Social Science", "Astrology", "Economics", "Agricultural Science", "Civic Education", "Politics");
$profilePicture = isset($_COOKIE['profilePicture']) ? $_COOKIE['profilePicture'] : '';
// HARD CODE ALL THE THINGS!!!
$completedProfile = false;
if (isset($_COOKIE['profilePicture'])) {
  $completedProfile = true;
}
if (isset($_FILES['profilePicture'])) {
  $errors= array();
  $file_name = $_FILES['profilePicture']['name'];
  $file_size = $_FILES['profilePicture']['size'];
  $file_tmp = $_FILES['profilePicture']['tmp_name'];
  $file_type = $_FILES['profilePicture']['type'];
  // $file_ext=strtolower(end(explode('.',$_FILES['profilePicture']['name'])));
  move_uploaded_file($file_tmp,"uploads/".$file_name);
  $profilePicture = "uploads/".$file_name;
  setcookie('profilePicture', $profilePicture, time() + (86400 * 30), "/");
}
$suggestedCareers = array('Cyber Security Science', 'Computer Science', 'Mathematics');
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/vendor/bootstrap.min.css">
    <!-- Loader CSS -->
    <link rel="stylesheet" href="css/loader.css">
    <link rel="stylesheet" href="css/overrides.css">
    <link rel="stylesheet" href="css/profile.css">
    <link rel="stylesheet" href="css/animations.css">
    <title>DevMinds Profile</title>
  </head>
  <body>
    <?php if(!isset($_POST['completeProfile'])): ?>
    <!-- <div id="loader">
      <div id="loader-circle">
        <div></div>
        <div></div>
        <div></div>
        <div></div>
      </div>
    </div> -->
    <?php endif; ?>
    <?php require_once('sidebar.php'); ?>
    <?php if(!$completedProfile && !isset($_POST['completeProfile'])): ?>
    <div class="container profile">
      <div class="row">
        <div class="col-12 col-md-10 offset-md-1">
          <form class="card profile-card" method="POST" enctype="multipart/form-data">
            <div class="card-avatar">
              <img src="" />
              <i class="fas fa-camera upload-button"></i>
              <input type="file" class="avatar-upload" name="profilePicture" required />
            </div>
            <div class="card-body">
              <h5 class="card-title">Complete Your Profile</h5>
              <div class="row mb-3">
                <div class="col-12 col-sm-4 mb-3 mb-sm-0">
                  <label for="firstName">First Name</label>
                  <input type="text" class="form-control" placeholder="Temitope" name="firstName">
                </div>
                <div class="col-12 col-sm-4 mb-3 mb-sm-0">
                  <label for="lastName">Last Name</label>
                  <input type="text" class="form-control" placeholder="Umar" name="lastName">
                </div>
                <div class="col-12 col-sm-4">
                  <label for="gender">Gender</label>
                  <select class="form-control" name="gender">
                    <option disabled>Choose a gender</option>
                    <option>Male</option>
                    <option>Female</option>
                  </select>
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-12 col-sm-3 mb-3 mb-sm-0">
                  <label for="dateOfBirth">Date of Birth</label>
                  <input type="date" name="dateOfBirth" required class="form-control" />
                </div>
                <div class="col-12 col-sm-3 mb-3 mb-sm-0">
                  <label for="statesDropdown">State of Residence</label>
                  <select class="form-control" id="statesDropdown" name="stateOfResidence">
                    <option disabled>Choose your state of residence</option>
                    <?php foreach($states as $state) { ?>
                      <option><?php echo $state; ?></option>
                    <?php } ?>
                  </select>
                </div>
                <div class="col-12 col-sm-3 mb-3 mb-sm-0">
                  <label for="originStatesDropdown">State of Origin</label>
                  <select class="form-control" id="originStatesDropdown" name="stateOfOrigin">
                    <option disabled>Choose your state of origin</option>
                    <?php foreach($states as $state) { ?>
                      <option><?php echo $state; ?></option>
                    <?php } ?>
                  </select>
                </div>
                <div class="col-12 col-sm-3">
                  <label for="hometownDropdown">Hometown</label>
                  <select class="form-control" id="hometownDropdown" name="hometown">
                    <option disabled>Choose your hometown</option>
                    <?php foreach($hometowns as $hometown) { ?>
                      <option><?php echo $hometown; ?></option>
                    <?php } ?>
                  </select>
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-12">
                  <label for="skills">Skills/Talents/Hobbies</label>
                  <small class="text-muted form-text">Choose whatever skills you feel you excel at</small>
                  <?php foreach($skills as $index => $skill) { ?>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="skillCheck<?= $index ?>" name="skills">
                      <label class="form-check-label" for="skillCheck<?= $index ?>"><?php echo $skill ?></label>
                    </div>
                  <?php } ?>  
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-12">
                  <label for="levelOfEducation">Present level of Education</label>
                  <select class="form-control" required name="levelOfEducation">
                    <option disabled>What is the highest level of formal education you've received?</option>
                    <?php foreach($levelsOfEducation as $levelOfEducation) { ?>
                      <option><?php echo $levelOfEducation ?></option>
                    <?php } ?>
                  </select>
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-12 mb-3">
                  <label for="bestSubjects">Best performing subjects</label>
                  <small class="text-muted form-text">Which subjects do you excel in and enjoy?</small>
                  <?php foreach($subjects as $index => $subject) { ?>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="bestSubjectCheck<?= $index ?>" name="bestSubjects">
                      <label class="form-check-label" for="bestSubjectCheck<?= $index ?>"><?php echo $subject ?></label>
                    </div>
                  <?php } ?>
                </div>
                <div class="col-12">
                  <label for="dislikedSubjects">Disliked Subjects</label>
                  <small class="text-muted form-text">Which subjects do you have difficulty with or simply dislike?</small>
                  <?php foreach($subjects as $index => $subject) { ?>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="dislikedSubjectCheck<?= $index ?>" name="dislikedSubjects">
                      <label class="form-check-label" for="dislikedSubjectCheck<?= $index ?>"><?php echo $subject ?></label>
                    </div>
                  <?php } ?>
                </div>
              </div>
              <div class="row">
                <div class="col-12 text-right">
                  <button type="submit" class="btn btn-primary" name="completeProfile">Complete Profile</button>
                </div>
              </div>
            </div>
          </form>
        </div>
        <!-- <div class="col-12 col-lg-8">
          <div class="card">
            <div class="card-body">
              <p>Interests and the likes will be here</p>
            </div>
          </div>
        </div> -->
      </div>
    </div>
    <?php else: ?>
    <?php if(isset($POST['completeProfile'])) { ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      Woot woot! Your profile's complete!
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <?php } ?>
    <div class="container profile contains-animations">
      <div class="row scale-in">
        <div class="col-12 col-lg-4 offset-lg-2 mb-3 mb-lg-0">
          <div class="card profile-card appear">
            <div class="card-avatar">
              <img src="<?= $profilePicture; ?>" />
            </div>
            <div class="card-body">
              <h5 class="card-title">Omole Stephen</h5>
              <h6 class="card-subtitle mb-2 text-muted">omosteven@gmail.com</h6>
              <p class="card-text">
                
              </p>
            </div>
            <ul class="list-group list-group-flush">
              <li class="list-group-item"><i class="fas fa-map-marker-alt"></i> Gbagada</li>
              <li class="list-group-item"><i class="far fa-calendar-alt"></i> 10/02/1998</li>
              <li class="list-group-item"><i class="fas fa-graduation-cap"></i> Undergraduate</li>
            </ul>
            <div class="card-body text-right">
              <a href="#">Edit Profile</a>
            </div>
          </div>
        </div>
        <div class="col-12 col-lg-4 mb-3 mb-lg-0">
          <div class="card appear">
            <div class="card-body">
              <h5 class="card-title">Suggested Careers</h5>
              <h6 class="card-subtitle mb-2 text-muted">These ones seem like a sweet match to your skills and likes!</h6>
            </div>
            <div class="list-group list-group-flush appear">
              <?php foreach($suggestedCareers as $suggestedCareer): ?>
              <a href="career.php?career=<?= urlencode($suggestedCareer); ?>" class="list-group-item list-group-item-action"><?= $suggestedCareer; ?> <i class="float-right fas fa-chevron-right"></i></a>
              <?php endforeach; ?>
            </div>
            <div class="card-body">
              <p>Don't like our suggestions? It's alright. <a href="#">You can check out available careers here.</a></p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php endif; ?>

    <!-- Optional JavaScript -->
    <script src="js/vendor/jquery-3.3.1.min.js"></script>
    <script src="js/vendor/bootstrap.bundle.min.js"></script>
    <script>$(window).on('DOMContentLoaded', function () { $('#loader').addClass('leave').one('transitionend', function () { $(this).detach(); }) })</script>
    <script src="js/navbar.js"></script>
    <script>
      $(function () {
        var readURL = function(input) {
          if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
              $('.card-avatar img').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
          }
        }
        
        $(".avatar-upload").on("click", function (e) {
          e.stopPropagation();
        })  
        $(".avatar-upload").on('change', function(){
          readURL(this);
        });
        
        $(".card-avatar").on('click', function() {
          $(".avatar-upload").click();
        });
      })
    </script>
    <script defer src="https://use.fontawesome.com/releases/v5.4.1/js/all.js" integrity="sha384-L469/ELG4Bg9sDQbl0hvjMq8pOcqFgkSpwhwnslzvVVGpDjYJ6wJJyYjvG3u8XW7" crossorigin="anonymous"></script>
  </body>
</html>