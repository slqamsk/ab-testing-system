<?php
// Определяем вариант A/B теста
$variant = $_GET['v'] ?? '';
if (!in_array($variant, ['A', 'B'])) {
    $variant = (rand(0, 1) === 0) ? 'A' : 'B'; // Случайный выбор
}

// Тексты для разных вариантов
$texts = [
    'A' => 'Вариант A: Добро пожаловать на наш курс по тестированию!',
    'B' => 'Вариант B: Начни карьеру в QA с нашим курсом!'
];
$currentText = $texts[$variant];
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Тест GA</title>
    <!-- Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-SZ6QF121DN"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'G-SZ6QF121DN');
        
        // Отправка номера варианта при загрузке
        gtag('event', 'page_view', {
            'ver': '<?php echo $variant; ?>'
        });
    </script>
</head>
<body>
    <h1><?php echo $currentText; ?></h1>
    <p>Текущий вариант: <?php echo $variant; ?></p>
    
    <form onsubmit="return false;">
        <input type="text" placeholder="Имя">
        <input type="email" placeholder="Email">
        <button onclick="gtag('event', 'conversion', {'ver': '<?php echo $variant; ?>'}); alert('Форма отправлена!');">
            Отправить
        </button>
    </form>

    <p><a href="?v=A">Вариант A</a> | <a href="?v=B">Вариант B</a> | <a href="?">Случайный</a></p>
</body>
</html>