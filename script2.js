window.onload = code;

function code() {
    if (!localStorage.getItem('style') == null) {
        change = localStorage.setItem('style', 'ho')
    } 
    change = localStorage.getItem('style');

    if (change === 'jap') {
        document.getElementById("font").style.fontFamily = "Yuji Mai, serif"
        document.getElementById("font").style.color = "lightgreen"
        document.getElementById("background1").src="../img/background1jap.jpg"
        document.getElementById("background2").src="../img/background2jap.jpg"
    }

    if (change === 'val') {
        document.getElementById("font").style.fontFamily = "Love Lady - Personal Use, sans-serif"
        document.getElementById("font").style.color = "pink"
        document.getElementById("background1").src="../img/background1val.jpg"
        document.getElementById("background2").src="../img/background1val.jpg"
    }

    if (change === "ho") {
        document.getElementById("font").style.fontFamily = "Melted Monster, sans-serif"
        document.getElementById("font").style.color = "#882d2d"
        document.getElementById("background1").src="../img/background1ho.jpg"
        document.getElementById("background2").src="../img/background2ho.jpg"
    }

    if (change === "noel") {
        document.getElementById("font").style.fontFamily = "Mountains of Christmas"
        document.getElementById("font").style.color = "white"
        document.getElementById("background1").src="../img/background1noel.jpg"
        document.getElementById("background2").src="../img/background2noel.jpg"
    }
}