"use strict";

/**
 * verifier une adresse mail
 * @param email
 */
function checkEmail(email) {
  let resutl = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return resutl.test(email);
}

//Lors de la création du compte utilisateur
$("#formRegistration").on("submit", function (evenement) {
  let zipcode = $("#zipCode").val();
  let phone = $("#phone").val();
  let email = $("#email").val();
  let password = $("#password").val();
  
  /**
   * controle zipcode
   */
  //si l element est different de 5
  if (zipcode.length != 5) {
    evenement.preventDefault();
    $("#typePass").html(
      '<p class="danger">Indiquez un code postal à 5 chiffres</p>'
    );
    return;
  }
  //si zipcode n'est pas un chiffre
  if (isNaN(zipcode)) {
    evenement.preventDefault();
    $("#typePass").html(
      '<p class="danger">Un code postal ne peut pas contenir de lettres</p>'
    );
    return;
  }
  
  /**
   * controle phone
   */

  //si l element est different de 10
  if (phone.length != 10) {
    evenement.preventDefault();
    $("#typePass").html(
      '<p class="danger">saisisez un numero de telephone à 10 chiffres</p>'
    );
    return;
  }
  //si phone n'est pas un chiffre
  if (isNaN(phone)) {
    evenement.preventDefault();
    $("#typePass").html(
      '<p class="danger">Un numéro de tel ne peut pas contenir de lettres ni de caractère speciaux</p>'
    );
    return;
  }
  
  /**
   * controle email
   */
  if (!checkEmail(email)) {
    evenement.preventDefault();
    $("#typePass").html('<p class="danger">Adresse e-mail non valide</p>');
    return;
  }
  
  /**
   * vérification du mot de passe
   */

  //Au moins 1 caractère majuscule,1 caractère minuscule,1 chiffre,1 caractère spécial,Minimum 8 caractères.
  if (
    password.match(/[0-9]/g) &&
    password.match(/[A-Z]/g) &&
    password.match(/[a-z]/g) &&
    password.match(/[^a-zA-Z\d]/g) &&
    password.length >= 8
  ) {
    $("#typePass").html('<p class="succes"> Mot de passe fort</p>');
  } else {
    evenement.preventDefault();
    $("#typePass").html(
      '<p class="danger"> Mot de passe Faible ,votre mot de passe doit contenir au minimum 8 caractères,1 caractère en majuscule,1 caractère en minuscule,1 chiffre,1 caractère spécial.</p>'
    );
  }
});

//Lors de la création du compte administrateur
$("#formRegistrationAdmin").on("submit", function (evenement) {
  let email = $("#email").val();
  let password = $("#password").val();
  console.log(email)
  console.log(password)

  /**
   * controle email
   */
  if (!checkEmail(email)) {
    evenement.preventDefault();
    $("#typePass").html('<p class="danger">Adresse e-mail non valide</p>');
    return;
  }
  /**
   * vérification du mot de passe
   */
  if (
    password.match(/[0-9]/g) &&
    password.match(/[A-Z]/g) &&
    password.match(/[a-z]/g) &&
    password.match(/[^a-zA-Z\d]/g) &&
    password.length >= 8
  ) {
    $("#typePass").html('<p class="succes">Mot de passe fort</p>');
  } else {
    evenement.preventDefault();
    $("#typePass").html(
      '<p class="danger">Mot de passe Faible ,votre mot de passe doit contenir au moins Minimum 8 caractères,1 caractère en majuscule,1 caractère en minuscule,1 chiffre,1 caractère spécial.</p>'
    );
  }
});

//Lors de la modification du mot de passe
$("#infosuser").on("submit", function (evenement) {
  console.log("ok");
  let password1 = $("#password1").val();
  let password2 = $("#password2").val();
  /**
   * vérification du mot de passe
   */
  if (
    password1.match(/[0-9]/g) &&
    password1.match(/[A-Z]/g) &&
    password1.match(/[a-z]/g) &&
    password1.match(/[^a-zA-Z\d]/g) &&
    password1.length >= 8 &&
    password2.match(/[0-9]/g) &&
    password2.match(/[A-Z]/g) &&
    password2.match(/[a-z]/g) &&
    password2.match(/[^a-zA-Z\d]/g) &&
    password2.length >= 8
  ) {
    $("#typePass").html('<p class="succes"> Mot de passe fort </p>');
  } else if (password1 != password2) {
    evenement.preventDefault();
    $("#typePass").html('<p class="danger"> mot de passe non identique</p>');
  } else {
    evenement.preventDefault();
    $("#typePass").html(
      '<p class="danger">Mot de passe Faible ,votre mot de passe doit contenir au moins Minimum 8 caractères,1 caractère en majuscule,1 caractère en minuscule,1 chiffre,1 caractère spécial.</p>'
    );
  }
});