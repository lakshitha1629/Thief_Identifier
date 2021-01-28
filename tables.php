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

                                        if ($_SESSION['user_type'] == 'Admin') {
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
                                                        <th></th>
                                                    </tr>
                                                </thead>';
                                        } else {
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
                                        }

                                        if ($res = $con->query($qry3)) {
                                            while ($row = $res->fetch_assoc()) {
                                                $field0name = $row["id"];
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


                                                if ($_SESSION['user_type'] == 'Admin') {
                                                    echo "<tr> 
                                                        <td class='py-1'><img src='" . $image . "' alt='image'/></td> 
                                                        <td>" . $field1name . "</td> 
                                                        <td>" . $field2name . "</td> 
                                                        <td>" . $field3name . "</td> 
                                                        <td>" . $field4name . "</td> 
                                                        <td>" . $field5name . "</td> 
                                                        <td>" . $field6name . "</td> 
                                                        <td><label class='badge " . $CriminalLevel . "'>" . $field7name . "</label></td> 
                                                        <td><a onClick=\"return confirm('Are you sure you want to delete?')\" href=\"delete_profile.php?id=" . $field0name . "\"><button type='button' class='btn btn-inverse-light btn-icon'><i class='mdi mdi-delete-forever'></i></button></a></td>
                                                        </tr>";
                                                } else {
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
                                            }

                                            $res->free();
                                        }
                                        ?>
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