var data = document.querySelector('#socket-data');
var wsAddress = data.getAttribute('data-ws-host');
var idUser = data.getAttribute('data-user-id');

var authData = {
    idUser: idUser,
    message:'connect'
};

var socket = new WebSocket(wsAddress);
window.socketService = socket;

socket.onopen = function(e) {
    socket.send(JSON.stringify(authData));
};

socket.onmessage = function (e) {
    var data = e.data;
    var obj = JSON.parse(data);
    obj.idUser = idUser;
    if (obj.message === 'connect') {
        socket.send(JSON.stringify(obj));
        return;
    }
};