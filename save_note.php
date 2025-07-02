<?php
require_once "config.php";

if ($_SERVER["REQUEST_METHOD"] === "POST" && !empty($_POST['note_content'])) {
    $note = $conn->real_escape_string($_POST['note_content']);
    
    $sql = "INSERT INTO notes (content) VALUES ('$note')";
    if ($conn->query($sql) === TRUE) {
        header("Location: notes.php"); // Redirect back
        exit;
    } else {
        echo "Error saving note: " . $conn->error;
    }
}
?>
