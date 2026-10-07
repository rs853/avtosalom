<?php

require_once "config.php";

$message = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $name = trim($_POST["name"]);
    $phone = trim($_POST["phone"]);
    $text = trim($_POST["message"]);

    if ($name !== "" && $phone !== "") {

        $stmt = $pdo->prepare(
            "INSERT INTO requests
            (name, phone, message)
            VALUES (?, ?, ?)"
        );

        $stmt->execute([
            $name,
            $phone,
            $text
        ]);

        $message =
            "Өтінім сәтті жіберілді! Біз сізбен хабарласамыз.";

    }

}

?>

<!DOCTYPE html>
<html lang="kk">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Байланыс — AutoLux</title>

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


<section class="page-title">

    <div class="container">

        <p class="red-text">
            CONTACT
        </p>

        <h1>
            Бізбен байланысыңыз
        </h1>

    </div>

</section>


<section class="section">

    <div class="container contact">

        <div>

            <h2>
                Автокөлік таңдауға көмектесеміз
            </h2>

            <p>
                Қалаған көлігіңіз туралы сұрақ қойыңыз
                немесе тест-драйвқа өтінім қалдырыңыз.
            </p>

            <div class="contact-info">

                <b>📞 Телефон</b>
                <span>+7 700 123 45 67</span>

            </div>

            <div class="contact-info">

                <b>📍 Мекенжай</b>
                <span>Түркістан, Қазақстан</span>

            </div>

            <div class="contact-info">

                <b>🕐 Жұмыс уақыты</b>
                <span>09:00 — 20:00</span>

            </div>

        </div>


        <form method="POST" class="form">

            <?php if ($message): ?>

                <div class="success">
                    <?= htmlspecialchars($message) ?>
                </div>

            <?php endif; ?>


            <label>
                Атыңыз

                <input
                    type="text"
                    name="name"
                    required
                    placeholder="Атыңыз"
                >

            </label>


            <label>
                Телефон

                <input
                    type="tel"
                    name="phone"
                    required
                    placeholder="+7 700 000 00 00"
                >

            </label>


            <label>
                Хабарлама

                <textarea
                    name="message"
                    rows="5"
                    placeholder="Қандай көлік қызықтырады?"
                ></textarea>

            </label>


            <button class="btn" type="submit">
                Өтінім жіберу
            </button>

        </form>

    </div>

</section>

</body>
</html>