$(document).ready(function() {
//$('div.expand-list > ul.menu > li.nolink>span').wrap('<div class="drop_menu"></ul>');
//$('div.expand-list > ul.menu > li.nolink>span>div.drop_down>ul').wrap('<div class="closed"></div>');
$('div.pane-content > ul').removeClass('menu').addClass('open');
$('li').removeClass('first nolink expanded last leaf');
$('div.pane-content > ul>li').removeAttr('class');

//$('ul.open li:nth-child(1) span').text();
$('div.pane-content > ul>li>span').addClass('drop-down')
$('div.pane-content > ul>li>ul.menu').removeClass('menu').addClass('closed');
$('div.pane-content > ul>li>ul.closed>li').removeAttr('class');
$('div.pane-content > ul>li>ul.closed').hide();
//wrap('<ul class="closed" style="display: none;"></ul>');
 //var count=$('div.expand-list').find('span').size();
 	
/*var i==0;
  $('div.expand-list>ul>li>span').each(function(){
  	var i++;
  
  	}
  );*/
 
$('ul.open li:nth-child(1) span').click(function() {
  $('ul.open li:nth-child(1) ul.closed').toggle('slow', function() {
// attr('style','display: none')
  });
}); 
 
$('ul.open li:nth-child(2) span').click(function() {
  $('ul.open li:nth-child(2) ul.closed').toggle('slow', function() {
// attr('style','display: none')
  });
});


$('ul.open li:nth-child(3) span').click(function() {
  $('ul.open li:nth-child(3) ul.closed').toggle('slow', function() {
// attr('style','display: none')
  });
});


$('ul.open li:nth-child(4) span').click(function() {
  $('ul.open li:nth-child(4) ul.closed').toggle('slow', function() {
// attr('style','display: none')
  });
}); 
 
$('ul.open li:nth-child(5) span').click(function() {
  $('ul.open li:nth-child(5) ul.closed').toggle('slow', function() {
// attr('style','display: none')
  });
});


$('ul.open li:nth-child(6) span').click(function() {
  $('ul.open li:nth-child(6) ul.closed').toggle('slow', function() {
// attr('style','display: none')
  });
});

///********************* Code for adding class in footer menu management systems ******************////

$('div#footer>div.inner_900>ul').first().removeClass('menu').addClass('menu fast');

$('input#edit-submit').click(function() {
 if($('textarea#edit-comment-body-und-0-value').val()==""){
 	alert("Comment field is blank");
  return false;
  }
});
   
   $('dl.node-type-list dt:nth-child(9)').attr('style','display: none');
   $('dl.node-type-list dd:nth-child(10)').attr('style','display: none');
   $('div#edit-basic').hide();

});


