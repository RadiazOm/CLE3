window.addEventListener('load', init);

function init(){
//    modal voor de create form
//    modal open
document.getElementById("bubble-create").addEventListener("click", function (){
    document.querySelector('.bg-modal').style.display = 'flex';

    //modal close
    document.querySelector('.close').addEventListener('click', function (){
        console.log('Close button clicked');
        document.querySelector('.bg-modal').style.display = 'none';
    });
});}
