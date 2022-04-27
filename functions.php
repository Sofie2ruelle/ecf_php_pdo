<?php
// functions.php

function isValidArticle(array $article) : bool
{
    if (array_key_exists('is_enabled', $article)) {
        $isEnabled = $article['is_enabled'];
    } else {
        $isEnabled = false;
    }

    return $isEnabled;
}

function displayUser(string $userEmail, array $user) : string
{
    for ($i = 0; $i < count($user); $i++) {
        $user = $user[$i];
        if ($userEmail === $user['email']) {
            return $user['pseudo'];
        }
    }
}

function getArticle(array $article) : array
{
    $validArticle = [];

    foreach($article as $article) {
        if (isValidArticle($article)) {
            $validArticle[] = $article;
        }
    }

    return $validArticle;
}