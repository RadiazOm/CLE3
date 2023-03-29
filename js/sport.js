window.addEventListener('load', init);


let titleSport;
let generalSport;
let popularSport;
let communicationSport;
let modalSport;
let modalClose;


function init() {



    let iconClicker = document.getElementById("containerSport")
    iconClicker.addEventListener("click", iconClickHandler);


    let iconClose = document.getElementById('modal-close')
    iconClose.addEventListener("click",iconCloseHandler);


    titleSport = document.getElementById("titleSport");
    generalSport = document.getElementById("generalSport");
    popularSport = document.getElementById("popularSport");
    communicationSport = document.getElementById("communicationSport");

    getJSONdata(`webservice/index.php?id=2`, FillHTML)



}


function iconClickHandler(e) {

    console.log(e.target);
    let target = e.target;

    if (target.nodeName !== 'I'){
        return;
    }
    modalSport = document.getElementById("popup-sport");

    modalSport.showModal()

    fillModal(e.target.id)
}

function iconCloseHandler()
{
    modalClose = document.getElementById('modal-close');
    modalSport.close()

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
    h1.innerHTML = data.mainTitle;
    titleSport.appendChild(h1);

    // general sport
    let generalText = document.createElement("p");
    generalText.innerHTML = data.firstParagraph;
    generalSport.appendChild(generalText);

    // popular sport
    let popularText = document.createElement("p");
    popularText.innerHTML = data.secondParagraph;
    popularSport.appendChild(popularText);


    // communication sport
    let communicationText = document.createElement("p");
    communicationText.innerHTML = data.thirdParagraph;
    communicationSport.appendChild(communicationText);



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
   console.log("broke lol");
}
