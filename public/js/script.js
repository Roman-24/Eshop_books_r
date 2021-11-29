var sorter = document.getElementById("sorter")
const urlParams = new URLSearchParams(window.location.search);

if (sorter) {
    if (urlParams.get('sort'))
        sorter.value = urlParams.get('sort')

    sorter.addEventListener("change", function (e) {
        var form = document.getElementById("advanced-search-form");
        var formAction = form.getAttribute("action");
        form.setAttribute("action", formAction + "?sort=" + e.target.value);
        form.submit();
    });
}

// save data if filtering
window.onbeforeunload = function () {
    sessionStorage.setItem("tittle", document.getElementById("tittle").value);
    sessionStorage.setItem("author", document.getElementById("author").value);
    sessionStorage.setItem("maxprice", document.getElementById("maxprice").value);
    sessionStorage.setItem("category", document.getElementById("category").value);
}

window.onload = function () {
    var tittle = sessionStorage.getItem("tittle");
    if (tittle !== null) document.getElementById("tittle").value = tittle

    var author = sessionStorage.getItem("author");
    if (author !== null) document.getElementById("author").value = author

    var maxprice = sessionStorage.getItem("maxprice");
    if (maxprice !== null) document.getElementById("maxprice").value = maxprice

    var category = sessionStorage.getItem("category");
    if (category !== null) document.getElementById("category").value = category

    sessionStorage.clear()
}
