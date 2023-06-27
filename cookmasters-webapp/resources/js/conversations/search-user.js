const search = document.getElementById("searchUser");
const contacts = document.getElementById("contacts");

const originalContacts = contacts.innerHTML;

search.addEventListener("keyup", (e) => {
    if (e.target.value == "") {
        contacts.innerHTML = originalContacts;
        return;
    }
    axios.get(`/search/users/${e.target.value}`).then((response) => {
        contacts.innerHTML = "";
        response.data.forEach((user) => {
            if (document.getElementById("contacts_" + user.id) != null) { return; }

            let li = document.createElement("li");
            li.id = "contacts_" + user.id;
            li.onclick = function () {
                window.location.href = `/chat/${user.username}`;
            };

            let div = document.createElement("div");
            div.className = "d-flex bd-highlight";

            let img_cont = document.createElement("div");
            img_cont.className = "img_cont";

            let img = document.createElement("img");
            img.src = "../" + user.image;
            img.className = "rounded-circle user_img";

            let user_info = document.createElement("div");
            user_info.className = "user_info";

            let span = document.createElement("span");
            span.innerHTML = user.firstname + " " + user.lastname;

            img_cont.appendChild(img);
            user_info.appendChild(span);
            div.appendChild(img_cont);
            div.appendChild(user_info);
            li.appendChild(div);

            contacts.appendChild(li);
        });
    });
});
