<?php 

// MYSQL_ROOT_PASSWORD: 123456789
//       MYSQL_DATABASE: headDB
//       MYSQL_USER: admin
//       MYSQL_PASSWORD: 123456789

// Database credentials
define('DB_SERVER', 'db'); // Use the service name defined in Docker Compose
define('DB_PORT', '3306'); // The default MySQL port
define('DB_USERNAME', 'admin');
define('DB_PASSWORD', '123456789');
define('DB_NAME', 'headDB');

try {
    // Create a PDO instance
    $mysql_db  = new PDO("mysql:host=" . DB_SERVER . ";port=" . DB_PORT . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);

    // Set PDO to throw exceptions on errors
    $mysql_db ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Set character set to utf8
    $mysql_db ->exec("SET CHARACTER SET utf8");
} catch (PDOException $e) {
    die("Error: Unable to connect " . $e->getMessage());
}

?>


