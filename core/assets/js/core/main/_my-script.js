var parent = document.querySelector('.popular__post-single-container'),
    items  = parent.querySelectorAll('.popupar__post-single-item'),
    loadMoreBtn =  document.querySelector('#load-more-post'),
    closePostBtn = document.querySelector('#close-post'),
    maxItems = 9;



[].forEach.call(items, function(item, idx){
    if (idx > maxItems/3 - 1) {
        item.classList.add('visually-hidden');
    }
});

closePostBtn.classList.add('d--none');

loadMoreBtn.onclick = () => {
  let hiddenPost = document.querySelectorAll('.visually-hidden');
  [].forEach.call(hiddenPost, function(item, idx){
      if (idx < maxItems/3) {
          item.classList.remove('visually-hidden');
          item.classList.add('visually-unset');
      }
      if ( document.querySelectorAll('.visually-hidden').length === 0) {
          let hiddendLoadMore = document.querySelector('#load-more-post');
          hiddendLoadMore.classList.add('d--none');
          closePostBtn.classList.remove('d--none');
      }
  });
}

closePostBtn.onclick = () => {
  let hiddenPost = document.querySelectorAll('.visually-unset');
  [].forEach.call(hiddenPost, function(item, idx){
      if (hiddenPost.length > 0) {
          item.classList.remove('visually-unset');
          item.classList.add('visually-hidden');
      }
      if ( document.querySelectorAll('.visually-unset').length === 0) {
          let hiddendClosePost = document.querySelector('#close-post');
          hiddendClosePost.classList.add('d--none');
          loadMoreBtn.classList.remove('d--none');
      }
  });
}
