<?php
@ob_start();
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Provisio - Intelligent Criminal Detector</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <!-- End layout styles -->
  <link rel="shortcut icon" href="assets/images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="row w-100 m-0">
        <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
          <div class="card col-lg-4 mx-auto">
            <div class="card-body px-5 py-5">
              <div class="text-center">
                <img src="assets/images/logo-mini.png" alt="logo" />
              </div>
              <hr>
              <h3 class="card-title text-left mb-3">Login</h3>
              <form action="" method="post" id="login">
                <div class="form-group">
                  <label>Email *</label>
                  <input type="email" id="txt_uname" name="Email" class="form-control p_input">
                </div>
                <div class="form-group">
                  <label>Password *</label>
                  <input type="password" id="txt_pwd" name="password" class="form-control p_input">
                </div>
                <div class="form-group d-flex align-items-center justify-content-between">
                  <div class="form-check">
                    <label class="form-check-label">
                      <input type="checkbox" class="form-check-input"> Remember me </label>
                  </div>
                  <!-- <a href="#" class="forgot-pass">Forgot password</a> -->
                </div>
                <div class="text-center">
                  <button id="but_submit" name="login_btn" type="submit" class="btn btn-primary btn-block enter-btn">Login</button>
                  <?php
                  error_reporting(E_ERROR | E_PARSE);

                  require_once('connect.php');

                  // call the login() function if register_btn is clicked
                  if (isset($_POST['login_btn'])) {
                    login();
                  }

                  if (isset($_GET['logout'])) {
                    session_destroy();
                    unset($_SESSION['user']);
                    header("login.php");
                  }

                  function login()
                  {
                    //  require_once ('connect.php');
                    global $con, $email;
                    // grap form valuese($_POST['Email']);
                    $email = e($_POST['Email']);
                    $password = e($_POST['password']);

                    // attempt login if no errors on form

                    $password = md5($password);

                    //$query = "SELECT * FROM users WHERE email='$email' AND password='$password' LIMIT 1";
                    $query = "SELECT * FROM `user_account` WHERE `email`='$email' AND `password`='$password' AND `activated`='1' LIMIT 1";
                    $results = mysqli_query($con, $query);


                    if (mysqli_num_rows($results) == 1) { // user found
                      // check if user is admin or user
                      $logged_in_user = mysqli_fetch_assoc($results);

                      if ($logged_in_user['user_type'] == '1') {
                        //$_SESSION['user'] = $logged_in_userid['user_id'];
                        $_SESSION['email'] = $logged_in_user['email'];
                        $_SESSION['user'] = $logged_in_user;
                        $_SESSION['user_type'] = "Admin";
                        $_SESSION['success']  = "You are now logged in";
                        header('location: dashboard.php');
                      } else if ($logged_in_user['user_type'] == '2') {
                        $_SESSION['user_name'] = $logged_in_user['user_name'];
                        $_SESSION['user'] = $logged_in_user;
                        $_SESSION['user_type'] = "Officer";
                        $_SESSION['success']  = "You are now logged in";
                        header('location: dashboard.php');
                      } else {
                        echo "Undefined User";
                      }
                    } else {

                      echo "Wrong email/password combination";
                    }
                  }

                  function getUserById($id)
                  {
                    global $con;
                    //$query = "SELECT * FROM users WHERE id=" . $id;
                    $query = "SELECT * FROM `user_account` WHERE `user_id`" . $id;
                    //SELECT * FROM `cbm_user_account` WHERE `user_id`
                    $result = mysqli_query($con, $query);

                    $user = mysqli_fetch_assoc($result);
                    return $user;
                  }

                  function isLoggedIn()
                  {
                    if (isset($_SESSION['user'])) {
                      return true;
                    } else {
                      return false;
                    }
                  }

                  // escape string
                  function e($val)
                  {
                    global $con;
                    return mysqli_real_escape_string($con, trim($val));
                  }

                  function display_error()
                  {
                    global $errors;

                    if (count($errors) > 0) {
                      echo '<div class="error">';
                      foreach ($errors as $error) {
                        echo $error . '<br>';
                      }
                      echo '</div>';
                    }
                  }
                  ?>
                </div>
              </form>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- row ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <script src="assets/vendors/js/vendor.bundle.base.js"></script>
  <script src="assets/js/off-canvas.js"></script>
  <script src="assets/js/hoverable-collapse.js"></script>
  <script src="assets/js/misc.js"></script>
  <script src="assets/js/settings.js"></script>
  <script src="assets/js/todolist.js"></script>
</body>

</html>