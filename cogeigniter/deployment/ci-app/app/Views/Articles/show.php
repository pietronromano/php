<?= $this->extend("layouts/default") ?>

<?= $this->section("title") ?>Article<?= $this->endSection() ?>

<?= $this->section("content") ?>

    <!-- esc() function to escape output and prevent XSS (replaces PHP htmlspecialchars) -->
    <h1><?= esc($article["title"]) ?></h1>

    <p><?= esc($article["content"]) ?></p>

<?= $this->endSection() ?>