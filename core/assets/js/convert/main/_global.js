"use strict";

var iframe = document.querySelectorAll('iframe');
var img = document.querySelectorAll('img');
var video = document.querySelectorAll('video');
var protocol = window.location.protocol;
var hostname = window.location.hostname;

function iframeResposive() {
  for (i = 0; i < iframe.length; i++) {
    iframe[i].classList.add('lazy');
  }
}

function imgResposive() {
  for (i = 0; i < img.length; i++) {
    img[i].classList.add('lazy');
  }
}

function videoResposive() {
  for (i = 0; i < video.length; i++) {
    video[i].classList.add('lazy');
  }
}

iframe ? iframeResposive() : {};
img ? imgResposive() : {};
video ? videoResposive() : {};
var lazyLoadInstance = new LazyLoad({
  elements_selector: ".lazy"
});
$(function () {
  var $sidebar = $("#sidebar"),
      $window = $(window),
      offset = $sidebar.offset(),
      topPadding = 15;
  $window.scroll(function () {
    if ($sidebar.length) if ($window.scrollTop() > offset.top) {
      $sidebar.stop().animate({
        marginTop: $window.scrollTop() - offset.top + topPadding + 175
      });
    } else {
      $sidebar.stop().animate({
        marginTop: 0
      });
    }
  });
});