const ul = document.getElementById("ul-input-tag")
const input = document.getElementById("input-tag")
const lis = document.querySelectorAll("li")

/*Tạo tag*/
tags = []

function createTag(tag) {

    let liTag = `<li>${tag}<i class="fa fa-xmark" onclick="remove(this,'${tag}')"></i></li>`;

    ul.insertAdjacentHTML("afterbegin", liTag);
}

/*Thêm tag bằng dấu enter*/
function addTag(anything, i) {
    let strClass = '.' + anything + ' .option-item'

    optionList = document.querySelectorAll(`${strClass}`)

    let tag = optionList[i].innerHTML

    if (tag.length > 1 && !tags.includes(tag)) {

        createTag(tag);
    }
}


/*Xoá tag*/
function remove(element, tag) {
    let index = tags.indexOf(tag);
    element.parentElement.remove();
}
