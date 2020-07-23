"use strict";

var searchResultDiv = document.querySelector("#searchResult");
var searchField = document.querySelector(".search-field");

function openSearch() {
  var openSearchForm = document.querySelector('.open-search');
  var searchForm = document.querySelector('.search__wrapper');

  if (searchForm.style.display === 'none') {
    searchForm.style.display = 'block';
  } else {
    searchForm.style.display = 'none';
  }
}

function ResultSearch() {
  var apiUrl = '';
  setTimeout(function () {
    if (searchField.value) {
      apiUrl = window.location.pathname + "wp-json/post-api/v1/search?term=" + searchField.value;
    }

    fetch(apiUrl).then(function (result) {
      //console.log(result);
      return result.json();
    }).then(function (data) {
      //console.log(data);
      var content = "";
      data.forEach(function (item, i) {
        content += "\n                <div class=\"Post__item\">\n                  <div  class=\"Post__item-img\">\n                    <a href=\"".concat(item.link, "\">\n                        ").concat(item.thumbnail, "\n                    </a>\n                  </div>\n                  <div class=\"Post__item-content\">\n                      <div class=\"date\">\n                        <i class=\"far fa-calendar-alt\"></i> <span>").concat(item.date, "</span>\n                      </div>\n                      <h4 class=\"Post__item-title title--item\">\n                        <a href=\"").concat(item.link, "\">\n                          ").concat(item.title, "\n                        </a>\n                      </h4>\n                  </div>\n                </div>\n            ");
      });
      searchResultDiv.innerHTML = content;
    }).catch(function (error) {
      return console.log(error);
    });
  }, 2000);
}

searchField.onkeydown = function () {
  ResultSearch();
};