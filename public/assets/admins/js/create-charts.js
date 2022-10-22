const options = document.querySelectorAll(".day_status .option-item")
var chartDay = document.querySelector(".chartDay")
var chartWeek = document.querySelector(".chartWeek")
var chartMonth = document.querySelector(".chartMonth")

window.addEventListener('load', (event) => {
    chartWeek.style.display = "none";
    chartMonth.style.display = "none";
    chartDay.style.display = "block";
});

console.log(chartDay.style.display);
options[0].addEventListener("click", () => {
    chartWeek.style.display = "none";
    chartMonth.style.display = "none";
    chartDay.style.display = "block";
})

options[1].addEventListener("click", () => {
    chartDay.style.display = 'none';
    chartMonth.style.display = "none";
    chartWeek.style.display = "block";
})

options[2].addEventListener("click", () => {
    chartDay.style.display = "none";
    chartWeek.style.display = "none";
    chartMonth.style.display = "block";
})