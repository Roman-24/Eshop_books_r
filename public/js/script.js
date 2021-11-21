var sorter = document.getElementById("sorter")
const urlParams = new URLSearchParams(window.location.search);

if (sorter) {
    if (urlParams.get('sort'))
        sorter.value = urlParams.get('sort')

    sorter.addEventListener("change", function (e) {
        console.log(e.target.value)
        var newUrl = window.location.href.replace(window.location.search, '')
        window.location.href = newUrl + "?sort=" + e.target.value
    });
}
