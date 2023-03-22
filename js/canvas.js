//DRAWING TOOL CODE

//in short: this code sets up an event listener that tracks the mouse movement and draws lines on an HTML canvas element.

//at the top some parts of code that i find (or at one point found) confusing explained
//each piece of code is explained in depth

//parts explained:
//event listerer explained:
//waits for user interaction (such as a click,keypress or mouse movement) so you can run some code whenever that action happens
//clientX & clientY explained:
//The clientX(for horizontal) and clientY(for vertical) are read-only properties of the MouseEvent interface
//and provide the coordinate within the application's viewport(browser on client's screen)
//at which the event occurred (as opposed to the coordinate within the page)

window.addEventListener('load', init);

//The canvas constante references the HTML canvas element with the ID "canvas"
//its a constante and not a variable because it never changes
const canvas = document.getElementById("canvas")
// Set the canvas height and width to the height and width of the browser window
canvas.height = window.innerHeight /2
canvas.width = window.innerWidth / 2
//the ctx constante gets the 2D context of the canvas, which allows us to draw on it
//its a constante and not a variable because it never changes
const ctx = canvas.getContext("2d")
//declare prevX and prevY variables, which are used to keep track of (to hold/store) the previous mouse positions,
//prev=previous. its a variable and not a constante because it changes
let prevX = null
let prevY = null
//The ctx.lineWidth property sets the width of the line we will draw
ctx.lineWidth = 5
//declare variable so the webapplication knows when & when not to draw
let draw = false

function init()
{
    //set color of stroke to white on start
    ctx.strokeStyle = "white";
}

//Next piece of code is for selecting the color you want to draw with.
// It selects all elements with the class "clr" from the document(drawingtool.html),
// converts the resulting NodeList to an array, and adds an event listener to each element in the array.
// When an element is clicked,
// the code sets the stroke style of the canvas to the color value stored in the element's "data-clr" attribute.

// Select all elements with class "clr" from the drawingtool.html
let clrs = document.querySelectorAll(".clr")
// Convert the NodeList returned by querySelectorAll to an array
clrs = Array.from(clrs)
// Add an event listener to each element in the array
clrs.forEach(clr => {
    // When an element is clicked, set the stroke style of the context (ctx) to the color
    // value stored in the element's "data-clr" attribute
    clr.addEventListener("click", () => {
        ctx.strokeStyle = clr.dataset.clr
    })
})

//This code next piece of code is for clearing the canvas.
// It selects the element with class "clear" from the document, adds an event listener to the element,
// and defines the action that should be taken when the element is clicked.
// When the "clear" button is clicked, the code clears the entire canvas by filling it with a transparent color,
// which removes all previously drawn content.

// Select the element with class "clear" from the document
let clearBtn = document.querySelector(".clear")
// Add an event listener to the "clear" button
clearBtn.addEventListener("click", () => {
    // When the "clear" button is clicked, clear the entire canvas by filling it with a transparent color
    ctx.clearRect(0, 0, canvas.width, canvas.height)
})

// Set draw to true when mouse is pressed
window.addEventListener("mousedown", (e) => draw = true)
// Set draw to false when mouse is released
window.addEventListener("mouseup", (e) => draw = false)
//Add an event listener to the window that tracks mouse movement: window.addEventListener
window.addEventListener("mousemove", (e) => {
    // If this is the first mouse movement event, set the previous mouse positions to the current mouse positions
    // if draw == false we won't draw
    //- canvas.width/2 because we're using window.innerHeight(and width) /2 for the canvas size
    if(prevX == null || prevY == null || !draw){
        prevX = e.clientX - canvas.width /2
        prevY = e.clientY
        return
    }

//declare (local)variable for current mouse position and get the current mouse positions
//its a variable and not a constante because it changes
//- canvas.width/2 because we're using window.innerHeight(and width) /2 for the canvas size
let currentX = e.clientX - canvas.width /2
let currentY = e.clientY

// Start a new line and move to the previous mouse position
ctx.beginPath()
ctx.moveTo(prevX, prevY)
// Draw a line to the current mouse position and stroke it (i.e., actually draw it)
ctx.lineTo(currentX, currentY)
ctx.stroke()

// Update the previous mouse positions to be the current mouse positions
prevX = currentX
prevY = currentY
})


