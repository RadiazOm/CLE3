window.addEventListener('load', init);

let form;
let input;
let output;
let errorMessage;
let data;

function init() {
    form = document.getElementById('input-field');
    input = document.getElementById('input');
    output = document.getElementById('translated');
    errorMessage = document.getElementById('error');

    form.addEventListener('submit', formClickHandler);
    getJSONdata(`webservice/index.php?id=1`, configureData);
}

function configureData(e) {
    data = e;
}

function formClickHandler(e) {
    e.preventDefault();
    let array = input.value.toLowerCase().split("");
    output.innerHTML = "";
    for (const letter of array) {
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

    // output.innerHTML = input.value;
}

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

function ajaxErrorHandler(data)
{
    let error = document.createElement('div');
    error.classList.add('error');
    error.innerHTML = 'Er is helaas iets fout gegaan met de API, probeer het later opnieuw';
    errorMessage.before(error);
}