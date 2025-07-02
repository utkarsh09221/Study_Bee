<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>StudyBee | Notes</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gradient-to-br from-blue-50 via-white to-blue-100 min-h-screen font-sans">

  <div class="max-w-3xl mx-auto mt-16 p-8 bg-white shadow-2xl rounded-2xl border border-blue-200">
    
    <h1 class="text-3xl font-bold text-center text-blue-800 mb-6">📝 StudyBee Notes</h1>

    <!-- Note Taking Form -->
    <form method="POST" action="save_note.php" class="mb-10">
      <label for="note_content" class="block text-lg font-medium text-gray-700 mb-2">Write your note:</label>
      <textarea id="note_content" name="note_content" rows="4"
        class="w-full p-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 resize-none transition"
        placeholder="Type something important..." required></textarea>

      <button type="submit"
        class="mt-4 w-full py-3 bg-blue-600 text-white font-semibold rounded-lg shadow hover:bg-blue-700 transition duration-300">
        💾 Save Note
      </button>
    </form>

    <!-- Display Notes -->
    <div>
      <h2 class="text-2xl font-semibold text-gray-800 mb-4">📋 Your Notes</h2>
          </div>
  </div>

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
