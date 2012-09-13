// JavaScript Document
// Slider Script
/*$ = jQuery.noConflict() 
$(document).ready(function(){
		
	$("#slider").easySlider({
		auto: true, 
		continuous: true
	});
	
});	*/


// JavaScript Document

// Slider Script
$ = jQuery.noConflict() 
$(document).ready(function(){
	//$(".multipage-link-next").click(function() {
				//if($('#edit-field-lname-und-0-value').val() == '') {
						//alert('Required');
						//$('#node_booking_form_group_user_info').show();
						//$('#node_booking_form_group_cart').hide();
						//$('#node_booking_form_group_rev_submit').hide();
					//}
	//});
	//$("[class*=solutionrow]").hide();
	//$("[class*=solutiontext]").hide();
	/*
	var pageurl = document.URL;
	var urlarr = pageurl.split("/");
	//alert(urlarr[urlarr.length-3]);
	if(urlarr[urlarr.length-3] == 'solutions-listing') {
		var solunstr = urlarr[urlarr.length-1];
		var  solunarr = solunstr.split("#");
		$(".solutionrow"+solunarr[0]).show();
		$(".solutiontext"+solunarr[0]).show();
	 // alert(Drupal.settings.basePath);
	  $("#imageDivLink"+solunarr[0]).html('<img src="'+Drupal.settings.basePath+'sites/default/files/pageimage/minus.png">');
	  
    }
    */

if ($("#slider").length > 0){
	$('#slider').show();
	//var speedval = 10000;
	//alert(Drupal.settings.basePath);
	var speedval = Drupal.settings.bl_tweaks.bannerspeed;
	$("#slider").easySlider({
		auto: true, 
		continuous: true,
		speed: speedval
	});
}
// Home page Accordian Script
$(".expand-list ul.open li ul.closed").hide();
$(".expand-list li .drop-down").click(function(){
	$("ul.closed").hide()
	$(this).next("ul.closed").toggle();
});

// News Script
$( ".news_list_2" ).hide();
$( ".news_list" ).click(function() {
	$( ".news_list" ).hide();
	$( ".news_list_2" ).show();
	$( ".news" ).animate({height:110},600);
});
$( ".news_list_2" ).click(function(){
	$( ".news_list_2" ).hide();
	$( ".news_list" ).show();
	$( ".news" ).animate({height:28},500);
});
// Hall Script
$( ".hall ul").animate({height:2},6);
$( ".hall .news_list" ).click(function() {
	$( ".hall .news_list" ).hide();
	$( ".hall .news_list_2" ).show();
	$( ".hall ul" ).animate({height:80},600);
});
$( ".hall .news_list_2" ).click(function(){
	$( ".hall .news_list_2" ).hide();
	$( ".hall .news_list" ).show();
	$( ".hall ul" ).animate({height:2},500);
});
//Rock Star Hall of Frame List Show Hide
$( ".rc_box2_list" ).hide();
$( ".hall_list" ).click(function() {
	$( ".hall_list" ).hide();
	$( ".hall_list_2" ).show();
	$( ".rc_box2_list" ).show("slow");
});
$( ".hall_list_2" ).click(function(){
	$( ".hall_list_2" ).hide();
	$( ".hall_list" ).show();
	$( ".rc_box2_list" ).hide("slow");
});

// dd menu Script
/*sfHover = function() {
	var sfEls = document.getElementById("art-menu-id").getElementsByTagName("li");
	for (var i=0; i<sfEls.length; i++) {
		sfEls[i].onmouseover=function() {
			this.className+=" hover";
		}
		sfEls[i].onmouseout=function() {
			this.className=this.className.replace(new RegExp(" hover\\b"), "");
		}
	}
}*/





// install flowplayers
	//$("a.player1234").flowplayer("http://releases.flowplayer.org/swf/flowplayer-3.2.11.swf"); 
/*if (window.attachEvent) window.attachEvent("onload", sfHover);*/
});	


function toggle5(showHideDiv,showhidesoltext,switchImgTag) {
	
	
	
	if ($("."+showHideDiv).is(':visible')) {
		//$("."+showHideDiv).slideUp(500);
		$("."+showHideDiv).hide();
		$("."+showhidesoltext).hide();
		$("#"+switchImgTag).html('<img src="'+Drupal.settings.basePath+'sites/default/files/pageimage/plus.png">');
	}
	else {
		$("[class*=solutionrow]").hide();
		$("[class*=solutiontext]").hide();
		$("[class=imagetoggle]").html('<img src="'+Drupal.settings.basePath+'sites/default/files/pageimage/plus.png">');
		//$("."+showHideDiv).slideDown(500);
		$("."+showhidesoltext).show();
		$("."+showHideDiv).show();
		$("#"+switchImgTag).html('<img src="'+Drupal.settings.basePath+'sites/default/files/pageimage/minus.png">');
	}
	
	
	
	
       /* var ele = document.getElementById(showHideDiv);
        var imageEle = document.getElementById(switchImgTag);
        if(ele.style.display == "block") {
                //ele.style.display = "none";
                imageEle.innerHTML = '<img src="/blportalnew/sites/default/files/pageimage/plus.png">';
		
        }
        else {
                ele.style.display = "block";
                imageEle.innerHTML = '<img src="/blportalnew/sites/default/files/pageimage/minus.png">';
               
        }
      */
}

