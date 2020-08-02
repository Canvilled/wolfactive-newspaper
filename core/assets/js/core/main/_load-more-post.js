//Variables

//helper
function apiPostResult() {
    let apiPostUrl = `${protocol}//${hostname}/wp-json/post-api/v1/post`;
    fetch(apiPostUrl)
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
            searchResultDiv.innerHTML = content;
        })
        .catch(error => console.log(error));
}
//Action