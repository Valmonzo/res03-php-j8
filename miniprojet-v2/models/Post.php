<?php

class Post {
    private int $id;
    private string $title;
    private string $content;
    private User $author;
    private PostCategory $category;

    public function __construct(string $title, string $content, PostCategory $category, User $author)
    {
        $this->id = NULL;
        $this->title = $title;
        $this->content = $content;
        $this->category = $category;
        $this->author = $author;

    }

    //Getter

    public function getId() : int
    {
        return $this->id;
    }

    public function getTitle() : string
    {
        return $this->title;
    }

    public function getContent() : string
    {
        return $this->content;
    }

    public function getAuthor() : User
    {
        return $this->author;
    }

    public function getCategory() : PostCategory
    {
        return $this->category;
    }

    //Setter

    public function setId(int $id) : void
    {
        $this->id = $id;
    }

    public function setTitle(string $title) : string
    {
        $this->title = $title;
    }

    public function setContent(string $content) : string
    {
        $this->content = $content;
    }

    public function setAuthor(User $author) : User
    {
        $this->author = $author;
    }

    public function setCategory(PostCategory $category) : PostCategory
    {
        $this->category = $category;
    }

}

?>
