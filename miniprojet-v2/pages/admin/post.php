<?php
if($_SESSION['status'] === "admin")
{
    require 'logic/database.php';

    $template = "admin-post";
    $file = "post";

    $postsTab = loadAllPosts($db);
    $postsCategoryTab = loadAllPostCategory($db);


    require 'templates/admin/admin-layout.phtml';

}
else
{
    require 'homepage.php';
}

?>