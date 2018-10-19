<?php
include('database.php'); //To import the Database connection file
if ($Mysqli_database) {
    if(isset($_POST['signup'])) { //for signing up
       // if($_POST['signup'] == 'submit-signup') 
        {
         if($_POST['Password'] == $_POST['Confirm_Password']) {
          $sqlsignup = "INSERT INTO devminds_members (EMAIL,PASSWORD) 
          VALUES ('".$_POST['Email']."','".$_POST['Password']."');";
          if(mysqli_query($Mysqli_database,$sqlsignup)) {
              //include('index.php');
              echo "<script>
                   alert('Account Created Successfully, You Need to login to Begin');
                  </script>";
                header("Location:login.html");
              
          } else {
              echo 'error while signing in '.mysqli_error();
          }
        } else {
            
            echo "<script>
                   alert('Password and Confirm Password did not math');
                  </script>";
                  header("Location:signup.html");
                  
        }
        }
    } elseif(isset($_POST['login'])) { //for logging in
       //if($_POST['LOGIN'] == 'SIGNIN') 
       {
        #echo $_POST['USERNAME'];
        $Email = mysqli_escape_string($Mysqli_database,$_POST['Email']);
        $Password = mysqli_escape_string($Mysqli_database,$_POST['Password']);
        //echo $Email,$Password;
        $checklogin = "SELECT * FROM devminds_members WHERE (EMAIL = '$Email' AND PASSWORD = '$Password');";
        $mysqli = mysqli_query($Mysqli_database,$checklogin);
        //$userdetails = mysqli_fetch_assoc($mysqli);
        if($mysqli AND mysqli_num_rows($mysqli) == 1)  { // return true if queried true and queried rows is only one.
    
            session_start(); // TO START A SESSION FOR LOGGED IN USER
            $_SESSION['Email'] = $Email;
            header("Location:home.php");
            
        } else {
            echo "<script>
                   alert('Incorrect Email or Password');
                  </script>";
                  header("Location:login.html");      
                }
       }
    } else {
        header("Location:signup.html");
    }
} else {
//include('critedbottominfo.php');
echo 'go';
}
?>