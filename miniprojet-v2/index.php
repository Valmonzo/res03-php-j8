<?php
session_start();

require 'logic/router.php';
/*require 'pages/login.php';
require 'pages/register.php';*/

if(isset($_GET['route'])) {
    $route = $_GET['route'];

    checkRoute($route);
}

else {
    checkRoute("");
}

var_dump($_SESSION["status"]);

?>



<?php

/*Test de la class User :
$user = new User('John', 'Doe', 'johndoe@example.com', 'secret');

// Test if an instance of User can be created
if ($user instanceof User) {
    echo "Success: An instance of User was created." . PHP_EOL;
} else {
    echo "Error: Failed to create an instance of User." . PHP_EOL;
}

// Test if the id is null
if ($user->getId() === null) {
    echo "Success: The user's id is null." . PHP_EOL;
} else {
    echo "Error: The user's id is not null." . PHP_EOL;
}

// Test if the first name can be retrieved
if ($user->getFirstName() === 'John') {
    echo "Success: The user's first name was retrieved correctly." . PHP_EOL;
} else {
    echo "Error: The user's first name was not retrieved correctly." . PHP_EOL;
}

// Test if the last name can be retrieved
if ($user->getLastName() === 'Doe') {
    echo "Success: The user's last name was retrieved correctly." . PHP_EOL;
} else {
    echo "Error: The user's last name was not retrieved correctly." . PHP_EOL;
}

// Test if the email can be retrieved
if ($user->getEmail() === 'johndoe@example.com') {
    echo "Success: The user's email was retrieved correctly." . PHP_EOL;
} else {
    echo "Error: The user's email was not retrieved correctly." . PHP_EOL;
}

// Test if the password can be retrieved
if ($user->getPassword() === 'secret') {
    echo "Success: The user's password was retrieved correctly." . PHP_EOL;
} else {
    echo "Error: The user's password was not retrieved correctly." . PHP_EOL;
}

// Test if the id can be set
$user->setId(1);
if ($user->getId() === 1) {
    echo "Success: The user's id was set correctly." . PHP_EOL;
} else {
    echo "Error: The user's id was not set correctly." . PHP_EOL;
}

// Test if the first name can be set
$user->setFirstName('Jane');
if ($user->getFirstName() === 'Jane') {
    echo "Success: The user's first name was set correctly." . PHP_EOL;
} else {
    echo "Error: The user's first name was not set correctly." . PHP_EOL;
}

// Test if the last name can be set
$user->setLastName('Smith');
if ($user->getLastName() === 'Smith') {
    echo "Success: The user's last name was set correctly." . PHP_EOL;
} else {
    echo "Error: The user's last name was not set correctly." . PHP_EOL;
}

// Test if the email can be set
$user->setEmail('janesmith@example.com');
 */;

?>
