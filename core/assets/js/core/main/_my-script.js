var parent = document.querySelector('.popular__post-container'),
    items  = parent.querySelectorAll('.popupar__post-item'),
    loadMoreBtn =  document.querySelector('#load-more-post'),
    maxItems = 10,
    hiddenClass = "visually-hidden";


[].forEach.call(items, function(item, idx){
    if (idx > maxItems/2 - 1) {
        item.classList.add(hiddenClass);
    }
});

loadMoreBtn.addEventListener('click', function(){

  [].forEach.call(document.querySelectorAll('.' + hiddenClass), function(item, idx){
      console.log(item);
      if (idx < maxItems/2 - 1) {
          item.classList.remove(hiddenClass);
      }

      if ( document.querySelectorAll('.' + hiddenClass).length === 0) {
          loadMoreBtn.style.display = 'none';
      }

  });

});
