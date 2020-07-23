var searchResultDiv = document.querySelector("#searchResult");
var searchField = document.querySelector(".search-field");
function openSearch(){
  var openSearchForm=document.querySelector('.open-search');
  var searchForm = document.querySelector('.search__wrapper');
  if(searchForm.style.display==='none'){
      searchForm.style.display='block';
  } else{
    searchForm.style.display='none';
  }
}
function ResultSearch(){
  var apiUrl='';
  setTimeout(function(){
    if(searchField.value){
      apiUrl =window.location.pathname+`wp-json/post-api/v1/search?term=`+searchField.value;
    }
    fetch(apiUrl)
    .then(result => {
      //console.log(result);
      return result.json();
    })
    .then(data => {
      //console.log(data);
      let content= ``;
      data.forEach((item,i)=>{
      content += `
                <div class="Post__item">
                  <div  class="Post__item-img">
                    <a href="${item.link}">
                        ${item.thumbnail}
                    </a>
                  </div>
                  <div class="Post__item-content">
                      <div class="date">
                        <i class="far fa-calendar-alt"></i> <span>${item.date}</span>
                      </div>
                      <h4 class="Post__item-title title--item">
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

  }, 2000);

}

searchField.onkeydown = () =>{
  ResultSearch();
}
