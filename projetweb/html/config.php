<?php
define('server', 'localhost');
define('username', 'root');
define('password', '');
define('db', 'gestion_files');

$con = mysqli_connect(server, username, password, db);

if ($con === false) {
    die("error :could not connect" . mysqli_connect_error());
}