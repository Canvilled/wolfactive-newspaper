"use strict";

var searchResultDiv = document.querySelector("#searchResult");
var searchField = document.querySelector(".search-field");
var searchContainFocus = document.querySelector(".search-focus-click");
var searchForm = document.querySelector('.search__wrapper');
var openSearchFormBtn = document.querySelector('.open-search'); // function openSearch() {
//     if (searchForm.style.display === 'none') {
//         searchForm.style.display = 'block';
//         searchContainFocus.classList.remove('d--none');
//     } else {
//         searchForm.style.display = 'none';
//         searchContainFocus.classList.add('d--none');
//     }
// }
// function closeSearch() {
// }

searchField.onkeydown = function () {
  ResultSearch();
};

openSearchFormBtn.onclick = function () {
  searchForm.classList.remove('d--none');
  searchContainFocus.classList.remove('d--none');
};

searchContainFocus.onclick = function () {
  // let searchFocus = document.querySelector(".search-focus-click");
  // let closeSearchField = document.querySelector(".search-field");
  searchForm.classList.add('d--none');
  searchContainFocus.classList.add('d--none');
};

function ResultSearch() {
  var apiUrl = '';
  setTimeout(function () {
    if (searchField.value) {
      apiUrl = "".concat(protocol, "//").concat(hostname, "/wp-json/post-api/v1/search?term=") + searchField.value;
    }

    fetch(apiUrl).then(function (result) {
      //console.log(result);
      return result.json();
    }).then(function (data) {
      //console.log(data);
      var content = "";
      data.forEach(function (item, i) {
        content += "\n                <div class=\"post__item my-20\">\n                  <div  class=\"post__item-img\">\n                    <a href=\"".concat(item.link, "\">\n                        ").concat(item.thumbnail, "\n                    </a>\n                  </div>\n                  <div class=\"post__item-content\">\n                      <div class=\"date\">\n                        <i class=\"far fa-calendar-alt\"></i> <span>").concat(item.date, "</span>\n                      </div>\n                      <h4 class=\"post__item-title title--item\">\n                        <a href=\"").concat(item.link, "\">\n                          ").concat(item.title, "\n                        </a>\n                      </h4>\n                  </div>\n                </div>\n            ");
      });
      searchResultDiv.innerHTML = content;
    }).catch(function (error) {
      return console.log(error);
    });
  }, 1000);
}