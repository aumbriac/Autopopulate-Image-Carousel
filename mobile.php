<?php 

// Get the list of all image files in the '/img' directory and store them in an array
$images = glob("./img/*.{jpg,jpeg,png,gif}", GLOB_BRACE);
shuffle($images);

$randomImage = $images[array_rand($images)];

?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.css">
<body>
<!-- Slider main container -->
<div class="swiper-container">
    <!-- Required wrapper -->
    <div class="swiper-wrapper">
        <!-- Slides -->
        <?php foreach($images as $image) : ?>
        <div style="background: url('<?= $image; ?>'); 
                    background-size: contain; 
                    background-repeat: no-repeat; 
                    background-position: center;
                    " class="swiper-slide"></div>
        <?php endforeach; ?>
    </div>
</div>
</body>
<script src="https://unpkg.com/swiper/swiper-bundle.js"></script>
<script>
    var mySwiper = new Swiper('.swiper-container', {
  direction: 'horizontal',
  loop: true
})
</script>
