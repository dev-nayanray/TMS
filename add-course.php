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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Initialize variables to store form data
    $courseName = $overview = $startDate = $budget = $dueDate = $status = $totalTimeSpend = $assignedTo = "";

    // Sanitize and retrieve form data
    $courseName = htmlspecialchars($_POST['courseName']);
    $overview = htmlspecialchars($_POST['course-overview']);
    $startDate = htmlspecialchars($_POST['startDate']);
    $budget = htmlspecialchars($_POST['course-budget']);
    $dueDate = htmlspecialchars($_POST['dueDate']);
    $status = htmlspecialchars($_POST['Status']);
    $totalTimeSpend = htmlspecialchars($_POST['Total-time-spend']);
    $assignedTo = htmlspecialchars($_POST['assigned-to']);
    $projectnames     = htmlspecialchars($_POST['assigned-to']);

    // Insert course details into the database
    $sql = "INSERT INTO courses (courseName, overview, startDate, budget, dueDate, status, totalTimeSpend, assignedTo,  projectnames) VALUES (?, ?, ?, ?, ?, ?, ?, ?,?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$courseName, $overview, $startDate, $budget, $dueDate, $status, $totalTimeSpend, $assignedTo,$projectnames]);

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
        <li class="breadcrumb-item"><a href="javascript: void(0);">TMS</a></li>
        <li class="breadcrumb-item"><a href="javascript: void(0);">Courses</a></li>
        <li class="breadcrumb-item active">Create Course</li>
    </ol>
</div>
<h4 class="page-title">Create Course</h4>
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
                <!-- Course Name -->
                <div class="mb-3">
                    <label for="courseName" class="form-label">Name</label>
                    <input type="text" id="courseName" name="courseName" class="form-control" placeholder="Enter course name" required>
                </div>
                <div class="mb-3">
                <label for="projectname" class="form-label">Department Name</label>
                <select id="courseNames" name="projectsnames" class="form-select" required>
        <option value="">Select Department</option>
        
    </select>
            </div>


                <!-- Course Overview -->
                <div class="mb-3">
                    <label for="course-overview" class="form-label">Overview</label>
                    <textarea class="form-control" id="course-overview" name="course-overview" rows="5" placeholder="Enter some brief about course.." required></textarea>
                </div>

                <!-- Start Date -->
                <div class="mb-3 position-relative" id="datepicker1">
                    <label class="form-label">Start Date</label>
                    <input type="text" class="form-control" name="startDate" data-provide="datepicker" data-date-container="#datepicker1" data-date-format="d-M-yyyy" data-date-autoclose="true" required>
                </div>

                <!-- Course Budget -->
                <div class="mb-3">
                    <label for="course-budget" class="form-label">Budget</label>
                    <input type="text" id="course-budget" name="course-budget" class="form-control" placeholder="Enter course budget" required>
                </div>
            </div>
<div class="mb-3">
    <label for="assigned-to" class="form-label">Assigned to</label>
    <select id="assigned-to" name="assigned-to" class="form-select" required>
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

            <div class="col-xl-6">
                <!-- Due Date -->
                <div class="mb-3 position-relative" id="datepicker2">
                    <label class="form-label">Due Date</label>
                    <input type="text" class="form-control" name="dueDate" data-provide="datepicker" data-date-container="#datepicker2" data-date-format="d-M-yyyy" data-date-autoclose="true" required>
                </div>
            </div>
        </div>
        <div class="mb-3">
                    <label for="course-budget" class="form-label">Status</label>
                    <input type="text" id="course-budget" name="Status" class="form-control" placeholder="Enter Status" required>
                </div>
            
            <div class="mb-3">
                    <label for="course-budget" class="form-label">Total time spend</label>
                    <input type="text" id="course-budget" name="Total-time-spend" class="form-control" placeholder="Enter Time" required>
                </div>
            </div>
            


        <!-- Submit Button -->
        <div class="mt-3 mb-0">
            <button type="submit" class="btn btn-primary waves-effect waves-light me-1">Create Course</button>
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
