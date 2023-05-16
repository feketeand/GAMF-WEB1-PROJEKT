function init() {
    let szoveg = "Bezárja az ablakot?";
    if (confirm(szoveg) == true) {
        close();
    }

}


document.addEventListener("DOMContentLoaded", init);