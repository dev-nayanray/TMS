<?php
session_start(); // Start session to manage user login status

// Check if the user is not logged in, redirect to the login page
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
header("Location: pages-login.php");
exit();
}

// Include necessary files
include 'pro-addhead.php';
include 'config.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
// Initialize variables to store form data
$batchName = $startDate = $endDate = "";

// Sanitize and retrieve form data
$batchName = htmlspecialchars($_POST['batchName']);
$startDate = htmlspecialchars($_POST['startDate']);
$endDate = htmlspecialchars($_POST['endDate']);

// Insert batch details into the database
$sql = "INSERT INTO batches (batchName, startDate, endDate) VALUES (?, ?, ?)";
$stmt = $pdo->prepare($sql);
$stmt->execute([$batchName, $startDate, $endDate]);

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
                <li class="breadcrumb-item"><a href="javascript: void(0);">Batches</a></li>
                <li class="breadcrumb-item active">Create Batch</li>
            </ol>
        </div>
        <h4 class="page-title">Create Batch</h4>
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
                        <!-- Batch Name -->
                        <div class="mb-3">
                            <label for="batchName" class="form-label">Batch Name</label>
                            <input type="text" id="batchName" name="batchName" class="form-control" placeholder="Enter batch name" required>
                        </div>
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


                        <!-- Start Date -->
                        <div class="mb-3 position-relative" id="datepicker1">
                            <label class="form-label">Start Date</label>
                            <input type="text" class="form-control" name="startDate" data-provide="datepicker" data-date-container="#datepicker1" data-date-format="d-M-yyyy" data-date-autoclose="true" required>
                        </div>

                        <!-- End Date -->
                        <div class="mb-3 position-relative" id="datepicker2">
                            <label class="form-label">End Date</label>
                            <input type="text" class="form-control" name="endDate" data-provide="datepicker" data-date-container="#datepicker2" data-date-format="d-M-yyyy" data-date-autoclose="true" required>
                        </div>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="mt-3 mb-0">
                    <button type="submit" class="btn btn-primary waves-effect waves-light me-1">Create Batch</button>
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
