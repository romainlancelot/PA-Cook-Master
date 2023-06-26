const nickname = document.getElementById("nickname");
const message = document.getElementById("message");
const submitButton = document.getElementById("submit-button");

const chatMessages = document.getElementById("chat-messages");

submitButton.addEventListener("click", () => {
    console.log(nickname.value);
    console.log(message.value);
    axios.post('/chat', {
        nickname: nickname.value,
        message: message.value
    });
});

window.Echo.channel(`conversations`).listen('.chat-message', (e) => {
    let message = document.createElement("div");
    message.className = "d-flex justify-content-start mb-4";

    let img_cont_msg = document.createElement("div");
    img_cont_msg.className = "img_cont_msg";

    let img = document.createElement("img");
    img.src = "";
    img.className = "rounded-circle user_img_msg";

    let msg_cotainer = document.createElement("div");
    msg_cotainer.className = "msg_cotainer";
    msg_cotainer.innerHTML = e.message;

    let msg_time = document.createElement("span");
    msg_time.className = "msg_time";
    msg_time.innerHTML = e.nickname;

    img_cont_msg.appendChild(img);
    msg_cotainer.appendChild(msg_time);

    message.appendChild(img_cont_msg);
    message.appendChild(msg_cotainer);

    chatMessages.appendChild(message);
});

Pusher.logToConsole = true;
