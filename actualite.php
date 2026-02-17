<?php
require_once __DIR__ . "/lib/config.php";
require_once __DIR__ . "/lib/session.php";
require_once __DIR__ . "/lib/pdo.php";
require_once __DIR__ . "/lib/article.php";
require_once __DIR__ . "/lib/comment.php";
require_once __DIR__ . "/templates/header.php";

$article = false;
if (isset($_GET['id']) && ctype_digit($_GET['id'])) {
    $article = getArticleById($pdo, (int)$_GET['id']);
}

if ($article === false) {
    header("HTTP/1.0 404 Not Found");
    echo "<h1>Article non trouvé</h1>";
    echo "<p><a href='actualites.php'>Retour aux actualités</a></p>";
    require_once __DIR__ . "/templates/footer.php";
    exit;
}

$errors = [];
$messages = [];
if (isset($_POST['addComment']) && isset($_SESSION['user'])) {
    $content = trim($_POST['content'] ?? '');
    if (empty($content)) {
        $errors[] = "Le commentaire ne peut pas être vide";
    } else {
        if (addComment($pdo, (int)$_GET['id'], (int)$_SESSION['user']['id'], $content)) {
            $messages[] = "Votre commentaire a été ajouté";
        } else {
            $errors[] = "Erreur lors de l'ajout du commentaire";
        }
    }
}

$comments = getCommentsByArticleId($pdo, (int)$article['id']);
$imagePath = ($article["image"] === null || $article["image"] === '') 
    ? _ASSETS_IMAGES_FOLDER_ . "default-article.jpg" 
    : _ARTICLES_IMAGES_FOLDER_ . $article["image"];
?>

<div class="row flex-lg-row-reverse align-items-center g-5 py-5">
    <div class="col-10 col-sm-8 col-lg-6">
        <img src="<?= htmlentities($imagePath) ?>" class="d-block mx-lg-auto img-fluid" alt="<?= htmlentities($article['title']) ?>" width="700" height="500" loading="lazy">
    </div>
    <div class="col-lg-6">
        <h1 class="display-5 fw-bold text-body-emphasis lh-1 mb-3"><?= htmlentities($article['title']) ?></h1>
        <p class="lead"><?= nl2br(htmlentities($article['content'])) ?></p>
    </div>
</div>

<?php foreach ($messages as $msg) { ?>
<div class="alert alert-success"><?= htmlentities($msg) ?></div>
<?php } ?>
<?php foreach ($errors as $err) { ?>
<div class="alert alert-danger"><?= htmlentities($err) ?></div>
<?php } ?>

<div class="mt-5">
    <h1 class="h4 mb-3">Commentaires (<?= count($comments) ?>)</h1>
    <?php foreach ($comments as $c) { ?>
    <div class="card mb-2">
        <div class="card-body py-2">
            <strong><?= htmlentities($c['first_name'] . ' ' . $c['last_name']) ?></strong>
            <span class="text-muted small"><?= date('d/m/Y H:i', strtotime($c['created_at'])) ?></span>
            <p class="mb-0 mt-1"><?= nl2br(htmlentities($c['content'])) ?></p>
        </div>
    </div>
    <?php } ?>

    <?php if (isset($_SESSION['user'])) { ?>
    <form method="POST" class="mt-4">
        <div class="mb-2">
            <label for="content" class="form-label">Ajouter un commentaire</label>
            <textarea class="form-control" id="content" name="content" rows="3" required></textarea>
        </div>
        <button type="submit" name="addComment" class="btn btn-primary">Publier</button>
    </form>
    <?php } else { ?>
    <p class="text-muted mt-3"><a href="login.php">Connectez-vous</a> pour laisser un commentaire.</p>
    <?php } ?>
</div>

<?php require_once __DIR__ . "/templates/footer.php"; ?>
