function lakotelepNev() {
    if (document.getElementById("ltp_nev").value === "") {
        document.getElementById("hibaLtp").innerHTML = "A lakótelep neve mező NEM lehet üres";
    }
    else {
        document.getElementById("hibaLtp").innerHTML = "";
    }
}

function init() {
    document.getElementById("ltp_nev").addEventListener("input", lakotelepNev);
}
document.addEventListener("DOMContentLoaded", init);