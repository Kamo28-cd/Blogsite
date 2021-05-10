//cart app but for other pages aside from the products page
//variables
//const storeName = storename;
//const storeId = storeid;
const cartBtn = document.querySelector('.cart-btn');
const closeCartBtn = document.getElementById('close-cart');
const clearCartBtn = document.querySelector('.clear-cart');
const cartDOM = document.querySelector('.cart');
//const cartOverlay = document.querySelector('.cart-overlay');
const cartItems = document.querySelector('.num-cart-items');
const cartTotal = document.querySelector('.cart-total');
const cartContent = document.querySelector('.cart-content');
const productsDOM = document.querySelector('.products-center');
function closeNavedit() {document.getElementById("editprofilecv").style.width = "0";
		$('#mymodal-bg').fadeOut('slow');
		}

//cart for local storage
let cart = [];
let buttonsDOM = [];

// display products from local storage
class UI{
	displayProducts(products) {
		let result = '';
		products.forEach(product =>{
			const oldprice = `${product.oldprice}`;
			
			if (oldprice=="null"){
			//for when the old price doesnt exist we display the current price without an old price striked through
			result +=`
			<li class="shop-view-cell product-cell" onClick="" data-shoptype="cuisine">
                <div class="shop-thumbnailimg">
					<img src=${product.image} class="product-image"/>
					<button class="bag-btn badge2" data-viewid=${product.id} style="top:30%">
						<i class="icon-sli-layers"></i>
						view more
					</button>
					<button class="bag-btn addtocart badge2" data-cartid=${product.id}>
						<i class="icon-sli-handbag"></i>
						<p class="p-unset">add to cart</p>
					</button>
					<span class="business_star" id="business_list1"></span>
				</div>
				<div class="shop-info">
					
					<h5 class="minwidth70 product-name">${product.title}</h5>
					<i class="far fa-bookmark bookmark-pos" style="position: relative;"></i>
					<div class="shop-name">
						<p class="oldproduct-price" style="display:none; position:relative;">R${product.oldprice}</p>
						<p class="product-price" style="display:inline-flex; position:relative;">R${product.price}</p>
						
					</div>
				</div>

            </li>
			`;
				
				
			} else {
			
			result +=`
			<li class="shop-view-cell product-cell" onClick="" data-shoptype="cuisine">
                <div class="shop-thumbnailimg">
					<img src=${product.image} class="product-image"/>
					<button class="bag-btn badge2" data-viewid=${product.id} style="top:30%">
						<i class="icon-sli-layers"></i>
						view more
					</button>
					<button class="bag-btn addtocart badge2" data-cartid=${product.id}>
						<i class="icon-sli-handbag"></i>
						<p class="p-unset">add to cart</p>
					</button>
					<span class="business_star" id="business_list1"></span>
				</div>
				<div class="shop-info">
					
					<h5 class="minwidth70 product-name">${product.title}</h5>
					<i class="far fa-bookmark bookmark-pos" style="position: relative;"></i>
					<div class="shop-name">
						<p class="oldproduct-price" style="display:inline-flex; position:relative;">R${product.oldprice}</p>
						<p class="product-price" style="display:inline-flex; position:relative;">R${product.price}</p>
						
					</div>
				</div>

            </li>
			`;
			}
			
		});
		productsDOM.innerHTML = result;
	}

	
	getBagButtons(){
		const buttons = [...document.querySelectorAll(".bag-btn.addtocart")];
		buttonsDOM = buttons;
		buttons.forEach(button =>{
			let id = button.dataset.cartid;
			let inCart = cart.find(item=> item.id ===id); //use the find method that you can have on arrays and find the item if it is in the cart then of the item id matches the id variable on the button, do something
			if (inCart){
				//setting up the fact that if a button is clicked the item is added to the cart and you cant click the same button again until you clear the cart
				button.lastElementChild.innerText = "in cart";
				button.disabled = true;
			}
			button.addEventListener('click',event =>{
				event.target.innerText = "in cart";
				event.target.disabled = true;
				// now  i want to get the item that the button refers to, ill get it from local storage here
				//get product from products (in local storage)
				let cartItem = { ...Storage.getProduct(id), amount: 1 };
				
				
				//then add product to the cart
				cart = [...cart,cartItem];
				//save cart in local storage
				Storage.saveCart(cart);
				//set cart values
				this.setCartValues(cart);
				//display cart item in nav
				this.addCartItem(cartItem)
				//show the cart
				//this.showCart();
			});
			
		});
	}
	setCartValues(cart) {
		let tempTotal = 0;
		let itemsTotal = 0;
		cart.map(item =>{
			tempTotal += item.price* item.amount;
			itemsTotal += item.amount
		});
		cartTotal.innerText = parseFloat(tempTotal.toFixed(2));
		cartItems.innerText = itemsTotal;
		
	}
	addCartItem(item) {
		const div = document.createElement('div');
		div.classList.add("cart-item");
		div.innerHTML = `<img src=${item.image} class="product-image"/>
			<div>
				<h4>${item.title}</h4>
				<h5>R${item.price}</h5>
				<span class="remove-items" data-cartid=${item.id}>remove</span>
			</div>
			<div>
				<i class="fas fa-chevron-up" data-cartid=${item.id}></i>
				<p class="item-amount">${item.amount}</p>
				<i class="fas fa-chevron-down" data-cartid=${item.id}></i>
			</div>`;
		cartContent.appendChild(div);
		
	}
	//no need since using a different method to show cart
	//showCart(){
		//cartOverlay.classList.add('transparentBcg');
		//cartDOM.classList.add('showCart');
	//}
	
	setupAPP() {
		cart = Storage.getCart();
		this.setCartValues(cart);
		this.populateCart(cart);
		//cartBtn.addEventListener('click', this.showCart);
		closeCartBtn.addEventListener('click',function() {closeNavedit();});
	}
	populateCart(cart) {
		cart.forEach(item => this.addCartItem(item));
	}
	//no need since using a different method to hide cart
	//hideCart(){
		//cartOverlay.classList.remove('transparentBcg');
		//cartDOM.classList.remove('showCart');
	//}
	cartLogic() {
		//clear cart button
		clearCartBtn.addEventListener('click',()=>{
			this.clearCart();
		});
		//cart functionality
		cartContent.addEventListener('click', cartevent=>{
			if (cartevent.target.classList.contains('remove-items')){
				let removeItem = cartevent.target;
				let id = removeItem.dataset.cartid;
				cartContent.removeChild(removeItem.parentElement.parentElement);
				this.removeItem(id);
			} else if (cartevent.target.classList.contains('fa-chevron-up')) {
				let addAmount = cartevent.target;
				let id = addAmount.dataset.cartid;
				let tempItem = cart.find(item => item.id===id);
				tempItem.amount = tempItem.amount + 1;
				Storage.saveCart(cart);
				this.setCartValues(cart);
				addAmount.nextElementSibling.innerText = tempItem.amount;
			} else if (cartevent.target.classList.contains('fa-chevron-down')) {
				let lowerAmount = cartevent.target;
				let id = lowerAmount.dataset.cartid;
				let tempItem = cart.find(item => item.id===id);
				tempItem.amount = tempItem.amount - 1;
				if(tempItem.amount > 0) {
					Storage.saveCart(cart);
					this.setCartValues(cart);
					lowerAmount.previousElementSibling.innerText = tempItem.amount;

				} else{
					cartContent.removeChild(lowerAmount.parentElement.parentElement);
					this.removeItem(id);
				}
			}
		});
	}
	clearCart(){
		//map used in finding items in arrays
		let cartItems = cart.map(item=> item.id);
		cartItems.forEach(id =>this.removeItem(id));
		while(cartContent.children.length>0){
			cartContent.removeChild(cartContent.children[0]);
		}
		closeNavedit()
	}
	removeItem(id){
		cart = cart.filter(item =>item.id !==id);
		this.setCartValues(cart);
		Storage.saveCart(cart);
		//let button = this.getSingleButton(id);
		//button.disabled = false;
		//button.innerHTML = `<i class="icon-sli-handbag"></i>
		//			<p class="p-unset">add to cart</p>
		//		`;
	}
	getSingleButton(id) {
		return buttonsDOM.find(button => button.dataset.cartid ===id)
	}
	
}

//local storage
class Storage{
	static saveProducts(products) {
		//here you can just go to phpmyadmin and get just the one product that you will need to add to cart (better when you have many stored items)
		localStorage.setItem("products", JSON.stringify(products))
	}
	static getProduct(id) {
		let products = JSON.parse(localStorage.getItem("products"));
		return products.find(product => product.id ===id)
	}
	static saveCart(cart) {
		localStorage.setItem("cart", JSON.stringify(cart))
	}
	static getCart() {
		return localStorage.getItem('cart')?JSON.parse(localStorage.getItem('cart')):[]
	}

}


document.addEventListener("DOMContentLoaded",()=>{
const ui = new UI();
//const products = new Products();
//setup app
ui.setupAPP();
ui.cartLogic();

//get all products
//products.getProducts().then(products => {
		//ui.displayProducts(products);
		//maybe just delete the Storage.save because you could go to the server and get the one product instead
		//Storage.saveProducts(products);
	//}).then(()=>{
		//ui.getBagButtons();
		//ui.cartLogic();	
	//});

});