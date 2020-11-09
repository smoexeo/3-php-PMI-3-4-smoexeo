"use strict";

var requestURL = 'https://jsonplaceholder.typicode.com/comments';
var xhr = new XMLHttpRequest();
xhr.open('GET', requestURL);
xhr.responseType = 'json';

xhr.onload = function () {
  console.log(xhr.response);
};

xhr.onerror = function () {
  console.log(xhr.response);
};

xhr.send();