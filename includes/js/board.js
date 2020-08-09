window.onload = () => {
   (function setupCharacterCount() {
  const MAX_LENGTH = 1000
  const inputEl = document.getElementById('text')
  const countEl = document.getElementById('char-count')

  countEl.value = MAX_LENGTH

  inputEl.addEventListener('input', (evt) => {
    countEl.value = MAX_LENGTH - evt.target.value.length
  })
})()
  this.setInterval(fetchNewPosts, 30*1000)
}


async function fetchNewPosts(){
  //this will need some look into later
  //as your DOM looks like needs work, this can be adjusted later
  console.log("Fetching")
  await fetch('api.php?post=' + parseInt(document.getElementsByTagName('blockquote')[0].childNodes[1].nodeValue)).then(function (response){
    response.json().then(async function(json){
      const newposts = []
      json = json.reverse()
      for (let post in json){
        document.getElementsByTagName('blockquote')[0].insertAdjacentElement('beforebegin',createPostElement(json[post]))
      }
    })
  }) 
}

function createPostElement(data){
  const whydothesehavenostructure = document.createElement("post") //lol
  const blockquote = document.createElement("blockquote")
  const ID = document.createElement("B")
  const id = document.createTextNode(" " + data.id)
  const TIME = document.createElement("B")
  const time = document.createTextNode(" " + data.time)
  const NAME = document.createElement("B")
  const name = document.createTextNode(" " + data.name)
  ID.innerText = "ID:"
  TIME.innerText = "Time:"
  NAME.innerText = "Name:"
  blockquote.appendChild(ID)
  blockquote.appendChild(id)
  blockquote.appendChild(document.createElement("BR"))
  blockquote.appendChild(TIME)
  blockquote.appendChild(time)
  blockquote.appendChild(document.createElement("BR"))
  blockquote.appendChild(NAME)
  blockquote.appendChild(name)
  const text = document.createElement("PRE")
  text.innerText = data.text
  whydothesehavenostructure.appendChild(blockquote)
  blockquote.insertAdjacentElement('afterend', text)
  text.insertAdjacentElement('afterend', document.createElement("BR"))
  return whydothesehavenostructure
}