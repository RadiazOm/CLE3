window.addEventListener('load', init)

let popup
let button

function init() {
    popup = document.getElementById('popup')
    button = document.getElementById('nav-button')
    button.addEventListener('click', elementClicked)
}

function elementClicked(e) {
    if (popup.classList.contains('visible')) {
        popup.classList.remove('visible')
    } else {
        popup.classList.add('visible')
    }
}
