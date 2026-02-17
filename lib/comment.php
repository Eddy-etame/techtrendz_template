<?php

function getCommentsByArticleId(PDO $pdo, int $articleId): array
{
    $query = $pdo->prepare("
        SELECT c.id, c.content, c.created_at, u.first_name, u.last_name 
        FROM comments c 
        INNER JOIN users u ON c.user_id = u.id 
        WHERE c.article_id = :article_id 
        ORDER BY c.created_at ASC
    ");
    $query->bindValue(":article_id", $articleId, PDO::PARAM_INT);
    $query->execute();
    return $query->fetchAll(PDO::FETCH_ASSOC);
}

function addComment(PDO $pdo, int $articleId, int $userId, string $content): bool
{
    $content = trim($content);
    if (empty($content)) {
        return false;
    }
    $query = $pdo->prepare("INSERT INTO comments (article_id, user_id, content) VALUES (:article_id, :user_id, :content)");
    $query->bindValue(":article_id", $articleId, PDO::PARAM_INT);
    $query->bindValue(":user_id", $userId, PDO::PARAM_INT);
    $query->bindValue(":content", $content, PDO::PARAM_STR);
    return $query->execute();
}
