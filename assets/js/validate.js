"use strict";
//chargement du panier dans le storage
let basket1 = loadDataFromDomStorage("basket");
if (basket1 == null) {
  //si il est null tu me creer  un nouveau tableau vide
  basket1 = [];
}
/**
 * validation de la commande
 */
$(".form-basket").on("submit", function (event) {
  event.preventDefault();
  $.post(
    "index.php?controller=basket&action=insert",
    { basket: basket1 },
    function (data) {
     console.log(data);
      if (data == '"ok"') {
        alert("Votre commande a été bien envoyée");
        removeBasket();
        window.location.assign("index.php?controller=basket&action=shipping");
      }
    }
  );
});
