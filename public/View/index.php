<?PHP
require_once "../controller/userController.php";

$user = new User();
$users = $user->getUsers();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User</title>
</head>
<body>

<h1>UserList</h1>

<div class="containr">


<?php
if (empty($users)) {
    echo "No users found.<br>";
} else {
    foreach ($users as $u) {
        echo "ID: " . $u['id'] . "- Name: " . $u['username'] . "<br>";
    }
}

?>

</div>

    
</body>
</html>


