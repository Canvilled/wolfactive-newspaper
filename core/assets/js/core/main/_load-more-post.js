//Variables

//helper
function apiPostResult(offset, postLoadMoreContain) {
    let apiPostUrl = `${protocol}//${hostname}/wp-json/post-api/v1/post?showposts=` + offset;
    fetch(apiPostUrl)
        .then(result => {
            return result.json();
        })
        .then(data => {
            let content = ``;
            data.forEach((item, i) => {
                content += `
                <div class="popupar__post-item my-10">
                <div class="nw__post-item row-divide">
                  <div class="nw__image col-divide-4">
                    <img src="${item.thumbnail}" alt="Image">
                  </div>
                  <div class="nw__infomation col-divide-8">
                    <div class="nw__post-title nw__post-title--small">
                      <a href="${item.link}">${item.title}</a>
                    </div>
                    <div class="nw__editor-date open-sanrif">
                      <span class="date-time open-sanrif">${item.date}</span>
                    </div>
                  </div>
                </div>
              </div>
    `;
            })
            postLoadMoreContain.innerHTML = content;
        })
        .catch(error => console.log(error));
}
//Action

if (document.querySelector('.popular__post-load-more')) {
    let postCountShow = document.querySelector(".popular__post-load-more").getAttribute("data-number-post");
    let postDateShow = document.querySelector(".popular__post-load-more").getAttribute("show-date");
    let postLoadMoreContain = document.querySelector(".popular__post-load-more");
    let maxPostShow = parseInt(postCountShow) * 3;
    let loadMoreBtn = document.querySelector('#load-more-post'),
        closePostBtn = document.querySelector('#close-post'),
        loadImage = document.querySelector('.post__item-load-more-item'),
        offset = parseInt(postCountShow);
    closePostBtn.classList.add('d--none');
    if (postDateShow !== 1) {
        let postItemDateLoad = document.querySelectorAll('.popular__post-load-more .popupar__post-item .nw__post-item .nw__infomation >.nw__editor-date');
        postItemDateLoad.forEach((item, i) => {
            item.classList.add('d--none');
        })
    }
    loadMoreBtn.onclick = () => {
        offset = offset + maxPostShow / 3;
        console.log(offset);
        loadImage.classList.add('loading');
        loadImage.innerHTML = `<img style="width:64px; height:64px;" src="${urlImages}Dual-Ring-1s-200px.gif" alt="Loading Image">`;
        setTimeout(function() {
            loadImage.classList.remove('loading');
            apiPostResult(offset, postLoadMoreContain);
        }, 1000);
        if (offset === maxPostShow) {
            loadMoreBtn.classList.add('d--none');
            closePostBtn.classList.remove('d--none');
        }
    }
    closePostBtn.onclick = () => {
        offset = maxPostShow / 3;
        apiPostResult(offset, postLoadMoreContain);
        loadMoreBtn.classList.remove('d--none');
        closePostBtn.classList.add('d--none');
    }

}