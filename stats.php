<?php
error_reporting(E_ALL);
ini_set('display_errors',true);

require './functions.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<style>
    .avatar{
        width: auto ;
        height: auto;
        max-height:50px;
        background-size: cover;
        background-position: center;
    }
    .title{
        text-align: center;
        font-size: 200%;
        color: blue;
    }
    .tableTitle{
        text-align: left;
    }
</style>
<body>
<br/>
<h1 class="title">Статистика</h1>
<div class="container">
    <ul>
        <li>1) Самый старый пользователь: <?=$oldestUser['name']. " " . $oldestUser['surname']." ". $oldestUser['age']?></li>
        <li>2) Самые старые пользователи: <?php foreach ($maxAgeAllId as $oldUsers){ echo $users[$oldUsers]['name']. "," ;}?></li>
        <li>3) Общеее кол-во юзеров: <?=count($users)?></li>
        <li>4) Питомцы юзера <?=$users[$userMerkelId]['surname']?> :
            <ul>
                <li><?=implode("<br>"."<li>",$merkelAnimals)?></li>
            </ul>
        </li>
    </ul>
    <caption class="tableTitle">5)</caption>
    <table class="table table-sm">
        <thead>
        <tr >
            <th><a href="?sort=id&order=asc"><?=!empty($_GET['order']) && $_GET['order'] == 'desc' ? 'asc': 'desc'?>#</a></th>
            <th><a href="?sort=name">Name</a></th>
            <th><a href="?sort=surname">Surname</a></th>
            <th><a href="?sort=age">Age</a></th>
            <th><a href="?sort=gender">Gender</a></th>
            <th><a href="?sort=avatar">Avatar</a></th>
        </tr>
        </thead>
        <tbody>

        <?php foreach ($users as $key => $user): ?>
        <?php $id = !empty($_GET['sort']) && $_GET['sort']== 'id' && $_GET['order'] == 'desc' ? count($users) - $key: $key +1; ?>
        <tr style="background-color: <?=($key%2 === 0) ? '#aaa':'#fff' ?>">
            <td><?=$id?></td>
            <td><?=$user['name']?></td>
            <td><?=$user['surname']?></td>
            <td><?=$user['age']?></td>
            <td><?=$user['gender']?></td>
            <td ><img  class="avatar" src="<?=$user['avatar']?>"></td>
        </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <form method="get">
    <select name="filter">
        <option value="man">Только мужчины</option>
        <option value="woman">Только женщины</option>
        <option value="covid">60</option>
        <?php foreach ($animalsFilter as $animal):?>
        <option value="<?$animal?>"><?$animal?></option>
        <?php endforeach; ?>
    </select>
        <button type="submit" class="btn btn-primary">Отправить</button>
    </form>
    <br>
    <a href="user2.php">users2</a>
</div>
</body>
</html>

<!--//Если зарегистрированный пользователь такого же возраста как и самый старый, то выводим имена обоих.-->
<!--//Там где таблица с пользователем Jack и randomUser - Выводим в колонках их аватары на основе данных из массива $users-->
<!--//Находим пользователя по фамилии Merkel и выводим в виде подсписка всех её питомцев в алфавитном порядке-->