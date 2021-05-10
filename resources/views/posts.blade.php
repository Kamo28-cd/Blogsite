<!DOCTYPE html>
<html style="height:100%">
<head>
<meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no">
<title>Vetro - Assessment</title>
<link href="css/ratchet.min.css" rel="stylesheet" type="text/css">
<link href="css/ownstyle.css" rel="stylesheet" type="text/css">
<link href="css/icons.css" rel="stylesheet" type="text/css">
<link href="css/w3.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="css/clndr.css" type="text/css" />

<link href="css/style.css" rel="stylesheet" type="text/css">
<link href="css/j-forms.css" rel="stylesheet" type="text/css">
<link href="css/animate.css" rel="stylesheet" type="text/css">

<link href="css/croppie.css" rel="stylesheet" type="text/css">
<link href="css/mymodal.css" rel="stylesheet" type="text/css">
<link href="css/popup-box.css" rel="stylesheet" type="text/css">
<link href="fontawesome/css/all.css" rel="stylesheet" type="text/css">
<!--web-fonts-->
<!--<link href="//fonts.googleapis.com/css?family=Romanesco" rel="stylesheet" type="text/css">-->
<!--<link href="//fonts.googleapis.com/css?family=Roboto:400,500,100,100italic,300,300italic,500italic,700,700italic,900,900italic,400italic" rel="stylesheet" type="text/css">-->

<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/croppie.js"></script>
<script type="text/javascript" src="js/mymodal.js"></script>
<script type="text/javascript" src="js/moment.js"></script>
<script type="text/javascript" src="js/toastalert.js"></script>

<script src="js/underscore-min.js"></script>
<script src= "js/moment-2.2.1.js"></script>
<script src="js/clndr.js"></script>
<script src="js/site.js"></script>



</head>

	
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
        <a href="index.html"><h1 class="title headerwidth headerposition text-light-blue">Timeline</h1></a>
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
                    
                    		<div class="singlepost" style="top:46px;position:relative">
                    			
                    
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
         <img class="profileimage2 tab-item pull-left" src="img/Kamo.jpg" alt=""/>
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


<script type="text/javascript" src="js/index.umd.min.js"></script>
<script type="text/javascript" src="js/custom.js"></script>
<script>
	start = 0;
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
				postID = $.urlParam('postid');
				//postID = '141';
				$.ajax({
							 
							 type: "GET",
							 cache:false,
							 url: "api/singlepost?postid="+postID,
							 processData: false,
							 contentType:"application/json",
							 data: '',
							 success: function(r) {
								posts = JSON.parse(r);
								
								posts = posts[0];
								
								if (posts.PostImage == "") {
											
										$('.singlepost').html(
										$('.singlepost').html() +'<li class="table-view-cell" id="'+posts.PostId+'"  ><div class=" icon-sli-arrow-down"  id="mymodal-opener'+posts.PostId+'" data-microid="'+posts.PostId+'" style="color: rgb(120 120 120) !important;float: right; margin-right: -50px;"></div><a class="a-unset" href="#"><img class="media-object profileimage pull-left darkmode-ignore" src="'+posts.ProfileImage+'"></a><div class="media-body"><div class=""><h4 class=" minwidth70">'+posts.PostedBy+'</h4><div class="" id="mymodal-root'+posts.PostId+'" style=""><div id="micro-dialog'+posts.PostId+'" class="mymodal micro-dialog-pos"></div></div><p class="fontsize10 text-italics">'+moment(posts.PostDate).fromNow()+'</p></div><br></div><div style="position: relative;top: -15px;margin: 0 auto;width: 90%;"><p class="text-darkened-blue padding-post">'+posts.PostBody+'</p></div><div class="text-b-width" style="width:129%"><div class="a-pos-new"><button class="btn-clear" data-likeid="'+posts.PostId+'" type="button"><span class="badge2shadow icon1-3x icon-sli-heart l-pos" style="background-color: white !important;"> <span class="likes-class" style="">'+posts.Likes+'</span></span></button><br/><button type="button" class="btn-clear cm-btn-pos" id="small-dialog0-btn" data-cmpostid="'+posts.PostId+'"><span class="badge2shadow icon1-3x icon-sli-bubble r-pos" style="font-weight:normal !important;"></span></button></div></div></li> '
					)
											postid = posts.PostId;
											postbody = posts.PostBody;
											ilikedthepost = "no";
											if (posts.ILiked == 1) {
												ilikedthepost = "yes";
												$("[data-likeid='"+posts.PostId+"']").html('<span class="badge2shadow icon1-3x icon-heart l-pos redheart-post" data-likedid="liked'+posts.PostId+'" style="background-color: white !important;color:#fd1409 !important;"> <span class="likes-class" style="margin-left: 6px;">'+posts.Likes+'</span></span>')
											}
					
					} else {
											$('.singlepost').html(
										$('.singlepost').html() +'<li class="table-view-cell imgpost-max-height" id="'+posts.PostId+'" ><div class=" icon-sli-arrow-down "  id="mymodal-opener'+posts.PostId+'" data-microid="'+posts.PostId+'" style="color: rgb(120 120 120) !important;float: right; margin-right: -50px;"></div><a class="a-unset" href="#"><img class="media-object profileimage pull-left darkmode-ignore" src="'+posts.ProfileImage+'"></a><h4 class=" minwidth70" style="display: inline-block;">'+posts.PostedBy+'</h4><div><div class="" id="mymodal-root'+posts.PostId+'" style=""><div id="micro-dialog'+posts.PostId+'" class="mymodal micro-dialog-pos"></div></div><p class="fontsize10 text-italics">'+moment(posts.PostDate).fromNow()+'</p></div><div class="media-body" style="width:129%;margin-left:-15px;padding-top:15px"><div class=""><img src="" class="postimg" id="img'+posts.PostId+'" data-tempsrc="'+posts.PostImage+'"><br /></div><div style="position: relative;top: 5px;margin: 0 auto;width: 90%;"><p class="text-darkened-blue">'+posts.PostBody+'</p></div><div class="a-pos-new-img"><button class="btn-clear" data-likeid="'+posts.PostId+'" type="button"><span class="badge2shadow icon1-3x icon-sli-heart l-pos redheart-post" style="background-color: white !important;"> <span class="likes-class" style="">'+posts.Likes+'</span></span></button><br/><button type="button" class="btn-clear cm-btn-pos-img" id="small-dialog0-btn" data-cmpostid="'+posts.PostId+'"><span class="badge2shadow icon1-3x icon-sli-bubble r-pos" style="font-weight:normal !important;"></span></button></div><br></div></li> '
					)
											postid = posts.PostId;
											postbody = posts.PostBody;
											ilikedthepost = "no";
											if (posts.ILiked == 1) {
												ilikedthepost = "yes";
												$("[data-likeid='"+posts.PostId+"']").html('<span class="badge2shadow icon1-3x icon-heart l-pos" data-likedid="liked'+posts.PostId+'" style="background-color: white !important;color:#fd1409 !important;"> <span class="likes-class" style="margin-left: 6px;">'+posts.Likes+'</span></span>')
											}
											}
											$('[data-cmpostid]').click(function(){
						buttonid = $(this).attr('data-cmpostid');
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
							 url: "api/comments?postid="+$(this).attr('data-cmpostid'),
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
									 $('.timelinecomments').html() +'<li class="table-view-cell comments_style" style=""><div class="a-pos2"><button class="btn-clear" data-cmlikeid2="'+comments[index2].CommentId+'" type="button"><span class="badge2 l-pos icon-sli-heart"> <span class="" style="font-weight: bold !important;">'+comments[index2].Likes+'</span></span></button></div><a class="a-unset" href="#"><img class="media-object profileimage pull-left " src="'+comments[index2].CommenterImg+'"></a><div class="" style="margin-left: 55px; !important;"><div class="" ><h4 class="minwidth70" >'+comments[index2].CommentedBy+'</h4><p class="fontsize10 text-italics">'+moment(comments[index2].CommentDate).fromNow()+'</p></div><p class="media-body0 text-darkened-blue">'+comments[index2].Comment+'</p></div></li>'
									 )
										ilikedthecomment = "no";
										if (comments[index2].ILiked == 1) {
												ilikedthecomment = "yes";
												$("[data-cmlikeid2='"+comments[index2].CommentId+"']").html('<span class="badge2 l-pos icon-heart" style="color:#fd1409 !important;"> <span class="" style="font-weight: bold !important; margin-left: 3px !important;">'+comments[index2].Likes+'</span></span>')
											}
									 imgcomment = 0;
									 venus = "never went in the previous if statement";
									  } else {
									 $('.timelinecomments').html(
									 $('.timelinecomments').html() +'<li class="table-view-cell comments_style" style=""><div class="a-pos2"><button class="btn-clear" data-cmlikeid2="'+comments[index2].CommentId+'" type="button"><span class="badge2 l-pos icon-sli-heart"> <span class="" style="font-weight: bold !important;">'+comments[index2].Likes+'</span></span></button></div><a class="a-unset" href="#"><img class="media-object profileimage pull-left " src="'+comments[index2].CommenterImg+'"></a><div class="" style="margin-left: 55px; !important;"><div class=""><h4 class="minwidth70">'+comments[index2].CommentedBy+'</h4><img src="" class="postimg2" id="cmimg'+comments[index2].CommentId+'" data-tempsrc2="'+comments[index2].CommentImage+'"><p class="fontsize10 text-italics"style="padding-top:15px;">'+moment(comments[index2].CommentDate).fromNow()+'</p></div><p class="media-body0 text-darkened-blue">'+comments[index2].Comment+'</p></div></li>'
									 )
										ilikedthecomment = "no";
										if (comments[index2].ILiked == 1) {
												ilikedthecomment = "yes";
												$("[data-cmlikeid2='"+comments[index2].CommentId+"']").html('<span class="badge2 l-pos icon-heart" style="color:#fd1409 !important;"> <span class="" style="font-weight: bold !important; margin-left: 3px !important;">'+comments[index2].Likes+'</span></span>')
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
									 $('[data-cmlikeid2]').click(function(){
							var buttonid2 = $(this).attr('data-cmlikeid2');
							$.ajax({
							 
							 type: "POST",
							 cache:false,
							 url: "api/commentlikes?id="+$(this).attr('data-cmlikeid2'),
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
									$("[data-cmlikeid2='"+buttonid2+"']").html('<span class="badge2 l-pos icon-heart animated bounceIn" style="color:#fd1409 !important;"> <span class="" style="font-weight: bold !important;margin-left: 3px !important;">'+res.Likes+'</span></span>')
								}
								if (ilikedthecomment == "yes") {
									$("[data-cmlikeid2='"+buttonid2+"']").html('<span class="badge2 l-pos icon-sli-heart animated bounceIn" style="color:#4ecdc4 !important;"> <span class="" style="font-weight: bold !important;">'+res.Likes+'</span></span>')
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
//likes start
					$('[data-likeid]').click(function(){
						var buttonid = $(this).attr('data-likeid');
						$.ajax({
							 
							 type: "POST",
							 cache:false,
							 url: "api/likes?id="+$(this).attr('data-likeid'),
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
								$("[data-likeid='"+buttonid+"']").html('<span class="badge2shadow icon1-3x icon-heart animated bounceIn l-pos redheart-post" style="background-color: white !important;color:#fd1409 !important;"> <span class="likes-class" style="margin-left: 6px;">'+res.Likes+'</span></span>')
							}
							if (ilikedthepost == "yes") {
								$("[data-likeid='"+buttonid+"']").html('<span class="badge2shadow icon1-3x icon-sli-heart animated bounceIn l-pos redheart-post" style="background-color: white !important;"> <span class="likes-class" style="">'+res.Likes+'</span></span>')
							}	 
							},
							 error: function(r) {
								 	console.log(r)
								 }
						});
						})
//likes end
							 },
							 error: function(r) {
								console.log(r)
							 }
							 
				}); 
function showCommentsModal(comments) {
			
				
				$('#small-dialog0').show();
				
				smalldialogon= true;
			
																		
				
			
}
	//singlePost()
</script>

</body>
</html>
