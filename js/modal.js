"use strict";
console.log('OK');

// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal

/* 1. Attention, tu ne sélectionne que le premier élément "myBtn"
      Ici, la sélection par id n'est pas apropriée car tu as plusieurs éléments,
      or, un id doit être unique, il faut donc séléctionner tes éléments en fonction d'autre chose,
      une classe, par exemple, ce qui te fera récupérer un tableau contenant tous tes boutons
      var btns = document.getElementsByClassName("myBtn");
*/ 
//var btn = document.getElementById("myBtn");
var btns = document.getElementsByClassName("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
/* 2. Partant du principe que l'on a pas 1, mais plusieurs éléments, il faut ajouter des listeners sur
      l'ensemble des éléments (du tableau), donc, utiliser une boucle!
      for(var btn of btns) {
         btn.onclick = function() {
             console.log("click");
             modal.style.display = "block";
         }
      }
}
*/
// btn.onclick = function() {
//     console.log("click");
//     modal.style.display = "block";
// }

console.log(btns);
for(var btn of btns) {
    btn.onclick = function() {
        console.log("click");
        modal.style.display = "block";
    }
 }




// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}