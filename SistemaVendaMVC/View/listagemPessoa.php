<?php
    $pessoas = $_REQUEST['pessoas'];
?>
<!DOCTYPE html>
<html>
    <head>
    
    </head>
    <body>
        <table>
            <tr>
                <th>Código</th>
                <th>Pessoa</th>
                <th>CPF</th>
            </tr>
            <?php foreach ($pessoas as $pessoa): ?>
            <tr>
                <td><?php echo $pessoa->getCodigo(); ?></td>
                <td><?php echo $pessoa->getNome(); ?></td>
                <td><?php echo $pessoa->getCpf(); ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
    </body>
</html>