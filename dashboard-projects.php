    <?php
    session_start(); // Start session to manage user login status

    // Check if the user is not logged in, redirect to the login page
    if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: pages-login.php");
    exit();
    }

    // Display dashboard content here
    ?>

    <?php include 'dash-head.php'; ?>
    <!-- Begin page -->
    <div class="wrapper">
    <!-- ========== Left Sidebar Start ========== -->
    <?php include 'sidebar.php'?>
    <?php include 'config.php'?>
    <!-- Left Sidebar End -->

    <!-- ============================================================== -->
    <!-- Start Page Content here -->
    <!-- ============================================================== -->

    <div class="content-page">
    <div class="content">
    <!-- Topbar Start -->
    <?php include 'topbar.php'; ?>
    <!-- end Topbar -->

    <!-- Start Content-->
    <div class="container-fluid">

    <!-- start page title -->
    <div class="row">
    <div class="col-12">
    <div class="page-title-box">
    <div class="page-title-right">
    <ol class="breadcrumb m-0">
    <li class="breadcrumb-item"><a href="javascript: void(0);">TMS</a></li>
    <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
    <li class="breadcrumb-item active">Projects</li>
    </ol>
    </div>
    <h4 class="page-title">Projects</h4>
    </div>
    </div>
    </div>     
    <!-- end page title --> 
    <?php   
    $stmt = $pdo->query("SELECT COUNT(*) AS batchCount FROM batches");

    if ($stmt) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $batchCount = $row['batchCount'];
    } else {
        $batchCount = 0; // Default to 0 if there's an error fetching the count
    } ?>
    <?php 
    $stmt = $pdo->query("SELECT COUNT(*) AS courseCount FROM courses");

    if ($stmt) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $courseCount = $row['courseCount'];
    } else {
        $courseCount = 0; // Default to 0 if there's an error fetching the count
    }
     ?>
     <?php 
     $stmt = $pdo->query("SELECT COUNT(*) AS studentCount FROM students"); 
    if ($stmt) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $studentCount = $row['studentCount'];
    } else {
        $studentCount = 0; // Default to 0 if there's an error fetching the count
    }
     ?>
      <?php 
     $stmt = $pdo->query("SELECT COUNT(*) AS projectsCount FROM projects"); 
    if ($stmt) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $projectsCount = $row['projectsCount'];
    } else {
        $projectsCount = 0; // Default to 0 if there's an error fetching the count
    }
     ?>
    <div class="row">
    <div class="col-12">
    <div class="card widget-inline">
    <div class="card-body p-0">
    <div class="row g-0">
    <div class="col-sm-6 col-xl-3">
    <div class="card shadow-none m-0">
    <div class="card-body text-center">
    <i class="dripicons-briefcase text-muted" style="font-size: 24px;"></i>
    <h3><span><?php echo $batchCount; ?></span></h3>
    <p class="text-muted font-15 mb-0">Total Batch</p>
    </div>
    </div>
    </div>

    <div class="col-sm-6 col-xl-3">
    <div class="card shadow-none m-0 border-start">
    <div class="card-body text-center">
    <i class="dripicons-checklist text-muted" style="font-size: 24px;"></i>
    <h3><span><?php echo $courseCount; ?></span></h3>
    <p class="text-muted font-15 mb-0">Total Course</p>
    </div>
    </div>
    </div>

    <div class="col-sm-6 col-xl-3">
    <div class="card shadow-none m-0 border-start">
    <div class="card-body text-center">
    <i class="dripicons-user-group text-muted" style="font-size: 24px;"></i>
    <h3><span><?php echo $studentCount; ?></span></h3>
    <p class="text-muted font-15 mb-0">Total Students</p>
    </div>
    </div>
    </div>

    <div class="col-sm-6 col-xl-3">
    <div class="card shadow-none m-0 border-start">
    <div class="card-body text-center">
    <i class="dripicons-graph-line text-muted" style="font-size: 24px;"></i>
    <h3><span><?php echo $projectsCount; ?>%</span> <i class="mdi mdi-arrow-up text-success"></i></h3>
    <p class="text-muted font-15 mb-0">Productivity</p>
    </div>
    </div>
    </div>

    </div> <!-- end row -->
    </div>
    </div> <!-- end card-box-->
    </div> <!-- end col-->
    </div>
    <!-- end row-->


    <div class="row">
    <div class="col-lg-4">
    <div class="card">
    <div class="card-body">
    <div class="dropdown float-end">
    <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
    <i class="mdi mdi-dots-vertical"></i>
    </a>
    <div class="dropdown-menu dropdown-menu-end">
    <!-- item-->
    <a href="javascript:void(0);" class="dropdown-item">Weekly Report</a>
    <!-- item-->
    <a href="javascript:void(0);" class="dropdown-item">Monthly Report</a>
    <!-- item-->
    <a href="javascript:void(0);" class="dropdown-item">Action</a>
    <!-- item-->
    <a href="javascript:void(0);" class="dropdown-item">Settings</a>
    </div>
    </div>
    <h4 class="header-title mb-4">Project Status</h4>

    <div class="my-4 chartjs-chart" style="height: 202px;">
    <canvas id="project-status-chart" data-colors="#0acf97,#727cf5,#fa5c7c"></canvas>
    </div>

    <div class="row text-center mt-2 py-2">
    <div class="col-4">
    <i class="mdi mdi-trending-up text-success mt-3 h3"></i>
    <h3 class="fw-normal">
    <span>64%</span>
    </h3>
    <p class="text-muted mb-0">Completed</p>
    </div>
    <div class="col-4">
    <i class="mdi mdi-trending-down text-primary mt-3 h3"></i>
    <h3 class="fw-normal">
    <span>26%</span>
    </h3>
    <p class="text-muted mb-0"> In-progress</p>
    </div>
    <div class="col-4">
    <i class="mdi mdi-trending-down text-danger mt-3 h3"></i>
    <h3 class="fw-normal">
    <span>10%</span>
    </h3>
    <p class="text-muted mb-0"> Behind</p>
    </div>
    </div>
    <!-- end row-->

    </div> <!-- end card body-->
    </div> <!-- end card -->
    </div><!-- end col-->

    <div class="col-lg-8">
    <div class="card">
    <div class="card-body">
    <div class="dropdown float-end">
    <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
    <i class="mdi mdi-dots-vertical"></i>
    </a>
    <div class="dropdown-menu dropdown-menu-end">
    <!-- item-->
    <a href="javascript:void(0);" class="dropdown-item">Weekly Report</a>
    <!-- item-->
    <a href="javascript:void(0);" class="dropdown-item">Monthly Report</a>
    <!-- item-->
    <a href="javascript:void(0);" class="dropdown-item">Action</a>
    <!-- item-->
    <a href="javascript:void(0);" class="dropdown-item">Settings</a>
    </div>
    </div>
    <h4 class="header-title mb-3">Course</h4>

    <p><b>107</b> Course completed out of 195</p>

    <div class="table-responsive">
        <?php $stmt = $pdo->query("SELECT * FROM courses");
$courses = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
    <table class="table table-centered table-nowrap table-hover mb-0">
    <tbody>
        <!-- Loop through each course -->
        <?php foreach ($courses as $course): ?>
        <tr>
            <td>
                <h5 class="font-14 my-1"><a href="javascript:void(0);" class="text-body"><?php echo $course['courseName']; ?></a></h5>
                <span class="text-muted font-13">Due <?php echo $course['dueDate']; ?></span>
            </td>
            <td>
                <span class="text-muted font-13">Status</span> <br/>
                <span class="badge badge-warning-lighten"><?php echo $course['status']; ?></span>
            </td>
            <td>
                <span class="text-muted font-13">Assigned to</span>
                <h5 class="font-14 mt-1 fw-normal"><?php echo $course['assignedTo']; ?></h5>
            </td>
            <td>
                <span class="text-muted font-13">Total time spend</span>
                <h5 class="font-14 mt-1 fw-normal"><?php echo $course['totalTimeSpend']; ?></h5>
            </td>
            <td class="table-action" style="width: 90px;">
                <a href="javascript: void(0);" class="action-icon"> <i class="mdi mdi-pencil"></i></a>
                <a href="javascript: void(0);" class="action-icon"> <i class="mdi mdi-delete"></i></a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

    </div> <!-- end table-responsive-->

    </div> <!-- end card body-->
    </div> <!-- end card -->
    </div><!-- end col-->
    </div>
    <!-- end row-->


    <div class="row">
    <div class="col-12">
    <div class="card">
    <div class="card-body">
    <div class="dropdown float-end">
    <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
    <i class="mdi mdi-dots-vertical"></i>
    </a>
    <div class="dropdown-menu dropdown-menu-end">
    <!-- item-->
    <a href="javascript:void(0);" class="dropdown-item">Weekly Report</a>
    <!-- item-->
    <a href="javascript:void(0);" class="dropdown-item">Monthly Report</a>
    <!-- item-->
    <a href="javascript:void(0);" class="dropdown-item">Action</a>
    <!-- item-->
    <a href="javascript:void(0);" class="dropdown-item">Settings</a>
    </div>
    </div>
    <h4 class="header-title mb-4">Tasks Overview</h4>

    <div dir="ltr">
    <div class="mt-3 chartjs-chart" style="height: 320px;">
    <canvas id="task-area-chart" data-bgColor="#727cf5" data-borderColor="#727cf5"></canvas>
    </div>
    </div>

    </div> <!-- end card body-->
    </div> <!-- end card -->
    </div><!-- end col-->
    </div>
    <!-- end row-->


    <div class="row">
    <div class="col-xl-5">
    <div class="card">
    <div class="card-body">
    <div class="dropdown float-end">
    <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
    <i class="mdi mdi-dots-vertical"></i>
    </a>
    <div class="dropdown-menu dropdown-menu-end">
    <!-- item-->
    <a href="javascript:void(0);" class="dropdown-item">Weekly Report</a>
    <!-- item-->
    <a href="javascript:void(0);" class="dropdown-item">Monthly Report</a>
    <!-- item-->
    <a href="javascript:void(0);" class="dropdown-item">Action</a>
    <!-- item-->
    <a href="javascript:void(0);" class="dropdown-item">Settings</a>
    </div>
    </div>
    <h4 class="header-title mb-3">Recent Activities</h4>

<div class="table-responsive">
   <?php
// Fetch student data from the database
$stmt = $pdo->query("SELECT * FROM students");
$students = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<table class="table table-centered table-nowrap table-hover mb-0">
    <tbody>
        <?php foreach ($students as $student): ?>
            <tr>
                <td>
                    <div class="d-flex align-items-start">
                        <!-- Student Avatar -->
                        <!-- <img class="me-2 rounded-circle" src="assets/images/users/avatar-default.jpg" width="40" alt="Generic placeholder image"> -->
                        <!-- Student Details -->
                        <div>
                            <h5 class="mt-0 mb-1"><?php echo $student['studentName']; ?><small class="fw-normal ms-3"><?php echo date("d M Y h:i a", strtotime($student['admissionDate'])); ?></small></h5>
                            <span class="font-13">
                                <?php echo ucfirst($student['status']); ?> "<?php echo $student['courseName']; ?>"...
                            </span>
                        </div>
                    </div>
                </td>
                <td>
                    <span class="text-muted font-13">Project</span> <br/>
                    <p class="mb-0"><?php echo $student['batchName']; ?></p>
                </td>
                <td class="table-action" style="width: 50px;">
                    <div class="dropdown">
                        <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="mdi mdi-dots-horizontal"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <!-- Action Items -->
                            <a href="javascript:void(0);" class="dropdown-item">Settings</a>
                            <a href="javascript:void(0);" class="dropdown-item">Action</a>
                        </div>
                    </div>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

    </div> <!-- end table-responsive-->

    </div> <!-- end card body-->
    </div> <!-- end card -->
    </div><!-- end col-->

    <div class="col-xl-7">
    <div class="card">
    <div class="card-body">
    <div class="dropdown float-end">
    <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
    <i class="mdi mdi-dots-vertical"></i>
    </a>
    <div class="dropdown-menu dropdown-menu-end">
    <!-- item-->
    <a href="javascript:void(0);" class="dropdown-item">Weekly Report</a>
    <!-- item-->
    <a href="javascript:void(0);" class="dropdown-item">Monthly Report</a>
    <!-- item-->
    <a href="javascript:void(0);" class="dropdown-item">Action</a>
    <!-- item-->
    <a href="javascript:void(0);" class="dropdown-item">Settings</a>
    </div>
    </div>
    <h4 class="header-title mb-3">Your Calendar</h4>

    <div class="row">
    <div class="col-md-7">
    <div data-provide="datepicker-inline" data-date-today-highlight="true" class="calendar-widget"></div>
    </div> <!-- end col-->
    <div class="col-md-5">
    <ul class="list-unstyled">
    <li class="mb-4">
    <p class="text-muted mb-1 font-13">
    <i class="mdi mdi-calendar"></i> 7:30 AM - 10:00 AM
    </p>
    <h5>Meeting with BD Team</h5>
    </li>
    <li class="mb-4">
    <p class="text-muted mb-1 font-13">
    <i class="mdi mdi-calendar"></i> 10:30 AM - 11:45 AM
    </p>
    <h5>Design Review - Hyper Admin</h5>
    </li>
    <li class="mb-4">
    <p class="text-muted mb-1 font-13">
    <i class="mdi mdi-calendar"></i> 12:15 PM - 02:00 PM
    </p>
    <h5>Setup Github Repository</h5>
    </li>
    <li>
    <p class="text-muted mb-1 font-13">
    <i class="mdi mdi-calendar"></i> 5:30 PM - 07:00 PM
    </p>
    <h5>Meeting with Design Studio</h5>
    </li>
    </ul>
    </div> <!-- end col -->
    </div>
    <!-- end row -->

    </div> <!-- end card body-->
    </div> <!-- end card -->
    </div><!-- end col-->

    </div>
    <!-- end row-->


    </div> <!-- container -->

    </div> <!-- content -->

    <!-- Footer Start -->


    <?php include 'dash-footer.php'; ?> 