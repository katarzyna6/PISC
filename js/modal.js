"use strict";
//console.log('OK');

/* 1. Attention, tu ne sélectionne que le premier élément "myBtn"
      Ici, la sélection par id n'est pas apropriée car tu as plusieurs éléments,
      or, un id doit être unique, il faut donc séléctionner tes éléments en fonction d'autre chose,
      une classe, par exemple, ce qui te fera récupérer un tableau contenant tous tes boutons
      var btns = document.getElementsByClassName("myBtn");
*/ 

// Get the buttons that opens the modals
//var btn = document.getElementById("myBtn");
var btns = document.getElementsByClassName("myBtn");

// Get the <span> element that closes the modal
var spans = document.getElementsByClassName("close");

// When the user clicks the button, open the modal 
/* 2. Partant du principe que l'on a pas 1, mais plusieurs éléments, il faut ajouter des listeners sur
      l'ensemble des éléments (du tableau), donc, utiliser une boucle!*/
for(var btn of btns) {
    btn.onclick = function(e) {
        console.log("click");
        // récupérer la bonne fenêtre
        let id = e.target.id.split('-');
        let modal = document.getElementById("modal-" + id[1]);
        console.log(modal);
        modal.style.display = "block";
    }
}

// When the user clicks on <span> (x), close the modal
for(var span of spans) {
    span.onclick = function(e) {
        console.log("click");
        // récupérer la bonne fenêtre
        let id = e.target.id.split('-');
        
        console.log(id);
        let modal = document.getElementById("modal-" + id[1]);
        modal.style.display = "none";
    }
}

// When the user clicks anywhere outside of the modal, close it
// window.onclick = function(event) {
//     if (event.target == modal) {
//         modal.style.display = "none";
//     }
// }