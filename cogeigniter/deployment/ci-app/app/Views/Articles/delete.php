<?= $this->extend("layouts/default") ?>

<?= $this->section("title") ?>Delete Article<?= $this->endSection() ?>

<?= $this->section("content") ?>

    <h1>Delete Article</h1>

    <p>Are you sure you want to delete this article?</p>

    <?= form_open("articles/delete/" . $article->id) ?>

        <button>Yes</button>

    </form>

<?= $this->endSection() ?>