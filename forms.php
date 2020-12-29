<?php
include('functions.php');
if (!isLoggedIn()) {
    $_SESSION['msg'] = "You must log in first";
    header('location: index.php');
}
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
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="assets/vendors/select2/select2.min.css">
    <link rel="stylesheet" href="assets/vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="assets/images/favicon.png" />
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
                <a class="sidebar-brand brand-logo" href=""><img src="assets/images/logo.svg" alt="logo" style="width: auto;" /></a>
                <a class="sidebar-brand brand-logo-mini" href=""><img src="assets/images/logo-mini.svg" alt="logo" style="width: auto;" /></a>
            </div>

            <?php include 'nav.php'; ?>

            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="page-header">
                        <h3 class="page-title"> Add Criminal Profile </h3>
                    </div>
                    <div class="row">
                        <div class="col-12 grid-margin">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Criminal Profile Form</h4>
                                    <form class="form-sample" method="post" action="" enctype="multipart/form-data">
                                        <!-- <p class="card-description"> Personal info </p> -->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Full Name</label>
                                                    <div class="col-sm-9">
                                                        <input name="FullName" type="text" class="form-control" required />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Nickname</label>
                                                    <div class="col-sm-9">
                                                        <input name="Nickname" type="text" class="form-control" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Gender</label>
                                                    <div class="col-sm-9">
                                                        <select name="Gender" class="form-control">
                                                            <option value="Male">Male</option>
                                                            <option value="Female">Female</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Date of Birth</label>
                                                    <div class="col-sm-9">
                                                        <input type="date" name="DOB" class="form-control" placeholder="dd/mm/yyyy" required />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Criminal Level</label>
                                                    <div class="col-sm-9">
                                                        <select name="CriminalLevel" class="form-control">
                                                            <option value="High">High</option>
                                                            <option value="Medium">Medium</option>
                                                            <option value="Low">Low</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Membership</label>
                                                    <div class="col-sm-4">
                                                        <div class="form-check">
                                                            <label class="form-check-label">
                                                                <input type="radio" class="form-check-input" name="membershipRadios" id="membershipRadios1" value="New" checked> New </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-5">
                                                        <div class="form-check">
                                                            <label class="form-check-label">
                                                                <input type="radio" class="form-check-input" name="membershipRadios" id="membershipRadios2" value="Old"> Old </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Criminal Case (Drug Deal, Murder, Rape, Sexual Assault, Kidnapping, etc..)</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="CriminalCase" class="form-control" required />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <!-- <p class="card-description"> Address </p> -->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Address 1</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="Address1" class="form-control" required />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Contact Number</label>
                                                    <div class="col-sm-9">
                                                        <input type="number" name="ContactNumber" class="form-control" minlength="10" maxlength="10" required />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Address 2</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="Address2" class="form-control" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">NIC Number</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="NIC" class="form-control" minlength="10" maxlength="10" required />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">City</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="City" class="form-control" required />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Country</label>
                                                    <div class="col-sm-9">
                                                        <select name="Country" class="form-control">
                                                            <option value="Srilanka">Srilanka</option>
                                                            <option value="India">India</option>
                                                            <option value="Bangladesh">Bangladesh</option>
                                                            <option value="Other">Other</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Profile Upload</label>
                                                    <input type="file" name="file" class="file-upload-default">
                                                    <div class="input-group col-sm-9">
                                                        <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                                                        <span class="input-group-append">
                                                            <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <input class="btn btn-primary" type=submit value="Add Record" name="submit1">
                                        <button type="reset" class="btn btn-dark">Cancel</button>
                                    </form>
                                    <br>
                                    <?php

                                    if (isset($_POST['submit1']) && !empty($_FILES["file"]["name"])) {
                                        error_reporting(E_ERROR | E_PARSE);
                                        require_once('connect.php');

                                        $user = $_SESSION['email'];
                                        date_default_timezone_set('Asia/Colombo');
                                        $date = date('Y-m-d H:i:s');

                                        $FullName = $_POST['FullName'];
                                        $Nickname = $_POST['Nickname'];
                                        $Gender = $_POST['Gender'];
                                        $DOB = $_POST['DOB'];
                                        $CriminalLevel = $_POST['CriminalLevel'];
                                        $membershipRadios = $_POST['membershipRadios'];
                                        $CriminalCase = $_POST['CriminalCase'];
                                        $NIC = $_POST['NIC'];
                                        $Address = $_POST['Address1'] . "," . $_POST['Address2'] . "," . $_POST['City'] . "," . $_POST['Country'];
                                        $ContactNumber = $_POST['ContactNumber'];

                                        $status = 'Active';

                                        $name = $_FILES['file']['name'];
                                        $target_file = basename($_FILES["file"]["name"]);
                                        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                                        $extensions_arr = array("jpg", "jpeg", "png", "gif");

                                        $check = mysqli_query($con, "SELECT * FROM `criminal_profile` WHERE `NIC`='$NIC'");
                                        $checkrows = mysqli_num_rows($check);

                                        if ($checkrows > 0) {
                                            echo "<div style='color: red;'>*Your record already Added.</div>";
                                        } else {
                                            if (in_array($imageFileType, $extensions_arr)) {

                                                // Convert to base64 
                                                $image_base64 = base64_encode(file_get_contents($_FILES['file']['tmp_name']));
                                                $image = 'data:image/' . $imageFileType . ';base64,' . $image_base64;

                                                $qry1 = "INSERT INTO `criminal_profile`(`FullName`, `Nickname`, `Gender`, `DOB`, `CriminalLevel`, `membershipRadios`, `CriminalCase`, `NIC`, `Address`, `ContactNumber`,`image`) 
                                                VALUES ('$FullName','$Nickname','$Gender','$DOB','$CriminalLevel','$membershipRadios','$CriminalCase','$NIC','$Address','$ContactNumber','$image')";

                                                $result = mysqli_query($con, $qry1)
                                                    or die('Error: ' . mysqli_error($con));
                                                echo "Your record Added Successfully";
                                            }
                                            // $qry1 = "INSERT INTO `criminal_profile`(`FullName`, `Nickname`, `Gender`, `DOB`, `CriminalLevel`, `membershipRadios`, `CriminalCase`, `NIC`, `Address`, `ContactNumber`) 
                                            // VALUES ('$FullName','$Nickname','$Gender','$DOB','$CriminalLevel','$membershipRadios','$CriminalCase','$NIC','$Address','$ContactNumber')";

                                            // $result = mysqli_query($con, $qry1)
                                            //     or die('Error: ' . mysqli_error($con));
                                            // echo "Your record Added Successfully";
                                        }
                                    }

                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- content-wrapper ends -->
                <!-- partial:../../partials/_footer.html -->
                <footer class="footer">
                    <div class="d-sm-flex justify-content-center justify-content-sm-between">
                        <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © Provisio 2020</span>
                    </div>
                </footer>
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="assets/vendors/select2/select2.min.js"></script>
    <script src="assets/vendors/typeahead.js/typeahead.bundle.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/misc.js"></script>
    <script src="assets/js/settings.js"></script>
    <script src="assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="assets/js/file-upload.js"></script>
    <script src="assets/js/typeahead.js"></script>
    <script src="assets/js/select2.js"></script>
    <!-- End custom js for this page -->
</body>

</html>