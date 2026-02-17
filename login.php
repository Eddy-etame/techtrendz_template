<?php
require_once 'lib/config.php';
require_once 'lib/session.php';
require_once 'lib/pdo.php';
require_once 'lib/user.php';

require_once 'templates/header.php';


$errors = [];
$messages = [];

if (isset($_POST['loginUser'])) {
    $user = verifyUserLoginPassword($pdo, $_POST['email'], $_POST['password']);

    if ($user) {
        $_SESSION['user'] = $user;
        if ($user['role'] === 'admin') {
            header("Location: admin/index.php");
        } else {
            header("Location: index.php");
        }
        exit();
    } else {
        $errors[] = "Email ou mot de passe incorrect";
    }
}

?>
    <h1>Login</h1>

    <?php
    foreach ($errors as $error) { ?>
        <div class="alert alert-danger" role="alert">
            <?= htmlentities($error); ?>
        </div>
    <?php } ?>

    <form method="POST">
        <div class="mb-3">
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="<?= isset($_POST['email']) ? htmlentities($_POST['email']) : '' ?>">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Mot de passe</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>

        <input type="submit" name="loginUser" class="btn btn-primary" value="Se connecter">

    </form>

    <?php
require_once 'templates/footer.php';
?>
