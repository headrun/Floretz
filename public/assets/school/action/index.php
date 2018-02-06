<?php
$class_name = $_REQUEST["c"];
$func_name = $_REQUEST["m"];
if ($class_name == "" || $func_name == "") exit;

$class = new $class_name();
$class->$func_name();
?>
