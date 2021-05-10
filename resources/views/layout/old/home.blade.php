@extends('layout.header');
	
<body style="font-family:Helvetica !important;margin-top:unset !important">
	<script src="js/jssor.slider-21.1.6.min.js" type="text/javascript"></script>
	<script type="text/javascript">
	

        jssor_1_slider_init = function() {
            
            var jssor_1_options = {
              $AutoPlay: false,
			  $ArrowKeyNavigation:0, //stops left/right arrows from moving sliders
			  $Loop: false,//stops sliders from looping
			  $DragOrientation:0, //this disables drag on the sliders to enable change to 1, so only clicking on the tabs will change sliders
              $ThumbnailNavigatorOptions: {
                $Class: $JssorThumbnailNavigator$,
                $Cols: 4,
                $Align: 300,
                $NoDrag: true
              }
            };
            
            var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);
            
            //responsive code begin
            //you can remove responsive code if you don't want the slider scales while window resizing
            
            //responsive code end
        };
        
    </script>

    <script type="text/javascript">
	
	function copy() {
		var copyText = document.querySelector("#copy");
		copyText.select();
		document.execCommand("copy");
	}
	<!--document.querySelector("#copy").addEventListener("click", copy)
	function show_report() {
		document.getElementById("reportother").style.display = "";
		document.getElementById("reportother").style.opacity = "1";
		document.getElementById("reportother").style.transition = "0.5s";
		document.getElementById("reportother").style.height = "100%";
		document.getElementById("reportother").style.position = "relative";
	}
	
    		function openNav() {document.getElementById("mySidenav").style.width = "90%";
		$('#mymodal-bg').fadeIn('slow');
		}
		
		function closeNav() {document.getElementById("mySidenav").style.width = "0";
		$('#mymodal-bg').fadeOut('slow');
		}
		
		function openNav2() {document.getElementById("mySidenav2").style.width = "350px";}
		
		function closeNav2() {document.getElementById("mySidenav2").style.width = "0";}

		function openNavedit() {
		
		document.getElementById("editprofilecv").style.width = "90%";
		$('#mymodal-bg').fadeIn('slow');
		}
		
		function closeNavedit() {document.getElementById("editprofilecv").style.width = "0";
		$('#mymodal-bg').fadeOut('slow');
		}
    </script>
    <script>
    function tab_loader(tabid) {
		div_load = document.getElementById(tabid).firstElementChild;
		div_load.addEventListener("load", function() {
			const loader= document.querySelectorAll(".loader");
			loader.forEach((load) =>{
				if ((!load.classList.contains("hidden")) && (!load.classList.contains("hidden_div"))) {
					load.className += " hidden_div"; //similar to add class so it becomes loader hidden
				}
			});
		});
		const loader= document.querySelectorAll(".loader");
		loader.forEach((load) =>{
				if ((load.classList.contains("hidden")) || (load.classList.contains("hidden_div"))) {
					load.classList.remove("hidden_div"); 
					//load.classList.remove("hidden"); 
				}
		});
	}
	
	function tab_loaderSecond() {
		document.addEventListener("DOMContentLoaded", function() {
		
					$(".loader").removeClass("hidden");
					$(".loader").addClass("hidden");
		})
	}
	//scroll to top function start
	function toTheTop() {
		element  = document.getElementById('pop3');
		if (element.scrollTop > 20) {
			$('#pop3').animate({scrollTop: 0},'slow');
			
		}
	}
				
	//scroll to top function end
	//Object/Iframe Functions Start
    function load_stories() {
		document.getElementById('story-content').innerHTML='<object type="text/html" data="story.html" style="width:100%; height:100vh !important; height:-moz-available; height: -webkit-fill-available; height:fill-available;position:absolute; top:45px;"></object>';
	}
    function load_messages() {
				
				document.getElementById('msg-content').innerHTML='<object type="text/html" data="messages.php" style="width:100%; height:100%; height:-moz-available; height: -webkit-fill-available; height:fill-available;"></object>';
				id = "msg-content";
				tab_loader(id)
	}
				
    function load_notifications() {
				document.getElementById('notify-content').innerHTML='<object type="text/html" data="notify.php" style="width:100%; height:100%; height:-moz-available; height: -webkit-fill-available; height:fill-available;"></object>';
				id = "notify-content";
				tab_loader(id)
				$.ajax({
						
								type:"POST",
								cache:false,
								url:"api/viewednotif",
								processData:false,
								contentType:"application/json",
								data: '',
								success: function(r) {
									var response = JSON.parse(r)
									$('[data-notifid]').html('<div class="notification" id="notify-num" style="display:none !important;" >'+response.Notifications+'</div>');
									

								},
							 	error: function(r) {
										console.log(r)
					 			}
						
								});
				}
	//Object/Iframe Functions End
	<!--relocation function start

	function newLocation(loc) {
					if (loc == "profile") {
						//window.location.href = 'profile.php?username='+COMMENTERNAME+'';
					} else if (loc == "logout") {
						//window.location.href = 'logout.php';
						window.location.href = 'signout';
					} else if (loc =="search") {
						setTimeout(function() {window.location.href = 'search.php';},1000);
					} else if (loc == "post") {
						loc_postID = $(this).attr('data-mipostid');
						//console.log("working")
						setTimeout(function() {window.location.href = 'posts?postid='+loc_postID+'';},1000);
					}
				}

	<!-- relocation function end
    </script>

	<script type="text/javascript">
		window.addEventListener("load", function () {
			const loader= document.querySelector(".loader");
			loader.className += " hidden"; //similar to add class so it becomes loader hidden
			const loaderSkeleton= document.querySelector(".loader-skeleton");
			setTimeout(function(){
				loaderSkeleton.className += " hidden";
			},3000);
		})
		
	</script>
    
	<header class="bar bar-nav" id="navbar" style="z-index:1 !important;height:51px;transition:0.3s;box-shadow: 0 4px 8px 0 rgb(0 0 0 / 20%), 0 3px 10px 0 rgb(0 0 0 / 19%)">
        
        <a onClick="openNav()" id="profimg">
        
        </a>
        <a href="index.html"><h1 class="title headerwidth headerposition text-light-blue">Timeline - Index</h1></a>
        <!-- search box start-->
        
        <input class="searchbox input-clear sbox" id="pop-input" placeholder="Search Posts" style="position:absolute !important;top:4px !important;right: 60px;">
        <ul id="pop-auto" class="search-list autocomplete" style="z-index:2000;right: 40px;top: 40px;">
        	
        
        </ul>
        
	
        
        <!-- search box end-->
        
      
        
    	
    </header>
<!--page loader start -->
	<!--<div class="loader">
		<img src="img_loading/loading.gif" alt="loading..."/>
		
	</div>-->	

<!--page loader end -->

<!--Loading skeleton screen start-->
  <div class="loader-skeleton">
    <div class="row">
      <div class="container-skeleton">
        <div class="grid-row grid-4-4">
          <div class="cards">
	    <div class="card_profileimage loading"></div>
	    <div class="card_name loading"></div>
            <div class="card_image loading"></div>
            <div class="card_title loading"></div>
            <div class="card_description loading"></div>
          </div>
          <div class="cards">
	    <div class="card_profileimage loading"></div>
	    <div class="card_name loading"></div>
            <div class="card_image loading"></div>
            <div class="card_title loading"></div>
            <div class="card_description loading"></div>
          </div>
          <div class="cards">
	    <div class="card_profileimage loading"></div>
	    <div class="card_name loading"></div>
            <div class="card_image loading"></div>
            <div class="card_title loading"></div>
            <div class="card_description loading"></div>
          </div>
          <div class="cards">
	    <div class="card_profileimage loading"></div>
	    <div class="card_name loading"></div>
            <div class="card_image loading"></div>
            <div class="card_title loading"></div>
            <div class="card_description loading"></div>
          </div>
          <div class="cards">
	    <div class="card_profileimage loading"></div>
	    <div class="card_name loading"></div>
            <div class="card_image loading"></div>
            <div class="card_title loading"></div>
            <div class="card_description loading"></div>
          </div>
          <div class="cards">
	    <div class="card_profileimage loading"></div>
	    <div class="card_name loading"></div>
            <div class="card_image loading"></div>
            <div class="card_title loading"></div>
            <div class="card_description loading"></div>
          </div>
          <div class="cards">
	    <div class="card_profileimage loading"></div>
	    <div class="card_name loading"></div>
            <div class="card_image loading"></div>
            <div class="card_title loading"></div>
            <div class="card_description loading"></div>
          </div>
          <div class="cards">
	    <div class="card_profileimage loading"></div>
	    <div class="card_name loading"></div>
            <div class="card_image loading"></div>
            <div class="card_title loading"></div>
            <div class="card_description loading"></div>
          </div>
        </div>
      </div>
    </div>
  </div>

<!--Loading skeleton screen end-->

<div id="pop2" class="content">
   <div id="jssor_1" class="mainwidth">


        <!-- Loading Screen -->
       
        
        <div data-u="slides" class="mainwidth2" style="top:0">
            <div style="display: none; overflow-y:auto !important;" id="pop5">
            
                <div class="itemwidth content" id="pop3" style="overflow-y:scroll !important;background-color: #fff;overflow-x: hidden;">
                
					
						
                    
                    <ul class="table-view">
                    
                    		<div class="timelineposts" style="top:46px;position:relative">
                    			
                    
                    		</div>
				<!-- loading div start -->
				<li>
    				<div class="div_loader_scroll" style="justify-content:center; align-items:center">
					<img src="img_loading/loading.gif" alt="loading..."/>
		
				</div>
				</li>
    				<!-- loading div end -->
    		    </ul>
                    	
                </div>
                    
            </div>
                
                
            
            
            
            <!--Start of micro and mini dialogue-->
            <!-- micro dialog-->
           
			<!-- mini dialog-->
            
    
   
           
 
            <!--End of micro and mini dialogue-->
            
            
                <!--Floating button start (For Add New Post)-->
                <a class="w3-btn-floating-large fixbutton  iconbackgroundinvert" id="add-new-post"><div class="fas fa-feather-alt text-light-blue"></div></a>
                <!--Floating button end (For Add New Post)-->
                
                
                <div data-u="thumb" class="iconbackgroundinvert"><div class="tab-item icon icon-sli-home text-light-blue iconbottomborderinvert" onClick="toTheTop()"></div></div>
            </div>
            
            <div style="display: none;">
                <div class="itemwidth content" style="background-color: #fff;overflow-y: initial;">
                    <div class="itemflow" style="margin-top: 45px;">
                    <h2 class="w3-center" id="notif">Notifications</h2>
                    <ul class="table-view">
        	<!--Notifications on load start-->
                    <div id="notify-content">
                    
                    
                    </div>
                    <!--Notifications on load end-->
        	
    	</ul>
        </div>
                </div>
                <!--Floating button start-->
                <!--<a class="w3-btn-floating-large fixbutton iconbackgroundinvert"><div class="icon icon-calendar text-light-blue"></div></a>-->
                <!--Floating button end-->
		
                <div data-u="thumb">
			<a data-notifid="notify-badge" class="tab-item icon icon-sli-bell text-light-blue iconbottomborderinvert" onClick="load_notifications()" data-transition="slide"></a>
			<div class="notification" id="notify-num" style="display:none" ></div>
		</div>
		
            </div>
            <div style="display: none;">
		<!--page loader start -->
			<div class="loader">
				<img src="img_loading/loading.gif" alt="loading..."/>
		
			</div>	

		<!--page loader end -->
                <div class="itemwidth content" style="background-color: #fff;overflow-y: initial;">
                    <div class="itemflow" style="margin-top: 45px;">
                    <h2 class="w3-center">Messages</h2>
                    <ul class="table-view">
                    
                    <!--Messages on load start-->
                    <div id="msg-content">
                    
                    
                    </div>
                    <!--Messages on load end-->
        	
    
    	</ul>
                    </div>
                </div>
                <div data-u="thumb"><a class="tab-item icon  icon-sli-bubbles text-light-blue iconbottomborderinvert" onClick="load_messages()"></a></div>
            </div>
            	<!-- messages tab end-->
		<!--search tab start-->
		 <div style="display: none;">
		<!--page loader start -->
			<div class="loader">
				<img src="img_loading/loading.gif" alt="loading..."/>
		
			</div>

		<!--page loader end -->
                <div class="itemwidth content" style="background-color: #b9b9b92e;overflow-y: initial;">
                    <div class="itemflow" style="margin-top: 45px;">
                    <h2 class="w3-center"></h2>
                    <ul class="table-view">
                    
                    <!--Search on load start-->
                    <div id="search-content">
                    
                    
                    </div>
                    <!--Search on load end-->
        	
    
    	</ul>
                    </div>
                </div>
                <div data-u="thumb"><a href="" class="tab-item icon  icon-sli-globe-alt text-light-blue iconbottomborderinvert" onClick="newLocation('search');return false;" data-transition="slide"></a></div>
            </div>
            <!--search tab end-->
            
        </div>
        
        
        
    </div>
</div>
    
    <script type="text/javascript">jssor_1_slider_init();</script>
    
    
    
        
    <div id="settingsModal" class="modal content">
    	<div class="settingbackground">
        <br>
         <img class="profileimage2 tab-item pull-left" src="" alt=""/>
        </div>
    	<a href="#settingsModal">Close Here</a>
    </div>
    
    <div id="mySidenav" class="sidenav">
    	
    
        <!--Profile content end-->
        
       

     	 </div>
<!--****************Start of Dark BG Modal****************-->


	<div id="mymodal-bg" class="bg-mymodal" style="display:none">
    
    <!--**************** Start of Replies aka Comments ****************-->
                <div class="cm-block">
<div class="center s-11 round-edges agile_book_form cm-inner-block animate" id="small-dialog0" style="display: none;">
<div class="cm-header-bg w3-padding-8 round-top-edges text-light-blue"><h5 class="padding-navicon">Replies</h5>
<p class="pull-right text-light-blue close-btn-pos" id="close-btn-cm">x</p>
</div>
<div style="min-height:150px !important; max-height:400px !important; overflow:auto !important; -webkit-overflow-scrolling:touch">
<ul>
<div class="timelinecomments" style="overflow:auto !important; " id="timelinecomments">
<h4>Add a reply</h4>
</div>

</ul>
</div>
<div class="cm-form" style="padding-bottom:10px !important;">
<!--<form class="contact-forms addnewpost-bar" ><div class="cm-block-border" style="top: 1px !important; width: 98%; margin-top: -3px;"><textarea type="text" placeholder="Reply..." name="commentbody" id="commentbody" rows="1" cols="30" class="addnewpost-input cm-input-pad maxwidth3 l-8 m-8 s-8"></textarea><button type="button" id="sendcomment" class="btn-clear s-3 l-3 m-3 w3-right" name="comment" style="width: 57px; right: 2px; top: 2px;"><div class="badge2">Reply</div></button><div class="btn-outlined myuploadbtn upload-btn" style="width: 52px !important;"><i class=" icon-sli-camera icon1-5x text-lightened-blue" style="top:2px; left:19px; position:absolute;"></i><input name="commentimg" type="file" accept="image/*"  onchange="uploadimg()"><input style="" type="text" id="file_input" readonly placeholder=""></div></div></form>-->
</div>
</div>
</div>
            
            
            <!--**************** End of Replies aka Comments ****************-->
    
     <!--**************** Start of Add New Post Block ****************-->
     
                <div class="cm-block">
<div class="center s-11 round-edges agile_book_form cm-inner-block animate" id="small-dialog-post" style="display: none;">
<div class="cm-header-bg w3-padding-8 round-top-edges text-light-blue"><h5 class="padding-navicon">New Post</h5>
<p class="pull-right text-light-blue close-btn-pos" id="close-btn-pst">x</p>
</div>
<div style="min-height:250px !important; max-height:500px !important; overflow-y:auto !important;overflow-x:hidden !important; -webkit-overflow-scrolling:touch">
<div id="addnewpostprof">
 
</div>
<ul>
<div class="timelinecomment" style="overflow:auto !important;">
<p class="text-italics" style="font-size: 14px !important; padding-top: 0px; margin-top: 10px !important;">Add new post</p>
</div>

<div class="crop_image badge2invert fas fa-crop-alt " id="crop_btn" style="display:none !important;margin-top: 36px;position: absolute;z-index: 10;right: 5%;padding:10px;font-size: large;"></div>
<div id="uploaded_image"></div>

<div id="image_demo" style="width:350px; margin-top:30px; display:none;"></div>
</ul>
</div>
<div class="cmm-form" style="padding-bottom:10px !important;">
<form class="contact-forms addnewpost-bar"><div class="cm-block-border"><input type="text" placeholder="Add New Post..." name="newpostbody" id="newpostbody" rows="1" cols="30" class="addnewpost-input" required style="padding:0 5px;width:60%; text-indent:10px;"><div class="" style=""><label for="upload_image"><i class=" icon-sli-camera icon1-5x text-lightened-blue" style=""></i></label><input name="upload_image" style="display:none" type="file" accept="image/*" id="upload_image"></div><button type="button" id="sendnewpost" class="btn-clear2 " name="comment" style="display: inline-flex;margin-top: 5px;"><div class="badge2" style="">Post</div></button></div></form>
</div>
</div>
</div>
            
            <div class="" style=""><label for="upload_image"><i class=" icon-sli-camera icon1-5x text-lightened-blue" style=""></i></label><input name="upload_image" style="display:none" type="file" accept="image/*" id="upload_image"></div>
            <!--**************** End of Add New Post Block ****************-->
            
            

<!--**************** Start of messages modal****************-->
         <div class="cm-block">
<div class="center s-11 round-edges agile_book_form cm-inner-block animate" id="small-dialog-msg" style="display: none;">
<div class="cm-header-bg w3-padding-8 round-top-edges text-light-blue"><h5 class="padding-navicon"  id="userheader"> </h5>
<p class="pull-right text-light-blue close-btn-pos" id="close-btn-msg">x</p>
</div>

<div class="msg-style" style="height:100%;max-height: 375px;">
<ul>
<br />
<div class="" id="m">
<p class="text-italics" style="font-size: 14px !important; padding-top: 0px; margin-top: 10px !important;">Write a new message</p>
</div>
</ul>
</div>





<div class="cmm-form" style="padding-bottom:10px !important;">


<form  class="contact-forms addnewpost-bar">
		<div class="cm-block-border">
			<input type="text" placeholder="Reply..." name="message" id="messagecontent" rows="1" cols="30" class="addnewpost-input" required style="padding:0 5px;width:60%; text-indent:10px;">
			<div class="" style="">
				<label for="upload_image_msg">
					<i class=" icon-sli-camera icon1-5x text-lightened-blue" style=""></i>
				</label>
				<input name="upload_image_msg" style="display:none" type="file" accept="image/*" id="upload_image_msg">
			</div>
			<button type="button" id="sendmessage" class="btn-clear2 " name="sendmessage" style="display: inline-flex;margin-top: 5px;">
				<div class="badge2" style="">Send</div>
			</button>
				
		</div>
	</form>
</div>
</div>
</div>
<!--**************** End of messages modal****************-->


<!--****************Start of Stories Modal****************-->

<div class="view_story" id="viewStory" style="display:none">
<div>
<span class="close_story" id="closeStory" style="z-index:10">x</span>
	<div id="story-content">
		<!-- loading div start -->
		
    		<div class="div_loader_scroll" style="justify-content:center; align-items:center">
			<img src="img_loading/loading.gif" alt="loading..."/>
		
		</div>
		
    		<!-- loading div end -->
	</div>
</div>
</div>
<!--****************End of Stories Modal****************-->


	   
            <!--**************** Start of Delete Post Modal ****************-->
    	 <div id="" class="cm-block" style="z-index:10;">
<div class="slide-block  center round-edges agile_book_form cm-inner-block" id="mini-dialog-apply" style="left: 0px !important;bottom:-38vh !important;display: none;">

</div>
<div class="slide-block  center round-edges agile_book_form cm-inner-block" id="mini-dialog-dlt" style="left: 0px !important;bottom:-38vh !important;display: none;">

</div>
<div class="slide-block  center  round-edges agile_book_form cm-inner-block" id="mini-dialog-edit" style="left: 0px !important;bottom:-38vh !important;display: none;">

</div>
<div class="slide-block  center  round-edges agile_book_form cm-inner-block" id="mini-dialog-report" style="left: 0px !important;bottom:-38vh !important;height: fit-content !important;display: none;">

</div>
<div class="center s-11 round-edges agile_book_form cm-inner-block" id="mini-dialog-share" style="top: 55%;bottom: 73% !important;height: 55px;display: none;background-color:transparent !important; border-color: transparent !important;">

</div>
</div>

<!--**************** End of Delete Post Modal ****************-->



    </div>
<!--****************End of Dark BG Modal****************-->




<!--**************** Start of toast notifications****************-->
<div class="alert" style="margin-top:0px !important;">
	<span class="fas fa-exclamation-circle"></span> 
	<span class="msg-a">Warning: This is a warning alert!</span>
	
	<span class="close-btn-alert">
		<span class="fas fa-times"></span>
	</span>

</div>

<div class="alert-success" style="margin-top:0px !important;">
	<span class="far fa-check-circle"></span> 
	<span class="msg-a-success">Success: You've completed this action</span>
	
	<span class="close-btn-alert-success">
		<span class="fas fa-times"></span>
	</span>

</div>


<!--**************** End of toast notifications****************-->
    <div class="bar-footer">
    
    </div>


@extends('layout.main');

</body>
</html>
