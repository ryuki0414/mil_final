<?php

session_start();
//sesshonnidを作ります。あれば参照します。

$name = $_SESSION["name"];
$age = $_SESSION["age"];

echo $name;
echo $age;

