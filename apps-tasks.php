
<?php include 'header.php'; ?>                  
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

<div class="row">
<div class="col-xxl-8">
<!-- start page title -->
<div class="page-title-box">
<div class="page-title-right">
<div class="app-search">
<form>
<div class="input-group">
<input type="text" class="form-control" placeholder="Search..." />
<span class="mdi mdi-magnify search-icon"></span>
<button class="input-group-text btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
    aria-haspopup="true" aria-expanded="false">
    <i class='uil uil-sort-amount-down'></i>
</button>
<div class="dropdown-menu dropdown-menu-end">
    <a class="dropdown-item" href="#">Due Date</a>
    <a class="dropdown-item" href="#">Added Date</a>
    <a class="dropdown-item" href="#">Assignee</a>
</div>
</div>
</form>
</div>
</div>
<h4 class="page-title">Course <a href="add-course.php" class="btn btn-success btn-sm ms-3">New Course</a></h4>
</div>
<!-- end page title -->

<!-- tasks panel -->
<?php
// Fetch course data from the database
include 'config.php'; // Assuming this file contains database connection code

$sql = "SELECT * FROM courses";
$stmt = $pdo->query($sql);
$courses = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="mt-2">
<h5 class="m-0 pb-2">
<a class="text-dark" data-bs-toggle="collapse" href="#todayTasks" role="button" aria-expanded="false" aria-controls="todayTasks">
<i class='uil uil-angle-down font-18'></i> Today <span class="text-muted">(<?php echo count($courses); ?>)</span>
</a>
</h5>

<div class="collapse show" id="todayTasks">
<div class="card mb-0">
<div class="card-body">
<?php
// Fetch courses data from the database
$stmt = $pdo->query("SELECT * FROM courses");
$courses = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<?php foreach ($courses as $course): ?>
    <!-- Course -->
    <div class="row justify-content-sm-between">
        <div class="col-sm-6 mb-2 mb-sm-0">
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="task<?php echo $course['id']; ?>">
                <label class="form-check-label" for="task<?php echo $course['id']; ?>">
                    <?php echo $course['courseName']; ?>
                </label>
            </div> <!-- end checkbox -->
        </div> <!-- end col -->
        <div class="col-sm-6">
            <div class="d-flex justify-content-between">
                <div id="tooltip-container<?php echo $course['id']; ?>">
                    
                </div>
                <div>
                    <ul class="list-inline font-13 text-end">
                        <li class="list-inline-item">
                            <i class='uil uil-schedule font-16 me-1'></i> <?php echo $course['startDate']; ?>
                        </li>
                        <li class="list-inline-item ms-1">
                            <i class='uil uil-align-alt font-16 me-1'></i> <?php echo $course['status']; ?>
                        </li>
                        <li class="list-inline-item ms-1">
                            <i class='uil uil-comment-message font-16 me-1'></i> <?php echo $course['totalTimeSpend']; ?>
                        </li>
                        <li class="list-inline-item ms-2">
                            <span class="badge badge-info-lighten p-1"><?php echo ucfirst($course['overview']); ?></span>
                        </li>
                    </ul>
                </div>
            </div> <!-- end .d-flex-->
        </div> <!-- end col -->
    </div>
    <!-- end Course -->
<?php endforeach; ?>
<!-- end task -->
</div> <!-- end card-body-->
</div> <!-- end card -->
</div> <!-- end .collapse-->
</div> <!-- end .mt-2-->
<!-- end .mt-2-->

<!-- upcoming tasks -->
<div class="mt-4">

<h5 class="m-0 pb-2">
<a class="text-dark" data-bs-toggle="collapse" href="#upcomingTasks" role="button" aria-expanded="false" aria-controls="upcomingTasks">
<i class='uil uil-angle-down font-18'></i>Upcoming <span class="text-muted">(5)</span>
</a>
</h5>

<div class="collapse show" id="upcomingTasks">
<div class="card mb-0">
<div class="card-body">
<!-- task -->
<?php
// Fetch courses data from the database
$stmt = $pdo->query("SELECT * FROM courses");
$courses = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<?php foreach ($courses as $course): ?>
    <!-- Course -->
    <div class="row justify-content-sm-between">
        <div class="col-sm-6 mb-2 mb-sm-0">
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="task<?php echo $course['id']; ?>">
                <label class="form-check-label" for="task<?php echo $course['id']; ?>">
                    <?php echo $course['courseName']; ?>
                </label>
            </div> <!-- end checkbox -->
        </div> <!-- end col -->
        <div class="col-sm-6">
            <div class="d-flex justify-content-between">
                <div id="tooltip-container<?php echo $course['id']; ?>">
                    
                </div>
                <div>
                    <ul class="list-inline font-13 text-end">
                        <li class="list-inline-item">
                            <i class='uil uil-schedule font-16 me-1'></i> <?php echo $course['startDate']; ?>
                        </li>
                        <li class="list-inline-item ms-1">
                            <i class='uil uil-align-alt font-16 me-1'></i> <?php echo $course['status']; ?>
                        </li>
                        <li class="list-inline-item ms-1">
                            <i class='uil uil-comment-message font-16 me-1'></i> <?php echo $course['totalTimeSpend']; ?>
                        </li>
                        <li class="list-inline-item ms-2">
                            <span class="badge badge-info-lighten p-1"><?php echo ucfirst($course['overview']); ?></span>
                        </li>
                    </ul>
                </div>
            </div> <!-- end .d-flex-->
        </div> <!-- end col -->
    </div>
    <!-- end Course -->
<?php endforeach; ?>
<!-- end task -->
<!-- end task -->
</div> <!-- end card-body-->
</div> <!-- end card -->
</div> <!-- end collapse-->
</div>
<!-- end upcoming tasks -->

<!-- start other tasks -->
<div class="mt-4 mb-4">
<h5 class="m-0 pb-2">
<a class="text-dark" data-bs-toggle="collapse" href="#otherTasks" role="button" aria-expanded="false" aria-controls="otherTasks">
<i class='uil uil-angle-down font-18'></i>Other <span class="text-muted">(3)</span>
</a>
</h5>

<div class="collapse show" id="otherTasks">
<div class="card mb-0">
<div class="card-body">
<!-- task -->
<?php
// Fetch courses data from the database
$stmt = $pdo->query("SELECT * FROM courses");
$courses = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<?php foreach ($courses as $course): ?>
    <!-- Course -->
    <div class="row justify-content-sm-between">
        <div class="col-sm-6 mb-2 mb-sm-0">
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="task<?php echo $course['id']; ?>">
                <label class="form-check-label" for="task<?php echo $course['id']; ?>">
                    <?php echo $course['courseName']; ?>
                </label>
            </div> <!-- end checkbox -->
        </div> <!-- end col -->
        <div class="col-sm-6">
            <div class="d-flex justify-content-between">
                <div id="tooltip-container<?php echo $course['id']; ?>">
                    
                </div>
                <div>
                    <ul class="list-inline font-13 text-end">
                        <li class="list-inline-item">
                            <i class='uil uil-schedule font-16 me-1'></i> <?php echo $course['startDate']; ?>
                        </li>
                        <li class="list-inline-item ms-1">
                            <i class='uil uil-align-alt font-16 me-1'></i> <?php echo $course['status']; ?>
                        </li>
                        <li class="list-inline-item ms-1">
                            <i class='uil uil-comment-message font-16 me-1'></i> <?php echo $course['totalTimeSpend']; ?>
                        </li>
                        <li class="list-inline-item ms-2">
                            <span class="badge badge-info-lighten p-1"><?php echo ucfirst($course['overview']); ?></span>
                        </li>
                    </ul>
                </div>
            </div> <!-- end .d-flex-->
        </div> <!-- end col -->
    </div>
    <!-- end Course -->
<?php endforeach; ?>
<!-- end task -->

<!-- task -->

<!-- end task -->
</div> <!-- end card-body-->
</div> <!-- end card -->
</div>
</div>
</div> <!-- end col -->

<!-- task details -->
<div class="col-xxl-4">
<div class="card">
<div class="card-body">
<div class="dropdown card-widgets">
<a href="#" class="dropdown-toggle arrow-none" data-bs-toggle="dropdown" aria-expanded="false">
<i class='uil uil-ellipsis-h'></i>
</a>
<div class="dropdown-menu dropdown-menu-end">
<!-- item-->
<a href="javascript:void(0);" class="dropdown-item">
<i class='uil uil-file-upload me-1'></i>Attachment
</a>
<!-- item-->
<a href="javascript:void(0);" class="dropdown-item">
<i class='uil uil-edit me-1'></i>Edit
</a>
<!-- item-->
<a href="javascript:void(0);" class="dropdown-item">
<i class='uil uil-file-copy-alt me-1'></i>Mark as Duplicate
</a>
<div class="dropdown-divider"></div>
<!-- item-->
<a href="javascript:void(0);" class="dropdown-item text-danger">
<i class='uil uil-trash-alt me-1'></i>Delete
</a>
</div> <!-- end dropdown menu-->
</div> <!-- end dropdown-->

<div class="form-check float-start">
<input type="checkbox" class="form-check-input" id="completedCheck">
<label class="form-check-label" for="completedCheck">
Mark as completed
</label>
</div> <!-- end form-check-->

<hr class="mt-4 mb-2" />

<div class="row">
<div class="col">

<h4>Draft the new contract document for sales team</h4>

<div class="row">
<div class="col-6">
    <!-- assignee -->
    <p class="mt-2 mb-1 text-muted">Assigned To</p>
    <div class="d-flex">
        <img src="assets/images/users/avatar-9.jpg" alt="Arya S" class="rounded-circle me-2" height="24" />
        <div>
            <h5 class="mt-1 font-14">
                Arya Stark
            </h5>
        </div>
    </div>
    <!-- end assignee -->
</div> <!-- end col -->

<div class="col-6">
    <!-- start due date -->
    <p class="mt-2 mb-1 text-muted">Due Date</p>
    <div class="d-flex">
        <i class='uil uil-schedule font-18 text-success me-1'></i>
        <div>
            <h5 class="mt-1 font-14">
                Today 10am
            </h5>
        </div>
    </div>
    <!-- end due date -->
</div> <!-- end col -->
</div> <!-- end row -->

<!-- task description -->
<div class="row mt-3">
<div class="col">
    <div class="border rounded">
        <div id="bubble-editor" style="height: 130px;">
            <h3>This is an simple editable area.</h3>
            
            <ul>
                <li>
                    Select a text to reveal the toolbar.
                </li>
                <li>
                    Edit rich document on-the-fly, so elastic!
                </li>
                <li>
                    End of Simple Era
                </li>
                
            </ul>
            
            
        </div> <!-- end Snow-editor-->
    </div>
</div> <!-- end col -->
</div>
<!-- end task description -->

<!-- start sub tasks/checklists -->
<h5 class="mt-4 mb-2 font-16">Checklists</h5>
<div class="form-check mt-1">
<input type="checkbox" class="form-check-input" id="checklist1">
<label class="form-check-label strikethrough" for="checklist1">
    Find out the old contract documents
</label>
</div>

<div class="form-check mt-1">
<input type="checkbox" class="form-check-input" id="checklist2">
<label class="form-check-label strikethrough" for="checklist2">
    Organize meeting sales associates to understand need in detail
</label>
</div>

<div class="form-check mt-1">
<input type="checkbox" class="form-check-input" id="checklist3">
<label class="form-check-label strikethrough" for="checklist3">
    Make sure to cover every small details
</label>
</div>
<!-- end sub tasks/checklists -->

<!-- start attachments -->
<h5 class="mt-4 mb-2 font-16">Attachments</h5>
<div class="card mb-2 shadow-none border">
<div class="p-1">
    <div class="row align-items-center">
        <div class="col-auto">
            <div class="avatar-sm">
                <span class="avatar-title rounded">
                    .ZIP
                </span>
            </div>
        </div>
        <div class="col ps-0">
            <a href="javascript:void(0);" class="text-muted fw-bold">sales-assets.zip</a>
            <p class="mb-0">2.3 MB</p>
        </div>
        <div class="col-auto" id="tooltip-container9">
            <!-- Button -->
            <a href="javascript:void(0);" data-bs-container="#tooltip-container9" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Download"
                class="btn btn-link text-muted btn-lg p-0">
                <i class='uil uil-cloud-download'></i>
            </a>
            <a href="javascript:void(0);" data-bs-container="#tooltip-container9" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete"
                class="btn btn-link text-danger btn-lg p-0">
                <i class='uil uil-multiply'></i>
            </a>
        </div>
    </div>
</div>
</div>
<div class="card mb-2 shadow-none border">
<div class="p-1">
    <div class="row align-items-center">
        <div class="col-auto">
            <img src="assets/images/projects/project-1.jpg"
                class="avatar-sm rounded" alt="file-image">
        </div>
        <div class="col ps-0">
            <a href="javascript:void(0);" class="text-muted fw-bold">new-contarcts.docx</a>
            <p class="mb-0">1.25 MB</p>
        </div>
        <div class="col-auto" id="tooltip-container10">
            <!-- Button -->
            <a href="javascript:void(0);" data-bs-container="#tooltip-container10" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Download"
                class="btn btn-link text-muted btn-lg p-0">
                <i class='uil uil-cloud-download'></i>
            </a>
            <a href="javascript:void(0);" data-bs-container="#tooltip-container10" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete"
                class="btn btn-link text-danger btn-lg p-0">
                <i class='uil uil-multiply'></i>
            </a>
        </div>
    </div>
</div>
</div>
<!-- end attachments -->

<!-- comments -->
<div class="row mt-3">
<div class="col">
    <h5 class="mb-2 font-16">Comments</h5>

    <div class="d-flex mt-3 p-1">
        <img src="assets/images/users/avatar-9.jpg" class="me-2 rounded-circle"
            height="36" alt="Arya Stark" />
        <div class="w-100">
            <h5 class="mt-0 mb-0">
                <span class="float-end text-muted font-12">4:30am</span>
                Arya Stark
            </h5>
            <p class="mt-1 mb-0 text-muted">
                Should I review the last 3 years legal documents as well?
            </p>
        </div>
    </div> <!-- end comment -->

    <hr />

    <div class="d-flex mt-2 p-1">
        <img src="assets/images/users/avatar-5.jpg"
            class="me-2 rounded-circle" height="36" alt="Dominc B" />
        <div class="w-100">
            <h5 class="mt-0 mb-0">
                <span class="float-end text-muted font-12">3:30am</span>
                Gary Somya
            </h5>
            <p class="mt-1 mb-0 text-muted">
                @Arya FYI..I have created some general guidelines last year.
            </p>
        </div>
    </div> <!-- end comment-->

    <hr />

</div> <!-- end col -->
</div> <!-- end row -->

<div class="row mt-2">
<div class="col">
    <div class="border rounded">
        <form action="#" class="comment-area-box">
            <textarea rows="3" class="form-control border-0 resize-none"
            placeholder="Your comment..."></textarea>
            <div class="p-2 bg-light">
                <div class="float-end">
                    <button type="submit" class="btn btn-sm btn-success"><i class='uil uil-message me-1'></i>Submit</button>
                </div>
                <div>
                    <a href="#" class="btn btn-sm px-1 btn-light"><i class='uil uil-cloud-upload'></i></a>
                    <a href="#" class="btn btn-sm px-1 btn-light"><i class='uil uil-at'></i></a>
                </div>
            </div>
        </form>
    </div> <!-- end .border-->
</div> <!-- end col-->
</div> <!-- end row-->
<!-- end comments -->
</div> <!-- end col -->
</div> <!-- end row-->
</div> <!-- end card-body -->
</div> <!-- end card-->
</div> <!-- end col -->
</div>
<!-- end row-->

</div> <!-- container -->

</div> <!-- content -->

<!-- Footer Start -->
<?php include 'app-footer.php'; ?> 
