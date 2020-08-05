var searchResultDiv = document.querySelector("#searchResult");
var searchField = document.querySelector(".search-field");
var searchContainFocus = document.querySelector(".search-focus-click");
var searchForm = document.querySelector('.search__wrapper');
var openSearchFormBtn = document.querySelector('.open-search');

if (searchField) {
    searchField.onkeydown = () => {
        ResultSearch();
    }
}

if (openSearchFormBtn)
    openSearchFormBtn.onclick = () => {
        searchForm.classList.remove('d--none');
        searchContainFocus.classList.remove('d--none');
    }
if (searchContainFocus)
    searchContainFocus.onclick = () => {
        searchForm.classList.add('d--none');
        searchContainFocus.classList.add('d--none');
    }

function ResultSearch() {
    var apiUrl = '';
    setTimeout(function() {
        if (searchField.value) {
            console.log(searchField.value);
            if (searchResultDiv.classList.contains('d--none')) { searchResultDiv.classList.remove('d--none'); }
            apiUrl = `${protocol}//${hostname}/wp-json/post-api/v1/search?term=` + searchField.value;
        } else if (searchField.value === "" && searchResultDiv.classList.contains('d--none') === false) {
            searchResultDiv.classList.add('d--none');
        }
        fetch(apiUrl)
            .then(result => {
                return result.json();
            })
            .then(data => {
                let content = ``;
                data.forEach((item, i) => {
                    content += `
                <div class="post__item col-divide-6 col-divide-md-12 row-divide">
                  <div  class="post__item-img col-divide-3">
                    <a href="${item.link}">
                        <img src="${item.thumbnail}" alt="img">
                    </a>
                  </div>
                  <div class="post__item-content col-divide-9">
                      <h4 class="post__item-title title--item eclips">
                        <a href="${item.link}">
                          ${item.title}
                        </a>
                      </h4>
                      <div class="date open-sanrif">
                        <i class="far fa-calendar-alt"></i> <span>${item.date}</span>
                      </div>
                      <p class="readmore"><a href="${item.link}">Đọc tiếp</a></p>
                  </div>
                </div>
            `;
                })
                if (data.length === 0) {
                    searchResultDiv.innerHTML = 'Không Có Bài Viết';
                } else {
                    searchResultDiv.innerHTML = content;
                }
            })
            .catch(error => console.log(error));

    }, 500);

}