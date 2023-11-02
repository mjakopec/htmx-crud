<?php
include '../classes/Autoloader.php';
$pdo = new PDOConnection("localhost", "test", "root", "");
$existingUser = new UserList();
$existingUser = $pdo->selectUser($_POST['id']);

$existingUser->setFname($_POST['fname']);
$existingUser->setLname($_POST['lname']);
$existingUser->setEmail($_POST['email']);
$pdo->updateUser($existingUser);

$list = $pdo->selectUser($_POST['id']);
$user = array($list->getFname(),$list->getLname(),$list->getEmail(),$list->getId());
    

echo "<tr id='row".$user[3]."'>
<td>".$user[0]."</td>
<td>".$user[1]."</td>
<td>".$user[2]."</td>
<td><button class='btn btn-success''
                hx-get='./actions/edit.php?id=".$user[3]."'
                hx-target='#holder'
                hx-swap='innerHTML'
                >
                Edit
            </button>
            <button class='btn btn-danger''
                hx-get='./actions/delete.php?id=".$user[3]."'
                hx-target='closest tr'
                hx-swap='innerHTML'
                >
                Delete
            </button>
            </td>
</tr>";