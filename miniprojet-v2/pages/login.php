<?php
require 'logic/database.php';

if(isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['password']) && !empty($_POST['password']))
{

    $userToCheck = loadUser($_POST['email'], $db);
    $passToCheck = $userToCheck->getPassword();

    $checkPass = password_verify($_POST['password'], $passToCheck);

    if($checkPass === true)
    {
        $_SESSION['status'] = "admin";
    }

    else
    {
        $error = "les informations de connexion sont incorrectes !";
    }

}
else
{
    $error = "Les informations de connexion sont incorrectes ! ";
}

$template = "login";

require 'templates/layout.phtml';

?>

