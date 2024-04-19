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
    $projectname = $overview = $startdate = $budget = $duedate = "";

    // Sanitize and retrieve form data
    $projectname = htmlspecialchars($_POST['projectname']);
    $overview = htmlspecialchars($_POST['project-overview']);
    $startdate = htmlspecialchars($_POST['startdate']);
    $budget = htmlspecialchars($_POST['project-budget']);
    $duedate = htmlspecialchars($_POST['duedate']);

    // Insert project details into the database
    $sql = "INSERT INTO projects (projectname, overview, startdate, budget, duedate) VALUES (?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$projectname, $overview, $startdate, $budget, $duedate]);

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
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Projects</a></li>
                                    <li class="breadcrumb-item active">Create Project</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Create Project</h4>
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
                                            <!-- Project Name -->
                                            <div class="mb-3">
                                                <label for="projectname" class="form-label">Name</label>
                                                <input type="text" id="projectname" name="projectname" class="form-control" placeholder="Enter project name" required>
                                            </div>

                                            <!-- Project Overview -->
                                            <div class="mb-3">
                                                <label for="project-overview" class="form-label">Overview</label>
                                                <textarea class="form-control" id="project-overview" name="project-overview" rows="5" placeholder="Enter some brief about project.." required></textarea>
                                            </div>

                                            <!-- Start Date -->
                                            <div class="mb-3 position-relative" id="datepicker1">
                                                <label class="form-label">Start Date</label>
                                                <input type="text" class="form-control" name="startdate" data-provide="datepicker" data-date-container="#datepicker1" data-date-format="d-M-yyyy" data-date-autoclose="true" required>
                                            </div>

                                            <!-- Project Budget -->
                                            <div class="mb-3">
                                                <label for="project-budget" class="form-label">Budget</label>
                                                <input type="text" id="project-budget" name="project-budget" class="form-control" placeholder="Enter project budget" required>
                                            </div>
                                        </div>

                                        <div class="col-xl-6">
                                            <!-- Due Date -->
                                            <div class="mb-3 position-relative" id="datepicker2">
                                                <label class="form-label">Due Date</label>
                                                <input type="text" class="form-control" name="duedate" data-provide="datepicker" data-date-container="#datepicker2" data-date-format="d-M-yyyy" data-date-autoclose="true" required>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Submit Button -->
                                    <div class="mt-3 mb-0">
                                        <button type="submit" class="btn btn-primary waves-effect waves-light me-1">Create Project</button>
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
