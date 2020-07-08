console.log('OK');
 var elem = document.getElementById('modContent');
 elem.innerHTML = '<img src="../img/loading.gif" alt="chargement"/>';
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
console.log(getRequest());

request.open('POST', 'index.php', true);

