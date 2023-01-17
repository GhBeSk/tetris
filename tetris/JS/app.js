const scoreDisplay = document.querySelector('#score')
const startBtn = document.querySelector('#start-button')
const width = 10
let nextRandom = 0
let timerId
let score = 0


 const grid = [
  ["","","","","","","","","",""],
  ["","","","","","","","","",""],
  ["","","","","","","","","",""],
  ["","","","","","","","","",""],
  ["","","","","","","","","",""],
  ["","","","","","","","","",""],
  ["","","","","","","","","",""],
  ["","","","","","","","","",""],
  ["","","","","","","","","",""],
  ["","","","","","","","","",""],
  ["","","","","","","","","",""],
  ["","","","","","","","","",""],
  ["","","","","","","","","",""],
  ["","","","","","","","","",""],
  ["","","","","","","","","",""],
  ["","","","","","","","","",""],
  ["","","","","","","","","",""],
  ["","","","","","","","","",""],
  ["","","","","","","","","",""],
  ["","","","","","","","","",""]
 ]

 const gamePieces = {
  "L":[ [1,1],[1,2],[1,3],[2,3] ],
  "Z":[ [1,1],[2,1],[2,2],[2,3] ],
  "S":[ [1,2],[2,1],[2,2],[3,1] ],
  "T":[ [1,1],[2,1],[2,2],[3,1] ],
  "O":[ [1,1],[1,2],[2,1],[2,2] ],
  "I":[ [1,1],[1,2],[1,3],[1,4] ]
 }

 const widthPieces = {
   "L": 3,
   "Z": 3,
   "S": 2,
   "T": 2,
   "O": 2,
   "I": 4,
 }

 const heightPieces = {
   "L": 2,
   "Z": 2,
   "S": 3,
   "T": 3,
   "O": 2,
   "I": 1,
 }


 const piecesArray = [
   "L","Z","S","T","O","I"
 ]


let currentRotation = 0

function draw() {
  let random = Math.floor(Math.random()*piecesArray.length)
  let currentBlock = piecesArray[random]
  let currentBlockCoordinates = gamePieces[currentBlock]
  let setBlock = document.getElementById('current')
  score = score + 10
  scoreDisplay.innerHTML = score

  if (setBlock){
    setBlock.setAttribute('id','set')
  }
  const container = document.createElement("div")
  container.className = 'shape'
  container.setAttribute('id', 'current')
  container.style.setProperty('--left', 3)
  container.style.setProperty('--width',widthPieces[currentBlock])
  container.style.setProperty('--top',0)
  container.style.setProperty('--height',heightPieces[currentBlock])

  for (const i of currentBlockCoordinates){
    if (grid[i[0]-1][i[1]+2] === "") {

      x = i[1]+2
      y = i[0]-1

      grid[i[0]-1][i[1]+2] = currentBlock
      const newdiv = document.createElement("div")
      container.appendChild(newdiv)
      newdiv.className = "block " + currentBlock
      newdiv.style.transform = `translate(
        calc((var(--left, 0) + ${(i[1] - 1)}) * 30px),
        calc((var(--top, 0) + ${(i[0] - 1)}) * 30px)
      )`
      newdiv.style.setProperty('--x',x)
      newdiv.style.setProperty('--y',y)

    }
    else {
      gameOver()
    }

  }
  document.getElementById("tetris-bg").appendChild(container)
}

draw()

//assign functions to keyCodes
function control(e) {
  if(e.keyCode === 37) {
    moveLeft()
  } else if (e.keyCode === 38) {
    rotate()
  } else if (e.keyCode === 39) {
    moveRight()
  } else if (e.keyCode === 40) {
    moveDown()
  }
}
document.addEventListener('keyup', control)

function moveLeft() {
  var shape = document.getElementById("current")
  var left = parseInt(shape.style.getPropertyValue('--left')) || 0
  if (left > 0) {
    shape.style.setProperty('--left', left-1)
  }

  var blocks = shape.getElementsByClassName('block')
  var letter = blocks[0].classList[1]
  for (var block of blocks) {
    var x = parseInt(block.style.getPropertyValue('--x'))
    var y = parseInt(block.style.getPropertyValue('--y'))
    grid[y][x] = ''
  }
  for (var block of blocks){
    var x = parseInt(block.style.getPropertyValue('--x'))
    var y = parseInt(block.style.getPropertyValue('--y'))
    grid[y][x-1] = letter
    block.style.setProperty('--x',x-1)
  }
}

function moveRight() {
  var shape = document.getElementById("current")
  var left = parseInt(shape.style.getPropertyValue('--left')) || 0
  var width = parseInt(shape.style.getPropertyValue('--width')) || 0
  if (left + width < 10) {
    shape.style.setProperty('--left', left+1)
  }

  var blocks = shape.getElementsByClassName('block')
  var letter = blocks[0].classList[1]
  for (var block of blocks) {
    var x = parseInt(block.style.getPropertyValue('--x'))
    var y = parseInt(block.style.getPropertyValue('--y'))
    grid[y][x] = ''
  }
  for (var block of blocks){
    var x = parseInt(block.style.getPropertyValue('--x'))
    var y = parseInt(block.style.getPropertyValue('--y'))
    grid[y][x+1] = letter
    block.style.setProperty('--x',x+1)
  }
}
function moveDown() {
  var shape = document.getElementById("current")
  var top = parseInt(shape.style.getPropertyValue('--top')) || 0
  var height = parseInt(shape.style.getPropertyValue('--height')) || 0
  if (top + height < 20) {
  shape.style.setProperty('--top', top+1)
    }
  var blocks = shape.getElementsByClassName('block')
  var letter = blocks[0].classList[1]
  for (var block of blocks) {
  var x = parseInt(block.style.getPropertyValue('--x'))
  var y = parseInt(block.style.getPropertyValue('--y'))
  grid[y][x] = ''
  }
  for (var block of blocks){
  var x = parseInt(block.style.getPropertyValue('--x'))
  var y = parseInt(block.style.getPropertyValue('--y'))
  grid[y+1][x] = letter
  block.style.setProperty('--y',y+1)
  }
}
setInterval(moveDown,1000)
setInterval(draw,19000)
