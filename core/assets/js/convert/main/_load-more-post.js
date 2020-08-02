"use strict";

//Variables
//helper
function apiPostResult() {
  var apiPostUrl = "".concat(protocol, "//").concat(hostname, "/wp-json/post-api/v1/post");
  fetch(apiPostUrl).then(function (result) {
    return result.json();
  }).then(function (data) {
    var content = "";
    data.forEach(function (item, i) {
      content += "\n        <div class=\"post__item col-divide-6 col-divide-md-12 row-divide\">\n          <div  class=\"post__item-img col-divide-3\">\n            <a href=\"".concat(item.link, "\">\n                <img src=\"").concat(item.thumbnail, "\" alt=\"img\">\n            </a>\n          </div>\n          <div class=\"post__item-content col-divide-9\">\n              <h4 class=\"post__item-title title--item eclips\">\n                <a href=\"").concat(item.link, "\">\n                  ").concat(item.title, "\n                </a>\n              </h4>\n              <div class=\"date open-sanrif\">\n                <i class=\"far fa-calendar-alt\"></i> <span>").concat(item.date, "</span>\n              </div>\n              <p class=\"readmore\"><a href=\"").concat(item.link, "\">\u0110\u1ECDc ti\u1EBFp</a></p>\n          </div>\n        </div>\n    ");
    });
    searchResultDiv.innerHTML = content;
  }).catch(function (error) {
    return console.log(error);
  });
} //Action