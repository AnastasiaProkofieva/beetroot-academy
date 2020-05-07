<?php
define('NEW_LINE', '<br>');
define('SURNAME_MERKEL', 'Merkel');
define('JACK_NAME', 'Jack');
define('SESSION_INTERVAL', 2 * 60);
error_reporting(E_ALL);
ini_set('display_errors', true);
var_dump($_POST);


function helloWorld($username): string
{
    return "<h2>Hello from $username</h2><br>";
}

$users = require "db.php";

if (!empty($_POST)) {
    $err = createUser();
    if (!empty($err)) {
        $errorString = '';
        foreach ($err as $key => $message) {
            $errorString .= "error[$key]=$message&";
        }
        header('Location: /user2.php?' . $errorString);
    }
}
$ages = array_column($users, 'age');
var_dump($ages);
$maxAge = max($ages);
$maxAgeId = array_search($maxAge, $ages);
echo "<br>";
var_dump($maxAgeId);
$oldestUser = $users[$maxAgeId];
$userName = array_column($users, 'name');
var_dump($userName);
$userJackId = array_search(JACK_NAME, $userName);
print_r($users[$userJackId]);
echo "<br>";
$randomUserId = rand(0, count($users) - 1);
$randomUser = $users[$randomUserId];
echo NEW_LINE;
$userSurname = array_column($users, 'surname');
$userMerkelId = array_search(SURNAME_MERKEL, $userSurname);
$merkelAnimals = $users[$userMerkelId]['animals'];
asort($merkelAnimals);
print_r($merkelAnimals);
echo NEW_LINE;
$maxAgeAllId = array_keys($ages, $maxAge);
$oldUsers = array();
//foreach ($maxAgeAllId as $oldUsers) {
//    echo $users[$oldUsers]['name'] . "," . " ";
//}
echo NEW_LINE;
function sortFieldsAnother($userA, $userB)
{
    $order = $_GET['order'] ?? 'asc';
    $filterName = $_GET['sort'] ?? 'name';
    if ($order == 'asc') {
        return $userA[$filterName] <=> $userB[$filterName];

    }
    return $userB[$filterName] <=> $userA[$filterName];

}

function createUser(array $data = [])
{
    opcache_invalidate('db.php');
    $users = require 'db.php';
    $user = empty($data) ? $_POST : $data;
    $emails = array_column($users, 'email');

    $error = [];
    if (empty($user['name'])) {
        $error['name'] = 'Имя не может пустым';
    }
    if (empty($user['surname'])) {
        $error['surname'] = 'Фамилия не может пустой';
    }
    if (empty($user['age']) || $user['age'] < 1) {
        $error['age'] = 'Возраст задан некорректно';
    }
    if (empty($user['email'])) {
        $error['email'] = 'Email не может пустой';
    }
//elseif (false !== array_search($user['email'], $emails)){
//        $error['email'] = 'Пользователь с таким email уже зарегистрирован';
//    }

    if (!empty($error)) {
        return $error;
    }
    $user ['animals'] = [];
    $user ['avatar'] = 'https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRiVQOI8aNHpbsyt-kt7BYmzp7tOh24AnYMB30kG3gV5lQuKYZ_&usqp=CAU';
    $users[] = $user;
    $content = "<?php" . PHP_EOL;
    $content = $content . "return " . var_export($users, 1);
    $content .= " ; ";
    file_put_contents('db.php', $content);

}

if (!empty($_GET['sort'])) {
    switch ($_GET['sort']) {
        case 'id':
            if (!empty($_GET['order']) && $_GET['order'] == 'desc') {
                krsort($users);
            } else {
                ksort($users);
            }
            $users = array_values($users);
            break;
        case 'name':
        case 'surname':
        case 'age':
            usort($users, 'sortFieldsAnother');
            break;
    }
}
$animals = [];
foreach ($users as $user) {
    $animals = array_merge($animals, $user['animals']);
}
$animalsFilter = array_unique($animals);
//print_r($animalsFilter);
if (!empty($_GET['filter'])) {
    switch ($_GET['filter']) {
        case 'man':
            foreach ($users as $key => $user) {
                if ($user['gender'] !== 'man') {
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
                if ($user['age'] < 60) {
                    unset($users[$key]);
                }
            }
            break;
        case 'dog':
        case 'cat':
        case 'parrot':
        case 'horse':
            foreach ($users as $key => $user) {
                $index = array_search($_GET['filter'], $user['animals']);
                if (false == $index) {
                    unset ($users[$key]);
                }
            }
            break;
    }
}

function initSession()
{
    session_start();
    $time = $_SESSION['created_at'] ?? 0;
    $currentTime = time() - $time;
    if ($currentTime > SESSION_INTERVAL) {
        logout();
    }
}

function logout()
{
    session_destroy();
    header('Location:/auth.php');

}