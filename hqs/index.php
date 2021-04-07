<?php

require 'config.php';
require_once 'dao/BookDAOMysql.php';
$bookDAO = new BookDAOMysql($pdo);
$list = $bookDAO->getAll();

?>

<strong><a href="BookAdd.php">Adicionar Livro</a></strong> <br><br>
<table border="1" width="50%">

    <tr>
        <th>Nome</th>
        <th>Edição</th>
    </tr>
    <?php foreach ($list as $item) : ?>
        <tr>
            <td><?= $item->getName(); ?></td>
            <td><?= $item->getEdition(); ?></td>
            <td>
                <a href="DelBook.php?id=<?= $item->getId(); ?>" onclick="return confirm('Deseja excluir este livro?')">[ EXCLUIR ]</a>
            </td>
        </tr>
    <?php endforeach; ?>

</table>