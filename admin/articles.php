<?php
require_once __DIR__ . "/../lib/config.php";
require_once __DIR__ . "/../lib/session.php";
adminOnly();

require_once __DIR__ . "/../lib/pdo.php";
require_once __DIR__ . "/../lib/article.php";
require_once __DIR__ . "/templates/header.php";

if (isset($_GET['page'])) {
  $page = (int)$_GET['page'];
} else {
  $page = 1;
}
$page = max(1, $page);

$articles = getArticles($pdo, _ADMIN_ITEM_PER_PAGE_, $page);
$totalArticles = getTotalArticles($pdo);
$totalPages = max(1, (int) ceil($totalArticles / _ADMIN_ITEM_PER_PAGE_));

$deleteMessage = isset($_GET['delete']) ? "L'article a bien été supprimé" : null;
?>

<h1 class="display-5 fw-bold text-body-emphasis">Articles</h1>
<?php if ($deleteMessage) { ?>
<div class="alert alert-success" role="alert"><?= htmlentities($deleteMessage) ?></div>
<?php } ?>
<div class="d-flex gap-2 justify-content-left py-5">
  <a class="btn btn-primary d-inline-flex align-items-left" href="article.php">
    Ajouter un article
  </a>
</div>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Titre</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php if ($articles && count($articles) > 0) {
        foreach ($articles as $article) { ?>
    <tr>
      <th scope="row"><?= $article['id'] ?></th>
      <td><?= htmlentities($article['title']) ?></td>
      <td><a href="article.php?id=<?= $article['id'] ?>">Modifier</a>
        | <a href="article_delete.php?id=<?= $article['id'] ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet article ?')">Supprimer</a></td>
    </tr>
    <?php }
    } else { ?>
    <tr>
      <td colspan="3">Aucun article.</td>
    </tr>
    <?php } ?>
  </tbody>
</table>

<?php if ($totalPages > 1) { ?>
<nav aria-label="Page navigation example">
  <ul class="pagination">
    <li class="page-item <?= $page <= 1 ? 'disabled' : '' ?>">
      <a class="page-link" href="<?= $page <= 1 ? '#' : '?page=' . ($page - 1) ?>">Précédent</a>
    </li>
    <?php for ($i = 1; $i <= $totalPages; $i++) { ?>
    <li class="page-item <?= $i === $page ? 'active' : '' ?>">
      <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
    </li>
    <?php } ?>
    <li class="page-item <?= $page >= $totalPages ? 'disabled' : '' ?>">
      <a class="page-link" href="<?= $page >= $totalPages ? '#' : '?page=' . ($page + 1) ?>">Suivant</a>
    </li>
  </ul>
</nav>
<?php } ?>

<?php require_once __DIR__ . "/templates/footer.php"; ?>
