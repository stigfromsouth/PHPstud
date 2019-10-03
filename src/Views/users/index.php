<?php
/** @var \App\Models\User[] $list */
$title = 'Список пользователей';
?>
<!doctype html>
<html lang="ru">
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
    <table class="table">
        <?php foreach ($list as $user): // список пользователей ?>
            <tr>
                <td><?= $user->id; ?></td>
                <td><?= $user->name; ?></td>
                <td><?= $user->email; ?></td>
                <td>
                    <a href="/users/view?id=<?= $user->id; ?>">
                        Просмотр
                    </a>

                    <a href="/users/update?id=<?= $user->id; ?>">
                        Редактировать
                    </a>

                    <a href="/users/delete?id=<?= $user->id; ?>" onclick="return confirm('Вы уверены, что хотите удалить запись ?');">
                        Удалить
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <a href="/users/create">
        Создать пользователя
    </a>

</body>
</html>
