<header id="<?= $carouselId; ?>" class="carousel slide">
    <!-- Indicators -->
    <ol class="carousel-indicators"><?= $navItems; ?></ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
        <?= $slideItems; ?>
    </div>

    <!-- Controls -->
    <a class="left carousel-control" href="#<?= $carouselId; ?>" data-slide="prev">
        <span class="icon-prev"></span>
    </a>
    <a class="right carousel-control" href="#<?= $carouselId; ?>" data-slide="next">
        <span class="icon-next"></span>
    </a>
    <input type="hidden" id="slide_duration" value="<?= $duration; ?>">
</header>