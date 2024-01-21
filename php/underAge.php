<?php
include_once 'assets/php/head.php';

session_start();

if (!isset($_SESSION['age']) && $_SESSION['age'] != false) {
    header("Location: index.php");
    exit();
}
?>

<head>
    <link rel="icon" type="image/png" href="assets/images/underage.png" />
    <link rel="stylesheet" href="assets/css/underAge.css">
</head>

<body class="d-flex flex-column h-100 text-white">
    <main class="flex-shrink-0">
        <div class="container mt-5">
            <div class="scene">
                <div class="overlay"></div>
                <div class="overlay"></div>
                <div class="overlay"></div>
                <div class="overlay"></div>
                <span class="bg-403">403</span>
                <div class="text">
                    <span class="hero-text"></span>
                    <span class="msg">Oeps je bent minderjarig, probeer een aantal jaar laten opnieuw</span>
                    <span class="support">
                        <form id="goback" action="assets/auth/goback.php" method="POST" autocomplete="off" role="form">
                            <a id="submitFormLink" href="#">ga terug</a>
                        </form>
                    </span>
                </div>
                <div class="lock"></div>
            </div>
        </div>
    </main>

    <script>
        document.getElementById("submitFormLink").addEventListener("click", function(event) {
            event.preventDefault(); // Prevent the default link behavior (navigating to a new page)
            document.getElementById("goback").submit(); // Submit the form
        });
    </script>

</body>