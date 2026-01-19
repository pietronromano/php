<!-- V1: HTML up to <body> supplied by header.php 
<?= $this->include("header") ?>


<h1>Articles list...</h1>

</body>

</html>

-->

<!-- V2: Using layout -->
<?= $this->extend("layouts/default") ?>

<?= $this->section("title") ?>Articles<?= $this->endSection() ?>

<?= $this->section("content") ?>

    <h1>Articles List</h1>

<?= $this->endSection() ?>