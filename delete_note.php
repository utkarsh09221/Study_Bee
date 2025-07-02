<?php
require_once "config.php";

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['note_id'])) {
    $id = intval($_POST['note_id']);
    
    $sql = "DELETE FROM notes WHERE id = $id";
    if ($conn->query($sql) === TRUE) {
        header("Location: notes.php");
        exit;
    } else {
        echo "Error deleting note: " . $conn->error;
    }
}
?>
