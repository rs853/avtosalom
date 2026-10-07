<?php
require_once "config.php";

$stmt = $pdo->query("SELECT * FROM cars ORDER BY id DESC");
$cars = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="kk">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Автомобильдер — AutoLux</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

<header>

    <div class="container navbar">

        <a href="index.php" class="logo">
            AUTO<span>LUX</span>
        </a>

        <nav>
            <a href="index.php">Басты бет</a>
            <a href="cars.php">Автомобильдер</a>
            <a href="contact.php">Байланыс</a>
        </nav>

    </div>

</header>


<section class="page-title">

    <div class="container">

        <p class="red-text">
            AUTO CATALOG
        </p>

        <h1>
            Барлық автомобильдер
        </h1>

        <p>
            Өзіңізге ұнайтын көлікті таңдаңыз.
        </p>

    </div>

</section>


<section class="section">

    <div class="container">

        <div class="cars">

            <?php foreach ($cars as $car): ?>

                <div class="car-card">

                    <div class="car-image">

                        <img
                            src="<?= htmlspecialchars($car['image']) ?>"
                            alt=""
                        >

                        <span>
                            <?= htmlspecialchars($car['condition']) ?>
                        </span>

                    </div>

                    <div class="car-content">

                        <small>
                            <?= $car['year'] ?>
                            •
                            <?= htmlspecialchars($car['body']) ?>
                        </small>

                        <h3>
                            <?= htmlspecialchars($car['name']) ?>
                        </h3>

                        <div class="specs">

                            <span>
                                ⚙ <?= htmlspecialchars($car['transmission']) ?>
                            </span>

                            <span>
                                ⛽ <?= htmlspecialchars($car['fuel']) ?>
                            </span>

                        </div>

                        <div class="car-bottom">

                            <strong>
                                <?= number_format($car['price'], 0, '.', ' ') ?> ₸
                            </strong>

                            <a href="car.php?id=<?= $car['id'] ?>">
                                Толығырақ →
                            </a>

                        </div>

                    </div>

                </div>

            <?php endforeach; ?>

        </div>

    </div>

</section>

</body>
</html>