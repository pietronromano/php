<?= $this->extend("layouts/default") ?>

<?= $this->section("title") ?>Delete Article<?= $this->endSection() ?>

<?= $this->section("content") ?>

    <h1>Delete Article</h1>

    <p>Are you sure you want to delete this article?</p>

    <?= form_open("articles/" . $article->id) ?>
        <!-- Using method spoofing to send a DELETE request: note, DELETE must be in CAPITALS TO WORK -->
        <input type="hidden" name="_method" value="DELETE">

        <button>Yes</button>

    </form>

<?= $this->endSection() ?>