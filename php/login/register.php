<?php
ob_start(); // Start output buffering

$username = $email = $password = $confirm_password = '';
$username_err = $email_err = $password_err = $confirm_password_err = '';

include $_SERVER['DOCUMENT_ROOT'] . '/assets/php/head.php';

// Include config file
require_once $_SERVER['DOCUMENT_ROOT'] . '/assets/php/dbConfig.php';

// Process submitted form data
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize and validate input
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $confirm_password = trim($_POST['confirm_password']);

    // Validate username
    if (empty($username)) {
        $username_err = 'Geef een gebruikersnaam op!';
    } elseif (!preg_match('/^[a-zA-Z0-9_]+$/', $username)) {
        $username_err = 'Gebruikersnaam mag alleen letters, cijfers en underscores bevatten!';
    }

    // Validate email
    if (empty($email)) {
        $email_err = 'Geef een e-mailadres op!';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $email_err = 'Ongeldig e-mailadres!';
    }

    // Validate password
    if (empty($password)) {
        $password_err = 'Geef een wachtwoord op!';
    } elseif (strlen($password) < 6) {
        $password_err = 'Het wachtwoord moet minimaal 6 karakters lang zijn!';
    }

    // Validate confirm password
    if (empty($confirm_password)) {
        $confirm_password_err = 'Bevestig het wachtwoord!';
    } elseif ($password !== $confirm_password) {
        $confirm_password_err = 'De wachtwoorden komen niet overeen!';
    }

    // Check input error before inserting into database
    if (empty($username_err) && empty($email_err) && empty($password_err) && empty($confirm_password_err)) {
        try {
            // Prepare insert statement
            $sql = 'INSERT INTO users (username, email, password) VALUES (:username, :email, :password)';

            // Create a PDO statement
            $stmt = $pdo->prepare($sql);

            // Bind parameters
            $stmt->bindParam(':username', $param_username, PDO::PARAM_STR);
            $stmt->bindParam(':email', $param_email, PDO::PARAM_STR);
            $stmt->bindParam(':password', $param_password, PDO::PARAM_STR);

            // Set parameters
            $param_username = $username;
            $param_email = $email;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Hashed password

            // Attempt to execute the statement
            if ($stmt->execute()) {
                // Start a new session called loggedin
                session_start();
                $_SESSION['loggedin'] = true;
                // Redirect to login page
                header("location: ../panel/dashboard");
                exit;
            } else {
                echo "Something went wrong. Try signing in again.";
            }
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }

        // Close statement
        unset($stmt);
    }

    // Close connection
    unset($pdo);
}
?>
<style>
    .wrapper {
        width: 500px;
        padding: 20px;
    }

    .wrapper h2 {
        text-align: center
    }

    .wrapper form .form-group span {
        color: red;
    }
</style>

<body class=" bg-dark text-white">
    <main>
        <!-- ======= Hero Section ======= -->
        <section id="hero" class="d-flex align-items-center justify-content-center bg-dark">
            <div class="container" data-aos="fade-up">

                <div class="column justify-content-center align-items-center" data-aos="fade-up" data-aos-delay="150">
                    <div class="col d-flex justify-content-center align-items-center">
                        <h1 class="text-uppercase">Registratie formulier</h1>
                    </div>
                    <div class="row justify-content-center align-items-center">
                        <div class="col-lg-6 col-md-8 col-sm-10">
                            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" class="border border-danger p-4 rounded" style="background: linear-gradient(135deg, rgba(15,15,15,1) 0%, rgba(34,34,34,1) 100%); box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.3);">
                                <div class="form-group <?php (!empty($username_err)) ? 'has_error' : ''; ?> mb-3">
                                    <label for="username" class="form-label fs-5">Gebruikersnaam</label>
                                    <input type="text" name="username" id="username" class="form-control text-center <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username ?>" required>
                                    <div class="text-danger fs-6"><?php echo $username_err; ?></div>
                                </div>

                                <div class="form-group <?php (!empty($email_err)) ? 'has_error' : ''; ?> mb-3">
                                    <label for="email" class="form-label fs-5">Email</label>
                                    <input type="text" name="email" id="email" class="form-control text-center <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $email ?>" required>
                                    <div class="text-danger fs-6"><?php echo $email_err; ?></div>
                                </div>

                                <div class="form-group <?php (!empty($password_err)) ? 'has_error' : ''; ?> mb-3">
                                    <label for="password" class="form-label fs-5">Wachtwoord</label>
                                    <input type="password" name="password" id="password" class="form-control text-center <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password ?>" required>
                                    <div class="text-danger fs-6"><?php echo $password_err; ?></div>
                                </div>

                                <div class="form-group <?php (!empty($confirm_password_err)) ? 'has_error' : ''; ?> mb-3">
                                    <label for="confirm_password" class="form-label fs-5">Bevestig wachtwoord</label>
                                    <input type="password" name="confirm_password" id="confirm_password" class="form-control text-center <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $confirm_password; ?>" required>
                                    <div class="text-danger fs-6"><?php echo $confirm_password_err; ?></div>
                                </div>

                                <div class="form-group mb-3 d-flex flex-row justify-content-between align-items-center gap-3">
                                    <input type="reset" class="btn btn-outline-danger w-100" value="Reset">
                                    <input type="submit" class="btn btn-outline-success mb-2 w-100" value="Submit">
                                </div>
                                <p class="text-center mt-3">Heb je al een account? <a href="login.php">Log hier in!</a></p>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </section><!-- End Hero -->

    </main>


    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <?php
    // include $_SERVER['DOCUMENT_ROOT'] . '/assets/php/footer.php';
    // include $_SERVER['DOCUMENT_ROOT'] . '/assets/php/scripts.php';

    ob_end_flush(); // End output buffering and send output to the browser
    ?>
</body>