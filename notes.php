<h2>Take a Note</h2>

<form method="POST" action="save_note.php">
    <textarea name="note_content" rows="5" cols="50" placeholder="Write your note here..." required></textarea><br>
    <button type="submit">Save Note</button>
</form>

<hr>

<h3>Your Notes</h3>
<?php
// Display notes from DB
require_once "config.php";
$result = $conn->query("SELECT * FROM notes ORDER BY created_at DESC");

while ($row = $result->fetch_assoc()) {
    echo "<div style='border:1px solid #ccc; padding:10px; margin:10px 0;'>
            <p>{$row['content']}</p>
            <form method='POST' action='delete_note.php' style='display:inline;'>
                <input type='hidden' name='note_id' value='{$row['id']}'>
                <button type='submit'>Delete</button>
            </form>
          </div>";
}
?>
