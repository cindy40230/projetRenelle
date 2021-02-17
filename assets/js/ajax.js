"use strict";


/**
 *supprimer d'un element dans l'administration 
 */
$(".supprimer").on("click", function (event) {
  event.preventDefault();
  const reponse = confirm("êtes vous sûr??");
  if (reponse) {
    const element = $(this);
    console.log("ici on va faire la suppression");
    const url = $(this).attr("href");
    console.log(url);
    $.get(url)
      .done(function (data) {
        //console.log(data);
        const data_json = JSON.parse(data);
        if (data_json.result == "ok") {
          element.parent().parent().remove();
        } else {
          alert("erreur");
        }
      })
      .fail(function () {
        alert("error");
      });
  }
});
