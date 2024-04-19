<?php 
include 'header.php'; 

// Include database connection file
include 'config.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Initialize variables to store form data
    $teacherName = $phone = $email = $location = $batch = $department = $joiningDate = $status = "";

    // Sanitize and retrieve form data
    $teacherName = htmlspecialchars($_POST['teacherName']);
    $phone = htmlspecialchars($_POST['phone']);
    $email = htmlspecialchars($_POST['email']);
    $location = htmlspecialchars($_POST['location']);
    $batch = htmlspecialchars($_POST['batch']);
    $department = htmlspecialchars($_POST['department']);
    $joiningDate = htmlspecialchars($_POST['joiningDate']);
    $status = htmlspecialchars($_POST['status']);

    // Insert teacher details into the database
    $sql = "INSERT INTO teachers (teacherName, phone, email, location, batch, department, joiningDate, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$teacherName, $phone, $email, $location, $batch, $department, $joiningDate, $status]);

    // Redirect to a success page or refresh the current page
    // header("Location: success-page.php");
    // exit();
}
?>

<div class="wrapper">
    <!-- Include sidebar -->
    <?php include 'sidebar.php'; ?>

    <div class="content-page">
        <div class="content">
            <!-- Include topbar -->
            <?php include 'topbar.php'; ?>

            <div class="container-fluid">
                <!-- Page title and breadcrumb -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Hyper</a></li>
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Teachers</a></li>
                                    <li class="breadcrumb-item active">Add Teacher</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Add Teacher</h4>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <!-- Teacher Name -->
                                            <div class="mb-3">
                                                <label for="teacherName" class="form-label">Teacher Name</label>
                                                <input type="text" id="teacherName" name="teacherName" class="form-control" placeholder="Enter teacher name" required>
                                            </div>

                                            <!-- Phone -->
                                            <div class="mb-3">
                                                <label for="phone" class="form-label">Phone</label>
                                                <input type="text" id="phone" name="phone" class="form-control" placeholder="Enter phone number" required>
                                            </div>

                                            <!-- Email -->
                                            <div class="mb-3">
                                                <label for="email" class="form-label">Email</label>
                                                <input type="email" id="email" name="email" class="form-control" placeholder="Enter email" required>
                                            </div>

                                            <!-- Location -->
                                            <div class="mb-3">
                                                <label for="location" class="form-label">Location</label>
                                                <input type="text" id="location" name="location" class="form-control" placeholder="Enter location" required>
                                            </div>
                                        </div>

                                        <div class="col-xl-6">
                                            <!-- Batch -->
                                            <div class="mb-3">
                                                <label for="batch" class="form-label">Batch</label>
                                                <input type="text" id="batch" name="batch" class="form-control" placeholder="Enter batch" required>
                                            </div>

                                            <!-- Department -->
                                            <div class="mb-3">
                                                <label for="department" class="form-label">Department</label>
                                                <input type="text" id="department" name="department" class="form-control" placeholder="Enter department" required>
                                            </div>

                                            <!-- Joining Date -->
                                            <div class="mb-3 position-relative" id="datepicker">
                                                <label class="form-label">Joining Date</label>
                                                <input type="text" class="form-control" name="joiningDate" data-provide="datepicker" data-date-container="#datepicker" data-date-format="d-M-yyyy" data-date-autoclose="true" required>
                                            </div>

                                            <!-- Status -->
                                            <div class="mb-3">
                                                <label for="status" class="form-label">Status</label>
                                                <select class="form-select" id="status" name="status" required>
                                                    <option value="Active">Active</option>
                                                    <option value="Inactive">Inactive</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Submit Button -->
                                    <div class="mt-3 mb-0">
                                        <button type="submit" class="btn btn-primary waves-effect waves-light me-1">Add Teacher</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'add-foo.php'; ?>
