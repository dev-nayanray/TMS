<?php 
include 'header.php'; 

// Include database connection file
include 'config.php';

// Fetch projects data from the database
$stmt = $pdo->query("SELECT * FROM projects");
$projects = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!-- Begin page -->
<div class="wrapper">
    <!-- ========== Left Sidebar Start ========== -->
    <?php include 'sidebar.php'; ?>
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
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Hyper</a></li>
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Projects</a></li>
                                    <li class="breadcrumb-item active">Projects List</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Projects</h4>
                        </div>
                    </div>
                </div>     
                <!-- end page title --> 

                <div class="row mb-2">
                    <div class="col-sm-4">
                        <a href="apps-projects-add.php" class="btn btn-danger rounded-pill mb-3"><i class="mdi mdi-plus"></i>New Department</a>
                    </div>
                    <div class="col-sm-8">
                        <div class="text-sm-end">
                            <div class="btn-group mb-3">
                                <button type="button" class="btn btn-primary">All</button>
                            </div>
                            <div class="btn-group mb-3 ms-1">
                                <button type="button" class="btn btn-light">Ongoing</button>
                                <button type="button" class="btn btn-light">Finished</button>
                            </div>
                            <div class="btn-group mb-3 ms-2 d-none d-sm-inline-block">
                                <button type="button" class="btn btn-secondary"><i class="dripicons-view-apps"></i></button>
                            </div>
                            <div class="btn-group mb-3 d-none d-sm-inline-block">
                                <button type="button" class="btn btn-link text-muted"><i class="dripicons-checklist"></i></button>
                            </div>
                        </div>
                    </div><!-- end col-->
                </div> 
                <!-- end row-->

                <div class="row">
                    <?php foreach ($projects as $project): ?>
                    <div class="col-lg-6 col-xxl-3">
                        <!-- project card -->
                        <div class="card d-block">
                            <div class="card-body">
                                <!-- project title-->
                                <h4 class="mt-0">
                                    <a href="apps-projects-details.php" class="text-title"><?php echo $project['projectname']; ?></a>
                                </h4>
                                <!-- Display project status -->
                                <div class="badge bg-<?php echo ($project['status'] == 'Finished') ? 'success' : 'secondary'; ?> mb-3"><?php echo $project['status']; ?></div>

                                <!-- Display project overview -->
                                <p class="text-muted font-13 mb-3"><?php echo $project['overview']; ?><a href="javascript:void(0);" class="fw-bold text-muted">view more</a></p>

                                <!-- Display project details -->
                                <p class="mb-1">
                                    <span class="pe-2 text-nowrap mb-2 d-inline-block">
                                        <i class="mdi mdi-format-list-bulleted-type text-muted"></i>
                                        <b><?php echo isset($project['tasks']) ? $project['tasks'] : ''; ?></b> Tasks
                                    </span>
                                    <span class="text-nowrap mb-2 d-inline-block">
                                        <i class="mdi mdi-comment-multiple-outline text-muted"></i>
                                        <b><?php echo isset($project['comments']) ? $project['comments'] : ''; ?></b> Comments
                                    </span>
                                </p>
                            </div> <!-- end card-body-->
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item p-3">
                                    <!-- project progress-->
                                    <p class="mb-2 fw-bold">Progress <span class="float-end"><?php echo isset($project['progress']) ? $project['progress'] . '%' : ''; ?></span></p>
                                    <div class="progress progress-sm">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo isset($project['progress']) ? $project['progress'] : '0'; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo isset($project['progress']) ? $project['progress'] . '%' : '0%'; ?>;">
                                        </div><!-- /.progress-bar -->
                                    </div><!-- /.progress -->
                                </li>
                            </ul>
                        </div> <!-- end card-->
                    </div> <!-- end col -->
                    <?php endforeach; ?>
                </div>
                <!-- end row-->
                
            </div> <!-- container -->

        </div> <!-- content -->
        <?php include 'batch-depar.php'; ?>