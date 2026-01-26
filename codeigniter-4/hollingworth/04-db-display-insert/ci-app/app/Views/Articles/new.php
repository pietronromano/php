<?= $this->extend("layouts/default") ?>

<?= $this->section("title") ?>New Article<?= $this->endSection() ?>

<?= $this->section("content") ?>

<h1>New Article</h1>

    <!-- use the form helper, see BaseController: $helpers = ["form"]; -->
    <?= form_open("articles/create") ?>

        <label for="title">Title</label>
        <input type="text" id="title" name="title">

        <label for="content">Content</label>
        <textarea id="content" name="content"></textarea>

        <button>Save</button>

    </form>
<?= $this->endSection() ?>