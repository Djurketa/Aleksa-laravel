

document.querySelector('.article-images').addEventListener("click",(e) =>{
		scroll(0,0);
		// var lastScrollTop = 0;
		// window.addEventListener('scroll', function(e) {
		// 	var st = window.pageYOffset || document.documentElement.scrollTop; 
		// 	   if (st > lastScrollTop){
		// 	      pre.style.display = "none"
		// 	   } 
		// });
		if(e.target.id==='small-img'){
			var pre = document.querySelector(".image-view");
			
			pre.style.display = 'flex';
			document.querySelector('#preview').src = e.target.src;
			pre.addEventListener('click', ()=>{
				pre.style.display = "none"
			})
		}
	});	