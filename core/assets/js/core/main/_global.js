var iframe = document.querySelectorAll('iframe');
var img = document.querySelectorAll('img');
var video = document.querySelectorAll('video');
var protocol = window.location.protocol;
var hostname = window.location.hostname;
function iframeResposive(){
  for ( let i = 0; i < iframe.length; i++) {
      iframe[i].classList.add('lazy');
  }
}
function imgResposive(){
  for ( let i = 0; i < img.length; i++) {
      img[i].classList.add('lazy');
  }
}
function videoResposive(){
  for ( let i = 0; i < video.length; i++) {
      video[i].classList.add('lazy');
  }
}
iframe ? iframeResposive(): {};
img ? imgResposive(): {};
video ? videoResposive():{};
var lazyLoadInstance = new LazyLoad({elements_selector: ".lazy"});
