function laso_bills(){
    var url ="http://lasosearch.com/api/bills?callback=?";
    var prefix = "<table class='responsive-table'><thead><tr><td>User Name</td><td>Score</td><td>Team</td></tr></thead><tbody>";
    var suffix = "</tbody></table>";
    $('#res').html(prefix);
    $.getJSON(url,
    function (data) {
        var tr;
        for (var i = 0; i < data.length; i++) {
            tr = $('<tr/>');
            tr.append("<td>" + data[i].User_Name + "</td>");
            tr.append("<td>" + data[i].score + "</td>");
            tr.append("<td>" + data[i].team + "</td>");
            $('#res').append(tr);
        }
    });
    $('#res').append(suffix);
}

function laso_bill(){
    var bid = $('#bill_id').val();
    var url ="http://lasosearch.com/api/bill/"+bid+"?callback=?";
    var prefix = "<table class='responsive-table'><thead><tr><td>User Name</td><td>Score</td><td>Team</td></tr></thead><tbody>";
    var suffix = "</tbody></table>";
    $('#res').html(prefix);
    $.getJSON(url,
    function (data) {
        var tr;
        for (var i = 0; i < data.length; i++) {
            tr = $('<tr/>');
            tr.append("<td>" + data[i].User_Name + "</td>");
            tr.append("<td>" + data[i].score + "</td>");
            tr.append("<td>" + data[i].team + "</td>");
            $('#res').append(tr);
        }
    });
    $('#res').append(suffix);
}

function laso_legs(){
    var url ="http://lasosearch.com/api/legs?callback=?";
    var prefix = "<table class='responsive-table'><thead><tr><td>ID</td><td>Name</td><td>State/District</td></tr></thead><tbody>";
    var suffix = "</tbody></table>";
    $('#res').html(prefix);
    $.getJSON(url,
    function (data) {
        var tr;
        for (var i = 0; i < data.length; i++) {
            tr = $('<tr/>');
            tr.append("<td>" + data[i].id + "</td>");
            tr.append("<td>" + data[i].first_name+" " + data[i].last_name + "</td>");
            tr.append("<td>" + data[i].state + "-" + data[i].district + "</td>");
            $('#res').append(tr);
        }
    });
    $('#res').append(suffix);
}

function laso_leg(){
    var lid = $('#leg_id').val();
    var url ="http://lasosearch.com/api/leg/"+lid+"?callback=?";
    var prefix = "<table class='responsive-table'><thead><tr><td>ID</td><td>Name</td><td>State/District</td></tr></thead><tbody>";
    var suffix = "</tbody></table>";
    $('#res').html(prefix);
    $.getJSON(url,
    function (data) {
        var tr;
        for (var i = 0; i < data.length; i++) {
            tr = $('<tr/>');
            tr.append("<td>" + data[i].id + "</td>");
            tr.append("<td>" + data[i].first_name+" " + data[i].last_name + "</td>");
            tr.append("<td>" + data[i].state + "-" + data[i].district + "</td>");
            $('#res').append(tr);
        }
    });
    $('#res').append(suffix);
}

function laso_docs(){
    var url ="http://lasosearch.com/api/docs?callback=?"
    var prefix = "<table class='responsive-table'><thead><tr><th>ID</th><th>Author ID</th><th>Title</th></tr></thead><tbody>";
    var suffix = "</tbody></table>";
    $('#res').html(prefix);
    $.getJSON(url,
    function (data) {
        var tr;
        for (var i = 0; i < data.length; i++) {
            tr = $('<tr/>');
            tr.append("<td>" + data[i].id + "</td>");
            tr.append("<td>" + data[i].user_id + "</td>");
            tr.append("<td>" + data[i].title + "</td>");
            $('#res').append(tr);
        }
    });
    $('#res').append(suffix);
}

function laso_doc(){
    var did = $('#doc_id').val();
    var prefix = "<table class='responsive-table'><thead><tr><th>ID</th><th>Author ID</th><th>Title</th><th>Description</th><th>Text</th></tr></thead><tbody>";
    var suffix = "</tbody></table>";
    var url ="http://lasosearch.com/api/doc/"+did+"?callback=?";
    $('#res').html(prefix);
    $.getJSON(url,
    function (data) {
        var tr;
        for (var i = 0; i < data.length; i++) {
            tr = $('<tr><tr/>');
            tr.append("<td>" + data[i].id + "</td>");
            tr.append("<td>" + data[i].user_id + "</td>");
            tr.append("<td>" + data[i].title + "</td>");
            tr.append("<td>" + data[i].description + "</td>");
            tr.append("<td>" + data[i].text + "</td>");
            $('#res').append(tr);
        }
    });
    $('#res').append(suffix);
}
