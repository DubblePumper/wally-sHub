<?php
// Initialize the session
session_start();

require_once $_SERVER['DOCUMENT_ROOT'] . '/assets/php/dbConfig.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/assets/php/head.php';

// Define variables and initialize with empty values
$new_password = $confirm_password = $username = '';
$new_password_err = $confirm_password_err = $username_err = '';

// Processing form data when form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Check if username or email is empty
    if (empty(trim($_POST['username']))) {
        $username_err = 'Geef uw gebruikersnaam/email op';
    } else {
        $username = trim($_POST['username']);
    }

    // Validate new password
    if (empty(trim($_POST['new_password']))) {
        $new_password_err = 'Please enter the new password.';
    } elseif (strlen(trim($_POST['new_password'])) < 8) {
        $new_password_err = 'Password must have at least 8 characters.';
    } else {
        $new_password = trim($_POST['new_password']);
    }

    // Validate confirm password
    if (empty(trim($_POST['confirm_password']))) {
        $confirm_password_err = 'Please confirm the password.';
    } else {
        $confirm_password = trim($_POST['confirm_password']);
        if ($new_password !== $confirm_password) {
            $confirm_password_err = 'Password did not match.';
        }
    }

    // If there are no errors, update the password
    if (empty($username_err) && empty($new_password_err) && empty($confirm_password_err)) {
        try {
            // Prepare a select statement
            $sql = 'SELECT id, password FROM users WHERE username = :username OR email = :email';

            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':username', $username, PDO::PARAM_STR);
            $stmt->bindParam(':email', $username, PDO::PARAM_STR);

            if ($stmt->execute()) {
                $row = $stmt->fetch(PDO::FETCH_ASSOC);

                if ($row) {
                    $hashed_password = $row['password']; // Get the hashed password from the database

                    if (password_verify($new_password, $hashed_password)) {
                        // Password is already updated
                        $new_password_err = 'This password is already in use.';
                    } else {
                        // Prepare an update statement
                        $sql = 'UPDATE users SET password = :password WHERE id = :id';

                        $stmt2 = $pdo->prepare($sql);
                        $param_password = password_hash($new_password, PASSWORD_DEFAULT);
                        $stmt2->bindParam(':password', $param_password, PDO::PARAM_STR);
                        $stmt2->bindParam(':id', $row['id'], PDO::PARAM_INT);

                        if ($stmt2->execute()) {
                            // Password updated successfully. Destroy the session, and redirect to login page
                            session_destroy();
                            header('Location: login.php');
                            exit();
                        } else {
                            echo 'Oops! Something went wrong. Please try again later.';
                        }
                    }
                } else {
                    // Username or email does not exist
                    $username_err = 'Username or email not found.';
                }
            } else {
                echo 'Oops! Something went wrong. Please try again later.';
            }
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
    }
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
                        <h1 class="text-uppercase">Reset Wachtwoord</h1>
                    </div>
                    <div class="col d-flex justify-content-center align-items-center">

                        <p>Vul dit formulier in om je wachtwoord te veranderen</p>
                    </div>

                    <div class="row justify-content-center align-items-center">
                        <div class="col-lg-6 col-md-8 col-sm-10">
                            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="border border-danger p-4 rounded" style="background: linear-gradient(135deg, rgba(15,15,15,1) 0%, rgba(34,34,34,1) 100%); box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.3);">
                                <div class="form-group <?php (!empty($username_err)) ? 'has_error' : ''; ?> mb-3">
                                    <label for="username" class="form-label fs-5">Gebruikersnaam/Email</label>
                                    <input type="text" name="username" id="username" class="form-control text-center <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username ?>" required>
                                    <div class="text-danger fs-6"><?php echo $username_err; ?></div>
                                </div>

                                <div class="form-group <?php (!empty($new_password_err)) ? 'has_error' : ''; ?> mb-3">
                                    <label for="password" class="form-label fs-5">Nieuw wachtwoord</label>
                                    <input type="password" name="new_password" id="new_password" class="form-control text-center <?php echo (!empty($new_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $new_password ?>" required>
                                    <div class="text-danger fs-6"><?php echo $new_password_err; ?></div>
                                </div>

                                <div class="form-group <?php (!empty($confirm_password_err)) ? 'has_error' : ''; ?> mb-3">
                                    <label for="confirm_password" class="form-label fs-5">Bevestig wachtwoord</label>
                                    <input type="password" name="confirm_password" id="confirm_password" class="form-control text-center <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $confirm_password; ?>" required>
                                    <div class="text-danger fs-6"><?php echo $confirm_password_err; ?></div>
                                </div>
                                <div class="form-group mb-3 d-flex flex-row justify-content-between align-items-center gap-3">
                                    <a class="btn btn-outline-danger w-100" href="login">Annuleer</a>
                                    <input type="submit" class="btn btn-block btn-outline-success w-100" value="Bevestigen">

                                </div>
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
    ?>

</body>