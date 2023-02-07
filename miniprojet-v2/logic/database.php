
<?php

require 'models/User.php';

$db = new PDO(
    'mysql:host=db.3wa.io;port=3306;dbname=valmontpehautpietri_phpj8',
    'valmontpehautpietri',
    'd39fded3cc68bed8c1489931a2f4de29'
);

$db->exec("SET NAMES 'utf8';");

//User Functions

function loadUser(string $email,  PDO $db) : ?User
{

    $query = $db->prepare('SELECT * FROM users WHERE email = :email');
    $parameters = [
    'email' => $email
    ];
    $query->execute($parameters);
    $user = $query->fetch(PDO::FETCH_ASSOC);

    if($user === false) {
        return null;
    }
    else
    {
        $logUser = new User($user['first_name'], $user['last_name'], $user['email'], $user['password']);
        $logUser->setId($user['id']);

        return $logUser;
    }


}

function loadUserById(int $id, PDO $db) : User
{
    $query = $db->prepare('SELECT * FROM users WHERE id = :id');
    $parameters = [
    'id' => $id
    ];
    $query->execute($parameters);
    $user = $query->fetch(PDO::FETCH_ASSOC);

    if($user === false) {
        return null;
    }
    else
    {
        $logUser = new User($user['first_name'], $user['last_name'], $user['email'], $user['password']);
        $logUser->setId($user['id']);

        return $logUser;
    }
}

function saveUser(User $user, PDO $db) : User
{
    $query = $db->prepare('INSERT INTO users (`id`, `first_name`, `last_name`, `email`, `password`) VALUES(NULL, :first_name, :last_name, :email, :password)');

    $parameters = [
    'first_name' => $user->getFirstName(),
    'last_name' => $user->getLastName(),
    'email' => $user->getEmail(),
    'password'=>$user->getPassword()
    ];

    $query->execute($parameters);

    return loadUser($user->getEmail(), $db);

}

// Functions Post-Categories

function loadPostCategory(int $id, PDO $db) : PostCategory
{
    $query = $db->prepare('SELECT * FROM post_categories WHERE id = :id');
    $parameters = [
    'id' => $id
    ];
    $query->execute($parameters);
    $postCategory = $query->fetch(PDO::FETCH_ASSOC);

    if($postCategory === false) {
        return null;
    }
    else
    {
        $newPostCategory = new PostCategory($postCategory['name'], $postCategory['description']);
        $newPostCategory->setId($postCategory['id']);

        return $newPostCategory;
    }
}

function loadAllPostCategory(PDO $db) : array
{
    $query = $db->prepare('SELECT * FROM post_categories');
    $query->execute();
    $allPostCategory = $query->fetchAll(PDO::FETCH_ASSOC);


    $newAllPostCategory = [];

    foreach($allPostCategory as $postCat)
    {
        $newPostCategory = new PostCategory($postCat["name"], $postCat["description"]);
        $newPostCategory->setId($postCat['id']);
        $newAllPostCategory[]= $newPostCategory;

    }

    return $newAllPostCategory;
}

function loadPostCategoryByName(string $name, PDO $db) : PostCategory
{
    $query = $db->prepare('SELECT * FROM post_categories WHERE name = :name');
    $parameters = [
    'name' => $name
    ];
    $query->execute($parameters);
    $postCategory = $query->fetch(PDO::FETCH_ASSOC);

    if($postCategory === false) {
        return null;
    }
    else
    {
        $newPostCategory = new PostCategory($postCategory['name'], $postCategory['description']);
        $newPostCategory->setId($postCategory['id']);

        return $newPostCategory;
    }
}

function savePostCategory(PostCategory $postCategory, PDO $db) : PostCategory
{
    $query = $db->prepare('INSERT INTO post_categories (`id`, `name`, `description`) VALUES(NULL, :name, :description)');

    $parameters = [
    'name' => $postCategory->getName(),
    'description' => $postCategory->getDescription(),
    ];

    $query->execute($parameters);

    return loadPostCategoryByName($postCategory->getName(), $db);
}

// Functions Post

function loadAllPosts(PDO $db) : array
{
    $query = $db->prepare('SELECT * FROM posts');
    $query->execute();
    $allPosts = $query->fetchAll(PDO::FETCH_ASSOC);

    $newAllPosts = [];

    foreach($allPosts as $post)
    {
        $userToAddOnPost = loadUserById($post['author'], $db);
        $categoryToAddOnPost = loadPostCategory($post['category'], $db);
        $newPost = new Post($post["title"], $post["content"], $categoryToAddOnPost, $userToAddOnPost);
        $newPost->setId($post['id']);
        $newAllPosts[] = $newPost;

    }

    return $newAllPosts;
}

function loadPostByTitle(string $title, PDO $db) : Post
{
    $query = $db->prepare('SELECT * FROM posts WHERE title = :title');
    $parameters = [
    'title' => $title
    ];
    $query->execute($parameters);
    $postTab = $query->fetch(PDO::FETCH_ASSOC);

    if($postTab === false) {
        return null;
    }
    else
    {
        $userToAddOnPost = loadUserById($post['author'], $db);
        $categoryToAddOnPost = loadPostCategory($post['category'], $db);
        $newPost = new Post($post["title"], $post["content"], $categoryToAddOnPost, $userToAddOnPost);
        $newPost->setId($postTab['id']);
        return $newPost;
    }
}

function savePost(Post $post, PDO $db) : Post
{
  //Looking for my User Id on this post
  $user = $post->getAuthor();
  $userId = $user->getId();

  //Same for the Id of the selected category
  $category = $post->getCategory();
  $categoryId = $category->getId();

  $query = $db->prepare('INSERT INTO posts (`id`, `title`, `author`, `content`, `category`) VALUES(NULL, :title, :author, :content, :category)');

    $parameters = [
    'title' => $post->getTitle(),
    'author' =>$userId,
    'content'=>$post->getContent(),
    'category'=>$categoryId,
    ];

    $query->execute($parameters);

    return loadPostByTitle($post->getTitle(), $db);
}








