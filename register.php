<?php
include 'db.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    echo "You must <a href='user_login.php'>login</a> to register for events.";
    exit;
}

$event_id = $_GET['event_id'];
$user_id = $_SESSION['user_id'];

// Get user info from database
$result = mysqli_query($conn, "SELECT name, email FROM users WHERE id = $user_id");
$user = mysqli_fetch_assoc($result);

if ($_POST) {
    $name = $user['name'];
    $email = $user['email'];

    // Prevent duplicate registration
    $check = mysqli_query($conn, "SELECT * FROM registrations WHERE event_id = $event_id AND email = '$email'");
    if (mysqli_num_rows($check) > 0) {
        echo "⚠️ You have already registered for this event!";
    } else {
        $query = "INSERT INTO registrations (event_id, name, email) VALUES ($event_id, '$name', '$email')";
        mysqli_query($conn, $query);
        echo "✅ Registered successfully!";
    }
}
?>

<form method="post">
    <h2>Register for Event</h2>
    Logged in as: <strong><?= $_SESSION['user_name']; ?></strong><br><br>
    <button type="submit">Confirm Registration</button>
</form>
