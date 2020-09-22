<?php 

// Get the list of all image files in the '/img' directory and store them in an array
$images = glob("./img/*.{jpg,jpeg,png,gif}", GLOB_BRACE);
shuffle($images);

$randomImage = $images[array_rand($images)];

?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.css">
<script src="https://unpkg.com/swiper/swiper-bundle.js"></script>
<style>

body {
  background: #fff;
}

.swiper-container {
  height: 100%;
}

#estate {
  position: absolute;
  color: #000;
  font-size: 3rem;
  font-family: 'Times New Roman', serif;
  z-index: 2;
  left: 50%;
  transform: translateX(-50%);
  font-weight: 400;
  bottom: .5rem;
  background: rgba(255,255,255,.3);
}

</style>
<body>
<!-- Slider main container -->
<div class="swiper-container">
    <!-- Additional required wrapper -->
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
<script>
    var mySwiper = new Swiper('.swiper-container', {
  direction: 'horizontal',
  loop: true
})
</script>
