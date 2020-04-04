<?php
    session_start();
    require_once './libs/session.php';
    require_once './libs/forms.php';
    $menu = require_once 'config/menu.php';
    $page = $_GET['page'] ?? 'home';

?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Document</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Menu</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <?php foreach ($menu as $text => $link): ?>
            <li class="nav-item <?= $page == $link ? 'active' : '' ?>">
                <a class="nav-link" href="index.php?page=<?= $link?>"><?= $text?></a>
            </li>
            <?php endforeach ?>
        </ul>
    <?php  if(issetSession('user')) { ?>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <p class="nav-link"><?= "Welcome " . $_SESSION['user']?></p>
            </li>
        </ul>
        <button class="btn btn-outline" onclick=" <? unset($_SESSION['user']);?>" >Out</button>

    <? }else {?>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="index.php?page=signUp">SignUp</a>
            </li> <li class="nav-item">
                <a class="nav-link" href="index.php?page=signIn">SignIn</a>
            </li>
        </ul>
    <?}?>

    </div>
</nav>

    <div class="container">
        <?php

        if(file_exists("pages/{$page}.php")) {
            require_once "pages/{$page}.php";
        }
        else { echo 'Not found';}
        ?>

    </div>
    <?php clearMessage() ?>


<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>