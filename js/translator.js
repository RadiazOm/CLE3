window.addEventListener('load', init);


// global variables
let button;
let saveButton;
let gifButton;
let speedSlider
let gif = false;
let timeOutId;
let currentImage = 0;
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
    gifButton = document.getElementById('gif');
    speedSlider = document.getElementById('speed');

    button.addEventListener('click', buttonClickHandler);
    saveButton.addEventListener('click', saveButtonClickHandler);
    gifButton.addEventListener('click', gifButtonClickHandler);
    quickButtonsContainer.addEventListener('click', quickButtonsClickHandler);
    getJSONdata(`webservice/index.php?webservice=translator`, configureData);

    let quickButtonsJSON = JSON.parse(localStorage.getItem('quickButtons'));
    if (quickButtonsJSON !== null) {
        for (const quickButton of quickButtonsJSON) {
            quickButtons.push(quickButton);
            createQuickButton(quickButton);
        }
    }
}

// whenever AJAX call is successful we can configure our data
function configureData(e) {
    data = e;
}

// whenever someone clicks on the "Go!" button gather the data from the input field and create images
function buttonClickHandler() {
    let inputValue = input.value;
    output.innerHTML = "";
    currentImage = 0;
    createImages(inputValue);
}

// whenever the save button is clicked save the current input into its own quick button
function saveButtonClickHandler() {
    let inputValue = input.value;

    console.log(inputValue);
    addItemToLocalStorage(inputValue);
    createQuickButton(inputValue);
}

function gifButtonClickHandler() {
    let signs = output.children;
    if (signs === '') {
        return;
    }
    if (gif === false) {
        gif = true;
        for (const sign of signs) {
            sign.classList.add('invisible');
        }
        showSigns();
    } else {
        gif = false;
        for (const sign of signs) {
            sign.classList.remove('invisible');
        }
        clearTimeout(timeOutId);
        currentImage = 0;
    }
}

function showSigns() {
    output.children[currentImage].classList.remove('invisible');
    if (currentImage === 0) {
        output.children[output.children.length - 1].classList.add('invisible');
    } else {
        output.children[currentImage - 1].classList.add('invisible');
    }
    if (currentImage === output.children.length - 1) {
        currentImage = -1;
    }
    currentImage++;

    if (gif === true) {
        timeOutId = setTimeout(showSigns, 2100 - speedSlider.value);
    }
}



// whenever a quick button is clicked we do do some checks to bypass faulty html built by me and change the text and images of the translator
function quickButtonsClickHandler(e) {
    let element = e.target;
    if (element.classList.contains('favorite-button') || element.parentElement.classList.contains('favorite-button')) {
        if (element.innerHTML === 'X') {
            element.parentElement.remove();
            removeItemFromLocalStorage(quickButtons.indexOf(element.parentElement.children[0].innerHTML));
            return;
        }
        if (element.children.length === 0) {
            input.value = element.innerHTML;
            createImages(element.innerHTML);
        } else {
            input.value = element.children[0].innerHTML;
            createImages(element.children[0].innerHTML);
        }
    }

}

// creates button to be clicked upon which then translates the text within to sign language in an instant
function createQuickButton(value) {

    let button = document.createElement('button');
    button.classList.add('favorite-button');
    quickButtonsContainer.appendChild(button);

    let text = document.createElement('p');
    text.innerHTML = value;
    button.appendChild(text);

    let deleteButton = document.createElement('div');
    deleteButton.classList.add('delete');
    deleteButton.innerHTML = 'X';
    button.appendChild(deleteButton);
}

// using the data from the JSON file we can determine which images corespond to which letter, using that we can loop trough
// every letter in the sentence and add an image on the other side.
function createImages(sentence) {
    output.innerHTML = '';
    for (const letter of sentence.toLowerCase()) {
        if (letter === " ") {
            let space = document.createElement('div');
            space.classList.add('space');
            output.appendChild(space);
            if (gif === true) {
                space.classList.add('invisible')
            }
        } else if (data.hasOwnProperty(letter)) {
            let img = document.createElement('img');
            img.src = `media/signs/${data[letter]}`;
            img.classList.add('sign');
            output.appendChild(img);
            if (gif === true) {
                img.classList.add('invisible')
            }
        } else {
            output.innerHTML = 'Input has unknown character, please remove it';
        }
    }
}

// adds the quick button to the localstorage
function addItemToLocalStorage(item) {
    quickButtons.push(item);
    localStorage.setItem('quickButtons', JSON.stringify(quickButtons));
}

// removes the quick button from local storage
function removeItemFromLocalStorage(item) {
    if (Number.isInteger(item)) {
        quickButtons.splice(item, 1);
    } else {
        quickButtons.splice(quickButtons.indexOf(item), 1);
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
    output.appendChild(error);
}