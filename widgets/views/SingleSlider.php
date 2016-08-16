<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators"><?= $navItems; ?></ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
        <?= $slideItems; ?>
    </div>

    <!-- Controls -->
    <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
    </a>
    <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
    </a>
    <input type="hidden" id="slide_duration" value="<?= $duration; ?>">
</div>