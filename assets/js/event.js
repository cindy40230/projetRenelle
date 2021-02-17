/**
 * Affichage de l'utilisateur pour modifivation dans info personnel
 */
function showUser() {
  $("#infosuser").css("display", "block");
  $(".showForm").hide(500);
}
/*
 *Affichage de la div info "produit ajouter au panier"
 */
function showInfo() {
  
  let quantite = $(".quantite").val();
  if(quantite !== "" && quantite>0){
    console.log('cc');
  $("#info").css("display", "block").fadeIn().delay(3000).fadeOut();
 
    
  }
}
/*
 *Affichage du menu  version mobile
 */
function affichage() {
  let menu = document.querySelector(`.nav-menu`);
  menu.classList.toggle("active");
}
