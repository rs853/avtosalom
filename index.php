<?php
require_once "config.php";

$stmt = $pdo->query("SELECT * FROM cars ORDER BY id DESC LIMIT 6");
$cars = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="kk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>AutoLux — Автосалон</title>

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

        <a href="contact.php" class="btn">
            Кеңес алу
        </a>

    </div>
</header>


<section class="hero">

    <div class="container hero-content">

        <p class="red-text">
            PREMIUM AUTO DEALER
        </p>

        <h1>
            Армандаған<br>
            <span>көлігіңізді</span> таңдаңыз
        </h1>

        <p>
            Сапалы жаңа және жүрілген автомобильдер.
            Қолайлы баға және кәсіби қызмет.
        </p>

        <div class="hero-buttons">

            <a href="cars.php" class="btn">
                Көліктерді көру
            </a>

            <a href="contact.php" class="btn btn-outline">
                Бізбен байланысу
            </a>

        </div>

    </div>

</section>


<section class="section">

    <div class="container">

        <div class="section-title">

            <div>
                <p class="red-text">БІЗДІҢ КАТАЛОГ</p>

                <h2>
                    Танымал автомобильдер
                </h2>
            </div>

            <a href="cars.php">
                Барлығын көру →
            </a>

        </div>


        <div class="cars">

            <?php foreach ($cars as $car): ?>

                <div class="car-card">

                    <div class="car-image">

                        <img
                            src="<?= htmlspecialchars($car['image']) ?>"
                            alt="<?= htmlspecialchars($car['name']) ?>"
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


<section class="advantages">

    <div class="container advantages-grid">

        <div>
            <div class="icon">🚘</div>
            <h3>Кең таңдау</h3>
            <p>Әртүрлі марка мен модельдер.</p>
        </div>

        <div>
            <div class="icon">✓</div>
            <h3>Тексерілген авто</h3>
            <p>Әр көлік тексеруден өтеді.</p>
        </div>

        <div>
            <div class="icon">₸</div>
            <h3>Тиімді баға</h3>
            <p>Нарыққа сай қолайлы бағалар.</p>
        </div>

        <div>
            <div class="icon">★</div>
            <h3>Кәсіби сервис</h3>
            <p>Сізге таңдаудан кейін де көмектесеміз.</p>
        </div>

    </div>

</section>


<footer>

    <div class="container footer">

        <div class="logo">
            AUTO<span>LUX</span>
        </div>

        <p>
            © 2026 AutoLux. Барлық құқықтар қорғалған.
        </p>

    </div>

</footer>

<script src="script.js"></script>

</body>
</html>