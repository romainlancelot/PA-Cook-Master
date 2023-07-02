const message = document.getElementById("message");
const submitButton = document.getElementById("submit-button");
const from_id = document.getElementById("user_id");

const chatMessages = document.getElementById("chat-messages");

function sendMessage() {
    axios.post('/chat', {
        message: message.value,
    });
    message.value = "";
}

function sendMessageTo() {
    axios.post('/chat', {
        message: message.value,
        to_username: window.location.pathname.split("/")[2]
    });
    message.value = "";
}

function validateMessage() {
    if (window.location.pathname.split("/")[2] != undefined) {
        sendMessageTo();
    } else {
        sendMessage();
    }
}        

submitButton.addEventListener("click", (e) => {
    e.preventDefault();
    validateMessage();
});

message.addEventListener("keypress", (e) => {
    if (e.key === "Enter") {
        e.preventDefault();
        validateMessage();
    }
});

window.Echo.channel(`conversations`).listen('.chat-message', (e) => {
    if (window.location.pathname.split("/")[2] == undefined && e.to_id != null) { return; }
    if (window.location.pathname.split("/")[2] != undefined && e.to_id == null) { return; }
    if (e.to_id != null && e.to_id != from_id.value && e.from_id != from_id.value) { return; }

    let message = document.createElement("div");

    let img_cont_msg = document.createElement("div");
    img_cont_msg.className = "img_cont_msg";

    let img = document.createElement("img");
    img.src = "../" + e.image;
    img.className = "rounded-circle user_img_msg";

    let msg_cotainer = document.createElement("div");
    msg_cotainer.innerHTML = e.message;

    let msg_time = document.createElement("span");
    msg_time.innerHTML = e.created_at;

    img_cont_msg.appendChild(img);
    msg_cotainer.appendChild(msg_time);

    // check if the message is from the current user
    if (e.from_id == from_id.value) {
        message.className = "d-flex justify-content-end mb-4";
        msg_cotainer.className = "msg_cotainer_send";
        msg_time.className = "msg_time_send";

        message.appendChild(msg_cotainer);
        message.appendChild(img_cont_msg);
    } else {
        message.className = "d-flex justify-content-start mb-4";
        msg_cotainer.className = "msg_cotainer";
        msg_time.className = "msg_time";

        message.appendChild(img_cont_msg);
        message.appendChild(msg_cotainer);
    }

    chatMessages.appendChild(message);
    chatMessages.scrollTop = chatMessages.scrollHeight;
});


window.onload = function () {
    chatMessages.scrollTop = chatMessages.scrollHeight;
}
