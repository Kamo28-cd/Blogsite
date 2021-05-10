$.ajax({
						
					type:"GET",
					cache:false,
					url:"loggedin.php",
					processData:false,
					contentType:"application/json",
					data: '',
					success: function(r) {
							loggedin = r;
						if (loggedin ==0) {
							//console.log("Not Logged In");
							location.href = "signin";
						} else if (loggedin ==1) {
						
	 					
		$(document).ready(function() {
				//initialising start
				USERNAME = "";
				COMMENTERNAME = "";
				COMMENTERID = "";
				IMAGEDATA = "";
				microdialog = "";
				myCheckboxes = "first val";
				var microbuttonid = 0;
				var modalbtn = 0;
				var modal = 0;
				applybtn = 0;
				dltbtn = 0;
				editbtn = 0;
				reportbtn = 0;
				sharebtn = 0;
				postbody = "";
				modalbg = document.getElementById('mymodal-bg');
				applymodal = document.getElementById('mini-dialog-apply');
				dltmodal = document.getElementById('mini-dialog-dlt');
				editmodal = document.getElementById('mini-dialog-edit');
				reportmodal = document.getElementById('mini-dialog-report');
				sharemodal = document.getElementById('mini-dialog-share');

				//initialiing end
			
				updateScroll= function() {
					var element = document.querySelector(".msg-style");
					setTimeout(function() {
						//$('.msg-style').scrollTop(727)
						//element.scrollTop = 727;
						$('.msg-style').animate({scrollTop: element.scrollHeight},'slow');
						//console.log(element.scrollHeight +200)
					}, 1000)
					
						
				}

				

				//toast notifications start
				function alertFunction(typeOfAlert,responseMsg) {
				
				responseMsg = responseMsg || 0;
				if (responseMsg != 0) {
					document.querySelector('.msg-a-success').innerHTML = responseMsg;
				}
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
				function getUsername() {
				$.ajax({
						
					type:"GET",
					cache:false,
					url:"api/users",
					processData:false,
					contentType:"application/json",
					data: '',
					success: function(r) {
							USERNAME = r;
							}
						
						})
				
				}
				
					var USERID;
				$.ajax({
						
					type:"GET",
					cache:false,
					url:"api/userid",
					processData:false,
					contentType:"application/json",
					data: '',
					success: function(r) {
							USERID = r;
							}
						
						});

				<!--navbar scroll start
					var lastScrollTop = 0;
					navbar = document.getElementById("navbar");
					
					pop3 =  document.getElementById("pop3");
					pop3.addEventListener("scroll", function(){
						var scrollTop = $("#pop3").scrollTop();
						if (scrollTop > lastScrollTop){
						navbar.style.top="-51px";
						
						navshould = "move";
						} else {
						navbar.style.top="0";
							
						}
						lastScrollTop = scrollTop;
					})
				<!--navbar scroll end	
				<!--Pull to refresh start
				
				$('#pop3').scroll(function() {
					var pop3scroll = $('#pop3').scrollTop();
					
					
				if (pop3scroll ==0) {
					PullToRefresh.init({
						
						mainElement: '#pop3',
						shouldPullToRefresh: function(){return!this.mainElement.scrollTop},
						instructionsPullToRefresh:'Pull down to refresh the page',
						instructionsReleaseToRefresh:'Release to refresh the page',
						onRefresh: function() {
							alertText = "Page Refreshed";
							alertFunction("success",alertText);
							reloadstartval = 0;
							$(".timelineposts").html("");
							load_timeline(reloadstartval);
						}
						
					})
				}
				});
				<!--Pull to refresh end 
				<!--add new post code start
				var newpostbody_box = document.getElementById('newpostbody');
				var newpostbody = newpostbody_box.value;
				
				//function isEmpty(val) {
					//return ((val !='') && (val != undefined) && (val.length >0) && (val != null));
					//}
					
				newpostadded = "not yet"	
				$('#sendnewpost').click(function(event){
				//if(newpostbody == ""){
					
				//$('#uploaded_image').html('<span class="center text-italics">Please type post below</span>');
				//} else {
					if(IMAGEDATA===""){

						$.ajax({
							 
							 type: "POST",
							 cache:false,
							 url: "api/createpost",
							 processData: false,
							 contentType:"application/json",
							 data: '{"body": "'+ $("#newpostbody").val()+'", "poster": "'+USERID+'","imgpost":"'+IMAGEDATA+'"}',
							 success: function(r) {
								//console.log(r) 
								newpostadded = "Success: you have added a new post";
								<!--location.reload()
								alertFunction("success",newpostadded);
								
								$('#mymodal-bg').delay(1000).fadeOut('slow');
								$('#small-dialog-post').delay(1000).fadeOut('slow');
								document.getElementById('newpostbody').value = "";
							 }
									});
					}
					//}
				})
				<!--crop image code start
				$image_crop = $('#image_demo').croppie({
					enableExif:true,
					viewport: {  //this defines part of cropped image that will be visible after being cropped
						width:250,
						height:250,
						type: 'square' //or can use circle height was 200
						},
					boundary: {  //this defines outer edges that will be cropped out
						width:300,
						height:300,
						},
				
				});
				$('#upload_image').on('change', function(){
					var reader = new FileReader();
					reader.onload = function(event) {
						$image_crop.croppie('bind', {
							url:event.target.result
							
						}).then(function(){
							//console.log("jQuery bind complete");
						});	
					}
					reader.readAsDataURL(this.files[0]);
					$('#image_demo').fadeIn('slow');
					$('#crop_btn').fadeIn('slow');
					
					});
				
				var formname = document.getElementById('upload_image').name;
				//height was 600
				$('.crop_image').click(function(event){
					$image_crop.croppie('result', {
							type: "canvas",
							size:{width:900,height:900},
							quality:1,
						}).then(function(response){
							$.ajax({
							    	cache:false,
								url:"api/upload?formname="+formname,
								type:"POST",
								data: {"image":response},
								success: function(data) {
									console.log(data)
									$('#uploaded_image').html('<img src="'+data+'"class="upload_img-dialog center"style="" id="upload_img-dialog"/>');
									$('#image_demo').hide();
									$('#crop_btn').hide();
									IMAGEDATA = data;
									newimagepostadded = "not yet";
									$('#sendnewpost').click(function(event){
										if(IMAGEDATA!=""){
									$.ajax({
							 
							 type: "POST",
							 cache:false,
							 url: "api/createpost",
							 processData: false,
							 contentType:"application/json",
							 data: '{"body": "'+ $("#newpostbody").val()+'", "poster": "'+USERID+'","imgpost":"'+IMAGEDATA+'"}',
							 success: function(r) {
								//console.log(r) 
								newimagepostadded = "Success: you have posted a new image";
								<!--location.reload()
								alertFunction("success",newimagepostadded);
								$('#mymodal-bg').delay(1000).fadeOut('slow');
								$('#small-dialog-post').delay(1000).fadeOut('slow');
								document.getElementById('newpostbody').value = "";
							 }
									});
										}
									})
									
									}
								
								});
							})
					});
				<!--crop image code end
				function newLocation(loc) {
					if (loc == "profile") {
						//window.location.href = 'profile.php?username='+COMMENTERNAME+'';
					} else if (loc == "logout") {
						window.location.href = 'logout.php';
					}
				}
				<!--add new post code end
				$.ajax({
						
					type:"GET",
					cache:false,
					url:"api/userprof",
					processData:false,
					contentType:"application/json",
					data: '',
					success: function(r) {
							r = JSON.parse(r)
							for (var i = 0; i < r.length; i++) {
							COMMENTERNAME = r[i].username
							COMMENTERID = r[i].id;	
							profile = "profile"; 
							logout = "logout";
								$('#profimg').html('<img class="profileimage pull-left darkmode-ignore" src="'+r[i].profileimg+'" alt=""/>')
								
								$('#addnewpostprof').html('<img class="media-object profileimage pull-left darkmode-ignore" style="margin-left:5% !important;" src="'+r[i].profileimg+'"><div class=""><div class="" style="margin-left:20px !important;"><h4 class="minwidth70" style="position: relative; top: 10px !important; left: 10px !important;">'+r[i].username+'</h4></div></div>')
								
								$('#mySidenav').html('<div class="content"><div class="settingbackground" style="height:125px; width:100%;background-image: linear-gradient(90deg,rgba(0,0,35,0.42) 100%,rgba(0,0,32,1.00) 100%), url(./'+r[i].coverimg+') !important;""><br><div class="pro-img-position"><img class="profileimage2 img-position tab-item pull-left" src="'+r[i].profileimg+'" alt=""/></div><br><div class="name-width mypull-mid"><h4 class="text-light-blue textitalics padding profname-deco">'+r[i].username+'</h4></div></div><a href="javascript:void(0)" class="closebtn" onClick="closeNav()"><i class="icon-chevron_left icon icon2x"></i></a><div class="prof-content"><div class="move-width" ><h4 class="mytext-right text-italics my-text-col-grey" >Profile</h4><div onClick="newLocation(profile)"><i class="icon-sli-people"></i><a href="#" class="">Profile</a></div><div  onClick="newLocation(logout)"><i class="icon-sli-logout"></i><a href="#" class="no-margin">Logout</a></div></div>')
								//rest of profile for future use
								/*<div class="move-width"><h4 class="mytext-right text-italics my-text-col-grey">Documentation</h4><div><i class="icon-attachment"></i><!-- the a class with document names is for viewing the document in question, so create a pop up allowing one to view it with their pdf viewer--><a href="#" class="">Identity Document</a><div class="btn-pos"><a class="view-btn"><span class="badge2"><i class="icon-download icon-col"></i></span></a><a class="delete-btn"><span class="badge2"><i class="icon-trash_can icon-col"></i></span></a></div></div><div><i class="icon-attachment"></i><a href="#" class="inline-msg">Proof of Registration</a><div class="btn-pos"><a class="view-btn"><span class="badge2"><i class="icon-download icon-col"></i></span></a><a class="delete-btn"><span class="badge2"><i class="icon-trash_can icon-col"></i></span></a></div></div><div><i class="icon-attachment"></i><a href="#" class="">Matric Certificate</a><div class="btn-pos"><a class="view-btn"><span class="badge2"><i class="icon-download icon-col"></i></span></a><a class="delete-btn"><span class="badge2"><i class="icon-trash_can icon-col"></i></span></a></div></div><div><i class="icon-attachment"></i><a href="#" class="no-margin">Academic Record</a><div class="btn-pos"><a class="view-btn"><span class="badge2"><i class="icon-download icon-col"></i></span></a><a class="delete-btn"><span class="badge2"><i class="icon-trash_can icon-col"></i></span></a></div></div></div><div class="move-width"><h4 class="mytext-right text-italics my-text-col-grey">Education</h4><div class="block-pos"><div class="w-half inst-pos"><h6 class="mytext-left text-italics my-text-col-grey">Randfontein High School</h6></div><div class="w-half year-pos"><h6 class="mytext-right text-italics my-text-col-grey">2010</h6></div></div><div><i class="icon-sli-graduation"></i><a href="#" class="">Mathematics</a><span class="mytext-right span-bg my-text-col-grey">85%</span></div><div><i class="icon-sli-graduation"></i><a href="#" class="inline-msg">Physics</a><span class="mytext-right span-bg my-text-col-grey">77%</span></div><div><i class="icon-sli-graduation"></i><a href="#" class="">Life Sciences</a><span class="mytext-right span-bg  my-text-col-grey">75%</span></div><div><i class="icon-sli-graduation"></i><a href="#" class="no-margin">Accounting</a><span class="mytext-right span-bg my-text-col-grey">71%</span></div></div><div class="move-width"><h4 class="mytext-right text-italics my-text-col-grey">Work Experience</h4><div class="block-pos"><div class="w-half inst-pos"><h6 class="mytext-left text-italics my-text-col-grey">Currently Employed at: Brand Soldiers</h6></div><div class="w-half year-pos"><h6 class="mytext-right text-italics my-text-col-grey">2014-present</h6></div></div><div><i class="icon-paperplane"></i><a href="#" class="">Brand Soldiers</a></div><div><i class="icon-paperplane"></i><a href="#" class="">Unlock Your Brain Tutors</a></div><div><i class="icon-paperplane"></i><a href="#" class="">Samsung</a></div><div><i class="icon-paperplane"></i><a href="#" class="no-margin">Vodacom</a></div></div><div class="move-width"><h4 class="mytext-right text-italics my-text-col-grey">Achievements</h4><div><i class="icon-sli-trophy"></i><a href="#" class="">Headboy</a></div><div><i class="icon-sli-trophy"></i><a href="#" class="inline-msg">Motivational Leader</a></div><div><i class="icon-sli-trophy"></i><a href="#" class="">Developing application</a></div><div><i class="icon-sli-trophy"></i><a href="#" class="no-margin">Building a remote controlled cart</a></div></div></div></div>*/
								}
							}
						
						});
			
			//Show Story Start
				$('[data-storyid]').click(function() {
					setTimeout(function() {
					//modalbg.style.display = "block";
					$('#mymodal-bg').fadeIn('slow');
					$('#viewStory').fadeIn('slow');
					console.log("story clicked")
					},2000)
				})
			//Show Story End
						
			
			$('#close-btn-pst').click(function() {
				
				
				//postmodal.style.display = "none";	
				//modalbg.style.display = "none";
				$('#mymodal-bg').fadeOut('slow');
				$('#small-dialog-post').fadeOut('slow');
				$('#upload_img-dialog').fadeOut('slow');
				setTimeout(function(){
								
						document.getElementById('upload_img-dialog').src = "";
									
				},2000);	 
				document.getElementById('upload_img-dialog').src = "";
						
				
				});
			$('#close-btn-dlt').click(function() {
				
				
				//postmodal.style.display = "none";	
				//modalbg.style.display = "none";
				$('#mymodal-bg').fadeOut('slow');
				$('#mini-dialog-dlt').fadeOut('slow');
				$('#mini-dialog-edit').fadeOut('slow');
				
				});
			$('#close-btn-edit').click(function() {
				
				
				//postmodal.style.display = "none";	
				//modalbg.style.display = "none";
				$('#mymodal-bg').fadeOut('slow');
				$('#mini-dialog-edit').fadeOut('slow');
				$('#mini-dialog-dlt').fadeOut('slow'); 
				
				});
			$(document).on('click', '#close-btn-dlt,#cancel',function(){
				
				$('#mymodal-bg').fadeOut('slow');
				$('#mini-dialog-dlt').fadeOut('slow'); 
				$('#mini-dialog-edit').fadeOut('slow');
			})
			$('#closeStory').click(function() {
				
				
				
				$('#mymodal-bg').fadeOut('slow');
				$('#viewStory').fadeOut('slow');
				
				
				});
			$('#add-new-post').click(function() {
				postmodal = document.getElementById('small-dialog-post');
				modalbg.style.display = "flex";
							
				
				$('#small-dialog-post').show();
				var effects = 'animated bounceIn';
	  			var effectsEnd = 'animationend oAnimationEnd mozAnimationEnd webkitAnimationEnd';
	  
	  
		  		$('#small-dialog-post').addClass(effects).one(effectsEnd, function(){
			  		$('#small-dialog-post').removeClass(effects);
			  
			  });
			  
				});
			
			//get url params start
				$.urlParam = function(name, url) {
					if (!url) {
						url = window.location.href;
					}
					var results = new RegExp('[\\?&]' + name + '=([^&#]*)').exec(url);
					if (!results) {
						return undefined;
					}
					return results[1] || undefined;

					//to call if url is xyz.com/index.html?lang=en
					//then to call just go:
					// var langval = $.urlParam('lang');
				}

			//get url params end
			//posts function start
			function singlePost() {
				postID = $.urlParam('postid');
				$.ajax({
							 
							 type: "POST",
							 cache:false,
							 url: "api/singlepost?postid="+postID,
							 processData: false,
							 contentType:"application/json",
							 data: '',
							 success: function(r) {
								posts = JSON.parse(r);
								if (posts.PostImage == "") {
											
										$('.singlepost').html(
										$('.singlepost').html() +'<li class="table-view-cell" id="'+posts.PostId+'"  data-cnt="'+start+'"><div class=" icon-sli-arrow-down"  id="mymodal-opener'+posts.PostId+'" data-microid="'+posts.PostId+'" style="color: rgb(120 120 120) !important;float: right; margin-right: -50px;"></div><a class="a-unset" href="#"><img class="media-object profileimage pull-left darkmode-ignore" src="'+posts.ProfileImage+'"></a><div class="media-body"><div class=""><h4 class=" minwidth70">'+posts.PostedBy+'</h4><div class="" id="mymodal-root'+posts.PostId+'" style=""><div id="micro-dialog'+posts.PostId+'" class="mymodal micro-dialog-pos"></div></div><p class="fontsize10 text-italics">'+moment(posts.PostDate).fromNow()+'</p></div><br></div><div style="position: relative;top: -15px;margin: 0 auto;width: 90%;"><p class="text-darkened-blue padding-post">'+posts.PostBody+'</p></div><div class="text-b-width" style="width:129%"><div class="a-pos-new"><button class="btn-clear" data-id="'+posts.PostId+'" type="button"><span class="badge2shadow icon1-3x icon-sli-heart l-pos" style="background-color: white !important;"> <span class="likes-class" style="">'+posts.Likes+'</span></span></button><br/><button type="button" class="btn-clear cm-btn-pos" id="small-dialog0-btn" data-postid="'+posts.PostId+'"><span class="badge2shadow icon1-3x icon-sli-bubble r-pos" style="font-weight:normal !important;"></span></button></div></div></li> '
					)
											postid = posts.PostId;
											postbody = posts.PostBody;
											ilikedthepost = "no";
											if (posts.ILiked == 1) {
												ilikedthepost = "yes";
												$("[data-id='"+posts.PostId+"']").html('<span class="badge2shadow icon1-3x icon-heart l-pos redheart-post" data-likedid="liked'+posts.PostId+'" style="background-color: white !important;color:#fd1409 !important;"> <span class="likes-class" style="margin-left: 6px;">'+posts.Likes+'</span></span>')
											}
					
					} else {
											$('.singlepost').html(
										$('.singlepost').html() +'<li class="table-view-cell imgpost-max-height" id="'+posts.PostId+'"  data-cnt="'+start+'"><div class=" icon-sli-arrow-down "  id="mymodal-opener'+posts.PostId+'" data-microid="'+posts.PostId+'" style="color: rgb(120 120 120) !important;float: right; margin-right: -50px;"></div><a class="a-unset" href="#"><img class="media-object profileimage pull-left darkmode-ignore" src="'+posts.ProfileImage+'"></a><h4 class=" minwidth70" style="display: inline-block;">'+posts.PostedBy+'</h4><div><div class="" id="mymodal-root'+posts.PostId+'" style=""><div id="micro-dialog'+posts.PostId+'" class="mymodal micro-dialog-pos"></div></div><p class="fontsize10 text-italics">'+moment(posts.PostDate).fromNow()+'</p></div><div class="media-body" style="width:129%;margin-left:-15px;padding-top:15px"><div class=""><img src="" class="postimg" id="img'+posts.PostId+'" data-tempsrc="'+posts.PostImage+'"><br /></div><div style="position: relative;top: 5px;margin: 0 auto;width: 90%;"><p class="text-darkened-blue">'+posts.PostBody+'</p></div><div class="a-pos-new-img"><button class="btn-clear" data-id="'+posts.PostId+'" type="button"><span class="badge2shadow icon1-3x icon-sli-heart l-pos redheart-post" style="background-color: white !important;"> <span class="likes-class" style="">'+posts.Likes+'</span></span></button><br/><button type="button" class="btn-clear cm-btn-pos-img" id="small-dialog0-btn" data-postid="'+posts.PostId+'"><span class="badge2shadow icon1-3x icon-sli-bubble r-pos" style="font-weight:normal !important;"></span></button></div><br></div></li> '
					)
											postid = posts.PostId;
											postbody = posts.PostBody;
											ilikedthepost = "no";
											if (posts.ILiked == 1) {
												ilikedthepost = "yes";
												$("[data-id='"+posts.PostId+"']").html('<span class="badge2shadow icon1-3x icon-heart l-pos" data-likedid="liked'+posts.PostId+'" style="background-color: white !important;color:#fd1409 !important;"> <span class="likes-class" style="margin-left: 6px;">'+posts.Likes+'</span></span>')
											}
											}
							 },
							 error: function(r) {
								console.log(r)
							 }
				});
			}


			//posts function end

			modalbg.onclick = function(evnt) {
								//event.stopPropagation();
							if (evnt.target == this) {
								$('#mini-dialog-apply').fadeOut('slow');
								$('#mini-dialog-dlt').fadeOut('slow');
								$('#mini-dialog-edit').fadeOut('slow');
								$('#mini-dialog-report').fadeOut('slow');
								$('#mini-dialog-share').fadeOut('slow');
								$('#small-dialog0').fadeOut('slow');
								$('#small-dialog-post').fadeOut('slow');
								$('#small-dialog-msg').fadeOut('slow');
								$('#viewStory').fadeOut('slow');
								$('#upload_img-dialog').fadeOut('slow');
								setTimeout(function(){
									if (document.getElementById('upload_img-dialog') !=null) { 
										document.getElementById('upload_img-dialog').src = "";
									}
								},2000);
								
								if (document.getElementById('mySidenav').style.width =="90%") {
									closeNav();
								}
								
								$('#mymodal-bg').fadeOut('slow');
								//dltmodal.style.display = "none";	
								//modalbg.style.display = "none";
								//$('#mymodal-bg').hide();
							}
							}
			$('#close-btn-cm').click(function() {
				$('#mymodal-bg').fadeOut('slow');
				$('#small-dialog0').fadeOut('slow');
				
				
				});
			smalldialogon = false
			smalldialogclicked = false
			$('#small-dialog0').click(function() {
					smalldialogclicked = true
			});	
			$('#pop2').click(function() {
				$('#pop-auto').hide();
				$("#micro-dialog").hide();
				
				if (smalldialogon == true) {
					
					<!--if (smalldialogclicked == false) {
						
						<!--$('#small-dialog0').hide();
						smalldialogon = false
						pop2string = "pop2 was clicked"
					<!--}
				
				}
				
				});
			$('#pop-input').click(function() {
				
				$('#pop-auto').show();
				
				});
			$('.sbox').keyup(function() {
				$('.autocomplete').html("")
				if ($(this).val() =="") {
						
						$('.autocomplete').html("")
					} else {
				$.ajax({
							 
							 type: "GET",
							 cache:false,
							 url: "api/search?query=" +$(this).val(),
							 processData: false,
							 contentType:"application/json",
							 data: '',
							 success: function(r) {
								 	r = JSON.parse(r)
									for (var i = 0; i < r.length; i++) {
											//console.log(r[i].body)
											$('.autocomplete').html(
												$('.autocomplete').html() + '<a href="posts?postid='+r[i].id+'"><li class="search-li">'+r[i].body+'</li></a>'
												
											)
										}
							 },
							 error: function(r) {
								 	console.log(r)
							 }
				});
				}
				
			})
			<!--infinite scroll start here
			var start = 5;
			var start2 = start;
            var working = false;
            begin = "i have not started"   
                $('#pop3').scroll(function() {
                        if ($('#pop3').scrollTop() + 680 >= $('#pop3').height()) {
                                if (working == false) {
                                        working = true;
                                        begin = "i have started" 

					
									   <!--ajax here
									   $.ajax({
							 
							 type: "GET",
							 cache:false,
							 url: "api/posts?start="+start,
							 processData: false,
							 contentType:"application/json",
							 data: '',
							 success: function(r) {
								 	var posts = JSON.parse(r)
									$.each(posts, function(index) {
										if (posts[index].PostImage == "") {
											
										$('.timelineposts').html(
										$('.timelineposts').html() +'<li class="table-view-cell" id="'+posts[index].PostId+'"   data-cnt="'+start+'"><div class=" icon-sli-arrow-down"  id="mymodal-opener'+posts[index].PostId+'" data-microid="'+posts[index].PostId+'" style="color: rgb(120 120 120) !important;float: right; margin-right: -50px;"></div><a class="a-unset" href="#"><img class="media-object profileimage pull-left darkmode-ignore" src="'+posts[index].ProfileImage+'"></a><div class="media-body"><div class=""><h4 class=" minwidth70" data-mipostid="'+posts[index].PostId+'">'+posts[index].PostedBy+'</h4><div class="" id="mymodal-root'+posts[index].PostId+'" style=""><div id="micro-dialog'+posts[index].PostId+'" class="mymodal micro-dialog-pos"></div></div><p class="fontsize10 text-italics">'+moment(posts[index].PostDate).fromNow()+'</p></div><br></div><div style="position: relative;top: -15px;margin: 0 auto;width: 90%;"><p class="text-darkened-blue padding-post">'+posts[index].PostBody+'</p></div><div class="text-b-width" style="width:129%"><div class="a-pos-new"><button class="btn-clear" data-id="'+posts[index].PostId+'" type="button"><span class="badge2shadow icon1-3x icon-sli-heart l-pos" style="background-color: white !important;"> <span class="likes-class" style="">'+posts[index].Likes+'</span></span></button><br/><button type="button" class="btn-clear cm-btn-pos" id="small-dialog0-btn" data-postid="'+posts[index].PostId+'"><span class="badge2shadow icon1-3x icon-sli-bubble r-pos" style="font-weight:normal !important;"></span></button></div></div></li> '
					)
											postid = posts[index].PostId;
											postbody = posts[index].PostBody;
											ilikedthepost = "no";
											if (posts[index].ILiked == 1) {
												ilikedthepost = "yes";
												$("[data-id='"+posts[index].PostId+"']").html('<span class="badge2shadow icon1-3x icon-heart l-pos redheart-post" data-likedid="liked'+posts[index].PostId+'" style="background-color: white !important;color:#fd1409 !important;"> <span class="likes-class" style="margin-left: 6px;">'+posts[index].Likes+'</span></span>')
											}
					
					} else {
											$('.timelineposts').html(
										$('.timelineposts').html() +'<li class="table-view-cell imgpost-max-height" id="'+posts[index].PostId+'"   data-cnt="'+start+'"><div class=" icon-sli-arrow-down "  id="mymodal-opener'+posts[index].PostId+'" data-microid="'+posts[index].PostId+'" style="color: rgb(120 120 120) !important;float: right; margin-right: -50px;"></div><a class="a-unset" href="#"><img class="media-object profileimage pull-left darkmode-ignore" src="'+posts[index].ProfileImage+'"></a><h4 class=" minwidth70" style="display: inline-block;" data-mipostid="'+posts[index].PostId+'">'+posts[index].PostedBy+'</h4><div><div class="" id="mymodal-root'+posts[index].PostId+'" style=""><div id="micro-dialog'+posts[index].PostId+'" class="mymodal micro-dialog-pos"></div></div><p class="fontsize10 text-italics">'+moment(posts[index].PostDate).fromNow()+'</p></div><div class="media-body" style="width:129%;margin-left:-15px;padding-top:15px"><div class=""><img src="" class="postimg" id="img'+posts[index].PostId+'" data-tempsrc="'+posts[index].PostImage+'"><br /></div><div style="position: relative;top: 5px;margin: 0 auto;width: 90%;"><p class="text-darkened-blue">'+posts[index].PostBody+'</p></div><div class="a-pos-new-img"><button class="btn-clear" data-id="'+posts[index].PostId+'" type="button"><span class="badge2shadow icon1-3x icon-sli-heart l-pos redheart-post" style="background-color: white !important;"> <span class="likes-class" style="">'+posts[index].Likes+'</span></span></button><br/><button type="button" class="btn-clear cm-btn-pos-img" id="small-dialog0-btn" data-postid="'+posts[index].PostId+'"><span class="badge2shadow icon1-3x icon-sli-bubble r-pos" style="font-weight:normal !important;"></span></button></div><br></div></li> '
					)
											postid = posts[index].PostId;
											postbody = posts[index].PostBody;
											ilikedthepost = "no";
											if (posts[index].ILiked == 1) {
												ilikedthepost = "yes";
												$("[data-id='"+posts[index].PostId+"']").html('<span class="badge2shadow icon1-3x icon-heart l-pos" data-likedid="liked'+posts[index].PostId+'" style="background-color: white !important;color:#fd1409 !important;"> <span class="likes-class" style="margin-left: 6px;">'+posts[index].Likes+'</span></span>')
											}
											}
					$('[data-mipostid]').on('click', function(){ 
						loc_postID = $(this).attr('data-mipostid');
						
						type = 'post'
						//newLocation(type)
						setTimeout(function() {window.location.href = 'posts?postid='+loc_postID+'';},1000);
					})
					$('[data-postid]').click(function(){
						buttonid = $(this).attr('data-postid');
						$('.timelinecomments').html("")
						$('.cm-form').html("")
						<!--Comment modal bg and slide in start
						cmmodal = document.getElementById('small-dialog0');
						modalbg.style.display = "flex";
							
				
						$('#small-dialog0').show();
						var effects = 'animated slideInUp';
	  					var effectsEnd = 'animationend oAnimationEnd mozAnimationEnd webkitAnimationEnd';
	  
	  
		  				$('#small-dialog0').addClass(effects).one(effectsEnd, function(){
			  			$('#small-dialog0').removeClass(effects);
			  
			  });
			  			<!--Comment modal bg and slide in end
				
						$.ajax({
							 
							 type: "GET",
							 cache:false,
							 url: "api/comments?postid="+$(this).attr('data-postid'),
							 processData: false,
							 contentType:"application/json",
							 data: '',
							 success: function(r) {
								 var comments = JSON.parse(r)
								 showCommentsModal(comments);
								 $.each(comments, function(index2) {
							
							
								 	 
									 $('.cm-form').html(
									 '<form class="contact-forms addnewpost-bar" ><div class="cm-block-border"><input type="text" placeholder="Reply..." name="commentbody" id="commentbody" rows="1" cols="30" class="addnewpost-input" style="padding:0 5px;width:60%; text-indent:10px;" required><div class="" style=""><label for="file_input"><i class=" icon-sli-camera icon1-5x text-lightened-blue" style=""></i></label><input name="upload_image_cm" style="display:none;" type="file" accept="image/*" onClick="uploadimg()" id="file_input"></div><button type="button" id="sendcomment" class="btn-clear2 " name="comment" style="display: inline-flex;margin-top: 5px;"><div class="badge2" style="">Reply</div></button></div></form>'
									 )
									 
									 if (comments[index2].CommentId == undefined) {
									 $('.timelinecomments').html(
									 $('.timelinecomments').html() +'<div style="margin-top:50px; margin-left:10px;"><p class="fontsize10 text-italics">Reply to this post...</p></div>'
									 )
										 } else {
											 
											 if (comments[index2].CommentImage == "") {
									  $('.timelinecomments').html(
									 $('.timelinecomments').html() +'<li class="table-view-cell comments_style" style=""><div class="a-pos2"><button class="btn-clear" data-id2="'+comments[index2].CommentId+'" type="button"><span class="badge2 l-pos icon-sli-heart"> <span class="" style="font-weight: bold !important;">'+comments[index2].Likes+'</span></span></button></div><a class="a-unset" href="#"><img class="media-object profileimage pull-left " src="'+comments[index2].CommenterImg+'"></a><div class="" style="margin-left: 55px; !important;"><div class="" ><h4 class="minwidth70" >'+comments[index2].CommentedBy+'</h4><p class="fontsize10 text-italics">'+moment(comments[index2].CommentDate).fromNow()+'</p></div><p class="media-body0 text-darkened-blue">'+comments[index2].Comment+'</p></div></li>'
									 )
										ilikedthecomment = "no";
										if (comments[index2].ILiked == 1) {
												ilikedthecomment = "yes";
												$("[data-id2='"+comments[index2].CommentId+"']").html('<span class="badge2 l-pos icon-heart" style="color:#fd1409 !important;"> <span class="" style="font-weight: bold !important; margin-left: 3px !important;">'+comments[index2].Likes+'</span></span>')
											}
									 imgcomment = 0;
									 venus = "never went in the previous if statement";
									  } else {
									 $('.timelinecomments').html(
									 $('.timelinecomments').html() +'<li class="table-view-cell comments_style" style=""><div class="a-pos2"><button class="btn-clear" data-id2="'+comments[index2].CommentId+'" type="button"><span class="badge2 l-pos icon-sli-heart"> <span class="" style="font-weight: bold !important;">'+comments[index2].Likes+'</span></span></button></div><a class="a-unset" href="#"><img class="media-object profileimage pull-left " src="'+comments[index2].CommenterImg+'"></a><div class="" style="margin-left: 55px; !important;"><div class=""><h4 class="minwidth70">'+comments[index2].CommentedBy+'</h4><img src="" class="postimg2" id="cmimg'+comments[index2].CommentId+'" data-tempsrc2="'+comments[index2].CommentImage+'"><p class="fontsize10 text-italics"style="padding-top:15px;">'+moment(comments[index2].CommentDate).fromNow()+'</p></div><p class="media-body0 text-darkened-blue">'+comments[index2].Comment+'</p></div></li>'
									 )
										ilikedthecomment = "no";
										if (comments[index2].ILiked == 1) {
												ilikedthecomment = "yes";
												$("[data-id2='"+comments[index2].CommentId+"']").html('<span class="badge2 l-pos icon-heart" style="color:#fd1409 !important;"> <span class="" style="font-weight: bold !important; margin-left: 3px !important;">'+comments[index2].Likes+'</span></span>')
											}
									
									 imgcomment =$(this).attr('data-tempsrc2');
									 venus = "never went in the previous if statement";
									 
									  }
										 }
										 
							$('#sendcomment').click(function(){			 							cmstring = "send comment clicked but comment not sent yet";
							$.ajax({
							 
							 type: "POST",
							 cache:false,
							 url: "api/createcomment?postid="+buttonid,
							 processData: false,
							 contentType:"application/json",
							 data: '{"body": "'+ $("#commentbody").val()+'", "commenter": "'+COMMENTERID+'","imgcomment":"'+$("#file_input").val()+'"}',
							 success: function(r) {
								//console.log(r) 
								
								
								
								cmstring ="Success: you have commented on this post";
								alertFunction("success",cmstring);
								$('#mymodal-bg').delay(1000).fadeOut('slow');
								$('#small-dialog0').delay(1000).fadeOut('slow');
								document.getElementById('commentbody').value = "";
							 },
							 error: function(r) {
								 cmstring ="comment didnt send and small dialong didnt reload";
								 }		  
										 });
										 <!--$("#timelinecomments").load(window.location.href+"#timelinecomments");
										 
							})
									 $('[data-id2]').click(function(){
							var buttonid2 = $(this).attr('data-id2');
							$.ajax({
							 
							 type: "POST",
							 cache:false,
							 url: "api/commentlikes?id="+$(this).attr('data-id2'),
							 processData: false,
							 contentType:"application/json",
							 data: '',
							 success: function(r) {
								 var res = JSON.parse(r)
								  $.ajax({
							 
							 	type: "POST",
							 	cache:false,
							 	url: "api/likedcomment?id="+buttonid2,
							 	processData: false,
							 	contentType:"application/json",
							 	data: '',
							 	success: function(r) {
								 	var response = JSON.parse(r)
								 	if (response.ILiked == 0) {
										ilikedthecomment = "no";
								 
								 	} if (response.ILiked == 1) {
										ilikedthecomment = "yes";
								 
								 	}
							
								 
								},
							 	error: function(r) {
								 		console.log(r)
								 	}
								});
								if (ilikedthecomment == "no") {
									$("[data-id2='"+buttonid2+"']").html('<span class="badge2 l-pos icon-heart animated bounceIn" style="color:#fd1409 !important;"> <span class="" style="font-weight: bold !important;margin-left: 3px !important;">'+res.Likes+'</span></span>')
								}
								if (ilikedthecomment == "yes") {
									$("[data-id2='"+buttonid2+"']").html('<span class="badge2 l-pos icon-sli-heart animated bounceIn" style="color:#4ecdc4 !important;"> <span class="" style="font-weight: bold !important;">'+res.Likes+'</span></span>')
								}
								 
								 
								 
								 
							},
							 error: function(r) {
								 	console.log(r)
								 }
						});
						})
								 })
								 $('.postimg2').each(function() {
                                        this.src=$(this).attr('data-tempsrc2')
										this.onload = function() {
											this.style.opacity = '1';
											} 
                                    });
								 	 
							},
							 error: function(r) {
								 	console.log(r)
								 }
						});
					});
					$('[data-microid]').click(function(){

						
						microbuttonid = $(this).attr('data-microid'); //gives postid
						mybtn = document.getElementById(''+microbuttonid+'');
						modalbtn = document.getElementById('mymodal-opener'+microbuttonid+'');
						modal = document.getElementById('micro-dialog'+microbuttonid+'');
						$("#micro-dialog"+microbuttonid+"").show();
						$("#micro-dialog"+microbuttonid+"").html('<ul class="table-view" style="box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);"><!--<li class="micro-dialog" id="apply-btn'+microbuttonid+'"><i class="icon-paperplane" style="color: rgba(0,30,34,0.85) !important;"></i> Apply</li>--><li class="micro-dialog" id="dlt-btn'+microbuttonid+'"><i class="icon-trash_can" style="color: rgba(0,30,34,0.85) !important;"></i> Delete</li><li class="micro-dialog" data-editid="'+mybtn.getAttribute('data-cnt')+'" id="edit-btn'+microbuttonid+'"><i class="icon-pen" style="color: rgba(0,30,34,0.85) !important;"></i> Edit</li><li class="micro-dialog" data-reportid="'+mybtn.getAttribute('data-cnt')+'" id="report-btn'+microbuttonid+'"><i class="icon-label" style="color: rgba(0,30,34,0.85) !important;"></i> Report</li><li class="micro-dialog" id="share-btn'+microbuttonid+'"><i class="icon-share" style="color: rgba(0,30,34,0.85) !important;"></i> Share With</li></ul>')
						microdialog = "on";
						applybtn = document.getElementById('apply-btn'+microbuttonid+'');
						dltbtn = document.getElementById('dlt-btn'+microbuttonid+'');
						editbtn = document.getElementById('edit-btn'+microbuttonid+'');
						reportbtn = document.getElementById('report-btn'+microbuttonid+'');
						sharebtn = document.getElementById('share-btn'+microbuttonid+'');
					})
					
					window.onclick = function(event) {
						if (event.target != modalbtn) {
							//modal.style.display = "none";
							microdialog = "trying";
							$("#micro-dialog"+microbuttonid+"").hide();
							}
						/*applybtn.onclick = function(e) {
						if (e.target == applybtn) {
							
							modalbg.style.display = "flex";
							
							$("#micro-dialog"+microbuttonid+"").hide();
							$('#mini-dialog-apply').show();
							$('#mini-dialog-apply').html('<div class="cm-header-bg w3-padding-8 round-top-edges text-light-blue"><h5 class="padding-navicon">Apply?</h5><p class="pull-right text-light-blue close-btn-pos" id="close-btn-dlt">x</p></div><div style="min-height:100px !important; max-height:150px !important; overflow:auto !important; -webkit-overflow-scrolling:touch"><div id="applypostprof"></div><ul><h6 class="text-italics w3-center" style="font-size: 16px !important; padding-top: 0px; margin-top: 45px !important;">Would you like to apply for this post?</h6></ul></div><div class="delete-form" style="padding-bottom:10px !important;"><form class="contact-forms" ><div class="slide-block-form"><button type="button" id="cancel-apply" class="btn-clear slide-block-button-bottom" name="apply"><div class="badge2invert slide-block-button-width" style="font-size:16px;">no</div></button><button style="position: relative;padding-bottom: 10px;" type="button" id="applypost" class="btn-clear slide-block-button-top" name="yes-apply"><div class="badge2 slide-block-button-width" style="font-size:16px;">yes</div></button></div></form></div>');
							var effects = 'animated slideInUp';
	  						var effectsEnd = 'animationend oAnimationEnd mozAnimationEnd webkitAnimationEnd';
	  
	  
		  					$('#mini-dialog-apply').addClass(effects).one(effectsEnd, function(){
			  					$('#mini-dialog-report').removeClass(effects);
			  
			  				});
			  
			  				
							
		  
						}
						}*/
						dltbtn.onclick = function(e) {
						if (e.target == dltbtn) {
							
							modalbg.style.display = "flex";
							//dltmodal.style.display = "block";
							$("#micro-dialog"+microbuttonid+"").hide();
							$('#mini-dialog-dlt').show();
							$('#mini-dialog-dlt').html('<div class="cm-header-bg w3-padding-8 round-top-edges text-light-blue"><h5 class="padding-navicon">Delete Post?</h5><p class="pull-right text-light-blue close-btn-pos" id="close-btn-dlt">x</p></div><div style="min-height:100px !important; max-height:150px !important; overflow:auto !important; -webkit-overflow-scrolling:touch"><div id="deletepostprof"></div><ul><h6 class="text-italics w3-center" style="font-size: 16px !important; padding-top: 0px; margin-top: 45px !important;">Are you sure you want to delete this post?</h6></ul></div><div class="delete-form" style="padding-bottom:10px !important;"><form class="contact-forms" ><div class="slide-block-form"><button type="button" id="cancel" class="btn-clear slide-block-button-bottom" name="comment"><div class="badge2invert slide-block-button-width" style="font-size:16px;">cancel</div></button><button style="position: relative;padding-bottom: 10px;" type="button" id="deletepost" class="btn-clear slide-block-button-top" name="comment"><div class="badge2 slide-block-button-width" style="font-size:16px;">delete</div></button></div></form></div>');
							var effects = 'animated slideInUp';
	  						var effectsEnd = 'animationend oAnimationEnd mozAnimationEnd webkitAnimationEnd';
	  
	  
		  					$('#mini-dialog-dlt').addClass(effects).one(effectsEnd, function(){
			  					$('#mini-dialog-dlt').removeClass(effects);
			  
			  				});
							
			  				$('#deletepost').click(function(){
								$.ajax({
							 
							 	type: "POST",
							 	cache:false,
							 	url: "api/deletepost?postid="+microbuttonid,
							 	processData: false,
							 	contentType:"application/json",
							 	data: '',
							 	success: function(r) {
									//console.log(r)
									toasttext = "You have deleted this post"; 
									alertFunction("success",toasttext);
									$('#mymodal-bg').delay(1000).fadeOut('slow');
									$('#mini-dialog-dlt').delay(1000).fadeOut('slow'); 
									setTimeout(function(){location.reload()},1500)
									
								},
								error: function(r) {
								 	//console.log(r)
									toasttext = "Oops something went wrong, pleast try again"; 
									alertFunction("warning",toasttext);
								 }

								});
							})
			  				
							
		  
						}
						}
						editbtn.onclick = function(e) {
						if (e.target == editbtn) {
							 editbtnid = $(this).attr('id');
							 editpostbody = 'wrong post body';
							 
							 $.ajax({
							 
							 type: "GET",
							 cache:false,
							 url: "api/posts?start="+$(this).attr('data-editid'),
							 processData: false,
							 contentType:"application/json",
							 data: '',
							 success: function(r) {
							 	var editposts = JSON.parse(r)
								$.each(editposts, function(editindex) {
									isequaledit = 'edit-btn'+editposts[editindex].PostId+'';
									modalbg.style.display = "flex";
									
							
									$("#micro-dialog"+microbuttonid+"").hide();
									$('#mini-dialog-edit').show();
									if (editbtnid == 'edit-btn'+editposts[editindex].PostId+'') {
									editpostbody = editposts[editindex].PostBody;
									neweditedpostid = editposts[editindex].PostId
			  						}
									$('#mini-dialog-edit').html('<div class="cm-header-bg w3-padding-8 round-top-edges text-light-blue"><h5 class="padding-navicon">Edit Post?</h5><p class="pull-right text-light-blue close-btn-pos" id="close-btn-dlt">x</p></div><div style="min-height:100px !important; max-height:150px !important; overflow:auto !important; -webkit-overflow-scrolling:touch"><div id="editpostprof"></div><ul><input id="neweditedpostbody" class="editpost-class" style="" value="'+editpostbody+'"></ul></div><div class="delete-form" style="padding-bottom:10px !important;"><form class="contact-forms" ><div class="slide-block-form"><button type="button" id="cancel" class="btn-clear slide-block-button-bottom" name="comment"><div class="badge2invert slide-block-button-width" style="font-size:16px;">cancel</div></button><button style="position: relative;" type="button" id="saveeditedpost" class="btn-clear slide-block-button-top" name="comment"><div class="badge2 slide-block-button-width" style="font-size:16px;">save</div></button></div></form></div>');
									var effects = 'animated slideInUp';
	  								var effectsEnd = 'animationend oAnimationEnd mozAnimationEnd webkitAnimationEnd';
	  
	  
		  							$('#mini-dialog-edit').addClass(effects).one(effectsEnd, function(){
			  						$('#mini-dialog-edit').removeClass(effects);
			  
			  						});
									$('#neweditedpostbody').on("input", function() {
										$('#saveeditedpost').html('<div class="badge2invert slide-block-button-width" style="font-size:16px;">save</div>');
									
									$('#saveeditedpost').click(function(){
										EDITEDIMAGE = "";
										$.ajax({
							 
							 			type: "POST",
							 			cache:false,
							 			url: "api/editedposts?postid="+neweditedpostid,
							 			processData: false,
							 			contentType:"application/json",
							 			data: '{"body": "'+ $("#neweditedpostbody").val()+'", "poster": "'+USERID+'","imgpost":"'+EDITEDIMAGE+'"}',
							 			success: function(r) {
											//postupdated = "the post "+editpostbody+" has successfully been edited and updated to "+$("#neweditedpostbody").val()+"";
											toasttext = "You have edited this post"; 
											alertFunction("success",toasttext);
											$('#mymodal-bg').delay(1000).fadeOut('slow');
											$('#mini-dialog-edit').delay(1000).fadeOut('slow');
											setTimeout(function(){location.reload()},1500);
										},
										error: function(r) {
							 				//console.log(r)
											toasttext = "Oops, something went wrong, please try again"; 
											alertFunction("warning",toasttext);
							 			}
							 			});
									})
									})
								})
							 
							 },
							 error: function(r) {
							 	console.log(r)
							 }
							 });
							
			  				
							
		  
						}
						}
						reportbtn.onclick = function(e) {
						if (e.target == reportbtn) {
							$.ajax({
							 
							type: "GET",
							cache:false,
							url: "api/posts?start="+$(this).attr('data-reportid'),
							processData: false,
							contentType:"application/json",
							data: '',
							success: function(r) {
								var rptposts = JSON.parse(r)
								$.each(rptposts, function(rptindex) {
									newreportpostid = rptposts[rptindex].PostId;
									reportpostbody = rptposts[rptindex].PostBody;
									modalbg.style.display = "flex";
							
									$("#micro-dialog"+microbuttonid+"").hide();
									$('#mini-dialog-report').show();
									$('#mini-dialog-report').html('<div class="cm-header-bg w3-padding-8 round-top-edges text-light-blue"><h5 class="padding-navicon">Report Post?</h5><p class="pull-right text-light-blue close-btn-pos" id="close-btn-dlt">x</p></div><div style="min-height:100px !important; max-height:400px !important; overflow:auto !important; -webkit-overflow-scrolling:touch"><div class="mycontainer"><div><label><input type="checkbox" class="report_checkbox" value="Hate Speech"><span>Hate Speech</span></label></div><div><label><input type="checkbox" class="report_checkbox" value="Spam"><span>Spam</span></label></div><div><label><input type="checkbox" class="report_checkbox" value="Broken Link"><span>Broken Link</span></label></div><div><label><input type="checkbox" id="report-other" class="report_checkbox_other" value="Other"><span onClick="show_report()">Other</span></label></div></div><div id="reportother" style="height:0%;position:absolute; opacity:0; width:70%;transition:0.5s;border:1px solid #989898e5; border-radius:30px; margin-left:15%;"><input type="text" id="otherissues_input" class="placeholder-report" placeholder="Report other issues" style=""></div></div><div><ul><h6 class="text-italics w3-center" style="font-size: 16px !important; padding-top: 10px; margin-top: 25px !important; border-top: 1px solid #989898e5;">Would you like to report this post?</h6></ul><div class="delete-form" style="padding-bottom:10px !important;"><form class="contact-forms" ><div class="slide-block-form"><button type="button" id="cancel" class="btn-clear slide-block-button-bottom " name="comment"><div class="badge2invert slide-block-button-width" style="font-size:16px;">no</div></button><button style="position: relative;padding-bottom: 10px;" type="button" id="report_button" class="btn-clear slide-block-button-top" name="comment"><div class="badge2 slide-block-button-width" style="font-size:16px;">yes</div></button></div></form></div></div>');
									var effects = 'animated slideInUp';
	  								var effectsEnd = 'animationend oAnimationEnd mozAnimationEnd webkitAnimationEnd';
	  
	  
		  							$('#mini-dialog-report').addClass(effects).one(effectsEnd, function(){
			  							$('#mini-dialog-report').removeClass(effects);
			  
			  						});
									$('.report_checkbox_other').on('change', function() {
										$('input.report_checkbox').not(this).prop('checked',false);
										$('#otherissues_input').on("input", function() {
											$('#report_button').html('<div class="badge2invert slide-block-button-width" id="reportthispost" style="font-size:16px;">yes</div>');
											$('#reportthispost').click(function(){
												var myCheckboxes = [];
												isitpushed = "no";
												$('.report_checkbox_other').each(function() {
													isitpushed = "not yet"
												

													if($(this).is(":checked")) {
														myCheckboxes.push($('#otherissues_input').val());
														isitpushed ="yes";
														
													}
												});
												myCheckboxes = myCheckboxes.toString();
												
												REPORTIMAGE = "";
												$.ajax({
							 
							 					type: "POST",
							 					cache:false,
							 					url: "api/reportpost?postid="+newreportpostid,
							 					processData: false,
							 					contentType:"application/json",
							 					data: '{"myCheckboxes":"'+myCheckboxes+'"}',
							 					success: function(data) {
													//reportupdated = "the post "+reportpostbody+" has successfully been reported and its flag number is: "+$("#neweditedpostbody").val()+"";
													toasttext = "You have reported this post"; 
													alertFunction("success",toasttext);
													setTimeout(function() {location.reload()},1500)
												},
												error: function(data) {
							 						//console.log(data)
													toasttext = "Oops, something went wrong, please try again"; 
													alertFunction("warning",toasttext);
							 					}
							 					});
											})
										})
									});
									$('.report_checkbox').on('change', function() {
										$('input.report_checkbox_other').not(this).prop('checked',false);
										document.getElementById("reportother").style.height = "0%";
										<!--$('#otherissues_input').hide();
										isitchecked = "not yet";
										if(this.checked) {
											$('#report_button').html('<div class="badge2invert slide-block-button-width" id="reportthispost" style="font-size:16px;">yes</div>');
											isitchecked = "yes";
											rpt = document.getElementById("reportthispost");
											
			  								$('#reportthispost').click(function(){
												var myCheckboxes = [];
												isitpushed = "no";
												$('.report_checkbox').each(function() {
													isitpushed = "not yet";
													
													if($(this).is(":checked")) {
														myCheckboxes.push($(this).val());
														isitpushed = "yes it should be";
														
													}
												
												});
												myCheckboxes = myCheckboxes.toString();
												
												REPORTIMAGE = "";
												$.ajax({
							 
							 					type: "POST",
							 					cache:false,
							 					url: "api/reportpost?postid="+newreportpostid,
							 					processData: false,
							 					contentType:"application/json",
							 					data: '{"myCheckboxes":"'+myCheckboxes+'"}',
							 					success: function(data) {
													//reportupdated = "the post "+reportpostbody+" has successfully been reported and its flag number is: "+$(".report_checkbox").val()+"";
													toasttext = "You have reported this post"; 
													alertFunction("success",toasttext);
													//console.log(data)
													<!--location.reload();
												},
												error: function(data) {
							 						//console.log(data)
													toasttext = "Oops, something went wrong, please try again"; 
													alertFunction("warning",toasttext);
							 					}
							 					});
											})
											
										}
			  						})
									

								})

							},
							error: function(r) {
								console.log(r)
							}
							});
							
							
		  
						}
						}
						sharebtn.onclick = function(e) {
						if (e.target == sharebtn) {
							
							modalbg.style.display = "flex";
							
							$("#micro-dialog"+microbuttonid+"").hide();
							$('#mini-dialog-share').show();
							$('#mini-dialog-share').html('<div id="share" style="" class="sharebtn-style"><div class="" style="position:relative;position: relative; left: 11.5% !important; padding-bottom: 5px; padding-top: 10px;"><a  class=" icon icon2x icon-facebook_circle facebook-btn text-light-blue iconbottomborderinvert" style="width:30%; opacity:0; transform: translateY(-100%);"></a><a  class=" icon icon2x icon-twitter_circle twitter-btn text-light-blue iconbottomborderinvert"  style="width:30%; opacity:0; transform: translateY(-100%);"></a><a  class=" icon icon2x icon-linked_in_circle linkedin-btn text-light-blue iconbottomborderinvert" onClick="copy()"  id="copy"  style="width:30%; opacity:0; transform: translateY(-100%);"></a></div></div>');
							var effects = 'animated slideInUp myshare-btn';
	  						var effectsEnd = 'animationend oAnimationEnd mozAnimationEnd webkitAnimationEnd';
	  
	  
		  					$('#mini-dialog-share').addClass(effects).one(effectsEnd, function(){
			  					$('#mini-dialog-report').removeClass(effects);
			  
			  				});
							const facebookBtn = document.querySelector(".facebook-btn");
							const twitterBtn = document.querySelector(".twitter-btn");
							const pintrestBtn = document.querySelector(".pintrest-btn");
							const linkedinBtn = document.querySelector(".linkedin-btn");

							function init() {
								const pinterestImg = document.querySelector('.postimg')
								let postUrl = encodeURI(document.location.href);
								let postTitle = encodeURI("Hi there, check this out: ");
								/*let postImg = encodeURI(pinterestImg.src);*/
	
								facebookBtn.setAttribute("href",`https://www.facebook.com/sharer/sharer.php?u=${postUrl}`);
								twitterBtn.setAttribute("href",`https://twitter.com/share?url=${postUrl}&text=${postTitle}`);
								/*pinterestBtn.setAttribute("href",`https://pinterest.com/pin/create/bookmarklet/?media=${postImg}&url=${postUrl}&description=${postTitle}`);*/
								linkedinBtn.setAttribute("href",`https://www.linkedin.com/shareArticle?url=${postUrl}&title=${postTitle}`);
							}
							init()
			  
			  				
							
		  
						}
						}
					}
					//$('#dlt-post').click(function(){
						
						//})
					//$('#pop2').click(function() {
						//kitty= "hello kitty"
				    //if ($('#pop2').click(function(){}) && !$('[data-microid]').click(function(){})){
					//$("#micro-dialog"+microbuttonid+"").hide();
						//microdialog = "off";
					//}
						//})
					<!-- Notifications start
					$.ajax({
						
					type:"GET",
					cache:false,
					url:"api/notifications",
					processData:false,
					contentType:"application/json",
					data: '',
					success: function(r) {
							var res = JSON.parse(r)
							
							if (res.Notifications != 0) {
							
							$('[data-notifid]').html('<div class="notification animated bounceIn" id="notify-num" style="animation-fill-mode:forwards !important;" >'+res.Notifications+'</div>');
							
								
							}
							<!--$('[data-u]').click(function(){
								
								
								

							<!--})
							
							
						 },
							 error: function(r) {
								 	console.log(r)
							 }
						
					});
					
					<!--Notifications end
					$('[data-id]').click(function(){
						var buttonid = $(this).attr('data-id');
						$.ajax({
							 
							 type: "POST",
							 cache:false,
							 url: "api/likes?id="+$(this).attr('data-id'),
							 processData: false,
							 contentType:"application/json",
							 data: '',
							 success: function(r) {
								 var res = JSON.parse(r)
								 $.ajax({
							 
							 	type: "POST",
							 	cache:false,
							 	url: "api/likedpost?id="+buttonid,
							 	processData: false,
							 	contentType:"application/json",
							 	data: '',
							 	success: function(r) {
								 	var response = JSON.parse(r)
								 	if (response.ILiked == 0) {
										ilikedthepost = "no";
								 
								 	} if (response.ILiked == 1) {
										ilikedthepost = "yes";
								 
								 	}
							
								 
								},
							 	error: function(r) {
								 		console.log(r)
								 	}
								});	 
							if (ilikedthepost == "no") {
								$("[data-id='"+buttonid+"']").html('<span class="badge2shadow icon1-3x icon-heart animated bounceIn l-pos redheart-post" style="background-color: white !important;color:#fd1409 !important;"> <span class="likes-class" style="margin-left: 6px;">'+res.Likes+'</span></span>')
							}
							if (ilikedthepost == "yes") {
								$("[data-id='"+buttonid+"']").html('<span class="badge2shadow icon1-3x icon-sli-heart animated bounceIn l-pos redheart-post" style="background-color: white !important;"> <span class="likes-class" style="">'+res.Likes+'</span></span>')
							}	 
							},
							 error: function(r) {
								 	console.log(r)
								 }
						});
						})
									})
									$('.postimg').each(function() {
                                        this.src=$(this).attr('data-tempsrc')
										this.onload = function() {
											this.style.opacity = '1';
											} 
                                    });
									
									start+=5;
									
									setTimeout(function(){
										working = false;
										
										},3000)
							 },
							 error: function(r) {
								 	console.log(r)
								 }
						});
                                }
                        }
                })
			
						<!--infinite scroll close here
					firststartval = 0;
					load_timeline(firststartval);
					start = firststartval+5
					function load_timeline(start) {
						
						$.ajax({
							 
							 type: "GET",
							 cache:false,
							 url: "api/posts?start="+start,
							 processData: false,
							 contentType:"application/json",
							 data: '',
							 success: function(r) {
								 	var posts = JSON.parse(r)
									
									$.each(posts, function(index) {
										if (posts[index].PostImage == "") {
										$('.timelineposts').html(
										$('.timelineposts').html() +'<li class="table-view-cell" id="'+posts[index].PostId+'" data-cnt="'+start+'"><div class=" icon-sli-arrow-down"  id="mymodal-opener'+posts[index].PostId+'" data-microid="'+posts[index].PostId+'" style="color: rgb(120 120 120) !important;float: right; margin-right: -50px;"></div><a class="a-unset" href="#"><img class="media-object profileimage pull-left " src="'+posts[index].ProfileImage+'"></a><div class="media-body"><div class=""><h4 class=" minwidth70" data-mipostid="'+posts[index].PostId+'">'+posts[index].PostedBy+'</h4><div class="" id="mymodal-root'+posts[index].PostId+'" style=""><div id="micro-dialog'+posts[index].PostId+'" class="mymodal micro-dialog-pos"></div></div><p class="fontsize10 text-italics">'+moment(posts[index].PostDate).fromNow()+'</p></div><br></div><div style="position: relative;top: -15px;margin: 0 auto;width: 90%;"><p class="text-darkened-blue padding-post">'+posts[index].PostBody+'</p></div><div class="text-b-width" style="width:129%"><div class="a-pos-new"><button class="btn-clear" data-id="'+posts[index].PostId+'" type="button"><span class="badge2shadow icon1-3x icon-sli-heart l-pos" style="background-color: white !important;"> <span class="likes-class" style="">'+posts[index].Likes+'</span></span></button><br/><button type="button" class="btn-clear cm-btn-pos" id="small-dialog0-btn" data-postid="'+posts[index].PostId+'"><span class="badge2shadow icon1-3x icon-sli-bubble r-pos" style="font-weight:normal !important;"></span></button></div></div></li> '
					)
											postid = posts[index].PostId;
											postbody = posts[index].PostBody;
											ilikedthepost = "no";

											if (posts[index].ILiked == 1) {
												ilikedthepost = "yes";
												$("[data-id='"+posts[index].PostId+"']").html('<span class="badge2shadow icon1-3x icon-heart l-pos redheart-post" data-likedid="liked'+posts[index].PostId+'" style="background-color: white !important;color:#fd1409 !important;"> <span class="likes-class" style="margin-left: 6px;">'+posts[index].Likes+'</span></span>')
											}
					
					} else {
											$('.timelineposts').html(
										$('.timelineposts').html() +'<li class="table-view-cell imgpost-max-height" id="'+posts[index].PostId+'"    data-cnt="'+start+'"><div class=" icon-sli-arrow-down "  id="mymodal-opener'+posts[index].PostId+'" data-microid="'+posts[index].PostId+'" style="color: rgb(120 120 120) !important;float: right; margin-right: -50px;"></div><a class="a-unset" href="#"><img class="media-object profileimage pull-left " src="'+posts[index].ProfileImage+'"></a><h4 class=" minwidth70" style="display: inline-block;" data-mipostid="'+posts[index].PostId+'">'+posts[index].PostedBy+'</h4><div><div class="" id="mymodal-root'+posts[index].PostId+'" style=""><div id="micro-dialog'+posts[index].PostId+'" class="mymodal micro-dialog-pos"></div></div><p class="fontsize10 text-italics">'+moment(posts[index].PostDate).fromNow()+'</p></div><div class="media-body" style="width:129%;margin-left:-15px;padding-top:15px"><div class=""><img src="" class="postimg" id="img'+posts[index].PostId+'" data-tempsrc="'+posts[index].PostImage+'"><br /></div><div style="position: relative;top: 5px;margin: 0 auto;width: 90%;"><p class="text-darkened-blue">'+posts[index].PostBody+'</p></div><div class="a-pos-new-img"><button class="btn-clear" data-id="'+posts[index].PostId+'" type="button"><span class="badge2shadow icon1-3x icon-sli-heart l-pos redheart-post" style="background-color: white !important;"> <span class="likes-class" style="">'+posts[index].Likes+'</span></span></button><br/><button type="button" class="btn-clear cm-btn-pos-img" id="small-dialog0-btn" data-postid="'+posts[index].PostId+'"><span class="badge2shadow icon1-3x icon-sli-bubble r-pos" style="font-weight:normal !important;"></span></button></div><br></div></li> '
					)
											postid = posts[index].PostId;
											postbody = posts[index].PostBody;
											ilikedthepost = "no";
											if (posts[index].ILiked == 1) {
												ilikedthepost = "yes";
												$("[data-id='"+posts[index].PostId+"']").html('<span class="badge2shadow icon1-3x icon-heart l-pos redheart-post" data-likedid="liked'+posts[index].PostId+'" style="background-color: white !important;color:#fd1409 !important;"> <span class="likes-class" style="margin-left: 6px;">'+posts[index].Likes+'</span></span>')
											}
											}
					$('[data-mipostid]').on('click', function(){ 
						loc_postID = $(this).attr('data-mipostid');
						
						type = 'post'
						//newLocation(type)
						setTimeout(function() {window.location.href = 'posts?postid='+loc_postID+'';},1000);
					})
					$('[data-postid]').click(function(){
						buttonid = $(this).attr('data-postid');
						$('.timelinecomments').html("")
						$('.cm-form').html("")
						<!--Comment modal bg and slide in start
						cmmodal = document.getElementById('small-dialog0');
						modalbg.style.display = "flex";
							
				
						$('#small-dialog0').show();
						var effects = 'animated slideInUp';
	  					var effectsEnd = 'animationend oAnimationEnd mozAnimationEnd webkitAnimationEnd';
	  
	  
		  				$('#small-dialog0').addClass(effects).one(effectsEnd, function(){
			  			$('#small-dialog0').removeClass(effects);
			  
			  });
			  			<!--Comment modal bg and slide in end
				
						$.ajax({
							 
							 type: "GET",
							 cache:false,
							 url: "api/comments?postid="+$(this).attr('data-postid'),
							 processData: false,
							 contentType:"application/json",
							 data: '',
							 success: function(r) {
								 var comments = JSON.parse(r)
								 showCommentsModal(comments);
								 $.each(comments, function(index2) {
							
							
								 	 
									 $('.cm-form').html(
									 '<form class="contact-forms addnewpost-bar" ><div class="cm-block-border"><input type="text" placeholder="Reply..." name="commentbody" id="commentbody" rows="1" cols="30" class="addnewpost-input" style="padding:0 5px;width:60%; text-indent:10px;" required><div class="" style=""><label for="file_input"><i class=" icon-sli-camera icon1-5x text-lightened-blue" style=""></i></label><input name="upload_image_cm" style="display:none;" type="file" accept="image/*" onClick="uploadimg()" id="file_input"></div><button type="button" id="sendcomment" class="btn-clear2 " name="comment" style="display: inline-flex;margin-top: 5px;"><div class="badge2" style="">Reply</div></button></div></form>'
									 )
									 
									 if (comments[index2].CommentId == undefined) {
									 $('.timelinecomments').html(
									 $('.timelinecomments').html() +'<div style="margin-top:50px; margin-left:10px;"><p class="fontsize10 text-italics">Reply to this post...</p></div>'
									 )
										 } else {
											 
											 if (comments[index2].CommentImage == "") {
									  $('.timelinecomments').html(
									 $('.timelinecomments').html() +'<li class="table-view-cell comments_style" style=""><div class="a-pos2"><button class="btn-clear" data-id2="'+comments[index2].CommentId+'" type="button"><span class="badge2 l-pos icon-sli-heart"> <span class="" style="font-weight: bold !important;">'+comments[index2].Likes+'</span></span></button></div><a class="a-unset" href="#"><img class="media-object profileimage pull-left " src="'+comments[index2].CommenterImg+'"></a><div class="" style="margin-left: 55px; !important;"><div class="" ><h4 class="minwidth70" >'+comments[index2].CommentedBy+'</h4><p class="fontsize10 text-italics">'+moment(comments[index2].CommentDate).fromNow()+'</p></div><p class="media-body0 text-darkened-blue">'+comments[index2].Comment+'</p></div></li>'
									 )
										ilikedthecomment = "no";
										if (comments[index2].ILiked == 1) {
												ilikedthecomment = "yes";
												$("[data-id2='"+comments[index2].CommentId+"']").html('<span class="badge2 l-pos icon-heart" style="color:#fd1409 !important;"> <span class="" style="font-weight: bold !important; margin-left: 3px !important;">'+comments[index2].Likes+'</span></span>')
											}
									 
									 imgcomment = 0;
									  } else {
									 $('.timelinecomments').html(
									 $('.timelinecomments').html() +'<li class="table-view-cell comments_style" style=""><div class="a-pos2"><button class="btn-clear" data-id2="'+comments[index2].CommentId+'" type="button"><span class="badge2 l-pos icon-sli-heart"> <span class="" style"font-weight: bold !important;">'+comments[index2].Likes+'</span></span></button></div><a class="a-unset" href="#"><img class="media-object profileimage pull-left " src="'+comments[index2].CommenterImg+'"></a><div class="" style="margin-left: 55px; !important;"><div class=""><h4 class="minwidth70">'+comments[index2].CommentedBy+'</h4><img src="" class="postimg2" id="cmimg'+comments[index2].CommentId+'" data-tempsrc2="'+comments[index2].CommentImage+'"><p class="fontsize10 text-italics"style="padding-top:15px;">'+moment(comments[index2].CommentDate).fromNow()+'</p></div><p class="media-body0 text-darkened-blue">'+comments[index2].Comment+'</p></div></li>'
									 )
										ilikedthecomment = "no";
										if (comments[index2].ILiked == 1) {
												ilikedthecomment = "yes";
												$("[data-id2='"+comments[index2].CommentId+"']").html('<span class="badge2 l-pos icon-heart" style="color:#fd1409 !important;"> <span class="" style="font-weight: bold !important; margin-left: 3px !important;">'+comments[index2].Likes+'</span></span>')
											}
									
									 imgcomment =$(this).attr('data-tempsrc2');
									 
									 
									  }
										 }
										 
							$('#sendcomment').click(function(){			 							cmstring = "send comment clicked but comment not sent yet";
							$.ajax({
							 
							 type: "POST",
							 cache:false,
							 url: "api/createcomment?postid="+buttonid,
							 processData: false,
							 contentType:"application/json",
							 data: '{"body": "'+ $("#commentbody").val()+'", "commenter": "'+COMMENTERID+'","imgcomment":"'+$("#file_input").val()+'"}',
							 success: function(r) {
								//console.log(r) 
								
								
								
								
								
								cmstring ="Success: you have commented on this post";
								alertFunction("success",cmstring);
								$('#mymodal-bg').delay(1000).fadeOut('slow');
								$('#small-dialog0').delay(1000).fadeOut('slow');
								document.getElementById('commentbody').value = "";
							 },
							 error: function(r) {
								 cmstring ="Warning: couldn't add new comment, please try again";
								 alertFunction("warning",cmstring);
								 }		  
										 });
										 <!--$("#timelinecomments").load(window.location.href+"#timelinecomments");
							})
									 $('[data-id2]').click(function(){
							var buttonid2 = $(this).attr('data-id2');
							$.ajax({
							 
							 type: "POST",
							 cache:false,
							 url: "api/commentlikes?id="+$(this).attr('data-id2'),
							 processData: false,
							 contentType:"application/json",
							 data: '',
							 success: function(r) {
								 var res = JSON.parse(r)
								 $.ajax({
							 
							 	type: "POST",
							 	cache:false,
							 	url: "api/likedcomment?id="+buttonid2,
							 	processData: false,
							 	contentType:"application/json",
							 	data: '',
							 	success: function(r) {
								 	var response = JSON.parse(r)
								 	if (response.ILiked == 0) {
										ilikedthecomment = "no";
								 
								 	} if (response.ILiked == 1) {
										ilikedthecomment = "yes";
								 
								 	}
							
								 
								},
							 	error: function(r) {
								 		console.log(r)
								 	}
								});
								if (ilikedthecomment == "no") {
									$("[data-id2='"+buttonid2+"']").html('<span class="badge2 l-pos icon-heart animated bounceIn" style="color:#fd1409 !important;"> <span class="" style="font-weight: bold !important; margin-left: 3px !important;">'+res.Likes+'</span></span>')
								}
								if (ilikedthecomment == "yes") {
									$("[data-id2='"+buttonid2+"']").html('<span class="badge2 l-pos icon-sli-heart animated bounceIn" style="color:#4ecdc4 !important;"> <span class="" style="font-weight: bold !important;">'+res.Likes+'</span></span>')
								}
								 
								 
								 
								 
								 
							},
							 error: function(r) {
								 	console.log(r)
								 }
						});
						})
								 })
								 $('.postimg2').each(function() {
                                        this.src=$(this).attr('data-tempsrc2')
										this.onload = function() {
											this.style.opacity = '1';
											} 
                                    });
								 	 
							},
							 error: function(r) {
								 	console.log(r)
								 }
						});
					});
					
					$('[data-microid]').click(function(){
						
						
						microbuttonid = $(this).attr('data-microid');
						mybtn = document.getElementById(''+microbuttonid+'');
						modal = document.getElementById('micro-dialog'+microbuttonid+'');
						modalbtn = document.getElementById('mymodal-opener'+microbuttonid+'');
						$("#micro-dialog"+microbuttonid+"").show();
						$("#micro-dialog"+microbuttonid+"").html('<ul class="table-view" style="box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);"><!--<li class="micro-dialog" id="apply-btn'+microbuttonid+'"><i class="icon-paperplane" style="color: rgba(0,30,34,0.85) !important;"></i> Apply</li>--><li class="micro-dialog" id="dlt-btn'+microbuttonid+'"><i class="icon-trash_can" style="color: rgba(0,30,34,0.85) !important;"></i> Delete</li><li class="micro-dialog" data-editid="'+mybtn.getAttribute('data-cnt')+'" id="edit-btn'+microbuttonid+'"><i class="icon-pen" style="color: rgba(0,30,34,0.85) !important;"></i> Edit</li><li class="micro-dialog" data-reportid="'+mybtn.getAttribute('data-cnt')+'" id="report-btn'+microbuttonid+'"><i class="icon-label" style="color: rgba(0,30,34,0.85) !important;"></i> Report</li><li class="micro-dialog" id="share-btn'+microbuttonid+'"><i class="icon-share" style="color: rgba(0,30,34,0.85) !important;"></i> Share With</li></ul>')
						microdialog = "on";
						applybtn = document.getElementById('apply-btn'+microbuttonid+'');
						dltbtn = document.getElementById('dlt-btn'+microbuttonid+'');
						editbtn = document.getElementById('edit-btn'+microbuttonid+'');
						reportbtn = document.getElementById('report-btn'+microbuttonid+'');
						sharebtn = document.getElementById('share-btn'+microbuttonid+'');
						
					})
					
					window.onclick = function(event) {
						if (event.target != modalbtn) {
							//modal.style.display = "none";
							microdialog = "trying";
							$("#micro-dialog"+microbuttonid+"").hide();
							} 
							minidialog = "not active";
						/*applybtn.onclick = function(e) {
						if (e.target == applybtn) {
							
							modalbg.style.display = "flex";
							
							$("#micro-dialog"+microbuttonid+"").hide();
							$('#mini-dialog-apply').show();
							$('#mini-dialog-apply').html('<div class="cm-header-bg w3-padding-8 round-top-edges text-light-blue"><h5 class="padding-navicon">Apply?</h5><p class="pull-right text-light-blue close-btn-pos" id="close-btn-dlt">x</p></div><div style="min-height:100px !important; max-height:150px !important; overflow:auto !important; -webkit-overflow-scrolling:touch"><div id="applypostprof"></div><ul><h6 class="text-italics w3-center" style="font-size: 16px !important; padding-top: 0px; margin-top: 45px !important;">Would you like to apply for this post?</h6></ul></div><div class="delete-form" style="padding-bottom:10px !important;"><form class="contact-forms" ><div class="slide-block-form"><button type="button" id="cancel-apply" class="btn-clear slide-block-button-bottom" name="apply"><div class="badge2invert slide-block-button-width" style="font-size:16px;">no</div></button><button style="position: relative;padding-bottom: 10px;" type="button" id="applypost" class="btn-clear slide-block-button-top" name="yes-apply"><div class="badge2 slide-block-button-width" style="font-size:16px;">yes</div></button></div></form></div>');
							var effects = 'animated slideInUp';
	  						var effectsEnd = 'animationend oAnimationEnd mozAnimationEnd webkitAnimationEnd';
	  
	  
		  					$('#mini-dialog-apply').addClass(effects).one(effectsEnd, function(){
			  					$('#mini-dialog-report').removeClass(effects);
			  
			  				});
			  
			  				
							
		  
						}
						}*/
						dltbtn.onclick = function(e) {
						if (e.target == dltbtn) {
							
							modalbg.style.display = "flex";
							//dltmodal.style.display = "block";
							$("#micro-dialog"+microbuttonid+"").hide();
							$('#mini-dialog-dlt').show();
							$('#mini-dialog-dlt').html('<div class="cm-header-bg w3-padding-8 round-top-edges text-light-blue"><h5 class="padding-navicon">Delete Post?</h5><p class="pull-right text-light-blue close-btn-pos" id="close-btn-dlt">x</p></div><div style="min-height:100px !important; max-height:150px !important; overflow:auto !important; -webkit-overflow-scrolling:touch"><div id="deletepostprof"></div><ul><h6 class="text-italics w3-center" style="font-size: 16px !important; padding-top: 0px; margin-top: 45px !important;">Are you sure you want to delete this post?</h6></ul></div><div class="delete-form" style="padding-bottom:10px !important;"><form class="contact-forms" ><div class="slide-block-form"><button type="button" id="cancel" class="btn-clear slide-block-button-bottom" name="comment"><div class="badge2invert slide-block-button-width" style="font-size:16px;">cancel</div></button><button style="position: relative;padding-bottom: 10px;" type="button" id="deletepost" class="btn-clear slide-block-button-top" name="comment"><div class="badge2 slide-block-button-width" style="font-size:16px;">delete</div></button></div></form></div>');
							var effects = 'animated slideInUp';
	  						var effectsEnd = 'animationend oAnimationEnd mozAnimationEnd webkitAnimationEnd';
	  
	  
		  					$('#mini-dialog-dlt').addClass(effects).one(effectsEnd, function(){
			  					$('#mini-dialog-dlt').removeClass(effects);
			  
			  				}); 
			  				$('#deletepost').click(function(){
								$.ajax({
							 
							 	type: "POST",
							 	cache:false,
							 	url: "api/deletepost?postid="+microbuttonid,
							 	processData: false,
							 	contentType:"application/json",
							 	data: '',
							 	success: function(r) {
									//console.log(r)
									toasttext = "You have deleted this post"; 
									alertFunction("success",toasttext);
									$('#mymodal-bg').delay(1000).fadeOut('slow');
									$('#mini-dialog-dlt').delay(1000).fadeOut('slow'); 
									setTimeout(function() {location.reload()},1500)
								},
								error: function(r) {
								 	//console.log(r)
									toasttext = "Oops, something went wrong, please try again"; 
									alertFunction("warning",toasttext);
								 }

								});
							})
			  				
							
		  
						}
						}
						editbtn.onclick = function(e) {
						if (e.target == editbtn) {
							editbtnid = $(this).attr('id');
							editpostbody = 'wrong post body';
							$.ajax({
							 
							 type: "GET",
							 cache:false,
							 url: "api/posts?start="+$(this).attr('data-editid'),
							 processData: false,
							 contentType:"application/json",
							 data: '',
							 success: function(r) {
							 	var editposts = JSON.parse(r)
								$.each(editposts, function(editindex) {
									isequaledit = 'edit-btn'+editposts[editindex].PostId+'';
									modalbg.style.display = "flex";
									
							
									$("#micro-dialog"+microbuttonid+"").hide();
									$('#mini-dialog-edit').show();
									if (editbtnid == 'edit-btn'+editposts[editindex].PostId+'') {
									editpostbody = editposts[editindex].PostBody;
									neweditedpostid = editposts[editindex].PostId
			  						}
									$('#mini-dialog-edit').html('<div class="cm-header-bg w3-padding-8 round-top-edges text-light-blue"><h5 class="padding-navicon">Edit Post?</h5><p class="pull-right text-light-blue close-btn-pos" id="close-btn-dlt">x</p></div><div style="min-height:100px !important; max-height:150px !important; overflow:auto !important; -webkit-overflow-scrolling:touch"><div id="editpostprof"></div><ul><input id="neweditedpostbody" class="editpost-class" style="" value="'+editpostbody+'"></ul></div><div class="delete-form" style="padding-bottom:10px !important;"><form class="contact-forms" ><div class="slide-block-form"><button type="button" id="cancel" class="btn-clear slide-block-button-bottom" name="comment"><div class="badge2invert slide-block-button-width" style="font-size:16px;">cancel</div></button><button style="position: relative;" type="button" id="saveeditedpost" class="btn-clear slide-block-button-top" name="comment"><div class="badge2 slide-block-button-width" style="font-size:16px;">save</div></button></div></form></div>');
									var effects = 'animated slideInUp';
	  								var effectsEnd = 'animationend oAnimationEnd mozAnimationEnd webkitAnimationEnd';
	  
	  
		  							$('#mini-dialog-edit').addClass(effects).one(effectsEnd, function(){
			  						$('#mini-dialog-edit').removeClass(effects);
			  
			  						});
									$('#neweditedpostbody').on("input", function() {
										$('#saveeditedpost').html('<div class="badge2invert slide-block-button-width" style="font-size:16px;">save</div>');
									
									$('#saveeditedpost').click(function(){
										EDITEDIMAGE = "";
										$.ajax({
							 
							 			type: "POST",
							 			cache:false,
							 			url: "api/editedposts?postid="+neweditedpostid,
							 			processData: false,
							 			contentType:"application/json",
							 			data: '{"body": "'+$("#neweditedpostbody").val()+'", "poster": "'+USERID+'","imgpost":"'+EDITEDIMAGE+'"}',
							 			success: function(r) {
											//postupdated = "the post "+editpostbody+" has successfully been edited and updated to "+$("#neweditedpostbody").val()+"";

											toasttext = "You have edited this post"; 
											alertFunction("success",toasttext);
											$('#mymodal-bg').delay(1000).fadeOut('slow');
											$('#mini-dialog-edit').delay(1000).fadeOut('slow');
											setTimeout(function() {location.reload()},1500)
										},
										error: function(r) {
							 				console.log(r)
											toasttext = "Oops, something went wrong, please try again"; 
											alertFunction("warning",toasttext);
							 			}
							 			});
									})
									})
								})
							 
							 },
							 error: function(r) {
							 	console.log(r)
							 }
							 });
			  				
							
		  
						}
						}
						reportbtn.onclick = function(e) {
						if (e.target == reportbtn) {
							$.ajax({
							 
							type: "GET",
							cache:false,
							url: "api/posts?start="+$(this).attr('data-reportid'),
							processData: false,
							contentType:"application/json",
							data: '',
							success: function(r) {
								var rptposts = JSON.parse(r)
								$.each(rptposts, function(rptindex) {
									newreportpostid = rptposts[rptindex].PostId;
									reportpostbody = rptposts[rptindex].PostBody;
									modalbg.style.display = "flex";
							
									$("#micro-dialog"+microbuttonid+"").hide();
									$('#mini-dialog-report').show();
									$('#mini-dialog-report').html('<div class="cm-header-bg w3-padding-8 round-top-edges text-light-blue"><h5 class="padding-navicon">Report Post?</h5><p class="pull-right text-light-blue close-btn-pos" id="close-btn-dlt">x</p></div><div style="min-height:100px !important; max-height:400px !important; overflow:auto !important; -webkit-overflow-scrolling:touch"><div class="mycontainer"><div><label><input type="checkbox" class="report_checkbox" value="Hate Speech"><span>Hate Speech</span></label></div><div><label><input type="checkbox" class="report_checkbox" value="Spam"><span>Spam</span></label></div><div><label><input type="checkbox" class="report_checkbox" value="Broken Link"><span>Broken Link</span></label></div><div><label><input type="checkbox" id="report-other" class="report_checkbox_other" value="Other"><span onClick="show_report()">Other</span></label></div></div><div id="reportother" style="height:0%;position:absolute; opacity:0; width:70%;transition:0.5s;border:1px solid #989898e5; border-radius:30px; margin-left:15%;"><input type="text" id="otherissues_input" class="placeholder-report" placeholder="Report other issues" style=""></div></div><div><ul><h6 class="text-italics w3-center" style="font-size: 16px !important; padding-top: 10px; margin-top: 25px !important; border-top: 1px solid #989898e5;">Would you like to report this post?</h6></ul><div class="delete-form" style="padding-bottom:10px !important;"><form class="contact-forms" ><div class="slide-block-form"><button type="button" id="cancel" class="btn-clear slide-block-button-bottom " name="comment"><div class="badge2invert slide-block-button-width" style="font-size:16px;">no</div></button><button style="position: relative;padding-bottom: 10px;" type="button" id="report_button" class="btn-clear slide-block-button-top" name="comment"><div class="badge2 slide-block-button-width" style="font-size:16px;">yes</div></button></div></form></div></div>');
									var effects = 'animated slideInUp';
	  								var effectsEnd = 'animationend oAnimationEnd mozAnimationEnd webkitAnimationEnd';
	  
	  
		  							$('#mini-dialog-report').addClass(effects).one(effectsEnd, function(){
			  							$('#mini-dialog-report').removeClass(effects);
			  
			  						});
									$('.report_checkbox_other').on('change', function() {
										$('input.report_checkbox').not(this).prop('checked',false);
										$('#otherissues_input').on("input", function() {
											$('#report_button').html('<div class="badge2invert slide-block-button-width" id="reportthispost" style="font-size:16px;">yes</div>');
											$('#reportthispost').click(function(){
												var myCheckboxes = [];
												isitpushed = "no";
												$('.report_checkbox_other').each(function() {
													isitpushed = "not yet"
												

													if($(this).is(":checked")) {
														myCheckboxes.push($('#otherissues_input').val());
														isitpushed ="yes";
														
													}
												});
												myCheckboxes = myCheckboxes.toString();
												
												REPORTIMAGE = "";
												$.ajax({
							 
							 					type: "POST",
							 					cache:false,
							 					url: "api/reportpost?postid="+newreportpostid,
							 					processData: false,
							 					contentType:"application/json",
							 					data: '{"myCheckboxes":"'+myCheckboxes+'"}',
							 					success: function(data) {
													//reportupdated = "the post "+reportpostbody+" has successfully been reported and its flag number is: "+$("#neweditedpostbody").val()+"";
													toasttext = "You have reported this post"; 
													alertFunction("success",toasttext);
													<!--location.reload();
													setTimeout(function() {location.reload()},1500)
												},
												error: function(data) {
							 						//console.log(data)
													toasttext = "Oops, something went wrong, please try again"; 
													alertFunction("warning",toasttext);
							 					}
							 					});
											})
										})
									});
									$('.report_checkbox').on('change', function() {
										$('input.report_checkbox_other').not(this).prop('checked',false);
										document.getElementById("reportother").style.height = "0%";
										<!--$('#otherissues_input').hide();
										isitchecked = "not yet";
										if(this.checked) {
											$('#report_button').html('<div class="badge2invert slide-block-button-width" id="reportthispost" style="font-size:16px;">yes</div>');
											isitchecked = "yes";
											rpt = document.getElementById("reportthispost");
											
			  								$('#reportthispost').click(function(){
												var myCheckboxes = [];
												isitpushed = "no";
												$('.report_checkbox').each(function() {
													isitpushed = "not yet";
													console.log(myCheckboxes)
													if($(this).is(":checked")) {
														myCheckboxes.push($(this).val());
														isitpushed = "yes it should be";
														
													}
												
												});
												myCheckboxes = myCheckboxes.toString();
												console.log(myCheckboxes)
												REPORTIMAGE = "";
												$.ajax({
							 
							 					type: "POST",
							 					cache:false,
							 					url: "api/reportpost?postid="+newreportpostid,
							 					processData: false,
							 					contentType:"application/json",
							 					data: '{"myCheckboxes":"'+myCheckboxes+'"}',
							 					success: function(data) {
													//reportupdated = "the post "+reportpostbody+" has successfully been reported and its flag number is: "+$(".report_checkbox").val()+"";
													toasttext = "You have reported this post"; 
													alertFunction("success",toasttext);
													setTimeout(function() {location.reload()})
												},
												error: function(data) {
							 						//console.log(data)
													toasttext = "Oops, something went wrong, please try again"; 
													alertFunction("warning",toasttext);
							 					}
							 					});
											})
											
										}
			  						})
									

								})

							},
							error: function(r) {
								console.log(r)
							}
							});
							
							
		  
						}
						}
						sharebtn.onclick = function(e) {
						if (e.target == sharebtn) {
							
							modalbg.style.display = "flex";
							
							$("#micro-dialog"+microbuttonid+"").hide();
							$('#mini-dialog-share').show();
							$('#mini-dialog-share').html('<div id="share" style="" class="sharebtn-style"><div class="" style="position:relative;position: relative; left: 11.5% !important; padding-bottom: 5px; padding-top: 10px;"><a  class=" icon icon2x icon-facebook_circle facebook-btn text-light-blue iconbottomborderinvert" style="width:30%; opacity:0; transform: translateY(-100%);"></a><a  class=" icon icon2x icon-twitter_circle twitter-btn text-light-blue iconbottomborderinvert"  style="width:30%; opacity:0; transform: translateY(-100%);"></a><a  class=" icon icon2x icon-linked_in_circle linkedin-btn text-light-blue iconbottomborderinvert"  style="width:30%; opacity:0; transform: translateY(-100%);"></a></div></div>');
							var effects = 'animated slideInUp myshare-btn';
	  						var effectsEnd = 'animationend oAnimationEnd mozAnimationEnd webkitAnimationEnd';
	  
	  
		  					$('#mini-dialog-share').addClass(effects).one(effectsEnd, function(){
			  					$('#mini-dialog-report').removeClass(effects);
			  
			  				});
			  				const facebookBtn = document.querySelector(".facebook-btn");
							const twitterBtn = document.querySelector(".twitter-btn");
							const pintrestBtn = document.querySelector(".pintrest-btn");
							const linkedinBtn = document.querySelector(".linkedin-btn");

							function init() {
								const pinterestImg = document.querySelector('.postimg')
								let postUrl = encodeURI(document.location.href);
								let postTitle = encodeURI("Hi there, check this out: ");
								/*let postImg = encodeURI(pinterestImg.src);*/
	
								facebookBtn.setAttribute("href",`https://www.facebook.com/sharer/sharer.php?u=${postUrl}`);
								twitterBtn.setAttribute("href",`https://twitter.com/share?url=${postUrl}&text=${postTitle}`);
								/*pinterestBtn.setAttribute("href",`https://pinterest.com/pin/create/bookmarklet/?media=${postImg}&url=${postUrl}&description=${postTitle}`);*/
								linkedinBtn.setAttribute("href",`https://www.linkedin.com/shareArticle?url=${postUrl}&title=${postTitle}`);
							}
							init()
			  				
							
		  
						}
						}
					}
					
					//$('#dlt-post').click(function(){
						
						//})
					//$('#pop2').click(function() {
						//kitty= "hello kitty"
				    //if ($('#pop2').click(function(){}) && !$('[data-microid]').click(function(){})){
					//$("#micro-dialog"+microbuttonid+"").hide();
						//microdialog = "off";
					//}
						//})
					
					<!--Notifications start
					$.ajax({
						
					type:"GET",
					cache:false,
					url:"api/notifications",
					processData:false,
					contentType:"application/json",
					data: '',
					success: function(r) {
							var res = JSON.parse(r)
							if (res.Notifications != 0) {
							$('[data-notifid]').html('<div class="notification animated bounceIn" style="" id="notify-num" >'+res.Notifications+'</div>');
							}
							<!--$('[data-u]').click(function(){
								
								
								
							<!--})
							
							},
							error: function(r) {
							console.log(r)
					 }
						
					});
					<!--Notifications end
					$('[data-id]').click(function(){
						var buttonid = $(this).attr('data-id');
						$.ajax({
							 
							 type: "POST",
							 cache:false,
							 url: "api/likes?id="+$(this).attr('data-id'),
							 processData: false,
							 contentType:"application/json",
							 data: '',
							 success: function(r) {
								 var res = JSON.parse(r)
								$.ajax({
							 
							 	type: "POST",
							 	cache:false,
							 	url: "api/likedpost?id="+buttonid,
							 	processData: false,
							 	contentType:"application/json",
							 	data: '',
							 	success: function(r) {
								 	var response = JSON.parse(r)
								 	if (response.ILiked == 0) {
										ilikedthepost = "no";
								 
								 	} if (response.ILiked == 1) {
										ilikedthepost = "yes";
								 
								 	}
							
								 
								},
							 	error: function(r) {
								 		console.log(r)
								 	}
								});	 
							if (ilikedthepost == "no") {
								$("[data-id='"+buttonid+"']").html('<span class="badge2shadow icon1-3x icon-heart animated bounceIn l-pos redheart-post" style="background-color: white !important;color:#fd1409 !important;"> <span class="likes-class" style="margin-left: 6px;">'+res.Likes+'</span></span>')
							}
							if (ilikedthepost == "yes") {
								$("[data-id='"+buttonid+"']").html('<span class="badge2shadow icon1-3x icon-sli-heart animated bounceIn l-pos" style="background-color: white !important;"> <span class="likes-class" style="">'+res.Likes+'</span></span>')
							}	 
							},
							 error: function(r) {
								 	console.log(r)
								 }
						});
						})
									})
									$('.postimg').each(function() {
                                        this.src=$(this).attr('data-tempsrc')
										this.onload = function() {
											this.style.opacity = '1';
											} 
                                    });
									
									start+=5;
									
									setTimeout(function(){
										working = false;
										
										},3000)
							 },
							 error: function(r) {
								 	console.log(r)
								 }
						});
					}
		});
		
		function showCommentsModal(comments) {
			
				
				$('#small-dialog0').show();
				
				smalldialogon= true;
			
																		
				
			<!--var output = "";
			<!--var personoutput = "";
			<!--for (var i = 0; i < res.length; i++) {
					<!--output += res[i].Comment;
					<!--output += " ~ ";
					<!--output += res[i].CommentedBy;
					<!--personoutput += res[i].CommentedBy;
					
				<!--}
			
			<!--$('.media-body0').html(output)
			<!--$('.media-body1').html(personoutput)
			}
		function uploadimg() {
			document.getElementById('file_input').value = this.value;
			}
		}
		}, error: function(r) {
			console.log("error in code")

		}
						
	});