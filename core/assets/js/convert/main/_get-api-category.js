"use strict";

/*VARIABLES*/
var subMenuArray = document.querySelectorAll('.header .menu>.menu-item>.sub-menu');
var menuArray = document.querySelectorAll('.header .menu>.menu-item');
var urlImages = "".concat(protocol, "//").concat(hostname, "/wp-content/themes/wolfactive-newspaper/core/assets/images/");
/*end variable*/

/*Helper*/

function convertTextToSlug(event) {
  var categoryText = event.srcElement.childNodes[0].innerHTML.toLowerCase();
  var categoryArray = categoryText.split(" ");
  var category = "";

  if (categoryArray.length > 1) {
    category = categoryArray.join('-');
  } else if (categoryArray.length === 1) {
    category = categoryArray[0];
  }

  return category;
}

function createPostList(item) {
  var postDisplay = document.createElement("div");
  item.appendChild(postDisplay);
  postDisplay.classList.add('display--post');
  postDisplay.classList.add('loading');
  postDisplay.innerHTML = "<img style=\"width:64px; height:64px;\" src=\"".concat(urlImages, "Dual-Ring-1s-200px.gif\" alt=\"Loading Image\">");
  return postDisplay;
}

function createFlick() {
  var flick = document.querySelector('.display--post');
  var flkty = new Flickity(flick, {
    // options
    draggable: true,
    pageDots: false,
    cellAlign: 'left',
    contain: true,
    groupCells: 3
  });
} // function removePostList(){
//   let postDisplay=document.querySelector('.display--post');
//   postDisplay.remove();
// }


function getListPost(category, showPost) {
  var apiUrlMail = "".concat(protocol, "//").concat(hostname, "/wp-json/category-api/v1/cat-name");
  console.log(apiUrlMail);
  fetch(apiUrlMail, {
    method: 'POST',
    mode: 'cors',
    headers: {
      'Content-Type': 'application/json',
      // sent request
      'Accept': 'application/json' // expected data sent back

    },
    body: JSON.stringify({
      'category': category
    })
  }).then(function (response) {
    return response.json();
  }).then(function (data) {
    showPost.innerHTML = "";
    setTimeout(function () {
      showPost.classList.remove("loading");
    }, 3000);
    var slidePost = displayPost(data, showPost);
    createFlick();
    getListPostChild(slidePost);
  }).catch(function (err) {
    return console.log(err);
  });
}

function displayPost(data, showPost) {
  var content = "";
  data.forEach(function (item, i) {
    content += "\n    <div class=\"display--post-item\">\n      <div class=\"post-item-thumbnail\">\n        <a href=\"".concat(item.link, "\"><img src=\"").concat(item.thumbnail, "\" alt=\"image\"></a>\n      </div>\n      <div class=\"post-item-title\">\n        <a href=\"").concat(item.link, "\">").concat(item.title, "</a>\n      </div>\n      <div class=\"post-item-date\">\n        ").concat(item.date, "\n      </div>\n    </div>");
  });
  showPost.innerHTML = content;
  return showPost;
}

function getListPostChild(slidePost) {
  var listSubMenuArray = document.querySelectorAll('.header .menu>.menu-item>.sub-menu>.menu-item'); // console.log(slidePost);

  listSubMenuArray.forEach(function (item, i) {
    item.onmouseenter = function (event) {
      var postDisplay = document.querySelector('.display--post');

      if (postDisplay) {
        postDisplay.remove();
      }

      var checkLengthMenu = event.srcElement.children;
      var category = convertTextToSlug(event);
      var showPost = createPostList(checkLengthMenu[0]);
      getListPost(category, showPost);
    };
  });
} // function sliderPostList(slidePost){
//
// }

/*Helper*/

/*action*/


if (subMenuArray.length != 0 && menuArray.length != 0) menuArray.forEach(function (item, i) {
  item.onmouseenter = function (event) {
    console.log(event);
    var postDisplay = document.querySelector('.display--post');

    if (postDisplay) {
      postDisplay.remove();
    }

    var checkLengthMenu = event.srcElement.children;

    if (checkLengthMenu.length > 1) {
      var category = convertTextToSlug(event);
      var showPost = createPostList(checkLengthMenu[1]);
      getListPost(category, showPost);
    }
  };
});
/*action*/