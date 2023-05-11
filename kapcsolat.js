function nevKattintas() {
    if (document.getElementById("name").value === "") {
        document.getElementById("hibaN").innerHTML = "A név mező NEM lehet üres";
    }
    else {
        document.getElementById("hibaN").innerHTML = "";
    }
}

function emailKattintas() {
    if (document.getElementById("email").value === "") {
        document.getElementById("hibaE").innerHTML = "Az email mező NEM lehet üres";
    }
    else {
        document.getElementById("hibaE").innerHTML = "";
    }
}

function uzenetKattintas() {
    if (document.getElementById("message").value === "") {
        document.getElementById("hibaM").innerHTML = "A szövegdoboz NEM lehet üres";
    }
    else {
        document.getElementById("hibaM").innerHTML = "";
    }
}



function init() {
    document.getElementById("name").addEventListener("input", nevKattintas);
    document.getElementById("email").addEventListener("input", emailKattintas);
    document.getElementById("message").addEventListener("input", uzenetKattintas);

}


document.addEventListener("DOMContentLoaded", init);
