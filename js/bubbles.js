window.addEventListener('load', init);

let form;
let inputField;
let bubbleContainer;
let list
let bubbleItems
let currentBubble;

function getJsonData(apiUrl, succesHandler) {
    fetch(apiUrl)
        .then((response) => {
            if (!response.ok) {
                throw new Error(response.statusText);
            }
            return response.json();
            })
        .then(succesHandler)
        .catch(ajaxErrorHandler)
}

function bubblesDataConfig(data){
    console.log(data)
    for (const row of data){
        addBubbleItem(row.content, row.id);
    }
}

function ajaxErrorHandler() {

}

function init(){

    form = document.getElementById('modal-form');
    inputField = document.getElementById('input-field');
    bubbleContainer = document.getElementById('bubble-container');
    list = document.getElementById('delete');
    let closeButton = document.querySelector('.close');

document.getElementById('bubble-container').addEventListener('click',
    function () {
        document.querySelector('.bg-modal').style.display = 'flex'
    });

document.querySelector('.close').addEventListener('click',
    function () {
        document.querySelector('.bg-modal').style.display = 'none'
    })

    console.log(sessionStorage.getItem('id'));

getJsonData('webservice/index.php?webservice=bubbles', bubblesDataConfig);

    // save data in localstorage
    let bubbleItemString = localStorage.getItem('bubbleItems');
    if (bubbleItemString !== null) {
        bubbleItems = JSON.parse(bubbleItemString)
        console.log(bubbleItems)
        for (let bubbleItem of bubbleItems){
            addBubbleItem(bubbleItem)
        }
    }

    // form.addEventListener('submit', formSubmitHandler);
    closeButton.addEventListener('click', modalClose);
    bubbleContainer.addEventListener('click', modalOpen);
    list.addEventListener('click', bubbleClickHandler);
}

function modalOpen(e){
    let element = e.target;
    currentBubble = element.parentElement.dataset.name;
    document.getElementById('delete-id').value = element.parentElement.dataset.id;
    console.log(element.parentElement.dataset.name)
    console.log(element.parentElement.dataset.id)
    console.log(currentBubble);
    if (!element.classList.contains('bubble') && element.nodeName !== 'P' && element.nodeName !== 'A') {
        return;
    }
    if (element.id === 'bubble-create') {
        document.querySelector('.bg-modal').style.display = 'flex';
        document.querySelector('.modal-submit').style.display= 'flex';
        document.querySelector('.modal-delete').style.display= 'none';
    } else {
        currentBubble = element.dataset.name
        document.querySelector('.bg-modal').style.display = 'flex';
        document.querySelector('.modal-submit').style.display= 'none';
        document.querySelector('.modal-delete').style.display= 'flex';
    }
    if(element.nodeName === 'P'){
        currentBubble = element.parentElement.dataset.name;
    }

    console.log(currentBubble);
}

function modalClose() {
    document.querySelector('.bg-modal').style.display = 'none';
}
//
function formSubmitHandler(e) {
    e.preventDefault();
    console.log(document.querySelector('.modal-submit').style.display)
    if (document.querySelector('.modal-submit').style.display !== 'flex') {
        return;
    }

    let inputValue;
    console.log(inputField.value);
    if (inputField.value !== '') {
        inputValue = inputField.value;
        bubbleItems = JSON.parse(localStorage.getItem('bubbleItems')) || [];
        bubbleItems.push(inputValue);
        localStorage.setItem('bubbleItems', JSON.stringify(bubbleItems));
        addBubbleItem(inputValue);
        inputField.value = "";
        console.log(inputValue);
    }
}

    function addBubbleItem(content, id) {
        let bubble = document.createElement('div');
        bubble.classList.add('bubble', 'bubble-bottom-left');
        bubble.dataset.name = content
        bubble.dataset.id = id
        let bubbleText = document.createElement('p')
        bubbleText.innerHTML = content;
        bubble.appendChild(bubbleText)
        bubbleContainer.appendChild(bubble);
        console.log('iets');
        console.log(id)
    }

    function bubbleClickHandler(e) {
        for (const bubble of bubbleContainer.children) {

        }

        // remove from array
        console.log(currentBubble);
        let itemPosition = bubbleItems.indexOf(currentBubble);
        console.log(itemPosition)
        bubbleItems.splice(itemPosition, 1);
        // update local storage
        localStorage.setItem('bubbleItems', JSON.stringify(bubbleItems))
        // remove from html
        currentBubble.remove();
        console.log(bubbleItems)
    }
