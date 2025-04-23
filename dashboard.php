<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}
?>
<h2>Admin Dashboard</h2>
<ul>
    <li><a href="add_event.php">Add Event</a></li>
    <li><a href="view_registrations.php">View Registrations</a></li>
</ul>
