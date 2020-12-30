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
    <link rel="stylesheet" href="assets/vendors/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/vendors/owl-carousel-2/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/vendors/owl-carousel-2/owl.theme.default.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="assets/images/favicon.png" />

    <!-- Detector styles -->
    <!-- <script src="p5.js"></script>
    <script src="p5.dom.min.js"></script>
    <script src="p5.sound.min.js"></script>
    <script src="ml5.min.js"></script>
    <link rel="stylesheet" type="text/css" href="style.css" />

    <script src="http://cdnjs.cloudflare.com/ajax/libs/p5.js/0.5.6/p5.js"></script>
    <script src="sketch.js"></script> -->

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
                    <div class="row">
                        <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-9">
                                            <div class="d-flex align-items-center align-self-start">
                                                <h3 class="mb-0 text-info"><?php
                                                                            date_default_timezone_set('Asia/Colombo');
                                                                            $time = date('Y-m-d');
                                                                            echo $time;
                                                                            ?></h3>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="icon icon-box-info ">
                                                <span class="mdi mdi-calendar icon-item"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <h6 class="text-muted font-weight-normal">Date</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-9">
                                            <div class="d-flex align-items-center align-self-start">
                                                <h3 class="mb-0 text-danger"><?php
                                                                                require_once('connect.php');
                                                                                $date3 = date('Y-m-d');
                                                                                $qry = "SELECT COUNT(`NIC`) as a FROM `criminal_profile`";

                                                                                $res = $con->query($qry);
                                                                                while ($data1 = $res->fetch_assoc()) {
                                                                                    echo $data1['a'];
                                                                                }
                                                                                ?></h3>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="icon icon-box-danger">
                                                <span class="mdi mdi-arrow-top-right icon-item"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <h6 class="text-muted font-weight-normal">New Criminal Profile Count</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-9">
                                            <div class="d-flex align-items-center align-self-start">
                                                <h3 class="mb-0 text-success">0</h3>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="icon icon-box-success">
                                                <span class="mdi mdi-arrow-bottom-left icon-item"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <h6 class="text-muted font-weight-normal">Remove Criminal Profile Count</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-9">
                                            <div class="d-flex align-items-center align-self-start">
                                                <h3 class="mb-0">5</h3>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="icon icon-box-light">
                                                <span class="mdi mdi-cloud-print-outline icon-item"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <h6 class="text-muted font-weight-normal">Train Model Count</h6>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <!-- Detector Part -->
                        <div class="col-md-8 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex flex-row justify-content-between">
                                        <h4 class="card-title mb-1">Criminal Detector</h4>
                                        <!-- <p class="text-muted mb-1">Your data status</p> -->
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="preview-list">
                                                <div class="embed-responsive embed-responsive-4by3">
                                                    <iframe class="embed-responsive-item" src="index.html"></iframe>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Detection History</h4>
                                    <div class="preview-list bg-gray-dark d-md-block flex-row py-3 px-4 px-md-3 px-xl-4 rounded mt-3">
                                        <?php
                                        require_once('connect.php');

                                        $qry3 = "SELECT * FROM `criminal_profile` LIMIT 1";

                                        if ($res = $con->query($qry3)) {
                                            while ($row = $res->fetch_assoc()) {
                                                $field1name = $row["FullName"];
                                                $field2name = $row["Nickname"];
                                                $field3name = $row["DOB"];
                                                $field4name = $row["NIC"];
                                                $field5name = $row["ContactNumber"];
                                                $field6name = $row["CriminalCase"];
                                                $field7name = $row["CriminalLevel"];
                                                $field8name = $row["Gender"];

                                                $image = $row["image"];

                                                if ($field7name == "High") {
                                                    $CriminalLevel = "badge-danger";
                                                } elseif ($field7name == "Medium") {
                                                    $CriminalLevel = "badge-warning";
                                                } else {
                                                    $CriminalLevel = "badge-info";
                                                }

                                                echo "<div class='preview-item border-bottom'>
                                                <div class='preview-thumbnail'>
                                                    <img src='" . $image . "' alt='image' class='rounded-circle'>
                                                </div>

                                                <div class='preview-item-content d-flex flex-grow'>
                                                    <div class='flex-grow'>
                                                        <div class='d-flex d-md-block d-xl-flex justify-content-between'>
                                                            <h6 class='preview-subject'>" . $field1name . "</h6>
                                                            <p class='text-muted text-small'><label class='badge " . $CriminalLevel . "'>" . $field7name . "</label></p>
                                                        </div>
                                                        <p class='text-muted'><code>Nickname: " . $field2name . "</code></p>
                                                        <p class='text-muted'><code>Gender: " . $field8name . "</code></p>
                                                        <p class='text-muted'><code>DOB: " . $field3name . "</code></p>
                                                        <p class='text-muted'><code>NIC: " . $field4name . "</code></p>
                                                        <p class='text-muted'><code>Contact Number: " . $field5name . "</code></p>
                                                        <p class='text-muted'><code>Criminal Case: " . $field6name . "</code></p>
                                                    </div>
                                                </div>
                                                </div>";
                                            }

                                            $res->free();
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
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
</body>
<!-- container-scroller -->
<!-- plugins:js -->
<script src="assets/vendors/js/vendor.bundle.base.js"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<script src="assets/vendors/chart.js/Chart.min.js"></script>
<script src="assets/vendors/progressbar.js/progressbar.min.js"></script>
<script src="assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
<script src="assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<script src="assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>
<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="assets/js/off-canvas.js"></script>
<script src="assets/js/hoverable-collapse.js"></script>
<script src="assets/js/misc.js"></script>
<script src="assets/js/settings.js"></script>
<script src="assets/js/todolist.js"></script>
<!-- endinject -->
<!-- Custom js for this page -->
<script src="assets/js/dashboard.js"></script>
<!-- End custom js for this page -->


</html>