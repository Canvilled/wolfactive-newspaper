var searchResultDiv = document.querySelector("#searchResult");
var searchField = document.querySelector(".search-field");
var searchContainFocus = document.querySelector(".search-focus-click");
var searchForm = document.querySelector('.search__wrapper');
var openSearchFormBtn = document.querySelector('.open-search');

// function openSearch() {
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

searchField.onkeydown = () => {
    ResultSearch();
}

openSearchFormBtn.onclick = () => {
    searchForm.classList.remove('d--none');
    searchContainFocus.classList.remove('d--none');
}

searchContainFocus.onclick = () => {
    // let searchFocus = document.querySelector(".search-focus-click");
    // let closeSearchField = document.querySelector(".search-field");
    searchForm.classList.add('d--none');
    searchContainFocus.classList.add('d--none');
}

function ResultSearch() {
    var apiUrl = '';
    setTimeout(function() {
        if (searchField.value) {
            apiUrl = `${protocol}//${hostname}/wp-json/post-api/v1/search?term=` + searchField.value;
        }
        fetch(apiUrl)
            .then(result => {
                //console.log(result);
                return result.json();
            })
            .then(data => {
                //console.log(data);
                let content = ``;
                data.forEach((item, i) => {
                    content += `
                <div class="post__item my-20">
                  <div  class="post__item-img">
                    <a href="${item.link}">
                        ${item.thumbnail}
                    </a>
                  </div>
                  <div class="post__item-content">
                      <div class="date">
                        <i class="far fa-calendar-alt"></i> <span>${item.date}</span>
                      </div>
                      <h4 class="post__item-title title--item">
                        <a href="${item.link}">
                          ${item.title}
                        </a>
                      </h4>
                  </div>
                </div>
            `;
                })
                searchResultDiv.innerHTML = content;
            })
            .catch(error => console.log(error));

    }, 1000);

}