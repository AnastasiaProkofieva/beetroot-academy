<?php
define('NEW_LINE','<br>');
define('SURNAME_MERKEL', 'Merkel');
define('JACK_NAME', 'Jack');
$users = [
    [
        'name' => 'Bob',
        'surname' => 'Martin',
        'age' => 75,
        'gender' => 'man',
        'avatar' => 'https://i.ytimg.com/vi/sDnPs_V8M-c/hqdefault.jpg',
        'animals' => ['dog']
    ],
    [
        'name' => 'Alice',
        'surname' => 'Merton',
        'age' => 25,
        'gender' => 'woman',
        'avatar' => 'https://i.scdn.co/image/d44a5d71596b03b5dc6f5bbcc789458700038951',
        'animals' => ['dog', 'cat']
    ],
    [
        'name' => 'Jack',
        'surname' => 'Sparrow',
        'age' => 45,
        'gender' => 'man',
        'avatar' => 'https://pbs.twimg.com/profile_images/427547618600710144/wCeLVpBa_400x400.jpeg',
        'animals' => []
    ],
    [
        'name' => 'Angela',
        'surname' => 'Merkel',
        'age' => 65,
        'gender' => 'woman',
        'avatar' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/b/b6/Besuch_Bundeskanzlerin_Angela_Merkel_im_Rathaus_K%C3%B6ln-09916.jpg/330px-Besuch_Bundeskanzlerin_Angela_Merkel_im_Rathaus_K%C3%B6ln-09916.jpg',
        'animals' => ['dog', 'parrot', 'horse']
    ]
];
if (!empty($_POST)){
    $users[] = $_POST;
    }
$ages = array_column($users,'age');
var_dump($ages);
$maxAge = max($ages);
$maxAgeId = array_search($maxAge,$ages);
echo "<br>";
var_dump($maxAgeId);
$oldestUser = $users[$maxAgeId];
$userName = array_column($users, 'name');
var_dump($userName);
$userJackId = array_search (JACK_NAME, $userName);
print_r($users[$userJackId]) ;
echo "<br>";
$randomUserId = rand(0, count($users) -1);
$randomUser = $users[$randomUserId];
echo NEW_LINE;
$userSurname = array_column($users, 'surname');
$userMerkelId = array_search (SURNAME_MERKEL, $userSurname);
$merkelAnimals = $users[$userMerkelId]['animals'];
asort($merkelAnimals);
print_r($merkelAnimals);
echo NEW_LINE;
$maxAgeAllId = array_keys($ages,$maxAge);
//$oldUsers = array();
 foreach ($maxAgeAllId as $oldUsers)
{ echo $users[$oldUsers]['name']. ",". " " ;
}
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
        <tr class="table-active">
            <th>ID</th>
            <th>Name</th>
            <th>Surname</th>
            <th>Age</th>
            <th>Gender</th>
            <th>Avatar</th>
        </tr>
        </thead>
        <tbody>
        <tr class="table-primary">
            <td><?=$userJackId?></td>
            <td><?=$users[$userJackId]['name']?></td>
            <td><?=$users[$userJackId]['surname']?></td>
            <td><?=$users[$userJackId]['age']?></td>
            <td><?=$users[$userJackId]['gender']?></td>
            <td><img class="avatar"  src="<?=$users[$userJackId]['avatar']?>"></td>
        </tr>
        <tr class="table-danger">
            <td><?=$randomUserId?></td>
            <td><?=$users[$randomUserId]['name']?></td>
            <td><?=$users[$randomUserId]['surname']?></td>
            <td><?=$users[$randomUserId]['age']?></td>
            <td><?=$users[$randomUserId]['gender']?></td>
            <td ><img  class="avatar" src="<?=$users[$randomUserId]['avatar']?>"></td>
        </tr>
        </tbody>
    </table>
    <br>
    <a href="user2.php">users2</a>
</div>
</body>
</html>

<!--//Если зарегистрированный пользователь такого же возраста как и самый старый, то выводим имена обоих.-->
<!--//Там где таблица с пользователем Jack и randomUser - Выводим в колонках их аватары на основе данных из массива $users-->
<!--//Находим пользователя по фамилии Merkel и выводим в виде подсписка всех её питомцев в алфавитном порядке-->
