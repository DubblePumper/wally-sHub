<?php

session_start();

include_once 'assets/php/head.php';

unset($_SESSION['age']);

if (!isset($_SESSION['age'])) {
    $_SESSION['age'] = null;
?>

    <body id="verifyBody" class="d-flex align-items-center justify-content-center w-100">
        <!-- ======= Hero Section ======= -->
        <section id="hero" class="d-flex align-items-center justify-content-center notWhite">
            <div id="verify" class="container-fluid glass-background rounded border border-warning">

                <div id="verifyTitle" class="border-bottom border-dark d-flex justify-content-center align-items-center">
                    <h2>Verifieer uw leeftijd</h2>
                </div>

                <form id="verifyConainer" action="assets/auth/verify.php" method="POST" autocomplete="off" role="form" class="row justify-content-around align-items-center">

                    <div class="col h-100 d-flex flex-column justify-content-center align-items-center border border-end border-dark">
                        <div id="under18Text" class="verifyConainerTexts text-warning">
                            <h3>Ik ben onder de 18</h3>
                        </div>
                        <button type="submit" class="btn btn-outline-warning w-25" name="verifyButton" id="verifyButton" value="false">Nee</button>
                    </div>
                    <div class="col h-100 d-flex flex-column justify-content-center align-items-center border border-end border-dark">
                        <div id="above18Text" class="verifyConainerTexts notWhite">
                            <h3>Ik ben 18 of ouder</h3>
                        </div>
                        <button type="submit" class="btn btn-outline-light w-25" name="verifyButton" id="verifyButtonYes" value="true">Ja</button>
                    </div>

                </form>

            </div>

            </div>
        </section><!-- End Contact Section -->
    </body>

<?php } else if ($_SESSION['age'] == true) {
    header("Location: index.php");
    exit();
}
