window.addEventListener('load', init);

let titleSport;
let generalSport;
let popularSport;
let communicationSport;

function init() {
    titleSport = document.getElementById("titleSport");
    generalSport = document.getElementById("generalSport");
    popularSport = document.getElementById("popularSport");
    communicationSport = document.getElementById("communicationSport");
    getJSONdata(`webservice/index.php?id=2`, FillHTML)


}

function FillHTML(e) {
    data = e;
    console.log(data);

    let h1 = document.createElement("h1")
    h1.innerHTML = data.mainTitle;
    titleSport.appendChild(h1);

    let generalTitle = document.createElement("h1")
    generalTitle.innerHTML = data.firstParagraphTitle;
    generalSport.appendChild(generalTitle);

    let generalText = document.createElement("p")
    generalText.innerHTML = data.firstParagraph
    generalSport.appendChild(generalText)






    




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
