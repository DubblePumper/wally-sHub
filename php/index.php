<?php

session_start();

if (!isset($_SESSION['age']) || $_SESSION['age'] != true) {
  header("Location: verifyAge.php");
  exit();
}

include_once 'assets/php/head.php';
//require_once 'assets/php/dbConfig.php';
?>

<?php
$videoData = [
  ["title" => "Video 1", "url" => "https://test-videos.co.uk/vids/bigbuckbunny/mp4/h264/1080/Big_Buck_Bunny_1080_10s_1MB.mp4"],
  ["title" => "Video 2", "url" => "https://test-videos.co.uk/vids/bigbuckbunny/mp4/h264/1080/Big_Buck_Bunny_1080_10s_1MB.mp4"],
  ["title" => "Video 1", "url" => "https://test-videos.co.uk/vids/bigbuckbunny/mp4/h264/1080/Big_Buck_Bunny_1080_10s_1MB.mp4"],
  ["title" => "Video 2", "url" => "https://test-videos.co.uk/vids/bigbuckbunny/mp4/h264/1080/Big_Buck_Bunny_1080_10s_1MB.mp4"],
  ["title" => "Video 1", "url" => "https://test-videos.co.uk/vids/bigbuckbunny/mp4/h264/1080/Big_Buck_Bunny_1080_10s_1MB.mp4"],
  ["title" => "Video 2", "url" => "https://test-videos.co.uk/vids/bigbuckbunny/mp4/h264/1080/Big_Buck_Bunny_1080_10s_1MB.mp4"],
  ["title" => "Video 1", "url" => "https://test-videos.co.uk/vids/bigbuckbunny/mp4/h264/1080/Big_Buck_Bunny_1080_10s_1MB.mp4"],
  ["title" => "Video 2", "url" => "https://test-videos.co.uk/vids/bigbuckbunny/mp4/h264/1080/Big_Buck_Bunny_1080_10s_1MB.mp4"],

  // Add more video data here
];
?>

<?php if ($_SESSION['age'] == true) { ?>

  <body class="bg-black text-white">

    <?php
    //check if there is any post or get request 
    if (empty($_POST) && empty($_GET)) {
    ?>
      <div class="d-flex align-items-top justify-content-center z-3 w-100 h-100 bg-black" id="preloaderDiv">
        <video class="object-fit-fill z-3" id="preloader" autoplay>
          <source src="assets/videos/preloader.webm" type="video/webm" loading="lazy" />
          Your browser does not support the video tag.
        </video>
      </div>
    <?php
    }
    ?>

    <main id="main">
      <?php
      include_once 'assets/php/navbar.php';
      ?>

      <!-- Voeg hier de inhoud van je website toe -->
      <div class="content container h-100">

        <section id="videos" class="mt-5">
          <div class="row">
            <?php foreach ($videoData as $video) : ?>
              <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="card mb-4">
                  <video width="100%" controls>
                    <source src="<?php echo $video['url']; ?>" type="video/mp4">
                    Your browser does not support the video tag.
                  </video>
                  <div class="card-body">
                    <h5 class="card-title"><?php echo $video['title']; ?></h5>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
        </section>

      </div>
    </main>

    <script src="assets/js/preloader.js" defer></script>
  </body>
<?php
}
?>