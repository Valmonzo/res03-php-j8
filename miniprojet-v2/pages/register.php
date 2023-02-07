<?php
require 'logic/database.php';

if(isset($_POST['newEmail']) && !empty($_POST['newEmail'])
&& isset($_POST['newPassword']) && !empty($_POST['newPassword'])
&& isset($_POST['confirm-pwd']) && !empty($_POST['confirm-pwd'])
&& isset($_POST['newFirstName']) && !empty($_POST['newFirstName'])
&& isset($_POST['newLastName']) && !empty($_POST['newLastName']))
{
    if($_POST['newPassword'] === $_POST['confirm-pwd']) {
        if(loadUser($_POST['newEmail'], $db) === null) {
            $pass = password_hash($_POST['newPassword'], PASSWORD_DEFAULT);
            $newUserToSave = new User($_POST['newFirstName'], $_POST['newLastName'], $_POST['newEmail'], $pass);
            saveUser($newUserToSave, $db);
        }
        else
        {
            echo "l'email est déjà utilisé !";
        }

    }
    else
    {
        $error = "Les mots de passe ne correspondent pas !";
    }
}
else if(isset($_POST['newEmail']) && empty($_POST['newEmail'])) {
    $error = "Veuillez rentrer un email";
}

else if(isset($_POST['newFirstName']) && empty($_POST['newFirstName'])) {
    $error = "Veuillez rentrer un prénom !";
}

else if(isset($_POST['newLastName']) && empty($_POST['newLastName'])) {
    $error = "Veuillez rentrer un nom !";
}
$template = "register";

require 'templates/layout.phtml';

?>