<?php

class PostCategory {
    private int $id;
    private string $name;
    private string $description;
    private array $posts;

    public function __construct(string $name, string $description)
    {
        $this->id = NULL;
        $this->name = $name;
        $this->description = $description;
        $this->posts = [];

    }

    //Getter

    public function getId() : int
    {
        return $this->id;
    }

    public function getName() : string
    {
        return $this->name;
    }

    public function getDescription() : string
    {
        return $this->description;
    }

    public function getPosts() : array
    {
        return $this->posts;
    }


    //Setter

    public function setId(int $id) : void
    {
        $this->id = $id;
    }

    public function setName(string $name) : string
    {
        $this->name = $name;
    }

    public function setDescription(string $description) : string
    {
        $this->description = $description;
    }

    public function setPosts(array $posts) : array
    {
        $this->posts = $posts;
    }

    //Methods

    public function addPost(Post $post) : array {
        $this->posts[] = $post;
    }

    public function  removePost(Post $post) : array
    {
        $newPosts = [];

        for($i = 0; $i < count($this->posts); $i++) {
            if($this->posts[$i]->getId() !== $post->getId())
            {
                $newPosts[] = $this->posts[$i];
            }
        }

        $this->posts = $newPosts;

        return $this->posts;
    }
}

?>
