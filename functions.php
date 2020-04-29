<?php
define('NEW_LINE','<br>');
define('SURNAME_MERKEL', 'Merkel');
define('JACK_NAME', 'Jack');
function helloWorld($username): string {
    return "<h2>Hello from $username</h2><br>";
}
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
function sortFields($userA, $userB)
{
    $order = $_GET['order'] ?? 'asc';
    $filterName = $_GET['sort'] ?? 'name';
   if ($order =='asc'){
       return $userA['name'] <=> $userB['name'] ;

   }
    return $userB['name'] <=> $userA['name'] ;

}
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
        case 'name':
            usort($users, 'sortFields');
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

