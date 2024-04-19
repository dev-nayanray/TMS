<?php
include 'header.php';

// Database connection parameters
$db_connection_successful = false; // Flag to check if the database connection is successful
$db_connection_message = ''; // Variable to store the database connection message

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data for database connection
    $dbName = $_POST['dbname'];
    $hostName = $_POST['dbhost'];
    $dbUsername = $_POST['dbuser'];
    $dbPassword = $_POST['dbpass'];

    // Attempt to establish a database connection
    try {
        $pdo = new PDO("mysql:host=$hostName;dbname=$dbName", $dbUsername, $dbPassword);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $db_connection_successful = true; // Set flag to true if connection is successful
        $db_connection_message = 'Database connection successful!';
        
        // Collect user information from the form
        $uname = $_POST['uname'];
        $upass = password_hash($_POST['upass'], PASSWORD_DEFAULT);
        $uemail = $_POST['uemail'];
        $umob = $_POST['umob'];
        $fname = $_POST['fname'];
        $urole = $_POST['urole'];
        $cname = $_POST['cname'];
        $otp = $_POST['otp'];

        // Insert user information into the database
        $stmt = $pdo->prepare("INSERT INTO users (username, password, email, mobile, full_name, user_role, company_name, otp) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute([$uname, $upass, $uemail, $umob, $fname, $urole, $cname, $otp]);

        // Redirect to home.php
        header("Location: pages-login.php");
        exit;
    } catch (PDOException $e) {
        $db_connection_message = 'Connection failed: ' . $e->getMessage();
    }
}



?>

<?php echo "$db_connection_successful"; ?>

<style> 
   .form-wizard-header {
    margin-left: -1.5rem;
    margin-right: -1.5rem;
    background-color: #1976e9;
    color: white;
}
.nav-pills>li>a, .nav-tabs>li>a {
    color: #fbfbfb;
    font-weight: 600;
}
/* Custom CSS for active tab */
    .nav-pills .nav-link.active-red {
        background-color: red;
        color: white; /* Optional: Change text color to white for better visibility */
    }
</style>


<div class="row justify-content-center">
    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">

                <center>
                    <h2 class="header-title mb-3 nav-justified">Setup & Configuration</h2>
                </center>

                <form id="wizardForm" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <div id="basicwizard">

                       <!-- Modify the HTML code for the tab links to include a custom class for the active tab -->
<ul class="nav nav-pills nav-justified form-wizard-header mb-4">
    <li class="nav-item">
        <a href="#basictab1" data-bs-toggle="tab" class="nav-link rounded-0 pt-2 pb-2 <?php echo ($currentTab == 0) ? 'active' : ''; ?>">
            <i class="mdi mdi-account-circle me-1"></i>
            <span class="d-none d-sm-inline">DB Configuration</span>
        </a>
    </li>
    <li class="nav-item">
        <a href="#basictab2" data-bs-toggle="tab" class="nav-link rounded-0 pt-2 pb-2 <?php echo ($currentTab == 1) ? 'active' : ''; ?>">
            <i class="mdi mdi-face-profile me-1"></i>
            <span class="d-none d-sm-inline">Login Setup</span>
        </a>
    </li>
    <li class="nav-item">
        <a href="#basictab3" data-bs-toggle="tab" class="nav-link rounded-0 pt-2 pb-2 <?php echo ($currentTab == 2) ? 'active' : ''; ?>">
            <i class="mdi mdi-checkbox-marked-circle-outline me-1"></i>
            <span class="d-none d-sm-inline">Configuration</span>
        </a>
    </li>
    <li class="nav-item">
        <a href="#basictab4" data-bs-toggle="tab" class="nav-link rounded-0 pt-2 pb-2 <?php echo ($currentTab == 3) ? 'active' : ''; ?>">
            <i class="mdi mdi-checkbox-marked-circle-outline me-1"></i>
            <span class="d-none d-sm-inline">Complete</span>
        </a>
    </li>
</ul>



                        <div class="tab-content b-0 mb-0">
                            <div class="tab-pane <?php echo ($db_connection_successful) ? '' : 'active'; ?>" id="basictab1">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="row mb-3">
                                            <label class="col-md-3 col-form-label" for="dbname">Database Name</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" id="dbname" name="dbname" value="">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label class="col-md-3 col-form-label" for="dbhost">Host Name</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" id="dbhost" name="dbhost" value="">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label class="col-md-3 col-form-label" for="dbuser">User Name</label>
                                            <div class="col-md-9">
                                                <input type="text" id="dbuser" name="dbuser" class="form-control" value="">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label class="col-md-3 col-form-label" for="dbpass">Password</label>
                                            <div class="col-md-9">
                                                <input type="password" id="dbpass" name="dbpass" class="form-control" value="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane <?php echo ($db_connection_successful) ? 'active' : ''; ?>" id="basictab2">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="row mb-3">
                                            <label class="col-md-3 col-form-label" for="uname">User Name</label>
                                            <div class="col-md-9">
                                                <input type="text" id="uname" name="uname" class="form-control" value="">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label class="col-md-3 col-form-label" for="upass">Password</label>
                                            <div class="col-md-9">
                                                <input type="password" id="upass" name="upass" class="form-control" value="">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label class="col-md-3 col-form-label" for="uemail">Email</label>
                                            <div class="col-md-9">
                                                <input type="email" id="uemail" name="uemail" class="form-control" value="">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label class="col-md-3 col-form-label" for="umob">Mobile Number</label>
                                            <div class="col-md-9">
                                                <input type="text" id="umob" name="umob" class="form-control" value="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane" id="basictab3">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="row mb-3">
                                                                    <label class="col-md-3 col-form-label" for="fname">Full Name</label>
                                                                    <div class="col-md-9">
                                                                        <input type="text" class="form-control" id="fname" name="fname" value="">
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <label class="col-md-3 col-form-label" for="urole">User Role</label>
                                                                    <div class="col-md-9">
                                                                        <input type="text" class="form-control" id="urole" name="urole" value="">
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <label class="col-md-3 col-form-label" for="cname"> Company Name</label>
                                                                    <div class="col-md-9">
                                                                        <input type="text" id="cname" name="cname" class="form-control" value="">
                                                                    </div>
                                                                </div>
                                                                
                                                               <div class="row mb-3">
    <label class="col-md-3 col-form-label" for="otp">Enter OTP</label>
    <div class="col-md-6">
        <input type="text" id="otp" name="otp" class="form-control" placeholder="Enter OTP">
    </div>
    <div class="col-md-3">
        <button type="button" id="sendOTPBtn" class="btn btn-primary">Send OTP</button>
    </div>
</div>
                                                            </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane" id="basictab4">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="text-center">
                                                                    <h2 class="mt-0"><i class="mdi mdi-check-all"></i></h2>
                                                                    <h3 class="mt-0">Complete !</h3>

                                                                    <p class="w-75 mb-2 mx-auto">Quisque nec turpis at urna dictum luctus. Suspendisse convallis dignissim eros at volutpat. In egestas mattis dui. Aliquam
                                                                        mattis dictum aliquet.</p>

                                                                    <div class="mb-3">
                                                                        <div class="form-check d-inline-block">
                                                                         
                                                                            <input  type="checkbox" class="form-check-input" id="customCheck1">

                                                                            <label class="form-check-label" for="customCheck1">I agree with the Terms and Conditions</label>
                                                                       <!-- #region -->
                                                                        </div>

                                                                    </div>
                                                                </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Add more tabs as needed -->

                            <ul class="list-inline wizard mb-0">
                                <li class="previous list-inline-item">
                                    <a href="javascript:void(0);" class="btn btn-info" id="prevBtn">Previous</a>
                                </li>
                                <li class="next list-inline-item float-end">
                                    <a href="javascript:void(0);" class="btn btn-info" id="nextBtn">Next</a>
                                </li>
                            </ul>

                        </div> <!-- tab-content -->
                    </div> <!-- end #basicwizard-->
                </form>

            </div> <!-- end card-body -->
        </div> <!-- end card-->
    </div> <!-- end col -->
</div>


<?php include 'footer.php'; ?>
<script>
    $(document).ready(function() {
        var currentTab = <?php echo ($db_connection_successful) ? '1' : '0'; ?>; // Current tab is set to the first or second tab based on database connection success
        showTab(currentTab); // Display the current tab

        $("#nextBtn").click(function() {
            // This function will figure out which tab to display
            currentTab++;
            showTab(currentTab);
        });

        $("#prevBtn").click(function() {
            // This function will figure out which tab to display
            currentTab--;
            showTab(currentTab);
        });

        $("#sendOTPBtn").click(function() {
            // This function will be called when the "Send OTP" button is clicked
            // You should implement the logic to generate and send OTP here
            var email = $("#uemail").val(); // Assuming the email is collected from the form
            var otp = generateOTP(); // Generate OTP
            sendOTP(email, otp); // Send OTP to the user's email
        });

        function generateOTP() {
            // Function to generate a random 6-digit OTP
            return Math.floor(100000 + Math.random() * 900000);
        }

       function sendOTP(email, otp) {
    const myHeaders = new Headers();
    myHeaders.append("Authorization", "App b5ee468442b5395eba3d68315a142306-ec8da337-9f3c-4636-9bd2-843d8d23bd42");
    myHeaders.append("Accept", "application/json");

    const formdata = new FormData();
    formdata.append("from", "Nayan Ray <nayan@jessoreit.net>");
    formdata.append("subject", "Your OTP for Verification");
    formdata.append("to", `{"to": "${email}", "placeholders": {"firstName": "Nayan", "otp": "${otp}"}}`);
    formdata.append("text", `Hi {{firstName}}, your OTP for verification is: ${otp}.`);

    const requestOptions = {
        method: "POST",
        headers: myHeaders,
        body: formdata,
        redirect: "follow"
    };

    fetch("https://8g35yd.api.infobip.com/email/3/send", requestOptions)
        .then((response) => {
            if (response.ok) {
                alert("OTP has been sent to your email.");
            } else {
                throw new Error("Failed to send OTP.");
            }
        })
        .catch((error) => console.error(error));
}


        function showTab(n) {
            // This function will display the specified tab of the form ...
            var x = document.getElementsByClassName("tab-pane");
            if (n >= x.length) {
                // If reached the last tab, submit the form
                $("#wizardForm").submit();
                return false;
            }
            for (var i = 0; i < x.length; i++) {
                x[i].style.display = "none"; // Hide all tabs
            }
            x[n].style.display = "block"; // Show the current tab
            
            // Update active tab's background color
            $(".nav-link").removeClass("active-red"); // Remove red color from all tab links
            $(".nav-link").eq(n).addClass("active-red"); // Add red color to the current tab link

            // ... and fix the Previous/Next buttons:
            if (n == 0) {
                $("#prevBtn").hide();
            } else {
                $("#prevBtn").show();
                }
            if (n == (x.length - 1)) {
                $("#nextBtn").html("Submit");
            } else {
                $("#nextBtn").html("Next");
            }
        }
    });
</script>



