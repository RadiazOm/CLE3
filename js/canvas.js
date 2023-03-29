//DRAWING TOOL CODE

//in short: this code sets up an event listener that tracks the mouse movement and draws lines on an HTML canvas element.

//at the top some parts of code that i find (or at one point found) confusing explained
//each piece of code is explained in depth

//parts explained:
//event listener explained:
//waits for user interaction (such as a click,keypress or mouse movement) so you can run some code whenever that action happens
//clientX & clientY explained:
//The clientX(for horizontal) and clientY(for vertical) are read-only properties of the MouseEvent interface
//and provide the coordinate within the application's viewport(browser on client's screen)
//at which the event occurred (as opposed to the coordinate within the page)

//making the init function start
window.addEventListener('load', init);

let canvas;
let canvascontext;
let favButton;
//declare variable so the webapplication knows when & when not to draw
let draw = false
//declare prevX and prevY variables, which are used to keep track of (to hold/store) the previous mouse positions,
//prev=previous. its a variable and not a constante because it changes
let prevX = null
let prevY = null

function init()
{
//The canvas variabele references the HTML canvas element with the ID "canvas"
    canvas = document.getElementById("canvas")
    favButton = document.getElementById('fav')

    favButton.addEventListener('click', favClickHandler)

// Set the canvas height and width to the height and width of the browser window
    canvas.height = window.innerHeight /2
    canvas.width = window.innerWidth /2
//the canvascontext variable gets the 2D context of the canvas, which allows us to draw on it
    canvascontext = canvas.getContext("2d")
//The canvascontext.lineWidth property sets the width of the line we will draw
    canvascontext.lineWidth = 5
//set color of stroke to white on start
    canvascontext.strokeStyle = "white";

    //trying to get the base64 in localstorage back to png in canvas
    if (localStorage.getItem('imgData') !== null) {
        //first translate from base64 to png
        let img64 = localStorage.getItem('imgData');
        let image = new Image()
        //then put it in canvas
        image.src = img64;
        // document.querySelector('body').appendChild(image);
        image.addEventListener('load', () => canvascontext.drawImage(image, 0, 0));
        console.log(image.src)
        canvascontext.drawImage(image, 0, 0);
    }

    //Next piece of code is for selecting the color you want to draw with.
// It selects all elements with the class "color" from the document(drawingtool.php),
// converts the resulting NodeList to an array, and adds an event listener to each element in the array.
// When an element is clicked,
// the code sets the stroke style of the canvas to the color value stored in the element's "data-color" attribute.

// Select all elements with class "color" from the drawingtool.php
    let colors = document.querySelectorAll(".color")
// Convert the NodeList returned by querySelectorAll to an array
    colors = Array.from(colors)
// Add an event listener to each element in the array
    colors.forEach(color => {
        // When an element is clicked, set the stroke style of the context (canvascontext) to the color
        // value stored in the element's "data-color" attribute
        color.addEventListener("click", () => {
            canvascontext.strokeStyle = color.dataset.color
        })
    })

    //Next piece of code is for clearing the canvas.
// It selects the element with class "clear" from the document, adds an event listener to the element,
// and defines the action that should be taken when the element is clicked.
// When the "clear" button is clicked, the code clears the entire canvas by filling it with a transparent color,
// which removes all previously drawn content.

// Select the element with class "clear" from the document
    let clearBtn = document.querySelector(".clear")
// Add an event listener to the "clear" button
    clearBtn.addEventListener("click", () => {
        // When the "clear" button is clicked, clear the entire canvas by filling it with a transparent color
        canvascontext.clearRect(0, 0, canvas.width, canvas.height)
    })

//Next piece of code is for saving drawing as image
// find the first element with class name "save" and store it in saveBtn variable
    let saveBtn = document.querySelector(".save")
// add a click event listener to the saveBtn
    saveBtn.addEventListener("click", () => {
        // get the data URL of the canvas element and store it in data variable
        let data = canvas.toDataURL("imag/png")
        // create a new <a> element and store it in a variable named 'saveable'
        let saveable = document.createElement("a")
        // set the 'href' attribute of the 'saveable' element to the data URL
        saveable.href = data
        // set the 'download' attribute of the 'saveable' element to "drawing.png"
        saveable.download = "drawing.png"
        // simulate a click on the 'saveable' element to download the image file
        saveable.click()
    })



}

//TRYING TO DO LOCAL STORAGE

function getBase64Image(img) {
    return img.toDataURL("image/png");
    // console.log(dataURL)
    // return dataURL.replace(/^data:image\/(png|jpg);base64,/, "");
}

function favClickHandler(){
    let canvasLocalStorage = document.getElementById('canvas');
    let imgData = getBase64Image(canvasLocalStorage);
    localStorage.setItem("imgData", imgData);
}


// Set draw to true when mouse is pressed
window.addEventListener("mousedown", (e) => draw = true)
// Set draw to false when mouse is released
window.addEventListener("mouseup", (e) => draw = false)
//Add an event listener to the window that tracks mouse movement: window.addEventListener
window.addEventListener("mousemove", (e) => {
    // If this is the first mouse movement event, set the previous mouse positions to the current mouse positions
    // if draw == false we won't draw
    if(prevX == null || prevY == null || !draw){
        //offsetTop returns the distance of the outer border of the current element relative,
        //to the inner border of the top of the offsetParent(the closest positioned ancestor element)
        //we're using - canvas.offsetTop so we draw at the same place at the canvas, regardless off the css.
        prevX = e.clientX - canvas.offsetLeft
        prevY = e.clientY - canvas.offsetTop
        return
    }

//declare (local)variable for current mouse position and get the current mouse positions
    //its a variable and not a constante because it changes
    //we're using - canvas.offsetTop so we draw at the same place at the canvas, regardless off the css.
let currentX = e.clientX - canvas.offsetLeft
let currentY = e.clientY - canvas.offsetTop

// Start a new line and move to the previous mouse position
    canvascontext.beginPath()
    canvascontext.moveTo(prevX, prevY)
// Draw a line to the current mouse position and stroke it (i.e., actually draw it)
    canvascontext.lineTo(currentX, currentY)
    canvascontext.stroke()

// Update the previous mouse positions to be the current mouse positions
prevX = currentX
prevY = currentY
})
