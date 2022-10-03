const fa_xmark = document.getElementById('fa-xmark')
const popup = document.getElementById('popup')
const pop_up = document.querySelector('.pop-up')

popup.addEventListener("click", () => {
    pop_up.style.display = "block"
})

fa_xmark.addEventListener("click", () => {
    pop_up.style.display = "none"
})
