"use strict";

// Equivalent de money_format() / number_format() en PHP
function formatMoneyAmount(amount) {
  let formatter;
  formatter = new Intl.NumberFormat("fr", {
    currency: "eur",
    maximumFractionDigits: 2,
    minimumFractionDigits: 2,
    style: "currency",
  });

  return formatter.format(amount);
}

/**
 * chargement du storage
 */
function loadDataFromDomStorage(name) {
  let jsonData;
  jsonData = window.localStorage.getItem(name);
  return JSON.parse(jsonData);
}
/**
 * Sauvegarde du storage 
 * @param {*} name 
 * @param {*} data 
 */
function saveDataToDomStorage(name, data) {
  let jsonData;
  jsonData = JSON.stringify(data);
  window.localStorage.setItem(name, jsonData);
}

function getRequestUrl() {
  let requestUrl;
  requestUrl = window.location.href;
  requestUrl = requestUrl.substr(0, requestUrl.indexOf("/index.php") + 10);
  return requestUrl;
}
/**
 * convertis en kg
 * @param num 
 */
function WeightconverterKg(num) {
  return num / 1000 + "kg";
}

/**
 * format a 2 chiffre apres virgule
 * 
 * */
function financial(x) {
  return Number.parseFloat(x).toFixed(2);
}