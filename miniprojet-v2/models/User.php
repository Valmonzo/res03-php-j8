<?php

/*User.php
Votre classe User :

attributs private
id int
first_name string
last_name string
email string
password string
accesseurs public
Pour chacun des attributs.

constructeur
Prend first_name, last_name, email, password en paramètres et les initialise. Initialise id avec la valeur null*/


class User {
    private ?int $id;
    private string $first_name;
    private string $last_name;
    private string $email;
    private string $password;
    private array $posts;


    public function __construct(string $first_name, string $last_name, string $email, string $password) {
        $this->id = NULL;
        $this->posts = [];
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->email = $email;
        $this->password = $password;
    }

    public function getId() : int
    {
        return $this->id;
    }

    public function getFirstName() : string
    {
        return $this->first_name;
    }

    public function getLastName() : string
    {
        return $this->last_name;
    }

    public function getEmail() : string
    {
        return $this->email;
    }

    public function getPassword() : string
    {
        return $this->password;
    }

    public function getPosts() : array
    {
        return $this->posts;
    }

    public function setId(int $id) : void
    {
        $this->id = $id;
    }


    public function setFirstName(string $first_name) : string
    {
        $this->firstName = $first_name;
    }

    public function setLastName(string $last_name) : string
    {
        $this->lastName = $last_name;
    }

    public function setEmail(string $email) : string
    {
        $this->email = $email;
    }

    public function setPassword(string $password) : string
    {
        $this->password = $password;
    }

    public function setPosts(array $posts) : array
    {
        $this->posts = $posts;
    }
    
    
    /*addPost(Post $post) : array qui ajoute le $post au tableau des posts et renvoie le tableau.
removePost(Post $post) : array qui retire le $post au tableau des posts et renvoie le tableau.*/
    public function  addPost(Post $post) : array
    {
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
        
        return $newPosts;
    }
}