<?php 
include 'header.php'; 

// Include database connection file
include 'config.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
// Initialize variables to store form data
$studentName = $phone = $email = $location = $admissionDate = $endDate = $batchName = $courseName = $teachersName = $status = "";

// Sanitize and retrieve form data
$studentName = htmlspecialchars($_POST['studentName']);
$phone = htmlspecialchars($_POST['phone']);
$email = htmlspecialchars($_POST['email']);
$location = htmlspecialchars($_POST['location']);
$admissionDate = htmlspecialchars($_POST['admissionDate']);
$endDate = htmlspecialchars($_POST['endDate']);
$batchName = htmlspecialchars($_POST['batchName']);
$courseName = htmlspecialchars($_POST['courseName']);
$teachersName = htmlspecialchars($_POST['teachersName']);
$status = htmlspecialchars($_POST['status']);

// Insert student details into the database
$sql = "INSERT INTO students (studentName, phone, email, location, admissionDate, endDate, batchName, courseName, teachersName, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = $pdo->prepare($sql);
$stmt->execute([$studentName, $phone, $email, $location, $admissionDate, $endDate, $batchName, $courseName, $teachersName, $status]);

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
    <li class="breadcrumb-item"><a href="javascript: void(0);">Students</a></li>
    <li class="breadcrumb-item active">Add Student</li>
</ol>
</div>
<h4 class="page-title">Add Student</h4>
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
            <!-- Student Name -->
            <div class="mb-3">
                <label for="studentName" class="form-label">Student Name</label>
                <input type="text" id="studentName" name="studentName" class="form-control" placeholder="Enter student name" required>
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

            <!-- Admission Date -->
            <div class="mb-3 position-relative" id="datepicker1">
                <label class="form-label">Admission Date</label>
                <input type="text" class="form-control" name="admissionDate" data-provide="datepicker" data-date-container="#datepicker1" data-date-format="d-M-yyyy" data-date-autoclose="true" required>
            </div>

            <!-- End Date -->
            <div class="mb-3 position-relative" id="datepicker2">
                <label class="form-label">End Date</label>
                <input type="text" class="form-control" name="endDate" data-provide="datepicker" data-date-container="#datepicker2" data-date-format="d-M-yyyy" data-date-autoclose="true" required>
            </div>
        </div>

        <div class="col-xl-6">
            <!-- Batch Name -->
            <div class="mb-3">
                <label for="batchName" class="form-label">Batch Name</label>
                
                <select id="batchName" name="batchName" class="form-select" required>
        <option value="">Select Batch</option>
        <?php 
        // Fetch teacher names from the database
        $stmt = $pdo->query("SELECT * FROM batches ORDER BY batchName ASC");
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<option value='" . $row['batchName'] . "'>" . $row['batchName'] . "</option>";
        }
        ?>
    </select>
            </div>

            <!-- Course Name -->
            <div class="mb-3">
                <label for="courseName" class="form-label">Course Name</label>
                <select id="courseName" name="courseName" class="form-select" required>
        <option value="">Select Course</option>
        <?php 
        // Fetch teacher names from the database
        $stmt = $pdo->query("SELECT * FROM courses ORDER BY courseName ASC");
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<option value='" . $row['courseName'] . "'>" . $row['courseName'] . "</option>";
        }
        ?>
    </select>
            </div>

            <!-- Teachers Name -->
            <div class="mb-3">
                <label for="teachersName" class="form-label">Teachers Name</label>
                
                <select id="teachersName" name="teachersName" class="form-select" required>
        <option value="">Select teacher</option>
        <?php 
        // Fetch teacher names from the database
        $stmt = $pdo->query("SELECT * FROM teachers ORDER BY teacherName ASC");
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<option value='" . $row['teacherName'] . "'>" . $row['teacherName'] . "</option>";
        }
        ?>
    </select>
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
        <button type="submit" class="btn btn-primary waves-effect waves-light me-1">Add Student</button>
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
