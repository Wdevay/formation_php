<?php
$random = rand(0,6);
$array_img = [
    "./assets/img/beach-5526592_1280.jpg",
    "./assets/img/coffee-2242213_1280.jpg",
    "./assets/img/london-3833039_1280.jpg",
    "./assets/img/plouzane-1758197_1280.jpg",
    "./assets/img/road-3478977_1280.jpg",
    "./assets/img/sunflowers-3292932_1280.jpg",
    "./assets/img/sunset-3689760_1280.jpg",
    ];
?>

<h1 class="text-center">Home</h1>
<div id="carouselExampleDark" class="carousel slide">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active" data-bs-interval="10000">
      <img src="<?php echo $array_img[$random] ?>" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item" data-bs-interval="2000">
      <img src="<?php echo $array_img[$random/2] ?>" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="<?php echo $array_img[$random/3] ?>" class="d-block w-100" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quaerat, tenetur veritatis nesciunt quia ipsum molestiae, possimus ad, harum ipsa cum iste suscipit reiciendis quos! Minima autem ipsa assumenda maiores facere.</p>