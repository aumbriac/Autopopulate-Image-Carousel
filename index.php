<?php

// Get the list of all image files in the '/img' directory and store them in an array
$images = glob("./img/*.{jpg,jpeg,png,gif}", GLOB_BRACE);
shuffle($images);

$randomImage = $images[array_rand($images)];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php if ($images) : ?>
        <div id="carousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <!-- For the carousel to work, it must have one image set to active -->
                <div class="carousel-item active">
                    <img src="<?= $randomImage; ?>">
                </div>
                <!-- Loop through images array -->
                <?php foreach ($images as $image) : 
                // Prevent duplicate images
                    if ($randomImage === $image) : 
                        continue;
                    else : ?>
                    <div class="carousel-item">
                        <img src="<?= $image; ?>">
                    </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
            <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    <?php else : ?>
        <h1>No images to display</h1>
    <?php endif; ?>
    <div id="bottom">
        <span id="play" class='text-white small bg-dark p-1 rounded'>Pause</span>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script>
        // Allow photo navigation using keyCodes
        $(document).on('keydown', (e) => {
            if (e.keyCode === 32) { 
                $('#play').click(); // Event listener for space bar
            } else if (e.keyCode === 39) {
                $(".carousel-control-next").click(); // Event listener for right arrow key
            } else if (e.keyCode === 37) {
                $(".carousel-control-prev").click(); // Event listener for left arrow key
            }
        });

$(document).ready(function(){
 if (
  /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(
   navigator.userAgent
  )
 ) {
  window.location = 'mobile.php';
}
        $('.carousel').carousel({
            interval: 4000
        });

        $('#play').click(() => {
            if ($('#play').text() === 'Pause'){
                $('.carousel').carousel('pause');
                $('#play').text('Play');
            } else {
                $('.carousel').carousel('cycle');
                $('#play').text('Pause');
            }
        })
    })
    </script>
</body>

</html>
