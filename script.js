'use strict'; 

function themePage(theme){
    var letheme = theme;
    document.body.style.backgroundColor = letheme
}

function changeTheme() {
    var selectedTheme = document.getElementById("theme").value;
    themePage(selectedTheme);
}

function policeEcriture(PoliceEcriture){
    var police = PoliceEcriture
    document.body.style.backgroundColor = letheme
}

function changePoliceEcriture() {
    var selectedPoliceEcriture = document.getElementById("policeText").value;
    policeEcriture(selectedPoliceEcriture);
}

function text(text){
    var letext = text;
    document.body.style.backgroundColor = letext
}

function changeText() {
    var selectedText = document.getElementById("text").value;
    text(selectedText);
}

function image(image){
    var limage = image
    document.body.style.backgroundColor = limage
}

function changeImage() {
    var selectedImage = document.getElementById("image").value;
    image(selectedImage);
}




document.getElementById("change").addEventListener("click", changement);


function changement() {
    let change = document.getElementById("select").value
    localStorage.setItem('style', change);

    document.getElementById("changeOK").innerHTML = "Changements effectués";
}

