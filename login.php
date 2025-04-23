<?php
session_start();
if ($_POST) {
    if ($_POST['username'] == 'admin' && $_POST['password'] == 'admin123') {
        $_SESSION['admin'] = true;
        header('Location: dashboard.php');
    } else {
        echo "Invalid login!";
    }
}
?>
<form method="post">
    <h2>Admin Login</h2>
    Username: <input type="text" name="username"><br><br>
    Password: <input type="password" name="password"><br><br>
    <button type="submit">Login</button>
</form>
