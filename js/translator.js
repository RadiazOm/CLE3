window.addEventListener('load', init);


// global variables
let button;
let input;
let output;
let errorMessage;
let data;

// initialize data after HTML document has fully loaded
function init() {
    button = document.getElementById('button');
    input = document.getElementById('input');
    output = document.getElementById('translated');
    errorMessage = document.getElementById('error');

    button.addEventListener('click', formClickHandler);
    getJSONdata(`webservice/index.php?id=1`, configureData);
}

// whenever AJAX call is successful we can configure our data
function configureData(e) {
    data = e;
    let lastPrompt = localStorage.getItem('lastPrompt');
    if (lastPrompt !== null) {
        createImages(lastPrompt);
        input.innerHTML = lastPrompt;
    }
}

// whenever someone clicks on the "Go!" button gather the data from the inut field and create images
function formClickHandler(e) {
    let array = input.value.toLowerCase().split("");
    output.innerHTML = "";
    addItemToLocalStorage(input.value);
    createImages(array);
}

// using the data from the JSON file we can determine which images corespond to which letter, using that we can loop trough
// every lettter in the sentence and add an image on the other side.
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
    localStorage.setItem('lastPrompt', item);
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