function updateFlux(url, id) {
    var req = false;
    req = new XMLHttpRequest();

    req.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById(id).innerHTML = this.responseText;
        }
    };

    document.getElementById(id).innerHTML =
        "<img src='tools/flux/presentation/images/loading.gif' alt='loading'/>";

    req.open('GET', url, true);
    req.send(null);
}
