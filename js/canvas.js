//parts explained:
//event listerer explained:
//waits for user interaction (such as a click,keypress or mouse movement) so you can run some code whenever that action happens
//clientX & clientY explained:
//The clientX(for horizontal) and clientY(for vertical) are read-only properties of the MouseEvent interface
//and provide the coordinate within the application's viewport(browser on client's screen)
//at which the event occurred (as opposed to the coordinate within the page)


//This code sets up an event listener that tracks the mouse movement and draws lines on an HTML canvas element.
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

// Set draw to true when mouse is pressed
window.addEventListener("mousedown", (e) => draw = true)
// Set draw to false when mouse is released
window.addEventListener("mouseup", (e) => draw = false)
//Add an event listener to the window that tracks mouse movement: window.addEventListener
window.addEventListener("mousemove", (e) => {
    // If this is the first mouse movement event, set the previous mouse positions to the current mouse positions
    // if draw == false we won't draw
    if(prevX == null || prevY == null || !draw){
        prevX = e.clientX
        prevY = e.clientY
        return
    }

    //declare (local)variable for current mouse position and get the current mouse positions
    //its a variable and not a constante because it changes
    let currentX = e.clientX
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


