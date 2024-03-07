<?php

class PostsRepository
{
    private $pdo;

    /**
     * PostsRepository constructor.
     * @param PDO $pdo
     */
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * @return array
     */
    public function fetchPosts(): array
    {
        $posts = $this->pdo->query("SELECT * FROM posts")->fetchAll();
        $items = [];
        foreach ($posts as $post) {
            array_push($items, new PostModel($post["id"], $post["title"], $post["content"]));
        }
        return $items;
    }
}