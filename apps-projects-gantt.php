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

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Hyper</a></li>
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Projects</a></li>
                                            <li class="breadcrumb-item active">Gantt</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Projects Calendar</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <!-- start projects-->
                                    <div class="col-xxl-3 col-lg-4">
                                        <div class="pe-xl-3">
                                            <h5 class="mt-0 mb-3">Projects</h5>
                                            <!-- start search box -->
                                            <div class="app-search">
                                                <form>
                                                    <div class="mb-2 position-relative">
                                                        <input type="text" class="form-control"
                                                            placeholder="search by name..." />
                                                        <span class="mdi mdi-magnify search-icon"></span>
                                                    </div>
                                                </form>
                                            </div>
                                            <!-- end search box -->

                                            <div class="row">
                                                <div class="col">
                                                    <div data-simplebar style="max-height: 535px;">
                                                        <a href="javascript:void(0);" class="text-body">
                                                            <div class="d-flex mt-2 p-2">
                                                                <div class="avatar-sm d-table">
                                                                    <span class="avatar-title bg-success-lighten rounded-circle text-success">
                                                                        <i class='uil uil-moonset font-24'></i>
                                                                    </span>
                                                                </div>
                                                                <div class="ms-2">
                                                                    <h5 class="mt-0 mb-0">
                                                                        Lunar
                                                                        <span class="badge badge-success-lighten ms-1">On Track</span>
                                                                    </h5>
                                                                    <p class="mt-1 mb-0 text-muted">
                                                                        ID: proj101
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </a>

                                                        <a href="javascript:void(0);" class="text-body">
                                                            <div class="d-flex bg-light p-2">
                                                                <div class="avatar-sm d-table">
                                                                    <span
                                                                        class="avatar-title bg-success-lighten rounded-circle text-success">
                                                                        <i class='uil uil-moon-eclipse font-24'></i>
                                                                    </span>
                                                                </div>
                                                                <div class="ms-2">
                                                                    <h5 class="mt-0 mb-0">
                                                                        Dark Moon
                                                                        <span class="badge badge-success-lighten ms-1">On
                                                                            Track</span>
                                                                    </h5>
                                                                    <p class="mt-1 mb-0 text-muted">
                                                                        ID: proj102
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </a>

                                                        <a href="javascript:void(0);" class="text-body">
                                                            <div class="d-flex mt-1 px-2 py-2">
                                                                <div class="avatar-sm d-table">
                                                                    <span
                                                                        class="avatar-title bg-warning-lighten rounded-circle text-warning">
                                                                        <i class='uil uil-mountains font-24'></i>
                                                                    </span>
                                                                </div>
                                                                <div class="ms-2">
                                                                    <h5 class="mt-0 mb-0">
                                                                        Aurora
                                                                        <span class="badge badge-warning-lighten ms-1">Locked</span>
                                                                    </h5>
                                                                    <p class="mt-1 mb-0 text-muted">
                                                                        ID: proj103
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </a>

                                                        <a href="javascript:void(0);" class="text-body">
                                                            <div class="d-flex mt-1 px-2 py-2">
                                                                <div class="avatar-sm d-table">
                                                                    <span
                                                                        class="avatar-title bg-warning-lighten rounded-circle text-warning">
                                                                        <i class='uil uil-moon font-24'></i>
                                                                    </span>
                                                                </div>
                                                                <div class="ms-2">
                                                                    <h5 class="mt-0 mb-0">
                                                                        Blue Moon
                                                                        <span
                                                                            class="badge badge-warning-lighten ms-1">Locked</span>
                                                                    </h5>
                                                                    <p class="mt-1 mb-0 text-muted">
                                                                        ID: proj104
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </a>

                                                        <a href="javascript:void(0);" class="text-body">
                                                            <div class="d-flex mt-1 px-2 py-2">
                                                                <div class="avatar-sm d-table">
                                                                    <span
                                                                        class="avatar-title bg-danger-lighten rounded-circle text-danger">
                                                                        <i class='uil uil-ship font-24'></i>
                                                                    </span>
                                                                </div>
                                                                <div class="ms-2">
                                                                    <h5 class="mt-0 mb-0">
                                                                        Casanova
                                                                        <span
                                                                            class="badge badge-danger-lighten ms-1">Delayed</span>
                                                                    </h5>
                                                                    <p class="mt-1 mb-0 text-muted">
                                                                        ID: proj106
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </a>

                                                        <a href="javascript:void(0);" class="text-body">
                                                            <div class="d-flex mt-1 px-2 py-2">
                                                                <div class="avatar-sm d-table">
                                                                    <span
                                                                        class="avatar-title bg-success-lighten rounded-circle text-success">
                                                                        <i class='uil uil-subway-alt font-24'></i>
                                                                    </span>
                                                                </div>
                                                                <div class="ms-2">
                                                                    <h5 class="mt-0 mb-0">
                                                                        Darwin
                                                                        <span class="badge badge-success-lighten ms-1">On
                                                                            Track</span>
                                                                    </h5>
                                                                    <p class="mt-1 mb-0 text-muted">
                                                                        ID: proj107
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </a>

                                                        <a href="javascript:void(0);" class="text-body">
                                                            <div class="d-flex mt-1 px-2 py-2">
                                                                <div class="avatar-sm d-table">
                                                                    <span
                                                                        class="avatar-title bg-danger-lighten rounded-circle text-danger">
                                                                        <i class='uil uil-gold font-24'></i>
                                                                    </span>
                                                                </div>
                                                                <div class="ms-2">
                                                                    <h5 class="mt-0 mb-0">
                                                                        Eagle
                                                                        <span class="badge badge-danger-lighten ms-1">Delayed</span>
                                                                    </h5>
                                                                    <p class="mt-1 mb-0 text-muted">
                                                                        ID: proj108
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end projects -->

                                    <!-- gantt view -->
                                    <div class="col-xxl-9 mt-4 mt-xl-0 col-lg-8">
                                        <div class="ps-xl-3">
                                            <div class="row">
                                                <div class="col-auto">
                                                    <a href="javascript: void(0);" class="btn btn-success btn-sm mb-2">Add New Task</a>
                                                </div>
                                                <div class="col text-sm-end">
                                                    <div class="btn-group btn-group-sm mb-2" data-bs-toggle="buttons" id="modes-filter">
                                                        <label class="btn btn-primary d-none d-sm-inline-block">
                                                            <input  class="btn-check" type="radio" name="modes" id="qday" value="Quarter Day"> Quarter Day
                                                        </label>
                                                        <label class="btn btn-primary">
                                                            <input  class="btn-check" type="radio" name="modes" id="hday" value="Half Day"> Half Day
                                                        </label>
                                                        <label class="btn btn-primary">
                                                            <input  class="btn-check" type="radio" name="modes" id="day" value="Day"> Day
                                                        </label>
                                                        <label class="btn btn-primary active">
                                                            <input  class="btn-check" type="radio" name="modes" id="week" value="Week" checked> Week
                                                        </label>
                                                        <label class="btn btn-primary">
                                                            <input  class="btn-check" type="radio" name="modes" id="month" value="Month"> Month
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="row">
                                                <div class="col mt-3">
                                                    <svg id="tasks-gantt"></svg>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end gantt view -->
                                </div>
                            </div>
                        </div>

                    </div> <!-- container -->

                </div> <!-- content -->

                <!-- Footer Start -->
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                <script>document.write(new Date().getFullYear())</script> © Hyper - Coderthemes.com
                            </div>
                            <div class="col-md-6">
                                <div class="text-md-end footer-links d-none d-md-block">
                                    <a href="javascript: void(0);">About</a>
                                    <a href="javascript: void(0);">Support</a>
                                    <a href="javascript: void(0);">Contact Us</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
                <!-- end Footer -->

            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->


        <!-- Right Sidebar -->
        <div class="end-bar">

            <div class="rightbar-title">
                <a href="javascript:void(0);" class="end-bar-toggle float-end">
                    <i class="dripicons-cross noti-icon"></i>
                </a>
                <h5 class="m-0">Settings</h5>
            </div>

            <div class="rightbar-content h-100" data-simplebar>

                <div class="p-3">
                    <div class="alert alert-warning" role="alert">
                        <strong>Customize </strong> the overall color scheme, sidebar menu, etc.
                    </div>

                    <!-- Settings -->
                    <h5 class="mt-3">Color Scheme</h5>
                    <hr class="mt-1" />

                    <div class="form-check form-switch mb-1">
                        <input class="form-check-input" type="checkbox" name="color-scheme-mode" value="light" id="light-mode-check" checked>
                        <label class="form-check-label" for="light-mode-check">Light Mode</label>
                    </div>

                    <div class="form-check form-switch mb-1">
                        <input class="form-check-input" type="checkbox" name="color-scheme-mode" value="dark" id="dark-mode-check">
                        <label class="form-check-label" for="dark-mode-check">Dark Mode</label>
                    </div>
       

                    <!-- Width -->
                    <h5 class="mt-4">Width</h5>
                    <hr class="mt-1" />
                    <div class="form-check form-switch mb-1">
                        <input class="form-check-input" type="checkbox" name="width" value="fluid" id="fluid-check" checked>
                        <label class="form-check-label" for="fluid-check">Fluid</label>
                    </div>

                    <div class="form-check form-switch mb-1">
                        <input class="form-check-input" type="checkbox" name="width" value="boxed" id="boxed-check">
                        <label class="form-check-label" for="boxed-check">Boxed</label>
                    </div>
        

                    <!-- Left Sidebar-->
                    <h5 class="mt-4">Left Sidebar</h5>
                    <hr class="mt-1" />
                    <div class="form-check form-switch mb-1">
                        <input class="form-check-input" type="checkbox" name="theme" value="default" id="default-check">
                        <label class="form-check-label" for="default-check">Default</label>
                    </div>

                    <div class="form-check form-switch mb-1">
                        <input class="form-check-input" type="checkbox" name="theme" value="light" id="light-check" checked>
                        <label class="form-check-label" for="light-check">Light</label>
                    </div>

                    <div class="form-check form-switch mb-3">
                        <input class="form-check-input" type="checkbox" name="theme" value="dark" id="dark-check">
                        <label class="form-check-label" for="dark-check">Dark</label>
                    </div>

                    <div class="form-check form-switch mb-1">
                        <input class="form-check-input" type="checkbox" name="compact" value="fixed" id="fixed-check" checked>
                        <label class="form-check-label" for="fixed-check">Fixed</label>
                    </div>

                    <div class="form-check form-switch mb-1">
                        <input class="form-check-input" type="checkbox" name="compact" value="condensed" id="condensed-check">
                        <label class="form-check-label" for="condensed-check">Condensed</label>
                    </div>

                    <div class="form-check form-switch mb-1">
                        <input class="form-check-input" type="checkbox" name="compact" value="scrollable" id="scrollable-check">
                        <label class="form-check-label" for="scrollable-check">Scrollable</label>
                    </div>

                    <div class="d-grid mt-4">
                        <button class="btn btn-primary" id="resetBtn">Reset to Default</button>
            
                        <a href="https://themes.getbootstrap.com/product/hyper-responsive-admin-dashboard-template/"
                            class="btn btn-danger mt-3" target="_blank"><i class="mdi mdi-basket me-1"></i> Purchase Now</a>
                    </div>
                </div> <!-- end padding-->

            </div>
        </div>

        <div class="rightbar-overlay"></div>
        <!-- /End-bar -->

        <!-- bundle -->
        <?php include 'footer.php'; ?>