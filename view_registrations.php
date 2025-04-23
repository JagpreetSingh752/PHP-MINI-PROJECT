<?php
include 'db.php';

echo "<h2>Registered Users</h2>";

$result = mysqli_query($conn, "
    SELECT r.name, r.email, e.title 
    FROM registrations r 
    JOIN events e ON r.event_id = e.id
");

if (mysqli_num_rows($result) > 0) {
    echo "<table border='1'>
            <tr><th>Name</th><th>Email</th><th>Event</th></tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>{$row['name']}</td>
                <td>{$row['email']}</td>
                <td>{$row['title']}</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "No registrations found.";
}
