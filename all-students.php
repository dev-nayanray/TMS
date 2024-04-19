<?php 
include 'header.php'; 

// Include database connection file
include 'config.php';

// Fetch student data from the database
$stmt = $pdo->query("SELECT * FROM students");
$students = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Students</a></li>
                                    <li class="breadcrumb-item active">All Students</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Students</h4>
                        </div>
                    </div>
                </div>     
                <!-- end page title --> 

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row mb-2">
                                    <div class="col-sm-4">
                                        <a href="add-student.php" class="btn btn-danger mb-2"><i class="mdi mdi-plus-circle me-2"></i> Add Students</a>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="text-sm-end">
                                            <button type="button" class="btn btn-success mb-2 me-1"><i class="mdi mdi-cog"></i></button>
                                            <button type="button" class="btn btn-light mb-2 me-1">Import</button>
                                            <button type="button" class="btn btn-light mb-2">Export</button>
                                        </div>
                                    </div><!-- end col-->
                                </div>
        
                                <div class="table-responsive">
                                    <table class="table table-centered table-striped dt-responsive nowrap w-100" id="products-datatable">
                                        <thead>
                                            <tr>
                                                <th style="width: 20px;">
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input" id="customCheck1">
                                                        <label class="form-check-label" for="customCheck1">&nbsp;</label>
                                                    </div>
                                                </th>
                                                <th>Student Name</th>
                                                <th>Phone</th>
                                                <th>Email</th>
                                                <th>Location</th>
                                                <th>Admission Date</th>
                                                <th>End  Date</th>
                                                
                                                <th>Batch Name</th>
                                                <th>Course Name</th>
                                                <th>Teachers Name</th>
                                                <th>Status</th>
                                                <th style="width: 75px;">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($students as $student): ?>
                                                <tr>
                                                    <td>
                                                        <div class="form-check">
                                                            <input type="checkbox" class="form-check-input">
                                                            <label class="form-check-label">&nbsp;</label>
                                                        </div>
                                                    </td>
                                                    <td><?php echo $student['studentName']; ?></td>
                                                    <td><?php echo $student['phone']; ?></td>
                                                    <td><?php echo $student['email']; ?></td>
                                                    <td><?php echo $student['location']; ?></td>
                                                    <td><?php echo $student['admissionDate']; ?></td>
                                                    <td><?php echo $student['endDate']; ?></td>
                                                    <td><?php echo $student['batchName']; ?></td>
                                                    <td><?php echo $student['courseName']; ?></td>
                                                    <td><?php echo $student['teachersName']; ?></td>
                                                    <td><?php echo $student['status']; ?></td>
                                                    <td>
                                                        <a href="#" class="btn btn-xs btn-secondary"><i class="mdi mdi-pencil"></i></a>
                                                        <a href="#" class="btn btn-xs btn-danger"><i class="mdi mdi-trash-can-outline"></i></a>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div> <!-- end card-body-->
                        </div> <!-- end card-->
                    </div> <!-- end col -->
                </div>
                <!-- end row -->
                
            </div> <!-- container -->

        </div> <!-- content -->

        <?php include 'teach-foot.php'; ?>
