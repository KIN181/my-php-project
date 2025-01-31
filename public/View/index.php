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

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>

<h1>UserList</h1>

<div class="container">


<?php
if (empty($users)) {
    echo "<p class='text-danger'> No users found.</p>";
} else {
    echo "<table class='table table-striped'>";
    echo "<thead><tr><th>ID</th><th>Name</th></tr></thead><tbody>";
    foreach ($users as $u) {
        echo "<tr><td>ID: " . $u['id'] . "</td><td>"  . htmlspecialchars($u['username']) . "</td></tr>";
    }
    echo "</tbody></table>";
}

?>

</div>

 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>   
</body>
</html>


