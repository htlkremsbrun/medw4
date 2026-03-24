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
     * Fetches all posts from the database and returns them as an array of PostModel instances.
     * @return PostModel[] Array containing all posts, empty if no posts are found
     */
    public function fetchPosts(): array
    {
        $stmt = $this->pdo->prepare("SELECT id, title, content FROM posts ORDER BY id ASC");
        $stmt->execute();

        $posts = [];

        foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row) {
            $posts[] = new PostModel((int)$row['id'], $row['title'], $row['content']);
        }

        return $posts;
    }
}
