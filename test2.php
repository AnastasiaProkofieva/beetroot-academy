<?php
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
$ages=array_column($users, 'age');
$key=array_search(75,$ages);
var_dump($key);
if ($key!==false){
    echo "The Age found";
}else{
    echo "NOT FOUND";
}
//echo $key;
// мой код сейчас смотри что выводит, т.е не срабатывает условие, не мой файл, а конфигурационный? не знаю как в таком случае отладку делать, фигня какая то
// что переменная выведет? результат выражения т.е ключ. Запусти страницу я кажется поняла, там индекс 0 значит для языка это фолс и иф не отработает потому что
// переменная будет в ифе давать 0 а в ифе проверяться должно тру выражение? да?
// нет. array_search вернула найденный ключ (читай индекс).  для 75 это = 0.
// if (тут булевый тип){
//  сюда зайдет, если условие = true
//}
// у тебя как бы if(0). php делает автоматическое преобразование типа и у него 0 получился = false. т.е. условие получилось if(false). Тут true не будет никогда,
// значит в иф ты никогда не попадешь. я  так и написала что в ифе у нас только тру должно быть а не фолс
// нет. в ифе условие, просто зайдет он в него при true. т.е. тут не только тру может быть, а чтоб обработать остальные варианты и есть else. if else это неразрывная консрукц
//// я поняла.т е я никогда не проверю тру
/// потому что у меня проверка на фолс идет да?
/// можно позвонить?ну давай блин надо мыться мне идти опять убьют
$maxAgeAllId = array_keys($ages,$maxAge);
$oldUsers = $users[$maxAgeAllId]['name'];
//$maxAgeAllId = array_search($maxAge,$ages);
$oldUsers = array();
//$maxAgeAllId = [0,4];
foreach ($maxAgeAllId as $oldUsers) //каждый элемент массива $maxAgeAllId представить как $oldUsers
{ echo $oldUsers = $users[$oldUsers]['name']. ",". " " ;
}


///// arr = [3,5]
/// for(i=0,1,i++)
/// {1 шаг   i=0   arr[i] = 3}
/// {2 шаг   i=1   arr[i] = 5}
///
/// foreach(arr as x)
/// {1 шаг    x = 3}
/// {2 шаг    x = 5}

//$old = $users[$maxAgeALLId]['name'];
//implode(",",$old);
//$oldestUsers = $users[$maxAgeALLId];

//$old=implode(",",$oldestUsers['name']);
//print_r($old);


