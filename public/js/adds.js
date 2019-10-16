
var images = [], x = -1;
images[0] = window.location.origin +'/imgs/dhl_promo1910_700bk.jpg';
images[1] = window.location.origin +'/imgs/banner.jpg';
images[2] = window.location.origin +'/imgs/Banners2.jpg';
images[3] = window.location.origin +'/imgs/Rockaway.jpg';
images[4] = window.location.origin +'/imgs/autumnsale_700.jpg';


function displayNextImage() {
	x = (x === images.length - 1) ? 0 : x + 1;
	document.querySelector(".adds-div").style.backgroundImage=`url('${images[x]}')`;
}

function startTimer() {
	setInterval(displayNextImage,2000);
}
console.log(window.location.origin +'/public/imgs/reklama1.jpg')
startTimer()
