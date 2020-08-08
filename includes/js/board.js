(function setupCharacterCount() {
  const MAX_LENGTH = 1000
  const inputEl = document.getElementById('text')
  const countEl = document.getElementById('char-count')

  countEl.value = MAX_LENGTH

  inputEl.addEventListener('input', (evt) => {
    countEl.value = MAX_LENGTH - evt.target.value.length
  })
})()