<?php include 'header.php'; ?>

<?php
session_start();

// Define and initialize current step and total steps
$currentStep = isset($_POST['current_step']) ? $_POST['current_step'] : 1;
$totalSteps = 4; // Assuming there are 4 steps in total

// Step 1 handling - Database connection and data insertion
if(isset($_POST['step1_submit'])) {
    // Database connection configuration
    $servername = $_POST['servername'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $dbname = $_POST['dbname'];

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare data for insertion
    $dbName = $_POST['dbname'];
    $hostName = $_POST['servername'];
    $dbuname = $_POST['username'];
    $dbpass = $_POST['password'];

    // Insert data into database
    $sql = "INSERT INTO user (dbName, hostName, dbuname, dbpass) VALUES ('$dbName', '$hostName', '$dbuname', '$dbpass')";
    if ($conn->query($sql) === TRUE) {
        echo "Step 1 data inserted successfully";
        $currentStep = 2; // Move to the next step
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Handle other steps similarly

// Check if all steps completed
if($currentStep > $totalSteps) {
    // Establish database connection
    $conn = new mysqli($dbservername, $dbusername, $dbpassword, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    if(isset($_POST['step2_submit'])) {
    // Retrieve form data from Step 2
    $uname = $_POST['uname'];
    $password = $_POST['confirm'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];

    // Here, you can process the form data as needed, such as storing it in the database
    // For demonstration purposes, let's just print the data for Step 2
    echo "Step 2 data: <br>";
    echo "User Name: $uname <br>";
    echo "Password: $password <br>";
    echo "Email: $email <br>";
    echo "Mobile Number: $mobile <br>";

    // Move to the next step
    $currentStep = 3;
}

    // Save collected data from all steps into the database
    // Add your code to save data into the database here

    // Redirect to the admin panel upon completion
    header("Location: admin_panel.php");
    exit();
}
?>

<!-- HTML code for the wizard form -->
<div class="row justify-content-center">
    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">
                <center><h2 class="header-title mb-3 nav-justified">Setup & Configuration</h2></center>
                
                <form method="post">
                    <input type="hidden" name="current_step" value="<?php echo $currentStep; ?>">
                    
                    <div id="basicwizard">
                        <!-- Step 1 -->
                        

                        <!-- Navigation buttons -->
                        <ul class="list-inline wizard mb-0">
                            <?php if($currentStep > 1): ?>
                                <li class="previous list-inline-item">
                                    <button type="button" class="btn btn-info" onclick="goToStep(<?php echo $currentStep - 1; ?>)">Previous</button>
                                </li>
                            <?php endif; ?>
                            
                            <?php if($currentStep < $totalSteps): ?>
                                <li class="next list-inline-item float-end">
                                    <button type="button" class="btn btn-info" onclick="goToStep(<?php echo $currentStep + 1; ?>)">Next</button>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </div> <!-- end #basicwizard-->
                </form>

            </div> <!-- end card-body -->
        </div> <!-- end card-->
    </div> <!-- end col -->
</div>

<?php include 'footer.php'; ?>

<style>
    .tab-pane {
        display: none;
    }
    .tab-pane.active {
        display: block;
    }
</style>

<script>
    function goToStep(step) {
        document.querySelectorAll('.tab-pane').forEach(function(tab) {
            tab.classList.remove('active');
        });
        document.querySelector('#basictab' + step).classList.add('active');
        document.querySelector('input[name=current_step]').value = step;
    }
</script>	
