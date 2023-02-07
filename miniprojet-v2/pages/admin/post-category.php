<?php
if($_SESSION['status'] === "admin")
{
    require 'logic/database.php';

    $template = "admin-post-category";
    $file = "post-category";

    $postsCategoryTab = loadAllPostCategory($db);


    require 'templates/admin/admin-layout.phtml';

}
else
{
    require 'homepage.php';
}

?>