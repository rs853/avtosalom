<?php

require_once "config.php";

$id = isset($_GET['id'])
    ? (int)$_GET['id']
    : 0;

$stmt = $pdo->prepare(
    "SELECT * FROM cars WHERE id = ?"
);

$stmt->execute([$id]);

$car = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$car) {
    die("Автомобиль табылмады!");
}

?>

<!DOCTYPE html>
<html lang="kk">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>
        <?= htmlspecialchars($car['name']) ?>
    </title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

<header>

    <div class="container navbar">

        <a href="index.php" class="logo">
            AUTO<span>LUX</span>
        </a>

        <nav>

            <a href="index.php">
                Басты бет
            </a>

            <a href="cars.php">
                Автомобильдер
            </a>

            <a href="contact.php">
                Байланыс
            </a>

        </nav>

    </div>

</header>


<section class="section">

    <div class="container detail">

        <div>

            <img
                class="detail-image"
                src="<?= htmlspecialchars($car['image']) ?>"
                alt=""
            >

        </div>


        <div>

            <p class="red-text">
                <?= htmlspecialchars($car['condition']) ?>
            </p>

            <h1>
                <?= htmlspecialchars($car['name']) ?>
            </h1>

            <div class="price">

                <?= number_format(
                    $car['price'],
                    0,
                    '.',
                    ' '
                ) ?> ₸

            </div>

            <p class="description">

                <?= htmlspecialchars(
                    $car['description']
                ) ?>

            </p>


            <div class="detail-specs">

                <div>
                    <small>Жылы</small>
                    <b><?= $car['year'] ?></b>
                </div>

                <div>
                    <small>Кузов</small>
                    <b><?= htmlspecialchars($car['body']) ?></b>
                </div>

                <div>
                    <small>Қорап</small>
                    <b><?= htmlspecialchars($car['transmission']) ?></b>
                </div>

                <div>
                    <small>Жанармай</small>
                    <b><?= htmlspecialchars($car['fuel']) ?></b>
                </div>

            </div>


            <a href="contact.php" class="btn">
                Осы көлікке өтінім беру
            </a>

        </div>

    </div>

</section>

</body>
</html>