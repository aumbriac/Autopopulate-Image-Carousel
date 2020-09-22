<?php 

// Get the list of all image files in the '/img' directory and store them in an array
$images = glob("./img/*.{jpg,jpeg,png,gif}", GLOB_BRACE);
shuffle($images);

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
<div id="estate">
  <span class="mx-auto">&copy; The Umbriac Estate</span>
</div>
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

    <!-- <div class="swiper-pagination"></div> -->

    <!-- If we need navigation buttons -->
    <!-- <div class="swiper-button-prev"></div>
    <div class="swiper-button-next"></div> -->

    <!-- If we need scrollbar -->
    <!-- <div class="swiper-scrollbar"></div> -->
</div>
</body>
<script>
    var mySwiper = new Swiper('.swiper-container', {
  // Optional parameters
  direction: 'horizontal',

  // If we need pagination
  pagination: {
    el: '.swiper-pagination',
  },

  // Navigation arrows
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },

  // And if we need scrollbar
  scrollbar: {
    el: '.swiper-scrollbar',
  },
})
</script>