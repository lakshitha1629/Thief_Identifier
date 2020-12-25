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
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
                <a class="sidebar-brand brand-logo" href=""><img src="assets/images/logo.svg" alt="logo" style="width: auto;" /></a>
                <a class="sidebar-brand brand-logo-mini" href=""><img src="assets/images/logo-mini.svg" alt="logo" style="width: auto;" /></a>
            </div>
            <ul class="nav">
                <li class="nav-item profile">
                    <div class="profile-desc">
                        <div class="profile-pic">
                            <div class="count-indicator">
                                <img class="img-xs rounded-circle " src="assets/images/faces/face15.jpg" alt="">
                                <span class="count bg-success"></span>
                            </div>
                            <div class="profile-name">
                                <h5 class="mb-0 font-weight-normal">Admin</h5>
                                <span>admin@gmail.com</span>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="nav-item nav-category">
                    <span class="nav-link">Navigation</span>
                </li>
                <li class="nav-item menu-items">
                    <a class="nav-link" href="dashboard.php">
                        <span class="menu-icon">
                            <i class="mdi mdi-speedometer"></i>
                        </span>
                        <span class="menu-title">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item menu-items">
                    <a class="nav-link" href="forms.php">
                        <span class="menu-icon">
                            <i class="mdi mdi-playlist-play"></i>
                        </span>
                        <span class="menu-title">Add Criminal Profile</span>
                    </a>
                </li>
                <li class="nav-item menu-items">
                    <a class="nav-link" href="tables.php">
                        <span class="menu-icon">
                            <i class="mdi mdi-table-large"></i>
                        </span>
                        <span class="menu-title">Criminal Details</span>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_navbar.html -->
            <nav class="navbar p-0 fixed-top d-flex flex-row">
                <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
                    <a class="navbar-brand brand-logo-mini" href=""><img src="assets/images/logo-mini.svg" alt="logo" /></a>
                </div>
                <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
                    <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                        <span class="mdi mdi-menu"></span>
                    </button>
                    <ul class="navbar-nav navbar-nav-right">
                        <li class="nav-item dropdown">
                            <a class="nav-link" id="profileDropdown" href="#" data-toggle="dropdown">
                                <div class="navbar-profile">
                                    <img class="img-xs rounded-circle" src="assets/images/faces/face15.jpg" alt="">
                                    <i class="mdi mdi-menu-down d-none d-sm-block"></i>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="profileDropdown">
                                <a class="dropdown-item preview-item" href="index.php">
                                    <div class="preview-thumbnail">
                                        <div class="preview-icon bg-dark rounded-circle">
                                            <i class="mdi mdi-logout text-danger"></i>
                                        </div>
                                    </div>
                                    <div class="preview-item-content">
                                        <p class="preview-subject mb-1">Log out</p>
                                    </div>
                                </a>
                            </div>
                        </li>
                    </ul>
                    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                        <span class="mdi mdi-format-line-spacing"></span>
                    </button>
                </div>
            </nav>
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="page-header">
                        <h3 class="page-title"> Criminal Details </h3>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Criminal Profile Details Table</h4>
                                    <!-- <p class="card-description"><code>When a man is denied the right to live the life he believes in, he has no choice but to become an outlaw.</code> -->
                                    </p>
                                    <div class="table-responsive">

                                        <?php
                                        require_once('connect.php');

                                        $qry3 = "SELECT * FROM `criminal_profile`";

                                        echo '<table class="table" id="dataTable" width="100%" cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th></th>
                                                        <th>Full Name</th>
                                                        <th>Nickname</th>
                                                        <th>DOB</th>
                                                        <th>NIC</th>
                                                        <th>Phone Number</th>
                                                        <th>Criminal Case</th>
                                                        <th>Criminal Level</th>
                                                    </tr>
                                                </thead>';

                                        if ($res = $con->query($qry3)) {
                                            while ($row = $res->fetch_assoc()) {
                                                $field1name = $row["FullName"];
                                                $field2name = $row["Nickname"];
                                                $field3name = $row["DOB"];
                                                $field4name = $row["NIC"];
                                                $field5name = $row["ContactNumber"];
                                                $field6name = $row["CriminalCase"];
                                                $field7name = $row["CriminalLevel"];

                                                $image = $row["image"];

                                                if ($field7name == "High") {
                                                    $CriminalLevel = "badge-danger";
                                                } elseif ($field7name == "Medium") {
                                                    $CriminalLevel = "badge-warning";
                                                } else {
                                                    $CriminalLevel = "badge-info";
                                                }

                                                echo "<tr> 
                                                        <td class='py-1'><img src='" . $image . "' alt='image'/></td> 
                                                        <td>" . $field1name . "</td> 
                                                        <td>" . $field2name . "</td> 
                                                        <td>" . $field3name . "</td> 
                                                        <td>" . $field4name . "</td> 
                                                        <td>" . $field5name . "</td> 
                                                        <td>" . $field6name . "</td> 
                                                        <td><label class='badge " . $CriminalLevel . "'>" . $field7name . "</label></td> 
                                                    </tr>";
                                            }

                                            $res->free();
                                        }
                                        ?>
                                        <!--                                         
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th> User </th>
                                                    <th> First name </th>
                                                    <th> Progress </th>
                                                    <th> Amount </th>
                                                    <th> Deadline </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="py-1">
                                                        <img src="assets/images/faces-clipart/pic-1.png" alt="image" />
                                                    </td>
                                                    <td> Herman Beck </td>
                                                    <td>
                                                        <div class="progress">
                                                            <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </td>
                                                    <td> $ 77.99 </td>
                                                    <td> May 15, 2015 </td>
                                                </tr>
                                                <tr>
                                                    <td class="py-1">
                                                        <img src="assets/images/faces-clipart/pic-4.png" alt="image" />
                                                    </td>
                                                    <td> Peter Meggik </td>
                                                    <td>
                                                        <div class="progress">
                                                            <div class="progress-bar bg-primary" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </td>
                                                    <td> $ 77.99 </td>
                                                    <td> May 15, 2015 </td>
                                                </tr>
                                            </tbody>
                                        </table> -->
                                        </table>
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
        <script src="assets/js/off-canvas.js"></script>
        <script src="assets/js/hoverable-collapse.js"></script>
        <script src="assets/js/misc.js"></script>
        <script src="assets/js/settings.js"></script>
        <script src="assets/js/todolist.js"></script>
</body>

</html>