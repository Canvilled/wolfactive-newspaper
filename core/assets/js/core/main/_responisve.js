// function createSubCatContent(item) {
//     let catDisplay = document.createElement("div");
//     item.appendChild(catDisplay);
//     catDisplay.classList.add('news__sub-category-list');
//     return catDisplay;
// }
// if (document.getElementsByClassName("news__category-more")) {
//     let openSubCategory = document.querySelectorAll(".news__category-more");
//     openSubCategory.forEach((item, i) => {
//         item.onclick = (event) => {
//             console.log(event);
//             let lengthSubCategory = event.srcElement.nextElementSibling.children;
//             if (lengthSubCategory.length > 1) {
//                 let subCategoryContain = document.querySelector('.sub__cat-list');
//                 if (subCategoryContain.classList.contains('active')) {
//                     subCategoryContain.classList.remove('active');
//                 } else { subCategoryContain.classList.add('active'); }
//             }
//         }
//     })
// }
function openCatSub() {
    document.getElementById('catChild').classList.add('active');
}