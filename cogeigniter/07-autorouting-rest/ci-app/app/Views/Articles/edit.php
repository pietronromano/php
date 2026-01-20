<?= $this->extend("layouts/default") ?>

<?= $this->section("title") ?>Edit Article<?= $this->endSection() ?>

<?= $this->section("content") ?>

<h1>Edit Article</h1>

<?php if (session()->has("errors")): ?>

    <ul>
        <?php foreach(session("errors") as $error): ?>
            <li><?= $error ?></li>
        <?php endforeach; ?>
    </ul>

<?php endif; ?>

<!-- Now using the Article entity, so change from $article["id"] to $article->id -->
<?= form_open("articles/update/" . $article->id) ?>
 <!-- Uses the shared form for update and insert -->
 <?= $this->include("Articles/form") ?>

</form>

<?= $this->endSection() ?>