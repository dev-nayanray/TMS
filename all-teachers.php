<?php include 'teach.php'; ?>
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
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">TMS</a></li>
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Teachers</a></li>
                                    <li class="breadcrumb-item active">All Teachers</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Teachers</h4>
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
                                        <a href="javascript:void(0);" class="btn btn-danger mb-2"><i class="mdi mdi-plus-circle me-2"></i> Add Teacher</a>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="text-sm-end">
                                            <button type="button" class="btn btn-success mb-2 me-1"><i class="mdi mdi-cog"></i></button>
                                            <button type="button" class="btn btn-light mb-2 me-1">Import</button>
                                            <button type="button" class="btn btn-light mb-2">Export</button>
                                        </div>
                                    </div><!-- end col-->
                                </div>
            
                               
                                        <?php
// Include database connection file
include 'config.php';

// Fetch teachers data from the database
$stmt = $pdo->query("SELECT * FROM teachers");
$teachers = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<table class="table table-centered table-striped dt-responsive nowrap w-100" id="products-datatable">
    <thead>
        <tr>
            <th style="width: 20px;">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="customCheck1">
                    <label class="form-check-label" for="customCheck1">&nbsp;</label>
                </div>
            </th>
            <th>Teachers Name</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Location</th>
            <th>Joining Date</th>
            <th>Status</th>
            <th style="width: 75px;">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($teachers as $teacher): ?>
        <tr>
            <td>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="customCheck_<?php echo $teacher['teacherID']; ?>">
                    <label class="form-check-label" for="customCheck_<?php echo $teacher['teacherID']; ?>">&nbsp;</label>
                </div>
            </td>
            <td><?php echo $teacher['teacherName']; ?></td>
            <td><?php echo $teacher['phone']; ?></td>
            <td><?php echo $teacher['email']; ?></td>
            <td><?php echo $teacher['location']; ?></td>
            <td><?php echo $teacher['joiningDate']; ?></td>
            <td><?php echo $teacher['status']; ?></td>
            <td>
                <!-- Action buttons -->
                <!-- Example: Edit, Delete -->
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

        <!-- Footer Start -->
        <?php include 'teach-foot.php'; ?>
