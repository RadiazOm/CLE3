window.addEventListener('load', init)

let form;
let input;
let output;
let errorMessage

function init() {
    form = document.getElementById('input-field');
    input = document.getElementById('input');
    output = document.getElementById('translated')
    errorMessage = document.getElementById('error')

    form.addEventListener('submit', formClickHandler)
    getJSONdata(`webservice/index.php`, configureData)
}

function configureData(e) {
    console.log(e)
}

function formClickHandler(e) {
    e.preventDefault();
    output.innerHTML = input.value;
    console.log(data)
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