<!-- Base template layout to avoid repetition -->
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
    <title><?= $this->renderSection("title") ?></title>
</head>

<body>

    <?= $this->renderSection("content") ?>

</body>

</html>