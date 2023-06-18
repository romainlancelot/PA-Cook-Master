var path = window.location.pathname;
var page = path.split("/").pop();
var nav = document.querySelector("nav");

if (path === "/") {
    window.addEventListener("scroll", function () {
        if (window.pageYOffset > 100) {
            nav.classList.add("bg-idf", "shadow");
            nav.classList.remove("opacity");
        } else {
            nav.classList.remove("bg-idf", "shadow");
            nav.classList.add("opacity");
        }
    });
    window.addEventListener("resize", function () {
        if (window.innerWidth > 1400) {
            nav.classList.remove("bg-idf", "shadow");
        } else {
            nav.classList.add("bg-idf", "shadow");
        }
    });
} else {
    nav.classList.add("bg-idf", "shadow");
    nav.classList.remove("opacity");
}