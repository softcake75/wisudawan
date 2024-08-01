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
    <style>
        .control-buttons {
            position: absolute;
            bottom: 20px;
            right: 20px;
            text-align: right;
        }
        .control-buttons button {
            margin: 5px;
            padding: 10px 20px;
            font-size: 16px;
        }
    </style>
</head>
<body>
    <div class="slider-container">
        <div class="slider">
            <?php foreach ($sliders as $slider): ?>
                <?php $imgPath = base_url(esc($slider['image'])); ?>
                <div class="slide">
                    <div class="name"><?= esc($slider['title']) ?></div><br>
                    <div class="name"><?= esc($slider['npm']) ?></div><br>
                    <img src="<?= $imgPath ?>" alt="Photo"><br>
                    <div class="prodi"><?= esc($slider['nama_prodi']) ?></div><br>
                    <div class="name"><?= esc($slider['kategori']) ?></div>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="control-buttons">
            <button id="startBtn">Start</button>
            <button id="pauseBtn">Pause</button>
            <button id="stopBtn">Stop</button>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function(){
            var $slider = $('.slider').slick({
                infinite: true,
                slidesToShow: 1,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 2000,
            });

            $('#startBtn').click(function() {
                $slider.slick('slickPlay');
            });

            $('#pauseBtn').click(function() {
                $slider.slick('slickPause');
            });

            $('#stopBtn').click(function() {
                $slider.slick('slickPause');
                $slider.slick('slickGoTo', 0);
            });
        });
    </script>
</body>
</html>
