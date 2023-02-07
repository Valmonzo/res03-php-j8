<?php
if($_SESSION['status'] === "admin")
{
    require 'logic/database.php';

    $template = "admin-post";

    $postsTab = loadAllPosts($db);


    require 'templates/admin/admin-layout.phtml';

}
else
{
    require 'homepage.php';
}

?>