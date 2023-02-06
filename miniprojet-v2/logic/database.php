
<?php

require 'models/User.php';

$db = new PDO(
    'mysql:host=db.3wa.io;port=3306;dbname=valmontpehautpietri_phpj7',
    'valmontpehautpietri',
    'd39fded3cc68bed8c1489931a2f4de29'
);

$db->exec("SET NAMES 'utf8';");


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