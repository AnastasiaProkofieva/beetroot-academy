<?php
// $i++ =$ i = $i +1
//$i+=2
//for ($i=0; $i<10; $i++){
//    echo "$i" . PHP_EOL;
//};
 //перенос строки в консоли or \n-linux. в консоли набор /var/www/html further php and file name
// alphabet =

//die ((string) ord('z') );
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
//for ($i=ord('a'); $i<=ord('z'); $i++){
//    $newLine = $i -97 +1;
//   echo chr($i);
//    if (($i-1) % 5===0) {
//        echo PHP_EOL;
//    }
//};
for ($i= 0;$i <count($users); ++$i){
    echo $users[$i]['name']. "index: $i". PHP_EOL;
}
for ($i=ord('z'); $i<=ord('a'); $i--) {
    echo chr($i) . PHP_EOL;
    if (chr($i) ==='a'){
        break;
    }

}
