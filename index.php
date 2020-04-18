<?php
define('RATE', 28); # KONSTANTA
#define('IMPORT_YEAR', 2020); # KONSTANTA
$name = 'Ivan';
$surname = 'Petrov';
$age = 28;
$year = 2020;
$born = $year - $age;
$livedDays = ($year - $age) * 365;

#echo "My name is " . $name . " " .$surname . ($year - $age);
echo "My name is " . $surname . " " .$name . " " .  (($year - $age) * 365);
echo "<br />";
#echo "The year is: " . floor($year / 1000); округление в меньшую сторону
# округление в большую сторону Ctrl alt + стрелка вправа позврат по вкладкам
echo "The year is: " . ceil($year / 1000);
echo "<br />";
echo "My name is  $name $surname. I was $born";
echo "<br />";
echo "My name is  $name $surname";
echo "<br />";
echo "My age is $age ";
echo "<br />";
echo "I am living  $livedDays days";
echo "<br />";
echo "The year is: " . ceil($year / 1000);
echo "<br />";
$amountHryvna = 100;
$amountUsd = 100;
#$rate = 28;
$exchangeHtoU = round($amountHryvna/RATE,2);
$exchangeUtoH = round($amountUsd*RATE,2);
echo "100 hrn today costs $exchangeHtoU dollars";
echo "<br />";
echo "100 $ today costs $exchangeUtoH uah";
echo "<br />";

//$arr = [];
//$arr = $name;
//$arr[] = 'Petrov';
//var_dump($arr);
//$assoc = [];
//$assoc['name'] = $name;
//var_dump($assoc);
$user = [
    'name'=> 'Nastya',
    'surname' => 'Prokofieva',
    'year'=>'1989',
    'livedDays' => '(($year - $age) * 365)',
    ];
echo "My name is {$user['name']} {$user['surname']} was born in {$user['year']}";
echo "<br />";
echo "I lived  {$user['livedDays']} days";

