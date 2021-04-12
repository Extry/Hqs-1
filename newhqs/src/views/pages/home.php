
<strong><a href="<?=$base;?>/add">Adicionar Livro</a></strong> <br><br>
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
                <a href="<?=$base;?>/<?= $item->getId();?>/del" onclick="return confirm('Deseja excluir este livro?')">[ EXCLUIR ]</a>

            
            </td>
        </tr>
    <?php endforeach; ?>

</table>