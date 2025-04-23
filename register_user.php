<?php
include 'db.php';

if ($_POST) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Check if email already exists
    $check = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");
    if (mysqli_num_rows($check) > 0) {
        echo "⚠️ This email is already registered. <a href='user_login.php'>Login here</a>";
    } else {
        $sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$pass')";
        if (mysqli_query($conn, $sql)) {
            echo "✅ Registered successfully! <a href='user_login.php'>Login now</a>";
        } else {
            echo "❌ Something went wrong: " . mysqli_error($conn);
        }
    }
}
?>

<form method="post">
    <h2>User Registration</h2>
    Name: <input type="text" name="name" required><br><br>
    Email: <input type="email" name="email" required><br><br>
    Password: <input type="password" name="password" required><br><br>
    <button type="submit">Register</button>
</form>
