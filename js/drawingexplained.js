window.addEventListener('load', init);


let title;
let chooseColor;
let clearCanvas;
let saveCanvas;
let modal;
let modalClose;


function init() {
    title = document.getElementById("title");
    chooseColor = document.getElementById("chooseColor");
    clearCanvas = document.getElementById("clearCanvas");
    saveCanvas = document.getElementById("saveCanvas");

    getJSONdata(`webservice/index.php?webservice=drawing`, FillHTML)

}


function FillHTML(e)
{

    data = e;
    console.log(data);

    // title
    let h1 = document.createElement("h1");
    h1.innerHTML = data.drawingTitle;
    title.appendChild(h1);

    // kleuren kiezen
    let chooseText = document.createElement("p");
    chooseText.innerHTML = data.chooseColor;
    chooseColor.appendChild(generalText);

    // clear knop
    let clearText = document.createElement("p");
    clearText.innerHTML = data.clearCanvas;
    clearCanvas.appendChild(popularText);


    // save knop
    let saveText = document.createElement("p");
    saveText.innerHTML = data.saveCanvas;
    saveCanvas.appendChild(communicationText);

    // favoriete
    let favText = document.createElement("p");
    favText.innerHTML = data.favCanvas;
    saveCanvas.appendChild(communicationText);

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
    console.log(data);
    console.log("it's broke");
}
