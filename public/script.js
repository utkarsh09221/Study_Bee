const socket = io();

const urlParams = new URLSearchParams(window.location.search);
const username = urlParams.get('name');
const roomId = urlParams.get('room');

const chatBox = document.getElementById('chat-box');
const form = document.getElementById('chat-form');
const input = document.getElementById('message-input');
const roomInfo = document.getElementById('room-info');

roomInfo.textContent = `Room: ${roomId}`;

socket.emit('join-room', { roomId, username });

form.addEventListener('submit', (e) => {
  e.preventDefault();
  const msg = input.value.trim();
  if (msg) {
    socket.emit('chat-message', { roomId, username, message: msg });
    addMessage(`You: ${msg}`);
    input.value = '';
  }
});

socket.on('chat-message', (data) => {
  addMessage(`${data.username}: ${data.message}`);
});

function addMessage(msg) {
  const p = document.createElement('p');
  p.textContent = msg;
  chatBox.appendChild(p);
  chatBox.scrollTop = chatBox.scrollHeight;
}
