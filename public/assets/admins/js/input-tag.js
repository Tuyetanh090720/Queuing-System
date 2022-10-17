const ul = document.getElementById("ul-input-tag")
const input = document.getElementById("input-tag")
const lis = document.querySelectorAll("li")

/*Tạo tag*/
tags = []

function createTag(tag) {

    let liTag = `<li>${tag}<i class="fa fa-xmark" onclick="remove(this,'${tag}')"></i></li>`;

    ul.insertAdjacentHTML("afterbegin", liTag);

}

function addTag(anything, i) {
    let strClass = '.' + anything + ' .option-item'

    optionList = document.querySelectorAll(`${strClass}`)

    let tag = optionList[i].innerHTML

    if (tag.length > 1 && !tags.includes(tag)) {
        createTag(tag);
        tags.push(tag);
        input.value += ', ' + tag
    }
}


/*Xoá tag*/
function remove(element, tag) {
    let index = tags.indexOf(tag);
    console.log(tag)
    if (`, ${tag}`) {
        var a = input.value;
        var b = a.replace(`, ${tag}`, '');
        input.value = b;
    }
    if (`${tag}`) {
        var a = input.value;
        var b = a.replace(`${tag}`, '');
        input.value = b;
    }

    element.parentElement.remove();
}