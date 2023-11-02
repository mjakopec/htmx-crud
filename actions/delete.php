<?php
/*This is script for deleting record, on error gives notification about unsucsesfull */
include '../classes/Autoloader.php';
$pdo = new PDOConnection("localhost", "test", "root", "");

$existingUser = $pdo->selectUser($_GET['id']);
$action = $pdo->deleteUser($existingUser);

if ($action){
    echo "";
}
else {echo "<tr><td colspan=4>Something got wrong. You have to reload page</td>!";}