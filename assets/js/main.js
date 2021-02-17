"use strict";

/////////////////////////////////////////////////////////////////////////////////////////
// FONCTIONS                                                                           //
/////////////////////////////////////////////////////////////////////////////////////////
const realPath = window.location.href;
const wwwUrl = realPath.substr(0, realPath.indexOf("/index.php")); //substr Retourne un segment de chaîne

/////////////////////////////////////////////////////////////////////////////////////////
// CODE PRINCIPAL                                                                      //
/////////////////////////////////////////////////////////////////////////////////////////

$(document).ready(function () {
  //sauvegarde du panier dans le local storage
  $(document).on("submit", ".basket", saveBasket);
  
   //affichage du produit ajouter
  $(document).on("click", '.button_ajout', showInfo);

  //supprimer un element du panier
  $(document).on("click", "#panier1 button", supprimer);

  //supprimer le panier
  $(document).on("click", "#removeBasket", removeBasket);

  //affichage des données utilisateur
  $("#showForm").on("click", showUser);
  
  //afficage du menu en mode mobile
  let faBars = document.querySelector(".menu-toggle");
  faBars.addEventListener("click", affichage);

  //vérification du contenu du panier
  verifbascket();

  //si le contenu du panier est différent de 0
  if ($("#panier1").length != 0)
    //affiche le panier
    showBasket();

});


