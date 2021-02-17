"use strict";
/**
 *chargement du panier dans le storage
 * */
let basket = loadDataFromDomStorage("basket");
if (basket == null) {
  basket = [];
}
/**
 * vérification du contenu du panier
 */
function verifbascket() {
  if (basket != "") {
    let nbr = basket.length;
    console.log(nbr);
    $(".nbr").append("(" + nbr + ")");
  }
}
/**
 * sauvegarde du panier dans le storage
 */
function saveBasket(event) {
  event.preventDefault();
  //console.log($(this).serializeArray());
  
  let item = $(this).serializeArray();
  //console.log(item);
  let quantite = item[0].value;
  let img = item[1].value; //recuperation donnée de l'image
  let name = item[2].value;
  let price =item[4].value;
  let id_product =item[3].value; //recuperation donnée de l'id
  let weight = item[5].value; //recuperation donnée du poids
  let prixTotal = formatMoneyAmount(quantite * price); //calcule du prix
  let type = item[6].value; //recuperation donnée du type
 
  let product = [];
  let index_exist = null;
  for (
    let i = 0;
    i < basket.length;
    i++ //parcours le tableau
  ) {
    if (id_product == basket[i][4]) {
      index_exist = i; //l'index existe deja

      break; //tu t arretes des que tu trouves
    }
  }
  if (index_exist == null) {
    
   //si l'index est  null pousse les valeurs dans le tableau product
    product.push(name);
    product.push(price);
    product.push(parseInt(quantite));
    product.push(prixTotal);
    product.push(id_product);
    product.push(img);
    product.push(weight);
    product.push(type);
    basket.push(product); //pousse les données du produit dans le panier
    //console.log(basket)
  } else {
    // sinon ajoute la quantité à la quantité deja presente et recalcule le prix total
    basket[index_exist][2] += parseInt(quantite);
    basket[index_exist][3] = formatMoneyAmount(
    basket[index_exist][2] * basket[index_exist][1]
    );
    let weightTotal = parseInt(quantite) * parseInt(weight);
    //console.log(weightTotal);
  }
  
  saveDataToDomStorage("basket", basket); //sauve le panier dans le storage
  if (basket != "") {
    let nbr = basket.length;
    $(".nbr").html(
      '<i class="fa fa-shopping-basket" aria-hidden="true"></i> Mon panier(' +
        nbr +
        ")");
  } else {
    $(".nbr").html(
      '<i class="fa fa-shopping-basket" aria-hidden="true"></i> Mon panier()'
    );
  }

}

/**
 * affiche le panier
 */
function showBasket() {
  //$('#basketc').css('display','block')
  const panier = document.getElementById("panier1");

  let somme = 0;
  console.log(panier);
  $("#panier1").empty();
  loadDataFromDomStorage("basket");
  let newQte = 0;
  let TotalWeigh = 0;

  if (basket != "") {
    for (let i = 0; i < basket.length; i++) {
      //affichage
      let tr = document.createElement("tr"); //création d'un tr
      let td1 = document.createElement("td"); //création td
      //td1.textContent = basket[i][5]
      td1.setAttribute("colspan", "1");
      let img = document.createElement("img");
      img.setAttribute("src", basket[i][5]);
      img.setAttribute("alt", basket[i][0]);
      td1.appendChild(img);
      tr.appendChild(td1); // ajoute le td dans le tr avec la class number
      let td2 = document.createElement("td");
      td2.textContent = basket[i][0];
      td2.setAttribute("colspan", "1");
      tr.appendChild(td2);
      let td3 = document.createElement("td");
      let prixUnitaire=basket[i][1]
      td3.textContent = financial(prixUnitaire)+ " €";
      tr.appendChild(td3).classList.add("number");
      let td4 = document.createElement("td");
      td4.textContent = basket[i][2];
      tr.appendChild(td4).classList.add("number");
      let td5 = document.createElement("td");
      td5.textContent = basket[i][3];
      tr.appendChild(td5).classList.add("number");
      //}
      let td6 = document.createElement("td");
      let button = document.createElement("button");
      button.setAttribute("type", "button");
      button.setAttribute("data-id", basket[i][4]); //ajoute un attribut data au boutton
      td6.appendChild(button).classList.add("icone_e", "btn");
      tr.appendChild(td6); /*.classList.add("number")*/
      let icon = document.createElement("i");
      button.appendChild(icon).classList.add("fa", "fa-trash");
      panier.appendChild(tr);
      somme += parseFloat(basket[i][1]) * parseFloat(basket[i][2]);
      console.log(somme);
      TotalWeigh += parseFloat(basket[i][2]) * parseFloat(basket[i][6]);
      console.log(TotalWeigh);
    }
    if (panier != "") {
      $("#totale").text(formatMoneyAmount(somme));
      $("#totalePoids").text(TotalWeigh / 1000 + "kg");
    } else {
      $("#totalePoids").text(formatMoneyAmount((somme = 0)));
      $("#totalePoids").text((TotalWeigh = 0));
    }
  } else {
    $(".tbbasket").css("display", "none");
    $(".hidden").css("display", "block");
  }
}

/**
 * supprime un element du panier
 */
function supprimer() {
  let id_product = $(this).data("id");
  for (let i = 0; i < basket.length; i++) {
    if (id_product == basket[i][4]) {
      basket.splice(i, 1);
      saveDataToDomStorage("basket", basket);
      break;
    }
  }
  showBasket();
}

/**
 * supprime le contenu du  panier
 */
function removeBasket() {
  localStorage.removeItem("basket");
  $("#panier1").empty();
}
