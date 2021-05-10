/*
Social Share Links

WhatsApp
https://api.whatsapp.com/send?text=[post-title] [post-url]

Facebook
https://www.facebook.com/sharer.php?u=[post-url]

Twitter (we removed the &via=[via]&hashtags=[hashtags] which was directly after [post-title] (with no spaces) as we did not need it, you can add it if you need it)
https://twitter.com/share?url=[post-url]&text=[post-title]

Pinterest (in the function init we remove &is_video=[is_video] as we were not posting a video, if you were then you would leave that in)
https://pinterest.com/pin/create/bookmarklet/?media=[post-img]&url=[post-url]&is_video=[is_video]&description=[post-title]

LinkedIn
https://www.linkedin.com/shsreArticle?url=[post-url]&title=[post-title]

Email
$email = 'mailto:?subject=' . $[post-title] . '&body=Check out this site:'.$[post-url]. '" title="Share by Email'; 

*/
document.addEventListener("DOMContentLoaded", function(){
 
const facebookBtn = document.querySelector(".facebook-btn");
const twitterBtn = document.querySelector(".twitter-btn");
const pintrestBtn = document.querySelector(".pintrest-btn");
const linkedinBtn = document.querySelector(".linkedin-btn");

function init() {
	const pinterestImg = document.querySelector('.postimg')
	let postUrl = encodeURI(document.location.href);
	let postTitle = encodeURI("Hi there, check this out: ");
	/*let postImg = encodeURI(pinterestImg.src);*/
	
	facebookBtn.setAttribute("href",'https://www.facebook.com/sharer.php?u=${postUrl}');
	twitterBtn.setAttribute("href",'https://twitter.com/share?url=${postUrl}&text=${postTitle}');
	/*pinterestBtn.setAttribute("href",'https://pinterest.com/pin/create/bookmarklet/?media=${postImg}&url=${postUrl}&description=${postTitle}');*/
	linkedinBtn.setAttribute("href",'https://www.linkedin.com/shsreArticle?url=${postUrl}&title=${postTitle}');
}
init()

});