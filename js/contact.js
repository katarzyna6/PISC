console.log('OK');
var cpInput = document.getElementById('cp');
var villeSelect = document.getElementById('ville');
villeSelect.innerHTML = '<option disabled selected>Choisissez votre ville</option>';

cpInput.addEventListener("input", function(e) {
    console.log("Vous avez écrit : " + cpInput.value);
    if(cpInput.value.length == 5) {
        console.log("Vous avez entré 5 caractères");

    var request = getRequest();
    request.open('GET', "https://api.zippopotam.us/fr/" + cpInput.value);
    request.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
    request.send();

    console.log(request);

    request.onreadystatechange = function() {
        if(request.readyState == 4 && request.status == 200) {
            var reponse = JSON.parse(request.response);
            var options = "";
            console.log(reponse);
            
            for(var place of reponse.places) {
                 options += '<option value="' + place["place name"] + '">' + place["place name"] + '</option>';
            }
            
            villeSelect.innerHTML = options;
        }
    }
}
});

function getRequest() {
    
    var request;
    if (window.XMLHttpRequest) {
    request = new XMLHttpRequest();
    } else if (window.ActiveXObject) {
        try {
          request = new ActiveXObject("Msxml2.XMLHTTP"); // IE version > 5
        } catch (e) {
          request = new ActiveXObject("Microsoft.XMLHTTP");
        }
    } else {
        request = false;
    }
    return request;   
}



