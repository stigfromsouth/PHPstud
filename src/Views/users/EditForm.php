<?php
/** @var  \App\Models\User $user */
/** @var  string $title */
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $title ?></title>
</head>
<body>
<div class="container">
    <h1><?= $title ?></h1>
    <form action="/users/update" method="post">
            <input type="hidden" class="form-control" value="<?= $user->id; ?>" name="id">
        <div class="form-group">
            <label for="name">Имя</label>
            <input type="text" class="form-control" id="name" value="<?= $user->name; ?>" name="name">
        </div>
        <div class="form-group">
            <label for="email">Адрес электронной почты</label>
            <input type="text" class="form-control" id="email" value="<?= $user->email ?>" name="email">
            <small id="emailHelp" class="form-text text-muted">Не светите своим почтовым адресом перед негодниками.</small>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Сохранить</button>
            <a href="/users/index" class="btn btn-secondary">Отмена</a>
        </div>
    </form>
</div>
</body>
</html>

