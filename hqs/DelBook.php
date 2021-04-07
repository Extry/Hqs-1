<?php

require 'config.php';
require 'dao/BookDAOMysql.php';

$bookDAO = new BookDAOMysql($pdo);
$id = filter_input(INPUT_GET, "id");

if ($id) {
    $bookDAO->delete($id);
    header("Location: index.php");
    exit;
}
