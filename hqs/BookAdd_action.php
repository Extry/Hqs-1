<?php

require 'config.php';
require 'dao/BookDAOMysql.php';

$bookDAO = new BookDAOMysql($pdo);
$book = new Book();
$name = filter_input(INPUT_POST, 'name');
$edition = filter_input(INPUT_POST, 'edition', FILTER_VALIDATE_INT);

if ($name && $edition) {

    $book->setName($name);
    $book->setEdition($edition);
    $bookDAO->create($book);
    header("Location: index.php");
    exit;
} else {
    header("Location: BookAdd.php");
    exit;
}
