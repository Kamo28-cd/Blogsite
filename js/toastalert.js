//toast notifications start
				function alertFunction(typeOfAlert,responseMsg) {
				//$('.alert-btn, #deletepost').click(function(){
				responseMsg = responseMsg || 0;
				//if (responseMsg != 0) {
					document.querySelector('.msg-a-success').innerHTML = responseMsg;
					document.querySelector('.msg-a').innerHTML = responseMsg;
				//}
				if (typeOfAlert=="warning") {
					
					$('.alert').removeClass("hiding");
					$('.alert').addClass("showing");
					$('.alert').addClass("showAlert");
					
					setTimeout(function(){
						$('.alert').addClass("hiding");
						$('.alert').removeClass("showing");
					},2000);
				//});
				} else if (typeOfAlert=="success") {

				//$('.alert-btn, #sendnewpost').click(function(){
					$('.alert-success').removeClass("hiding");
					$('.alert-success').addClass("showing");
					$('.alert-success').addClass("showAlert");
			
					setTimeout(function(){
						$('.alert-success').addClass("hiding");
						$('.alert-success').removeClass("showing");
					},2000);
				//});
				}
				}
				$('.close-btn-alert').click(function(){
					$('.alert').addClass("hiding");
					$('.alert').removeClass("showing");
				});
				$('.close-btn-alert-success').click(function(){
					$('.alert-success').addClass("hiding");
					$('.alert-success').removeClass("showing");
				});
				//toast notifications end