function MainSelectBox(){
//$(document).on('click',' #editmyskills,#editmyeducation', function(){
const selectedAll = document.querySelectorAll(".selected");
myselected = document.getElementById("selected");
	
selectedAll.forEach((selected) => {
	
	const selectedAllheading = document.querySelectorAll(".selected-heading");
	//const selectedheading = document.querySelector(".selected-heading");
const optionsContainer = selected.previousElementSibling;

	//const optionsContainer = document.querySelector(".options-container");
const searchBox = (selected.nextElementSibling).firstElementChild;
	//searchBox.firstElementChild;
	
	//const searchBox2 = document.querySelector(".search-select-box input");
	
const optionsList = optionsContainer.querySelectorAll(".option");
	//console.log(optionsList);

	//const optionsList = document.querySelectorAll(".option");

selected.addEventListener("click", ()=> {
	
	if(optionsContainer.classList.contains("activeselectbox")) {
		optionsContainer.classList.remove("activeselectbox");
	} else {
		let currentActive = document.querySelector(".options-container.activeselectbox");
		
		if(currentActive) {
			currentActive.classList.remove("activeselectbox");
		}
		optionsContainer.classList.add("activeselectbox");
	}
	//optionsContainer.classList.toggle("activeselectbox");
	
	//this resets the values that were previously placed inside the input field after you close the searchbox so that when you reopen the searchbox the previous values wont still be there 
	searchBox.value = "";
	filterList("");
	
	if (optionsContainer.classList.contains("activeselectbox")) {
	//when user opens the options container which has the searchbox, the cursor input will immediately go to the input and allow the user to start typing immediately instead of having to go and click on the input field manually 
		//searchBox.focus();
	}
});

//the following loops through our select options, adds an on click event to them then when they are clicked it gets the inner html of the label and stores it to display it where "Select Category" is, then it removes the activeselectbox class
optionsList.forEach((o) => {
	o.addEventListener("click", () => {
		
		
			if (!o.classList.contains("keepopen")) {
				newselected = selected.firstElementChild;
				newselected.innerHTML = o.querySelector("label").innerHTML;
				

				if (o.querySelector("input").checked) {
					//o.querySelector('input[type="radio"]').checked = false;
					//$(o).prop('checked', false);
					o.classList.remove("option_checked");
					//console.log("bye");
				} else {
					o.querySelector('input[type="radio"]').checked = true;
					//$(o).prop('checked', true);
					o.classList.add("option_checked");
					//console.log("hello");
				}
				optionsContainer.classList.remove("activeselectbox");
				//o.classList.remove("option_checked");
			}
		
		selectedAllheading.forEach((selectedAllhead) => {
			let currentActiveNew = document.querySelector(".options-container.activeselectbox");
			if(currentActiveNew) {
				newhead = currentActiveNew.nextElementSibling;
				newhead = newhead.firstElementChild;
				newhead.innerHTML = o.querySelector("label").innerHTML;
					//selectedAllhead.innerHTML = o.querySelector("label").innerHTML;
					//selected.innerHTML = o.querySelector("label").innerHTML;
				
				
				
				
				if (o.classList.contains("keepopen")) {
					
					if (o.querySelector("input").checked) {
					//$(this).prop('checked', false);
					//console.log("the check should be removed");
						o.querySelector("input").checked = false;

						if (o.classList.contains("option_checked")) {
							o.classList.remove("option_checked");
						}
					} else {
						o.querySelector("input").checked = true;
						o.classList.add("option_checked");
					}
				
				}
				
				
				
			}
		})
		
	});
	
});

const filterList = searchTerm => {
	searchTerm = searchTerm.toLowerCase();
	optionsList.forEach( option => {
		//converting the case to lower case so yo can search for terms whether they are upper case or lower case
		let label = option.firstElementChild.nextElementSibling.innerText.toLowerCase();
		//indexOf searches whether the search term is inside the label or not if it doesnt find the search term inside the label it returns -1 so we check if the value is not -1 and if it isnt -1 then we can be sure the search term is inside the label
		if (label.indexOf(searchTerm) != -1) {
			option.style.display = "block";
		} else {
			option.style.display = "none";
		}
	})
}

searchBox.addEventListener("keyup", function(events) {
	filterList(events.target.value);
});

})

//});
}
