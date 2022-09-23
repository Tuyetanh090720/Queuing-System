const btn_bell = document.getElementById('btn-bell')
const cards_noti_block = document.querySelector('.cards-noti-block')

var click = 0

btn_bell.addEventListener("click", () => {
    cards_noti_block.style.display = "block"
    click += 1
})

window.addEventListener("click", () => {
    if (click % 2 == 0) {
        cards_noti_block.style.display = "none"
    }
    click = 0
})
