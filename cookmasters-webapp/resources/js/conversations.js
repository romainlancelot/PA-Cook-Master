const nickname = document.getElementById("nickname");
const message = document.getElementById("message");
const submitButton = document.getElementById("submit-button");

submitButton.addEventListener("click", () => {
    console.log(nickname.value);
    console.log(message.value);
    axios.post('/chat', {
        nickname: nickname.value,
        message: message.value
    });
});

window.Echo.channel(`conversations`).listen('.chat-message', (e) => {
    console.log(e);
});

Pusher.logToConsole = true;
