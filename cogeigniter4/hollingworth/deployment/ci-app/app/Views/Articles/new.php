<?= $this->extend("layouts/default") ?>

<?= $this->section("title") ?>New Article<?= $this->endSection() ?>

<?= $this->section("content") ?>

<h1>New Article</h1>

    <!-- Check in the session for validation errors -->
    <?php if (session()->has("errors")): ?>

        <ul>
            <?php foreach(session("errors") as $error): ?>
                <li><?= $error ?></li>
            <?php endforeach; ?>
        </ul>

    <?php endif; ?>

    <!-- use the form helper, see BaseController: $helpers = ["form"]; -->
    <?= form_open("articles") ?>

            <!-- Uses the shared form for update and insert -->
            <?= $this->include("Articles/form") ?>

    </form>
<?= $this->endSection() ?>