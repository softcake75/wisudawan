<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wisudawan Slider</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        .carousel-item img {
            width: 100%;
            height: auto;
            max-width: 1920px; /* Max width to maintain aspect ratio */
            max-height: 1080px; /* Max height to maintain aspect ratio */
        }

        .carousel-caption {
            position: absolute;
            bottom: 20px; /* Adjust the position from bottom */
            left: 50%; /* Center horizontally */
            transform: translateX(-50%); /* Center horizontally */
            background: rgba(0, 0, 0, 0.5);
            padding: 1rem;
            border-radius: 10px;
            max-width: 80%; /* Adjust maximum width as needed */
            width: 600px; /* Fixed width or adjust based on content */
            text-align: center; /* Center align text */
            color: #fff;
        }

        .carousel-caption h5 {
            font-size: 24px; /* Adjust heading font size */
            margin-bottom: 10px;
        }

        .carousel-caption p {
            font-size: 18px; /* Adjust paragraph font size */
            line-height: 1.5; /* Adjust line height */
        }
    </style>
</head>
<body>

<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="7000">
    <div class="carousel-inner">
        <?php foreach ($sliders as $index => $slider): ?>
            <div class="carousel-item <?= $index === 0 ? 'active' : '' ?>">
                <img src="<?= base_url($slider['image']) ?>" class="d-block w-100" alt="<?= $slider['title'] ?>">
                <div class="carousel-caption">
                    <div class="caption-content">
                        <h5><?= $slider['title'] ?></h5>
                        <p><?= $slider['description'] ?></p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>
