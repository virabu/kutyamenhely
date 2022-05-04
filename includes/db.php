<?php ob_start(); ?>

<?php

$db['db_host'] = "localhost";
$db['db_user'] = "root";
$db['db_pass'] = "root";
$db['db_name'] = "cms";
$db['db_port'] = 3307;

foreach($db as $key => $value) {
  define(strtoupper($key), $value);
}

// $connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME, DB_PORT);
$connection = mysqli_connect($db['db_host'], $db['db_user'], $db['db_pass'], $db['db_name'], $db['db_port']);

$query = "SET NAMES utf8";
mysqli_query($connection, $query);
// if($connection) {
//   echo "We are connected";
// }

?>