"use strict";
console.log('OK');

var items = [
    {
        name: "Lingettes hydratantes", 
        brand: "Dilex",
        image: "img/1.jpg",
        description: "FraîcheLes lingettes nettoyantes et désinfectantes avec huile d'argan, huile d'amande, vitamine E, sans paraben.///Appropriés lorsqu'il n'y a pas de conditions de toilette, idéales pour les soins des malades et des personnes âgées.///Produit convient pour une utilisation quotidienne, ne dessèche pas la peau.",
        price: "xxx €",
    },
    
];

var html = "";
var len = items.length;

for(var i = 0; i < len; i++) {
   html += "<li class=\"elem\" id=\"item" + i + "\">" + items[i].name + "</li>";
}

var liste = document.getElementById("liste");
liste.innerHTML = html;


/* Fonctionnalité modale */

var container = document.getElementById("item_container");
container.addEventListener("click", () => {
    container.style.display = "none";
});

var elems = document.getElementsByClassName("elem");
var len = elems.length;
for(var i = 0; i < len; i++) {
    elems[i].addEventListener("click", (event) => {
        event.preventDefault();
        var index = parseInt(event.target.id.substring(3));
        showItem(index);
    });
}

function showItem(index) {
    console.log("Vous avez demandé le produit " + items[index].name);
    container.style.display = "block";

    var element = document.getElementById('item');

    var itemHtml = "";
    itemHtml += "<img src=\"../img/" + items[index].image + "\">";
    itemHtml += "<div class=\"description\">";
    itemHtml += "<h2>" + items[index].name + "</h2>";
    itemHtml += "<p>" + items[index].description + "</p>";

    element.innerHTML = itemHtml;
}

function formatLst(strToTab, type) {

    var tab = strToTab.split("///");
    var listHtml = "<" + type + ">";
    var max = tab.length;
    for(var i = 0; i < max; i++) {
        listHtml += "<li>" + tab[i] + "</li>";
    }

    listHtml += "</" + type + ">";
    
    return listHtml;
}