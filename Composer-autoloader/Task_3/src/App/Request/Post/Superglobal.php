<?php

/*
1. Инсталирайте composer на вашата машина
2. Създайте нов празен проект
3. Използвайте автоматично генерирания autoloader за
да организирате кода си от предната задача.
Оформете го като пакет и го публикувайте на
packagist.org
*/

namespace src\App\Request\Superglobal\Post;

class Superglobal {
    public static $global = '_POST';
}