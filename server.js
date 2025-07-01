const express = require('express');
const http = require('http');
const { Server } = require('socket.io');

const app = express();
const server = http.createServer(app);
const io = new Server(server);

app.use(express.static('public'));

io.on('connection', (socket) => {
  console.log("New connection");

  socket.on('join-room', ({ roomId, username }) => {
    socket.join(roomId);
    socket.to(roomId).emit('chat-message', { username: 'System', message: `${username} joined the chat` });
    console.log(`${username} joined room ${roomId}`);
  });

  socket.on('chat-message', ({ roomId, username, message }) => {
    socket.to(roomId).emit('chat-message', { username, message });
  });

  socket.on('disconnect', () => {
    console.log("User disconnected");
  });
});

const PORT = 3000;
server.listen(PORT, () => {
  console.log(`Server running at http://localhost:${PORT}`);
});
