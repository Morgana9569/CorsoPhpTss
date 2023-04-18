<?php

use crud\UserCRUD;

require "./config.php";
require "./autoload.php";

require "./class/views/head-view.php";

$users = (new UserCRUD())->read();
//print_r($users);
?>

<table class="table">
    <!-- riga -->
    <tr>
        <!-- che contiene informazioni -->
        <th>#</th>
        <th>Nome</th>
        <th>Cognome</th>
        <th>Comune</th>
        <th>Comandi</th>
    </tr>
    <?php foreach ($users as $user) { ?>
        <tr>
            <td><?= $user->id_user ?></td>
            <td><?= $user->first_name ?></td>
            <td><?= $user->last_name ?></td>
            <td><?= $user->birth_city ?></td>
            <td>
                <a href="edit-user.php?id_user=<?=$user->id_user?>" class="btn btn-primary btn-sm"><span class="fa-solid fa-pen"></span> Modifica</a>
                <!--  -->
                <a href="delete-user.php?id_user=<?=$user->id_user?>" class="btn btn-danger btn-sm"><span class="fa-solid fa-poo"></span> Cancella</a>
            </td>
        </tr>
    <?php } ?>
</table>

<?php require "./class/views/footer-view.php" ?>