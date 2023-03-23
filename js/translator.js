window.addEventListener('load', init);


// global variables
let button;
let saveButton;
let quickButtonsContainer;
let quickButtons = [];
let input;
let output;
let errorMessage;
let data;

// initialize data after HTML document has fully loaded
function init() {
    button = document.getElementById('button');
    saveButton = document.getElementById('save')
    input = document.getElementById('input');
    output = document.getElementById('translated');
    errorMessage = document.getElementById('error');
    quickButtonsContainer = document.getElementById('quick-buttons');

    button.addEventListener('click', buttonClickHandler);
    saveButton.addEventListener('click', saveButtonClickHandler)
    quickButtonsContainer.addEventListener('click', quickButtonsClickHandler)
    getJSONdata(`webservice/index.php?id=1`, configureData);

    let quickButtonsJSON = JSON.parse(localStorage.getItem('quickButtons'));
    if (quickButtonsJSON !== null) {
        for (const quickButton of quickButtonsJSON) {
            quickButtons.push(quickButton)
            createQuickButton(quickButton)
        }
    }
}

// whenever AJAX call is successful we can configure our data
function configureData(e) {
    data = e;
}

// whenever someone clicks on the "Go!" button gather the data from the inut field and create images
function buttonClickHandler() {
    let array = input.value.toLowerCase().split("");
    output.innerHTML = "";
    createImages(array);
}

function saveButtonClickHandler() {
    let inputValue = input.value;

    console.log(inputValue)
    addItemToLocalStorage(inputValue)
    createQuickButton(inputValue);
}

function quickButtonsClickHandler(e) {
    let element = e.target;
    if (element.classList.contains('favorite-button') || element.parentElement.classList.contains('favorite-button')) {
        if (element.innerHTML === 'X') {
            element.parentElement.remove()
            removeItemFromLocalStorage(quickButtons.indexOf(element.parentElement.children[0].innerHTML))
            return;
        }
        if (element.children.length === 0) {
            console.log(element.innerHTML)
            input.value = element.innerHTML
        } else {
            console.log(element.children[0].innerHTML)
            input.value = element.children[0].innerHTML
        }
    }

}

function createQuickButton(value) {

    let button = document.createElement('button');
    button.classList.add('favorite-button');
    quickButtonsContainer.appendChild(button)

    let text = document.createElement('p')
    text.innerHTML = value;
    button.appendChild(text)

    let deleteButton = document.createElement('div')
    deleteButton.classList.add('delete')
    deleteButton.innerHTML = 'X'
    button.appendChild(deleteButton)
}

// using the data from the JSON file we can determine which images corespond to which letter, using that we can loop trough
// every letter in the sentence and add an image on the other side.
function createImages(sentence) {
    for (const letter of sentence) {
        if (letter === " ") {
            let space = document.createElement('div')
            space.classList.add('space');
            output.appendChild(space);
        } else if (data.hasOwnProperty(letter)) {
            let img = document.createElement('img');
            img.src = `media/signs/${data[letter]}`;
            img.classList.add('sign');
            output.appendChild(img);
        } else {
            output.innerHTML = 'Input has unknown character, please remove it';
        }
    }
}

// adds the current prompt to the localstorage
function addItemToLocalStorage(item) {
    quickButtons.push(item);
    localStorage.setItem('quickButtons', JSON.stringify(quickButtons));
}

function removeItemFromLocalStorage(item) {
    if (Number.isInteger(item)) {
        quickButtons.splice(item, 1)
    } else {
        quickButtons.splice(quickButtons.indexOf(item), 1)
    }
    localStorage.setItem('quickButtons', JSON.stringify(quickButtons));
}

// gets the JSON data asynchronously
function getJSONdata(apiUrl, successHandler)
{
    fetch(apiUrl)
        .then((response) => {
            if (!response.ok) {
                throw new Error(response.statusText);
            }
            return response.json();
        })
        .then(successHandler)
        .catch(ajaxErrorHandler);
}

// whenever AJAX breaks send this error message
function ajaxErrorHandler(data)
{
    let error = document.createElement('div');
    error.classList.add('error');
    error.innerHTML = 'Er is helaas iets fout gegaan met de API, probeer het later opnieuw';
    errorMessage.before(error);
}