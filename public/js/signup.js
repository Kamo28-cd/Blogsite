const slidePage = document.querySelector(".slidepage");
const firstNextBtn = document.querySelector(".nextBtn");
const prevBtnSec = document.querySelector(".prev-1");
const nextBtnSec = document.querySelector(".next-1");
const prevBtnThird = document.querySelector(".prev-2");
const nextBtnThird = document.querySelector(".next-2");
const prevBtnFourth = document.querySelector(".prev-3");
const nextBtnFourth = document.querySelector(".next-3");
const prevBtnFifth = document.querySelector(".prev-4");
const submitBtn = document.querySelector(".submit-signup");
const progressText = document.querySelectorAll(".step-signup p");
const progressCheck = document.querySelectorAll(".step-signup .check");
const bullet = document.querySelectorAll(".step-signup .bullet-signup");
let max = 5;
let current = 1;

firstNextBtn.addEventListener("click", function(){
	slidePage.style.marginLeft = "-20%";
	bullet[current - 1].classList.add("active-signup");
	progressCheck[current - 1].classList.add("active-signup");
	progressText[current - 1].classList.add("active-signup");
	current +=1;
	
});
nextBtnSec.addEventListener("click", function(){
	slidePage.style.marginLeft = "-40%";
	bullet[current - 1].classList.add("active-signup");
	progressCheck[current - 1].classList.add("active-signup");
	progressText[current - 1].classList.add("active-signup");
	current +=1;
});
nextBtnThird.addEventListener("click", function(){
	slidePage.style.marginLeft = "-60%";
	bullet[current - 1].classList.add("active-signup");
	progressCheck[current - 1].classList.add("active-signup");
	progressText[current - 1].classList.add("active-signup");
	current +=1;
});
nextBtnFourth.addEventListener("click", function(){
	slidePage.style.marginLeft = "-80%";
	bullet[current - 1].classList.add("active-signup");
	progressCheck[current - 1].classList.add("active-signup");
	progressText[current - 1].classList.add("active-signup");
	current +=1;
});
submitBtn.addEventListener("click", function(){
	bullet[current - 1].classList.add("active-signup");
	progressCheck[current - 1].classList.add("active-signup");
	progressText[current - 1].classList.add("active-signup");
	current +=1;
	setTimeout(function(){
		//alertText = "Welcome! Your new account is ready. Enjoy";
		//alertFunction("success",alertText);
		setTimeout(function(){
			//location.reload();
		},4000)
	},200)
});


prevBtnSec.addEventListener("click", function(){
	slidePage.style.marginLeft = "0%";
	bullet[current - 2].classList.remove("active-signup");
	progressCheck[current - 2].classList.remove("active-signup");
	progressText[current - 2].classList.remove("active-signup");
	current -=1;
});
prevBtnThird.addEventListener("click", function(){
	slidePage.style.marginLeft = "-20%";
	bullet[current - 2].classList.remove("active-signup");
	progressCheck[current - 2].classList.remove("active-signup");
	progressText[current - 2].classList.remove("active-signup");
	current -=1;
});
prevBtnFourth.addEventListener("click", function(){
	slidePage.style.marginLeft = "-40%";
	bullet[current - 2].classList.remove("active-signup");
	progressCheck[current - 2].classList.remove("active-signup");
	progressText[current - 2].classList.remove("active-signup");
	current -=1;
});
prevBtnFifth.addEventListener("click", function(){
	slidePage.style.marginLeft = "-60%";
	bullet[current - 2].classList.remove("active-signup");
	progressCheck[current - 2].classList.remove("active-signup");
	progressText[current - 2].classList.remove("active-signup");
	current -=1;
});