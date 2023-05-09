var url = route('changeLang');
document.getElementById("changeLang").onchange = function() {
    window.location.href = url + "?lang=" + this.value;
};