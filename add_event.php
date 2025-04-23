<?php
include 'db.php';
if ($_POST) {
    $title = $_POST['title'];
    $desc = $_POST['desc'];
    $date = $_POST['date'];
    mysqli_query($conn, "INSERT INTO events (title, description, event_date) VALUES ('$title', '$desc', '$date')");
    echo "Event added!";
}
?>
<form method="post">
    <h2>Add New Event</h2>
    Title: <input type="text" name="title"><br><br>
    Description: <textarea name="desc"></textarea><br><br>
    Date: <input type="date" name="date"><br><br>
    <button type="submit">Add Event</button>
</form>
