window.addEventListener('load', init)

let popup;
let navButton;

function init() {
    popup = document.getElementById('nav-popup')
    navButton = document.getElementById('nav-button')
    navButton.addEventListener('click', elementClicked)
}

function elementClicked(e) {
    if (popup.classList.contains('visible')) {
        popup.classList.remove('visible')
    } else {
        popup.classList.add('visible')
    }
}
