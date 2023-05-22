window.addEventListener('load', init);

let clickedIcon;
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

    getJSONdata(`webservice/index.php?webservice=info`, FillHTML)



}


function iconClickHandler(e) {

    console.log(e.target);
    let target = e.target;

    if (target.nodeName !== 'I'){
        return;
    }
    modalSport = document.getElementById("popup-sport");
    clickedIcon = target.dataset.id;
    getJSONdata(`webservice/index.php?webservice=info&id=1`, fillModal)

    modalSport.showModal()

}

function iconCloseHandler()
{
    modalClose = document.getElementById('modal-close');
    modalSport.close()
}

function fillModal(data) {
   modalSport.children[0].innerHTML = '';
   let p = document.createElement('p');
   p.innerHTML = data[clickedIcon];
   p.classList.add()
   modalSport.children[0].appendChild(p);
}



function FillHTML(data)
{
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
   console.log(data);
   console.log("it's broke");
}
