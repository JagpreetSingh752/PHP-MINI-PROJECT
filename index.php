<?php
session_start();
include 'db.php';
?>

<h2>Upcoming Events</h2>
<?php
$result = mysqli_query($conn, "SELECT * FROM events ORDER BY event_date ASC");
while ($row = mysqli_fetch_assoc($result)) {
    echo "<h3>{$row['title']}</h3>";
    echo "<p>Date: {$row['event_date']}</p>";
    echo "<p>{$row['description']}</p>";
    echo "<a href='register.php?event_id={$row['id']}'>Register</a><hr>";
}
?>

<!-- 👇 Add this section at the bottom of index.php -->
<hr>
<div style="margin-top:20px;">
    <?php if (isset($_SESSION['user_id'])): ?>
        <p>Welcome, <strong><?= $_SESSION['user_name']; ?></strong> | <a href='logout.php'>Logout</a></p>
    <?php else: ?>
        <a href="register_user.php">User Signup</a> |
        <a href="user_login.php">User Login</a> |
        <a href="login.php"><strong>Admin Login</strong></a>
    <?php endif; ?>
</div>
