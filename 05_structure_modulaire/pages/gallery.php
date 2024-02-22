<?php 
$dir = "./assets/img/";
$array_img = scandir($dir);
?>

<h1 class="text-center">Gallery</h1>
<section id="gallery" class="row row-cols-1 row-cols-md-3 g-4">
<?php foreach($array_img as $src): ?>
    <?php 
    $file = $dir.$src;
    if (is_file($file)):
    ?>
    <article class="col">
        <div class="card mb-3">
            <img src="<?php echo $dir.$src ?>" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-dark">Go somewhere</a>
            </div>
        </div>
    </article>
    <?php endif ?>
<?php endforeach ?>
</section>