<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<link rel="stylesheet" href="style.css" type="text/css">
<script src="https://unpkg.com/htmx.org@1.9.6" integrity="sha384-FhXw7b6AlE/jyjlZH5iHa/tTe9EpJ1Y55RjcgPbjeWMskSxZt1v9qkxLJWNJaGni" crossorigin="anonymous"></script>
</head>
<body>
    <?php include_once "navbar.php"; ?>
    <table class="table delete-row-example">
        <thead>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th></th>
            </tr>
        </thead>
    <tbody>
    <?php
    include './classes/Autoloader.php';
    $pdo = new PDOConnection("localhost", "test", "root", "");
    $list = new UserList();
    $list = $pdo->getAllUsers();
    foreach ($list as $user){
        $user = array($user->getFname(),$user->getLname(),$user->getEmail(),$user->getId());
    echo "<tr id='row$user[3]'>
            <td>$user[0]</td>
            <td>$user[1]</td>
            <td>$user[2]</td>
            <td><button class='btn btn-success''
                hx-get='./actions/edit.php?id=$user[3]'
                hx-target='#holder'
                hx-swap='innerHTML'
                >
                Edit
            </button>
            <button class='btn btn-danger''
                hx-get='./actions/delete.php?id=$user[3]'
                hx-target='closest tr'
                hx-swap='innerHTML'
                >
                Delete
            </button>
            </td>
        </tr>";
    }
    ?>
    </tbody>
</table>
<div id="draggable" class="no-select"><div id="holder"></div></div>
</body>
</html>