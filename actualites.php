<?php
require_once __DIR__ . "/lib/config.php";
require_once __DIR__ . "/lib/session.php";
require_once __DIR__ . "/lib/pdo.php";
require_once __DIR__ . "/lib/article.php";
require_once __DIR__ . "/lib/category.php";
require_once __DIR__ . "/templates/header.php";

$page = isset($_GET['page']) && ctype_digit($_GET['page']) ? (int)$_GET['page'] : 1;
$page = max(1, $page);

$categoryId = null;
if (isset($_GET['category']) && ctype_digit($_GET['category'])) {
    $categoryId = (int)$_GET['category'];
}

$articles = getArticles($pdo, _FRONT_ARTICLE_PER_PAGE_, $page, $categoryId);
$totalArticles = getTotalArticles($pdo, $categoryId);
$totalPages = max(1, (int) ceil($totalArticles / _FRONT_ARTICLE_PER_PAGE_));
$categories = getCategories($pdo);

?>

<h1>TechTrendz Actualités</h1>

<form method="GET" class="mb-4">
    <div class="row g-2 align-items-center">
        <div class="col-auto">
            <label for="category" class="form-label mb-0">Filtrer par catégorie :</label>
        </div>
        <div class="col-auto">
            <select name="category" id="category" class="form-select form-select-sm" onchange="this.form.submit()">
                <option value="">Toutes les catégories</option>
                <?php foreach ($categories as $category) { ?>
                    <option value="<?= $category['id'] ?>" <?= $categoryId === (int)$category['id'] ? 'selected' : '' ?>><?= htmlentities($category['name']) ?></option>
                <?php } ?>
            </select>
        </div>
        <?php if ($categoryId) { ?>
        <input type="hidden" name="page" value="1">
        <?php } ?>
    </div>
</form>

<div class="row text-center">
<?php if ($articles && count($articles) > 0) {
    foreach ($articles as $article) {
        require __DIR__ . "/templates/article_part.php";
    }
} else { ?>
    <p>Aucun article pour le moment.</p>
<?php } ?>
</div>

<?php if ($totalPages > 1) { ?>
<nav aria-label="Navigation des pages" class="mt-4">
    <ul class="pagination justify-content-center">
        <li class="page-item <?= $page <= 1 ? 'disabled' : '' ?>">
            <a class="page-link" href="<?= $page <= 1 ? '#' : '?page=' . ($page - 1) . ($categoryId ? '&category=' . $categoryId : '') ?>" aria-label="Précédent">Précédent</a>
        </li>
        <?php for ($i = 1; $i <= $totalPages; $i++) { ?>
        <li class="page-item <?= $i === $page ? 'active' : '' ?>">
            <a class="page-link" href="?page=<?= $i ?><?= $categoryId ? '&category=' . $categoryId : '' ?>"><?= $i ?></a>
        </li>
        <?php } ?>
        <li class="page-item <?= $page >= $totalPages ? 'disabled' : '' ?>">
            <a class="page-link" href="<?= $page >= $totalPages ? '#' : '?page=' . ($page + 1) . ($categoryId ? '&category=' . $categoryId : '') ?>" aria-label="Suivant">Suivant</a>
        </li>
    </ul>
</nav>
<?php } ?>

<?php require_once __DIR__ . "/templates/footer.php"; ?>
