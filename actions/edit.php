<?php
/*This is form for update record*/
include '../classes/Autoloader.php';
if (isset($_GET['id'])) {
$pdo = new PDOConnection("localhost", "test", "root", "");
    $list = new UserList();
    $list = $pdo->selectUser($_GET['id']);
    $user = array($list->getFname(),$list->getLname(),$list->getEmail(),$list->getId());
    //var_dump($user[0]);
    echo "<form class='row g-3 centered'>
    <input class='form-control' type='hidden' name='id' value='$user[3]'><br/>
        <div class='col-md-6'>
        <label class='form-label'>First Name</label>
        <input class='form-control' type='text' name='fname' value='$user[0]'><br/>
        </div>
        <div class='col-md-6'>
        <label class='form-label'>Last Name</label>
        <input class='form-control' type='text' name='lname' value='$user[1]'><br/>
        </div>
        <div class='col-md-6'>
        <label class='form-label'>Email</label>
        <input class='form-control' type='text' name='email' value='$user[2]'><br/>
        </div>
        <div class='col-md-12'>
        <input class='btn btn-danger' type='button' hx-target='#holder' hx-swap='innerHTML' hx-get='./actions/blank.php' value='Cancel'>
        <input class='btn btn-primary' type='button' hx-post='./actions/post.php' hx-swap='outerHTML' hx-target='#row$user[3]' value='Save'>
        </div>
    </form>";
}
else{
    echo "<div></div>";
}