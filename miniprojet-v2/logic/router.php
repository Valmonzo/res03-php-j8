<?php

/*si $route vaut "connexion" : pages/login.php
si $route vaut "creer-un-compte" : pages/register.php
si $route vaut "mon-compte" : pages/account.php
dans tous les autres cas : pages/homepage.php*/

function checkRoute(string $route) : void
{
    if($route === "connexion") {
        require 'pages/login.php';
    }

    else if($route === "creer-un-compte") {
        require 'pages/register.php';
    }

    else if($route === "admin-posts") {
        require 'pages/admin/post.php';
    }

    else if($route === "admin-categories") {
        require 'pages/admin/post-category.php';
    }

    else {
        require 'pages/homepage.php';
    }
}


?>