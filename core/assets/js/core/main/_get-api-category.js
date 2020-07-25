/*VARIABLES*/
var subMenuArray = document.querySelectorAll('.header .menu>.menu-item>.sub-menu');
var menuArray = document.querySelectorAll('.header .menu>.menu-item');
var urlImages = `${protocol}//${hostname}/wp-content/themes/wolfactive-newspaper/core/assets/images/`;
/*end variable*/

/*Helper*/
function convertTextToSlug (event){
  let categoryText = event.srcElement.childNodes[0].innerHTML.toLowerCase();
  let categoryArray = categoryText.split(" ");
  let category = ``;
  if(categoryArray.length > 1){
    category = categoryArray.join('-');
  } else if(categoryArray.length===1){
    category = categoryArray[0];
  }
  return category;
}

function createPostList(item){
    let postDisplay=document.createElement("div");

    item.appendChild(postDisplay);
    postDisplay.classList.add('display--post');
    postDisplay.classList.add('loading');
    postDisplay.innerHTML=`<img style="width:64px; height:64px;" src="${urlImages}Dual-Ring-1s-200px.gif" alt="Loading Image">`;
    return postDisplay;
}

function createFlick(){
  var flick = document.querySelector('.display--post');
  var flkty = new Flickity( flick, {
    // options
    draggable: true,
    pageDots: false,
    cellAlign: 'left',
    contain: true,
    groupCells: 3,
  });
}
// function removePostList(){
//   let postDisplay=document.querySelector('.display--post');
//   postDisplay.remove();
// }

function getListPost(category,showPost){
  let apiUrlMail =`${protocol}//${hostname}/wp-json/category-api/v1/cat-name`;
  console.log(apiUrlMail);
        fetch(apiUrlMail,{
            method: 'POST',
            mode:    'cors',
            headers: {
            'Content-Type': 'application/json',  // sent request
            'Accept':       'application/json'   // expected data sent back
            },
            body: JSON.stringify({'category': category})
        })
        .then(response => response.json())
        .then(data => {
          showPost.innerHTML=``;
          setTimeout(function(){
            showPost.classList.remove("loading");
          },3000)
          let slidePost = displayPost(data,showPost);
          createFlick();
          getListPostChild(slidePost);
        })
        .catch(err => console.log(err));
}

function displayPost(data,showPost){
  let content=``;
  data.forEach((item, i) => {
    content += `
    <div class="display--post-item">
      <div class="post-item-thumbnail">
        <a href="${item.link}"><img src="${item.thumbnail}" alt="image"></a>
      </div>
      <div class="post-item-title">
        <a href="${item.link}">${item.title}</a>
      </div>
      <div class="post-item-date">
        ${item.date}
      </div>
    </div>`;
  });
  showPost.innerHTML = content;
  return showPost;
}

function getListPostChild(slidePost){
  let listSubMenuArray = document.querySelectorAll('.header .menu>.menu-item>.sub-menu>.menu-item');
  // console.log(slidePost);
  listSubMenuArray.forEach((item, i) => {
    item.onmouseenter = (event) => {
      let postDisplay=document.querySelector('.display--post');
      if(postDisplay)
      {
        postDisplay.remove();
      }
      let checkLengthMenu = event.srcElement.children;
      let category =  convertTextToSlug (event);
      let showPost = createPostList(checkLengthMenu[0]);
        getListPost(category,showPost);
    }
  });

}
// function sliderPostList(slidePost){
//
// }

/*Helper*/

/*action*/
if(subMenuArray.length != 0 && menuArray.length != 0)
menuArray.forEach((item,i)=>{
  item.onmouseenter = (event) => {
    console.log(event);
    let postDisplay=document.querySelector('.display--post');
    if(postDisplay)
    {
      postDisplay.remove();
    }
    let checkLengthMenu = event.srcElement.children;
    if(checkLengthMenu.length > 1){
    let category =  convertTextToSlug (event);
      let showPost = createPostList(checkLengthMenu[1]);
      getListPost(category,showPost);
    }
  }
});

/*action*/
