// 产品幻灯片切换（三个容器同理）
let productSlideIndex1 = 0;
const productSlides1 = document.querySelectorAll('#product-slideshow-container1 img');
function productShowSlides1() {
    for (let i = 0; i < productSlides1.length; i++) {
        productSlides1[i].style.display = 'none';
    }
    productSlideIndex1++;
    if (productSlideIndex1 > productSlides1.length) {
        productSlideIndex1 = 1;
    }
    productSlides1[productSlideIndex1 - 1].style.display = 'block';
    setTimeout(productShowSlides1, 3000);
}
productShowSlides1();

let productSlideIndex2 = 0;
const productSlides2 = document.querySelectorAll('#product-slideshow-container2 img');
function productShowSlides2() {
    for (let i = 0; i < productSlides2.length; i++) {
        productSlides2[i].style.display = 'none';
    }
    productSlideIndex2++;
    if (productSlideIndex2 > productSlides2.length) {
        productSlideIndex2 = 1;
    }
    productSlides2[productSlideIndex2 - 1].style.display = 'block';
    setTimeout(productShowSlides2, 3000);
}
productShowSlides2();

let productSlideIndex3 = 0;
const productSlides3 = document.querySelectorAll('#product-slideshow-container3 img');
function productShowSlides3() {
    for (let i = 0; i < productSlides3.length; i++) {
        productSlides3[i].style.display = 'none';
    }
    productSlideIndex3++;
    if (productSlideIndex3 > productSlides3.length) {
        productSlideIndex3 = 1;
    }
    productSlides3[productSlideIndex3 - 1].style.display = 'block';
    setTimeout(productShowSlides3, 3000);
}
productShowSlides3();