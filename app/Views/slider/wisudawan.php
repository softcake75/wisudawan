<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Slider</title>
    <link rel="stylesheet" href="<?= base_url('dist/css/style.css') ?>">
    <link rel="stylesheet" href="<?= base_url('plugins/slick/slick.css') ?>">
    <link rel="stylesheet" href="<?= base_url('plugins/slick/slick-theme.css') ?>">
    <script src="<?= base_url('plugins/jquery/jquery.min.js') ?>"></script>
    <script src="<?= base_url('plugins/slick/slick.min.js') ?>"></script>
</head>
<body>
    <div class="slider-container">
        <div class="slider">
            <?php foreach ($sliders as $slider): ?>
                <?php $imgPath = base_url(esc($slider['image'])); ?>
                <div class="slide">
                    <div class="name"><?= esc($slider['title']) ?></div>
                    <img class="center" src="<?= $imgPath ?>" alt="Photo">
                    <div class="number"><?= esc($slider['id_prodi']) ?></div>
                    <div class="department"><?= esc($slider['description']) ?></div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function(){
            $('.slider').slick({
                infinite: true,
                slidesToShow: 1,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 3000,
            });
        });
    </script>
</body>
</html>
