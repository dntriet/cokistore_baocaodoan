function isNumberKey(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}

function increaseQuantity() {
    let quantity = document.getElementById("ip-text-quantity").value;
    let validValue = parseInt(quantity);
    validValue++;
    document.getElementById("ip-text-quantity").value = validValue;
}

function descreaseQuantity() {
    let quantity = document.getElementById("ip-text-quantity").value;
    let validValue = parseInt(quantity);
    if (validValue > 1) {
        validValue--;
    }
    document.getElementById("ip-text-quantity").value = validValue;
}

function changeTheFacts() {
    var tab_content = document.querySelector(".tab-content.facts");
    var my_icon = document.getElementById("plus-icon-facts");
    if (tab_content.style.display == "none") {
        tab_content.style.display = "block";
        my_icon.setAttribute("class", "fa-sharp fa-solid fa-minus fa-xl");
    }
    else {
        tab_content.style.display = "none";
        my_icon.setAttribute("class", "fa-sharp fa-solid fa-plus fa-xl");
    }
}

function changeImpacts() {
    var tab_content = document.querySelector(".tab-content.impacts");
    var my_icon = document.getElementById("plus-icon-impacts");
    if (tab_content.style.display == "none") {
        tab_content.style.display = "block";
        my_icon.setAttribute("class", "fa-sharp fa-solid fa-minus fa-xl");
    }
    else {
        tab_content.style.display = "none";
        my_icon.setAttribute("class", "fa-sharp fa-solid fa-plus fa-xl");
    }
}