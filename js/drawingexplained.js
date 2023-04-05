window.addEventListener('load', init);


let title;
let chooseColor;
let clearCanvas;
let saveCanvas;
let favCanvas
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
    favCanvas = document.getElementById("favCanvas");


    getJSONdata(`webservice/index.php?webservice=drawing`, FillHTML)



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
    let chooseText = document.createElement("p");
    chooseText.innerHTML = data.chooseColor;
    chooseColor.appendChild(chooseColor);

    // clear knop
    let clearText = document.createElement("p");
    clearText.innerHTML = data.clearCanvas;
    clearCanvas.appendChild(clearCanvas);


    // save knop
    let saveText = document.createElement("p");
    saveText.innerHTML = data.saveCanvas;
    saveCanvas.appendChild(saveCanvas);

    // favoriete
    let favText = document.createElement("p");
    favText.innerHTML = data.favCanvas;
    saveCanvas.appendChild(favCanvas);

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
