<?php

// Initialize sessions
session_start();

// Check if the user is already logged in, if yes then redirect him to the welcome page
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
  header("location: ../index");
  exit;
}

include($_SERVER['DOCUMENT_ROOT'] . '/assets/php/head.php');

// Include config file
require_once $_SERVER['DOCUMENT_ROOT'] . '/assets/php/dbConfig.php';

// Define variables and initialize with empty values
$username = $password = '';
$username_err = $password_err = '';

// Process submitted form data
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  // Check if username is empty
  if (empty(trim($_POST['username']))) {
    $username_err = 'Please enter username.';
  } else {
    $username = trim($_POST['username']);
  }

  // Check if password is empty
  if (empty(trim($_POST['password']))) {
    $password_err = 'Please enter your password.';
  } else {
    $password = trim($_POST['password']);
  }

  // Validate credentials
  if (empty($username_err) && empty($password_err)) {
    try {
      // Prepare a select statement
      $sql = 'SELECT id, username, password FROM users WHERE username = :username';

      $stmt = $pdo->prepare($sql);

      // Bind parameters
      $stmt->bindParam(':username', $param_username, PDO::PARAM_STR);

      // Set parameter values
      $param_username = $username;

      // Attempt to execute
      if ($stmt->execute()) {
        // Check if username exists. Verify user exists, then verify password
        if ($stmt->rowCount() == 1) {
          // Fetch result into variables
          $result = $stmt->fetch(PDO::FETCH_ASSOC);

          $id = $result['id'];
          $hashed_password = $result['password'];

          if (password_verify($password, $hashed_password)) {

            // Start a new session called 'loggedin'
            session_start();

            // Store data in sessions
            $_SESSION['loggedin'] = true;
            $_SESSION['id'] = $id;
            $_SESSION['username'] = $username;

            // Redirect to user to page
            header('location: ../adminpanel');
          } else {
            // Display an error for password mismatch
            $password_err = 'Invalid password';
          }
        } else {
          $username_err = "Username does not exist.";
        }
      } else {
        echo "Oops! Something went wrong. Please try again.";
      }
    } catch (PDOException $e) {
      die("Error: " . $e->getMessage());
    }
    // Close statement
    $stmt = null;
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Sign in</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
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
</head>

<body class=" bg-dark text-white">
  <main>
    <section class="container wrapper">
      <h2 class="display-4 pt-3">Login</h2>
      <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
        <div class="form-group <?php (!empty($username_err)) ? 'has_error' : ''; ?>">
          <label for="username">Gebruikersnaam/Email</label>
          <input type="text" name="username" id="username" class="form-control" value="<?php echo $username ?>">
          <span class="help-block"><?php echo $username_err; ?></span>
        </div>

        <div class="form-group <?php (!empty($password_err)) ? 'has_error' : ''; ?>">
          <label for="password">Wachtwoord</label>
          <input type="password" name="password" id="password" class="form-control" value="<?php echo $password ?>">
          <span class="help-block"><?php echo $password_err; ?></span>
        </div>

        <div class="form-group">
          <input type="submit" class="btn btn-block btn-outline-primary" value="login">
        </div>
        <p>Heb je nog geen account? <a href="register.php">registreer!</a>.</p>
      </form>
    </section>
  </main>
</body>

</html>