var sorter = document.getElementById("sorter")
const urlParams = new URLSearchParams(window.location.search);

if (sorter) {
    if (urlParams.get('sort'))
        sorter.value = urlParams.get('sort');

    sorter.addEventListener("change", function (e) {
        // if advanced search is opened
        if (window.location.href.indexOf("search") > -1) {
            var form = document.getElementById("advanced-search-form");
            var formAction = form.getAttribute("action");
            form.setAttribute("action", formAction + "?sort=" + e.target.value);
            form.submit();
        } else {
            // if just products preview is opened
            var dist = window.location.href.indexOf("page") > -1 ? "&" : "?";
            var actualUrl = window.location.href.replace(/.sort=.*/i, '');
            window.location.href = actualUrl + dist + "sort=" + e.target.value;
        }
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

    // add existing sorting to paginaion links
    if (window.location.href.indexOf("sort") > -1) {
        var paginationLinks = document.getElementsByClassName("page-link")
        for (let link of paginationLinks) {
            link.setAttribute("href", link.getAttribute("href") + window.location.href.match(/.sort=.*/i))
        }
    }
}

// Handling image cover
function previewCoverImage(e) {
    var preview = document.querySelector('.preview-book .image');
    var file = document.querySelector('.preview-book input[type=file]').files[0];
    var reader = new FileReader();

    reader.onloadend = function () {
        preview.style = "background-image: url(" + reader.result + ")";
    }

    if (file) {
        reader.readAsDataURL(file);
    } else {
        preview.style = "background-image: url('/assets/placeholder.jpg')";
    }
}

function removeCoverImage(e) {
    var preview = document.querySelector('.preview-book .image');
    document.querySelector('.preview-book input[type=file]').value = '';

    preview.style = "background-image: url('/assets/placeholder.jpg')";
}
