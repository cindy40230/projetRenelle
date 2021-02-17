"use strict";
/**
 * afficher et cacher la banière cookies
 */
(function ($) {
  if ($.cookie("cookiebar") === undefined) {
    $("main").append(
      '<div class ="cookies-bar" id="cookieConsent"><p>En poursuivant votre navigation sur ce site, vous acceptez l\'utilisation de Cookies afin de vous garantir les fonctionnalités nécessaires du site et le bon déroulement de votre commande.</p><a class="btn" href="index.php?controller=information&action=mentionlegal" target="_blank"> Plus d informations</a><a class="btn" href="#" class="cookieConsentOK" id="cookieCancel"> Refuser les cookies</a><a class="btn" href="#" class="cookieConsentOK" id="cookieOK">J\'accèpte </a></div>'
    );
    
    //masquer la barre de cookie si le cookies est accepté
    $("#cookieOK").click(function (e) {
      e.preventDefault();
      $("#cookieConsent").fadeOut();
      $.cookie("cookiebar", "viewed", { expired: 30 * 1 });
    });
    
    //masquer la barre de cookie si il est refusé
    $("#cookieCancel").click(function (e) {
      e.preventDefault();
      $("#cookieConsent").fadeOut();
      $.cookie("cookiebar", "viewed", { expired: 30 * 1 });
      $.cookie("cookieCancel", "1", { expired: 30 * 1 });
    });
  }
  // si les cookies sont accepté 
  if ($.cookie("cookieCancel") === undefined) {
      //code analytics en attente
  }
})(jQuery);
