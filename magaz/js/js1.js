function del() {
    let elem = document.getElementById("item");
    elem.parentNode.removeChild(elem);
}

function plus() {
    let plus = document.getElementById('val');
    plus.value = +plus.value + 1;
}

function minus() {
    let minus = document.getElementById('val');
    if (minus.value == 0) {
        minus.value = 1
    } else {
        minus.value = +minus.value - 1;
    }
}
function addItem() {
    let array = ["${_SESSION['price']}₽", "${_SESSION['id_book']}", 5];
    console.log(array);
    localStorage.setItem("array", JSON.stringify(array));
    array = JSON.parse(localStorage.getItem("array"));
    console.log(typeof array);
    console.log(array);

}