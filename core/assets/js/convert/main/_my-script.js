"use strict";

var btnNav = document.querySelector('#navBtn');
var body = document.querySelector('body');
var closeNav = document.querySelector('.close__navbar');
var navContain = document.querySelector('.navbar__mb');
var subMenuNav = document.querySelectorAll('.navbar__mb .navbar__mb-container .menu-main-menu-container .menu>.menu-item>.sub-menu');
var menuNavArray = document.querySelectorAll('.navbar__mb .navbar__mb-container .menu-main-menu-container .menu>.menu-item');
var menuItemHasChild = document.querySelectorAll('.navbar__mb .navbar__mb-container .menu-main-menu-container .menu>.menu-item-has-children');
var openSearchNav = document.querySelector('.open-search-nav');
var closeSearchNav = document.querySelector('#closeSearchNav');
/* helper */
// function createArrow(item) {
//     let iconArrow = document.createElement("i");
//     item.appendChild(iconArrow);
//     iconArrow.classList.add('fas');
//     iconArrow.classList.add('fa-sort-down');
//     return iconArrow;
// }

/*helper*/

/* Action */
// if (document.querySelector('.popular__post-single')) {
//     let parent = document.querySelector('.popular__post-single-container'),
//         items = parent.querySelectorAll('.popupar__post-single-item'),
//         loadMoreBtn = document.querySelector('#load-more-post'),
//         closePostBtn = document.querySelector('#close-post'),
//         maxItems = 9;
//     [].forEach.call(items, function(item, idx) {
//         if (idx > maxItems / 3 - 1) {
//             item.classList.add('visually-hidden');
//         }
//     });
//     closePostBtn.classList.add('d--none');
//     loadMoreBtn.onclick = () => {
//         let hiddenPost = document.querySelectorAll('.visually-hidden');
//         [].forEach.call(hiddenPost, function(item, idx) {
//             if (idx < maxItems / 3) {
//                 item.classList.remove('visually-hidden');
//                 item.classList.add('visually-unset');
//             }
//             if (document.querySelectorAll('.visually-hidden').length === 0) {
//                 let hiddendLoadMore = document.querySelector('#load-more-post');
//                 hiddendLoadMore.classList.add('d--none');
//                 closePostBtn.classList.remove('d--none');
//             }
//         });
//     }
//     closePostBtn.onclick = () => {
//         let hiddenPost = document.querySelectorAll('.visually-unset');
//         [].forEach.call(hiddenPost, function(item, idx) {
//             if (hiddenPost.length > 0) {
//                 item.classList.remove('visually-unset');
//                 item.classList.add('visually-hidden');
//             }
//             if (document.querySelectorAll('.visually-unset').length === 0) {
//                 let hiddendClosePost = document.querySelector('#close-post');
//                 hiddendClosePost.classList.add('d--none');
//                 loadMoreBtn.classList.remove('d--none');
//             }
//         });
//     }
// }
// menuItemHasChild.forEach((item, i) => {
//     createArrow(item);
// })

subMenuNav.forEach(function (item, i) {
  item.classList.add('d--none');
});

if (menuNavArray.length !== 0 && subMenuNav.length !== 0) {
  menuNavArray.forEach(function (item, i) {
    item.onclick = function (event) {
      var checkLengthMenu = event.srcElement.children;

      if (item.classList.contains('active')) {
        item.classList.remove('active');
      } else {
        item.classList.add('active');
      }

      if (checkLengthMenu.length > 1) {
        var itemSubMenu = event.srcElement.children[1];

        if (itemSubMenu.classList.contains('d--none')) {
          itemSubMenu.classList.remove('d--none');
        } else {
          itemSubMenu.classList.add('d--none');
        }
      }
    };
  });
}

if (btnNav) {
  btnNav.onclick = function () {
    navContain.classList.remove('d--none');
    body.classList.add('scroll-bar-block');
  };
}

if (closeNav) {
  closeNav.onclick = function () {
    navContain.classList.add('d--none');
    body.classList.remove('scroll-bar-block');
  };
}

if (openSearchNav) {
  openSearchNav.onclick = function () {
    body.classList.add('scroll-bar-block');
  };
}

if (closeSearchNav) {
  closeSearchNav.onclick = function () {
    var searchNavFocus = document.querySelector(".search-focus-click");
    var searchLayoutNav = document.querySelector('.search__wrapper');
    body.classList.remove('scroll-bar-block');
    searchNavFocus.classList.add('d--none');
    searchLayoutNav.classList.add('d--none');
  };
}
/*Action*/