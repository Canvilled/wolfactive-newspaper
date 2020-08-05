"use strict";

//Variables
//helper
function apiPostResult(offset, postLoadMoreContain) {
  var apiPostUrl = "".concat(protocol, "//").concat(hostname, "/wp-json/post-api/v1/post?showposts=") + offset;
  fetch(apiPostUrl).then(function (result) {
    return result.json();
  }).then(function (data) {
    var content = "";
    data.forEach(function (item, i) {
      content += "\n                <div class=\"popupar__post-item my-10\">\n                <div class=\"nw__post-item row-divide\">\n                  <div class=\"nw__image col-divide-4\">\n                    <img src=\"".concat(item.thumbnail, "\" alt=\"Image\">\n                  </div>\n                  <div class=\"nw__infomation col-divide-8\">\n                    <div class=\"nw__post-title nw__post-title--small\">\n                      <a href=\"").concat(item.link, "\">").concat(item.title, "</a>\n                    </div>\n                    <div class=\"nw__editor-date open-sanrif\">\n                      <span class=\"date-time open-sanrif\">").concat(item.date, "</span>\n                    </div>\n                  </div>\n                </div>\n              </div>\n    ");
    });
    postLoadMoreContain.innerHTML = content;
  }).catch(function (error) {
    return console.log(error);
  });
} //Action


if (document.querySelector('.popular__post-load-more')) {
  var postCountShow = document.querySelector(".popular__post-load-more").getAttribute("data-number-post");
  var postDateShow = document.querySelector(".popular__post-load-more").getAttribute("show-date");
  var postLoadMoreContain = document.querySelector(".popular__post-load-more");
  var maxPostShow = parseInt(postCountShow) * 3;
  var loadMoreBtn = document.querySelector('#load-more-post'),
      closePostBtn = document.querySelector('#close-post'),
      loadImage = document.querySelector('.post__item-load-more-item'),
      offset = parseInt(postCountShow);
  closePostBtn.classList.add('d--none');

  if (postDateShow !== 1) {
    var postItemDateLoad = document.querySelectorAll('.popular__post-load-more .popupar__post-single-item>.nw__editor-date');
    postItemDateLoad.forEach(function (item, i) {
      item.classList.add('d--none');
    });
  }

  loadMoreBtn.onclick = function () {
    offset = offset + maxPostShow / 3;
    console.log(offset);
    loadImage.classList.add('loading');
    loadImage.innerHTML = "<img style=\"width:64px; height:64px;\" src=\"".concat(urlImages, "Dual-Ring-1s-200px.gif\" alt=\"Loading Image\">");
    setTimeout(function () {
      loadImage.classList.remove('loading');
      apiPostResult(offset, postLoadMoreContain);
    }, 1000);

    if (offset === maxPostShow) {
      loadMoreBtn.classList.add('d--none');
      closePostBtn.classList.remove('d--none');
    }
  };

  closePostBtn.onclick = function () {
    offset = maxPostShow / 3;
    apiPostResult(offset, postLoadMoreContain);
    loadMoreBtn.classList.remove('d--none');
    closePostBtn.classList.add('d--none');
  };
}