document.getElementById("document_exp").onclick = function() {
    document.getElementById('documents_modal').style.display = "block";
}

document.getElementById("metrics_exp").onclick = function() {
    document.getElementById('metrics_modal').style.display = "block";
}

document.getElementsByClassName("close")[0].onclick = function() {
    document.getElementById("document_modal").style.display = "none";
}

document.getElementsByClassName("close")[1].onclick = function() {
    document.getElementById("metrics_modal").style.display = "none";
}


window.onclick = function(event) {
    if (event.target == document.getElementById('reminder_modal')) {
        document.getElementById('document_modal').style.display = "none";
    }
    if (event.target == document.getElementById('metrics_modal')) {
        document.getElementById('metrics_modal').style.display = "none";
    }

}

document.getElementById('document_modal').style.display = "none";
document.getElementById('metrics_modal').style.display = "none";
