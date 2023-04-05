window.addEventListener('load', init);


let title;
let chooseColor;
let clearCanvas;
let saveCanvas;
let modal;
let modalClose;


function init() {



    let iconClicker = document.getElementById("containerCanvas")
    iconClicker.addEventListener("click", iconClickHandler);


    let iconClose = document.getElementById('modal-close')
    iconClose.addEventListener("click",iconCloseHandler);


    title = document.getElementById("title");
    chooseColor = document.getElementById("chooseColor");
    clearCanvas = document.getElementById("clearCanvas");
    saveCanvas = document.getElementById("saveCanvas");

    getJSONdata(`webservice/index.php?webservice=info`, FillHTML)



}


function iconClickHandler(e) {

    console.log(e.target);
    let target = e.target;

    if (target.nodeName !== 'I'){
        return;
    }
    modal = document.getElementById("popup-canvas");

    modal.showModal()

    fillModal(e.target.id)
}

function iconCloseHandler()
{
    modalClose = document.getElementById('modal-close');
    modal.close()

}

function fillModal(id)
{
    if (id)
    {

    }
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
    let generalText = document.createElement("p");
    generalText.innerHTML = data.chooseColor;
    chooseColor.appendChild(generalText);

    // clear knop
    let popularText = document.createElement("p");
    popularText.innerHTML = data.clearCanvas;
    clearCanvas.appendChild(popularText);


    // save knop
    let communicationText = document.createElement("p");
    communicationText.innerHTML = data.saveCanvas;
    saveCanvas.appendChild(communicationText);

    // favoriete
    let communicationText = document.createElement("p");
    communicationText.innerHTML = data.favCanvas;
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
