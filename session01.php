<?php

session_start();

$sid = session_id();

echo $sid;

$_SESSION["name"] = "morita";
$_SESSION["age"] = 26;//値を入れておく。

