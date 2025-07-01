function createRoom() {
  const username = document.getElementById("username").value.trim();
  if (!username) return alert("Enter your name");

  const roomId = Math.random().toString(36).substring(2, 8);
  window.location.href = `/room.html?room=${roomId}&name=${encodeURIComponent(username)}`;
}

function joinRoom() {
  const username = document.getElementById("username").value.trim();
  const roomId = document.getElementById("room-id").value.trim();
  if (!username || !roomId) return alert("Enter name and room ID");

  window.location.href = `/room.html?room=${roomId}&name=${encodeURIComponent(username)}`;
}
