const fs = require('fs');
const https = require('https');
const { Server } = require('socket.io');

const server = https.createServer({
    key: fs.readFileSync('/etc/letsencrypt/live/recstep.com/privkey.pem'),
    cert: fs.readFileSync('/etc/letsencrypt/live/recstep.com/fullchain.pem'),

});

const io = new Server(server, {
    cors: {
        origin: 'https://recstep.com',  // Ensure this matches your frontend domain
        methods: ['GET', 'POST'],
    },
});

io.on('connection', (socket) => {
    console.log('A user connected:', socket.id);

    socket.on('message', (msg) => {
        console.log('Message received:', msg);
        io.emit('message', msg); // Broadcast the message
    });

    socket.on('disconnect', () => {
        console.log('User disconnected:', socket.id);
    });
});

server.listen(3001, () => {
    console.log('Secure Socket.IO server running on port 3001');
});
