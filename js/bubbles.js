window.addEventListener('load', init);

let form;
let inputField;
let bubble;
let bubbleContainer;

function init(){

form = document.getElementById('modal-form');
inputField = document.getElementById('input-field');
bubble = document.getElementById('bubble');
bubbleContainer = document.getElementById('bubble-container')


let bubbleItemString = localStorage.getItem('bubbleItems');
    if (bubbleItemString !== null) {
        let bubbleItems = JSON.parse(bubbleItemString)
        console.log(bubbleItems)
        for (let bubbleItem of bubbleItems){
            addBubbleItem(bubbleItem)
        }
    }

    form.addEventListener('submit', formSubmitHandler);

//    modal voor de create form
//    modal open
document.getElementById("bubble-create").addEventListener("click", function (){
    document.querySelector('.bg-modal').style.display = 'flex';

    //modal close
    document.querySelector('.close').addEventListener('click', function (){
        console.log('Close button clicked');
        document.querySelector('.bg-modal').style.display = 'none';
    });
});}

function formSubmitHandler(e) {
    e.preventDefault();
    let inputValue;
    console.log(inputField.value);
    if (inputField.value !== '') {
        inputValue = inputField.value;
        let bubbleItems = JSON.parse(localStorage.getItem('bubbleItems')) || [];
        bubbleItems.push(inputValue);
        localStorage.setItem('bubbleItems', JSON.stringify(bubbleItems));
        addBubbleItem(inputValue);
        inputField.value = "";
        console.log(inputValue);
    }
}

function addBubbleItem(e){
    let bubble = document.createElement('div');
    bubble.classList.add('bubble', 'bubble-bottom-left');
    let bubbleText = document.createElement('p')
    bubbleText.innerHTML = e;
    bubble.appendChild(bubbleText)
    bubbleContainer.appendChild(bubble);
    console.log('iets');
}
