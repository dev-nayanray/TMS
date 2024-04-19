<?php 
include 'log-head.php';
include 'config.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize user input
    $fullname = $_POST['fullname'];
    $email = filter_input(INPUT_POST, 'emailaddress', FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Prepare and execute a SQL statement to insert user data into the user table
    $sql_user = "INSERT INTO users (full_name, email, password) VALUES (?, ?, ?)";
    $stmt_user = $pdo->prepare($sql_user);
    $stmt_user->execute([$fullname, $email, $hashed_password]);

    // Get the newly inserted user's ID
    $user_id = $pdo->lastInsertId();

    // Prepare and execute a SQL statement to create the new table
    $sql_create_table = "CREATE TABLE IF NOT EXISTS new_table (
                            id INT(11) AUTO_INCREMENT PRIMARY KEY,
                            user_id INT(11),
                            FOREIGN KEY (user_id) REFERENCES users(id),
                            -- Add other columns as needed
                        )";
    $stmt_create_table = $pdo->prepare($sql_create_table);
    $stmt_create_table->execute();

    // Insert data into the new table
    $sql_insert_data = "INSERT INTO new_table (user_id) VALUES (?)";
    $stmt_insert_data = $pdo->prepare($sql_insert_data);
    $stmt_insert_data->execute([$user_id]);

    // Redirect to login page after sign-up
    header("Location: pages-login.php");
    exit();
}
?>

<div class="account-pages pt-2 pt-sm-5 pb-4 pb-sm-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xxl-4 col-lg-5">
                <div class="card">
                    <!-- Logo-->
                    <div class="card-header pt-4 pb-4 text-center bg-primary">
                        <a href="index.html">
                            <span><img src="assets/images/logo.png" alt="" height="18"></span>
                        </a>
                    </div>

                    <div class="card-body p-4">
                        
                        <div class="text-center w-75 m-auto">
                            <h4 class="text-dark-50 text-center mt-0 fw-bold">Free Sign Up</h4>
                            <p class="text-muted mb-4">Don't have an account? Create your account, it takes less than a minute </p>
                        </div>

                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

                            <div class="mb-3">
                                <label for="fullname" class="form-label">Full Name</label>
                                <input class="form-control" type="text" id="fullname" name="fullname" placeholder="Enter your name" required>
                            </div>

                            <div class="mb-3">
                                <label for="emailaddress" class="form-label">Email address</label>
                                <input class="form-control" type="email" id="emailaddress" name="emailaddress" required placeholder="Enter your email">
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <div class="input-group input-group-merge">
                                    <input type="password" id="password" name="password" class="form-control" placeholder="Enter your password">
                                    <div class="input-group-text" data-password="false">
                                        <span class="password-eye"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="checkbox-signup">
                                    <label class="form-check-label" for="checkbox-signup">I accept <a href="#" class="text-muted">Terms and Conditions</a></label>
                                </div>
                            </div>

                            <div class="mb-3 text-center">
                                <button class="btn btn-primary" type="submit"> Sign Up </button>
                            </div>

                        </form>
                    </div> <!-- end card-body -->
                </div>
                <!-- end card -->

                <div class="row mt-3">
                    <div class="col-12 text-center">
                        <p class="text-muted">Already have account? <a href="pages-login.html" class="text-muted ms-1"><b>Log In</b></a></p>
                    </div> <!-- end col-->
                </div>
                <!-- end row -->

            </div> <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
</div>
<!-- end page -->
<?php include 'log-footer.php'; ?>
