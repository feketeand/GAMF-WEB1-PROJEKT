function lakotelepNev() {
    if (document.getElementById("ltp_nev").value === "") {
        document.getElementById("hibaLtp").innerHTML = "A lakótelep neve mező NEM lehet üres";
    }
    else {
        document.getElementById("hibaLtp").innerHTML = "";
    }
}
/*
function lakotelepKerulet() {
    if (document.getElementById("ltp_kerulet").value === "") {
        document.getElementById("hibaLtk").innerHTML = "A lakótelep kerülete mező NEM lehet üres";
    }
    else {
        document.getElementById("hibaLtk").innerHTML = "";
    }
}

function leiras() {
    if (document.getElementById("leiras").value === "") {
        document.getElementById("hibaLeiras").innerHTML = "A lakótelep leírása mező NEM lehet üres";
    }
    else {
        document.getElementById("hibaLeiras").innerHTML = "";
    }

}

function meret() {
    if (document.getElementById("meret").value === "") {
        document.getElementById("hibaTm").innerHTML = "A lakástípus mérete mező NEM lehet üres";
    }
    else {
        document.getElementById("hibaTm").innerHTML = "";
    }

}

function szobaszamos() {
    if (document.getElementById("szobaszam").value === "") {
        document.getElementById("hibaTs").innerHTML = "A lakástípus szobák száma mező NEM lehet üres";
    }
    else {
        document.getElementById("hibaTs").innerHTML = "";
    }
}
*/

function init() {
    document.getElementById("ltp_nev").addEventListener("input", lakotelepNev);
    document.getElementById("ltp_kerulet").addEventListener("input", lakotelepKerulet);
    document.getElementById("leiras").addEventListener("input", leiras);
    document.getElementById("meret").addEventListener("input", meret);
    document.getElementById("szobaszam").addEventListener("input", szobaszamos);
}
document.addEventListener("DOMContentLoaded", init);