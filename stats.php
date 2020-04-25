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
echo NEW_LINE;
 if (!empty($_GET['sort'])){
 switch  ($_GET['sort']){
     case 'id':
         if (!empty($_GET['order'])&& $_GET['order'] == 'desc'){
             krsort($users);
         }else{
             ksort($users);
         }
         $users = array_values($users);
         break;
 }
}
 $animals  = [];
 foreach ($users as $user) {
     $animals = array_merge($animals, $user['animals']);
   }
 $animalsFilter = array_unique($animals);
 //print_r($animalsFilter);
if (!empty($_GET['filter'])){
    switch($_GET['filter']){
        case 'man':
            foreach ($users as $key => $user){
                if ($user['gender']!== 'man'){
                    unset($users[$key]);
                }
            }
            break;
        case 'woman':
            foreach ($users as $key => $user) {
                if ($user['gender'] !== 'woman') {
                    unset($users[$key]);
                }
            }
            break;
        case 'covid':
            foreach ($users as $key => $user) {
            if ($user['age'] < 60 ) {
                unset($users[$key]);
            }
        }
            break;
        case 'dog':
        case 'cat':
        case 'parrot':
        case 'horse':
            foreach ($users as $key=> $user){
                $index = array_search($_GET['filter'], $user['animals']);
                if (false==$index){
                    unset ($users[$key]);
                }
            }
            break;
    }
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
        <?php $id = !empty($_GET['sort'] && $_GET['sort']== 'id' && $_GET['order'] == 'desc') ? count($users) - $key: $key +1; ?>
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