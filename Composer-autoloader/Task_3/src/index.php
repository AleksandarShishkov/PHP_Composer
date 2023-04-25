<?php

/*
1. Инсталирайте composer на вашата машина
2. Създайте нов празен проект
3. Използвайте автоматично генерирания autoloader за
да организирате кода си от предната задача.
Оформете го като пакет и го публикувайте на
packagist.org
*/


require_once 'PHP_library.php';

$obj = new PHP_library();

echo "\n";

$obj->set = 'setter';

print_r($obj['set']);

if(isset($obj)){
    echo 'set';
} else {
    echo 'not set';
}

echo "\n";

var_dump($_POST);

unset($obj->post);

if(!$obj->post) {
    echo 'unset';
} else {
    echo 'not unset';
}

echo "\n";

var_dump($obj["two"]);
var_dump(isset($obj["two"]));
unset($obj["two"]);
var_dump(isset($obj["two"]));
$obj["two"] = "A value";
var_dump($obj["two"]);
$obj[] = 'Append 1';
$obj[] = 'Append 2';
$obj[] = 'Append 3';
print_r($obj);