"use strict";

var searchResultDiv = document.querySelector("#searchResult");
var searchField = document.querySelector(".search-field");
var searchContainFocus = document.querySelector(".search-focus-click");
var searchForm = document.querySelector('.search__wrapper');
var openSearchFormBtn = document.querySelector('.open-search');

if (searchField) {
  searchField.onkeydown = function () {
    ResultSearch();
  };
}

if (openSearchFormBtn) openSearchFormBtn.onclick = function () {
  searchForm.classList.remove('d--none');
  searchContainFocus.classList.remove('d--none');
};
if (searchContainFocus) searchContainFocus.onclick = function () {
  searchForm.classList.add('d--none');
  searchContainFocus.classList.add('d--none');
};

function ResultSearch() {
  var apiUrl = '';
  setTimeout(function () {
    if (searchField.value) {
      console.log(searchField.value);

      if (searchResultDiv.classList.contains('d--none')) {
        searchResultDiv.classList.remove('d--none');
      }

      apiUrl = "".concat(protocol, "//").concat(hostname, "/wp-json/post-api/v1/search?term=") + searchField.value;
    } else if (searchField.value === "" && searchResultDiv.classList.contains('d--none') === false) {
      searchResultDiv.classList.add('d--none');
    }

    fetch(apiUrl).then(function (result) {
      return result.json();
    }).then(function (data) {
      var content = "";
      data.forEach(function (item, i) {
        content += "\n                <div class=\"post__item col-divide-6 col-divide-md-12 row-divide\">\n                  <div  class=\"post__item-img col-divide-3\">\n                    <a href=\"".concat(item.link, "\">\n                        <img src=\"").concat(item.thumbnail, "\" alt=\"img\">\n                    </a>\n                  </div>\n                  <div class=\"post__item-content col-divide-9\">\n                      <h4 class=\"post__item-title title--item eclips\">\n                        <a href=\"").concat(item.link, "\">\n                          ").concat(item.title, "\n                        </a>\n                      </h4>\n                      <div class=\"date open-sanrif\">\n                        <i class=\"far fa-calendar-alt\"></i> <span>").concat(item.date, "</span>\n                      </div>\n                      <p class=\"readmore\"><a href=\"").concat(item.link, "\">\u0110\u1ECDc ti\u1EBFp</a></p>\n                  </div>\n                </div>\n            ");
      });

      if (data.length === 0) {
        searchResultDiv.innerHTML = 'Không Có Bài Viết';
      } else {
        searchResultDiv.innerHTML = content;
      }
    }).catch(function (error) {
      return console.log(error);
    });
  }, 500);
}