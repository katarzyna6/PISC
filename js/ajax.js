console.log('OK');
 var elem = document.getElementById('modContent');
 console.log(elem);
 elem.innerHTML = '<img src="img/loading.gif" alt="chargement"/>';

function getRequest() {
    
    //Récupère la connexion au serveur http
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

var request = getRequest();
request.open('POST', "index.php");
request.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
request.send('route=ajax');

console.log(request);

request.onreadystatechange = function() {
  if(request.readyState == 4 && request.status == 200) {
    elem.innerHTML = request.response;
  }
}


