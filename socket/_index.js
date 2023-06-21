// let express = require("express");
// let app = express();
// let http = require("http").Server(app);
// let io = require("socket.io")(http, {
//     cors: {
//         origin: "http://localhost:8000",
//     },
// });

// let mysql = require("mysql");
// let sockets = {};
// let moment = require("moment");

// let con = mysql.createConnection({
//     host: "localhost",
//     user: "root",
//     password: "",
//     database: "apotek",
// });

// con.connect(function(err) {
//     if(err) {
//         throw(err);
//     }
//     console.log("Database Connecteed");
// });

// io.on('connection', function(socket) {
//     if(!sockets[socket.handshake.query.user_id]) {
//         sockets[socket.handshake.query.user_id].push(socket);
//     }

//     socket.broadcast.emit('user_connected', socket.handshake.query.user_id);

//     socket.on('disconnect', function(err) {
//         socket.broadcast.emit('user_disconnected', socket.handshake.query.user_id);
//         for (let index in sockets[socket.handshake.query.user_id]) {
//             if(socket.id == sockets[socket.handshake.query.user_id][index].id) {
//                 sockets[socket.handshake.query.user_id].splice(index, 1);
//             }
//         }
//     });
// });

// http.listen(3000)
