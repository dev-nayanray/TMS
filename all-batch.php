<?php 
include 'header.php'; 

// Include database connection file
include 'config.php';

// Fetch batches data from the database
$stmt = $pdo->query("SELECT * FROM batches");
$batches = $stmt->fetchAll(PDO::FETCH_ASSOC);
// Fetch count of batches from the database
$stmt = $pdo->query("SELECT COUNT(*) AS batchCount FROM batches");
if ($stmt) {
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $batchCount = $row['batchCount'];
} else {
    $batchCount = 0; // Default to 0 if there's an error fetching the count
}
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
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Batches</a></li>
                                    <li class="breadcrumb-item active">Batches List</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Batches</h4>
<p>Total Batches: <?php echo $batchCount; ?></p>
                        </div>
                    </div>
                </div>     
                <!-- end page title --> 

                <div class="row mb-2">
                    <div class="col-sm-4">
                        <a href="apps-batches-add.php" class="btn btn-danger rounded-pill mb-3"><i class="mdi mdi-plus"></i>New Batch</a>
                    </div>
                </div> 
                <!-- end row-->

                <div class="row">
                    <?php foreach ($batches as $batch): ?>
                    <div class="col-lg-6 col-xxl-3">
                        <!-- batch card -->
                        <div class="card d-block">
                            <div class="card-body">
                                <!-- batch title-->
                                <h4 class="mt-0">
                                    <a href="apps-batches-details.php" class="text-title"><?php echo $batch['batchName']; ?></a>
                                </h4>
                                <!-- Display batch dates -->
                                <p class="text-muted font-13 mb-3">
                                    <b>Start Date:</b> <?php echo $batch['startDate']; ?><br>
                                    <b>End Date:</b> <?php echo $batch['endDate']; ?>
                                </p>
                            </div> <!-- end card-body-->
                        </div> <!-- end card-->
                    </div> <!-- end col -->
                    <?php endforeach; ?>
                </div>
                <!-- end row-->
                
            </div> <!-- container -->

        </div> <!-- content -->
        <?php include 'batch-depar.php'; ?>
