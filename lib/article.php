<?php

function getArticleById(PDO $pdo, int $id):array|bool
{
    $query = $pdo->prepare("SELECT * FROM articles WHERE id = :id");
    $query->bindValue(":id", $id, PDO::PARAM_INT);
    $query->execute();
    return $query->fetch(PDO::FETCH_ASSOC);
}

function getArticles(PDO $pdo, ?int $limit = null, ?int $page = null, ?int $categoryId = null):array|bool
{
    $sql = "SELECT * FROM articles";
    $params = [];

    if ($categoryId !== null) {
        $sql .= " WHERE category_id = :category_id";
        $params[':category_id'] = $categoryId;
    }

    $sql .= " ORDER BY id DESC";

    if ($limit !== null && $page !== null) {
        $offset = ($page - 1) * $limit;
        $sql .= " LIMIT :limit OFFSET :offset";
    } elseif ($limit !== null) {
        $sql .= " LIMIT :limit";
    }

    $query = $pdo->prepare($sql);

    foreach ($params as $key => $value) {
        $query->bindValue($key, $value, PDO::PARAM_INT);
    }

    if ($limit !== null && $page !== null) {
        $query->bindValue(":limit", $limit, PDO::PARAM_INT);
        $query->bindValue(":offset", $offset, PDO::PARAM_INT);
    } elseif ($limit !== null) {
        $query->bindValue(":limit", $limit, PDO::PARAM_INT);
    }

    $query->execute();
    return $query->fetchAll(PDO::FETCH_ASSOC);
}

function getTotalArticles(PDO $pdo, ?int $categoryId = null):int|bool
{
    $sql = "SELECT COUNT(*) as total FROM articles";
    $params = [];

    if ($categoryId !== null) {
        $sql .= " WHERE category_id = :category_id";
        $params[':category_id'] = $categoryId;
    }

    $query = $pdo->prepare($sql);
    foreach ($params as $key => $value) {
        $query->bindValue($key, $value, PDO::PARAM_INT);
    }
    $query->execute();
    $result = $query->fetch(PDO::FETCH_ASSOC);
    return (int) $result['total'];
}

function saveArticle(PDO $pdo, string $title, string $content, ?string $image, int $category_id, ?int $id = null):bool 
{
    if ($id === null) {
        $query = $pdo->prepare("INSERT INTO articles (title, content, image, category_id) VALUES (:title, :content, :image, :category_id)");
    } else {
        $query = $pdo->prepare("UPDATE articles SET title = :title, content = :content, image = :image, category_id = :category_id WHERE id = :id");
        $query->bindValue(':id', $id, PDO::PARAM_INT);
    }

    $query->bindValue(':title', $title, PDO::PARAM_STR);
    $query->bindValue(':content', $content, PDO::PARAM_STR);
    $query->bindValue(':image', $image, $image === null ? PDO::PARAM_NULL : PDO::PARAM_STR);
    $query->bindValue(':category_id', $category_id, PDO::PARAM_INT);

    return $query->execute();  
}

function deleteArticle(PDO $pdo, int $id):bool
{
    $query = $pdo->prepare("DELETE FROM articles WHERE id = :id");
    $query->bindValue(":id", $id, PDO::PARAM_INT);
    $query->execute();
    
    if ($query->rowCount() > 0) {
        return true;
    } else {
        return false;
    }
}
