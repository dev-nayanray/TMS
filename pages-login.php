<?php
session_start(); // Start session to manage user login status

// Include database connection file
include 'config.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize user input
    $email = filter_input(INPUT_POST, 'emailaddress', FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];

    // Prepare and execute a SQL statement to check the credentials
    $sql = "SELECT id, email, password FROM users WHERE email = :email";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['email' => $email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Verify password
    if ($user && password_verify($password, $user['password'])) {
        // User authenticated successfully
        // Store user information in session for future use
        $_SESSION['loggedin'] = true;
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['email'];

        // Redirect to the dashboard page or any other authenticated page
        header("Location: dashboard-projects.php");
        exit();
    } else {
        // Authentication failed, display an error message
        $error_message = "Invalid email or password";
    }
}
?>

<?php include 'log-head.php'; ?>

<div class="account-pages pt-2 pt-sm-5 pb-4 pb-sm-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xxl-4 col-lg-5">
                <div class="card">
                    <!-- Logo -->
                    <div class="card-header pt-4 pb-4 text-center bg-primary">
                        <a href="index.html">
                            <span><img src="assets/images/logo.png" alt="" height="18"></span>
                        </a>
                    </div>

                    <div class="card-body p-4">
                        <div class="text-center w-75 m-auto">
                            <h4 class="text-dark-50 text-center pb-0 fw-bold">Sign In</h4>
                            <p class="text-muted mb-4">Enter your email address and password to access the admin panel.</p>
                        </div>

                        <!-- Display error message if authentication failed -->
                        <?php if (isset($error_message)) : ?>
                            <div class="alert alert-danger"><?php echo $error_message; ?></div>
                        <?php endif; ?>

                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                            <div class="mb-3">
                                <label for="emailaddress" class="form-label">Email address</label>
                                <input class="form-control" type="email" id="emailaddress" name="emailaddress" required="" placeholder="Enter your email">
                            </div>

                            <div class="mb-3">
                                <a href="pages-recoverpw.html" class="text-muted float-end"><small>Forgot your password?</small></a>
                                <label for="password" class="form-label">Password</label>
                                <div class="input-group input-group-merge">
                                    <input type="password" id="password" name="password" class="form-control" placeholder="Enter your password">
                                    <div class="input-group-text" data-password="false">
                                        <span class="password-eye"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3 mb-3">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="checkbox-signin" checked>
                                    <label class="form-check-label" for="checkbox-signin">Remember me</label>
                                </div>
                            </div>

                            <div class="mb-3 mb-0 text-center">
                                <button class="btn btn-primary" type="submit"> Log In </button>
                            </div>
                        </form>
                    </div> <!-- end card-body -->
                </div> <!-- end card -->

                <div class="row mt-3">
                    <div class="col-12 text-center">
                        <p class="text-muted">Don't have an account? <a href="pages-register.php" class="text-muted ms-1"><b>Sign Up</b></a></p>
                    </div> <!-- end col -->
                </div> <!-- end row -->
            </div> <!-- end col -->
        </div> <!-- end row -->
    </div> <!-- end container -->
</div> <!-- end account-pages -->

<?php include 'log-footer.php'; ?>
