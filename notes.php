<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

    <title>NOTES</title>
</head>
<body>
    <div class="max-w-2xl mx-auto p-6 bg-white shadow-lg rounded-lg mt-10">

    <h2 class="text-2xl font-bold mb-4 text-gray-800">📝 Take a Note</h2>

    <form method="POST" action="save_note.php" class="mb-6">
        <textarea name="note_content"
                  rows="5"
                  class="w-full p-4 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                  placeholder="Write your note here..."
                  required></textarea>

        <button type="submit"
                class="mt-4 px-6 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition">
            💾 Save Note
        </button>
    </form>

    <hr class="my-6 border-gray-300">

    <h3 class="text-xl font-semibold mb-4 text-gray-700">📋 Your Notes</h3>
</body>
</html>
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
