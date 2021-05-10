

window.addEventListener('load', setup);

const get = document.getElementById.bind(document);
const query = document.querySelector.bind(document);
const getclass = document.getElementsByClassName.bind(document);

function setup(id,id2) {
  
  var modalRoot = get(''+id+'');//modal-root
  var button = query(''+id2+'');//modal-opener
  var modal = query('.mymodal');
  
  if (modalRoot){
  modalRoot.addEventListener('click', rootClick);
  }
  if (button){
  button.addEventListener('click', openModal);
  }
  if (modal){
  modal.addEventListener('click', modalClick);
  }
  function rootClick() {
    modalRoot.classList.remove('visible');
  }
  
  function openModal() {
    modalRoot.classList.add('visible');
  }
  
  function modalClick(e) {
    e.preventDefault();
    e.stopPropagation();
    e.stopImmediatePropagation();
    return false;
  }
  
  
  
}

$(function() {
	  var effects = 'animated slideInDown';
	  var effectsEnd = 'animationend oAnimationEnd mozAnimationEnd webkitAnimationEnd';
	  
	  $('#dlt-btn').click(function() {
		  $('#mini-dialog').addClass(effects).one(effectsEnd, function(){
			  $('#mini-dialog').removeClass(effects);
			  
			  });
		  });
	  
	  });