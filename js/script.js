
$(document).ready(function() {

	$('.grid').masonry({
		itemSelector: '.grid-item',
	});

  // cache the id
  var navbox = $('#review-tabs');
  // activate tab on click
  navbox.on('click', 'a', function (e) {
    var $this = $(this);
    // prevent the Default behavior
    e.preventDefault();
    // set the hash to the address bar
    window.location.hash = $this.attr('href');
    // activate the clicked tab
    $this.tab('show');
  })
  
  function refreshHash(){
      navbox.find('a[href="'+window.location.hash+'"]').tab('show');
  }
  
  // You might need a polyfill for this event
  $(window).bind('hashchange', refreshHash);
  if(window.location.hash){
    // show right tab on load (read hash from address bar)
    refreshHash();
  }

  function getQueryParams(qs) {
    qs = qs.split('+').join(' ');

    var params = {},
        tokens,
        re = /[?&]?([^=]+)=([^&]*)/g;

    while (tokens = re.exec(qs)) {
        params[decodeURIComponent(tokens[1])] = decodeURIComponent(tokens[2]);
    }

    return params;
  }

	var query = getQueryParams(document.location.search);
	var result_query = query.community;
	if(result_query=="true"){
		$('ul.nav-tabs li:eq(1)').removeClass('active');
		$('ul.nav-tabs li:eq(0)').addClass('active');
		$('#professional').removeClass('active');
		$('#community').addClass('active');
	}else{
	}


  // New Navigation 

  $('#menu-main_navigation > li.menu-item-has-children').children('a').append('<span class="caret"></span>');

  $('#menu-main_navigation > li.menu-item-has-children > ul > li.menu-item-has-children ').children('a').append('<span class="caret"></span>');

  $('#NavigationMain > nav > ul > .menu-item-has-children').children('a').append('<span class="caret"></span>');

  $('#NavigationMain > nav > ul > .menu-item-has-children > ul > .menu-item-has-children').children('a').append('<span class="caret-right"></span>');


  $('.NavigationMain > nav > ul > .menu-item-has-children').hover(function(){
     $(this).children('ul').addClass('display--block');
   }, function(){
     $(this).children('ul').removeClass('display--block');
   });

  $('.NavigationMain > nav > ul > .menu-item-has-children > ul > .menu-item-has-children').hover(function(){
     $(this).children('ul').addClass('display--block');
   }, function(){
     $(this).children('ul').removeClass('display--block');
   });

  // Show Mobile Navigation

  $('#btn-mobileMenu').click(function(){
    var attr = $(this).attr('data-attr');
    if(attr=='off'){
      $('.MobileMenu').addClass('MobileMenu--show');
      $('.wrapperMain').addClass('wrapperMain--hide');
      $(this).attr('data-attr', 'on'); 
    }else{
      $('.MobileMenu').removeClass('MobileMenu--show');
      $('.wrapperMain').removeClass('wrapperMain--hide');
      $(this).attr('data-attr', 'off');
    }
    
  });

  $(window).resize(function(){
    var width_window = $(window).width();
    if(width_window>900){
      $('.MobileMenu').removeClass('MobileMenu--show');
      $('.wrapperMain').removeClass('wrapperMain--hide');
      $(this).attr('data-attr', 'off');
    }
  });


  var currentCommment = window.location.href;

  if(currentCommment.indexOf('#respond')!= -1 ){
    $('ul.nav-tabs li').removeClass('active');
    $('ul.nav-tabs li:eq(2)').addClass('active');
    //$('#professional').removeClass('active');
    $('#community').addClass('active');
  }

  if(currentCommment.indexOf('#comment')!= -1){
    $('ul.nav-tabs li').removeClass('active');
    $('ul.nav-tabs li:eq(2)').addClass('active');
    //$('#professional').removeClass('active');
    $('#community').addClass('active');
  }


  if(currentCommment.indexOf('#community')!= -1){
    $('ul.nav-tabs li').removeClass('active');
    $('.tab-pane').removeClass('active');
    $('ul.nav-tabs li:eq(1)').addClass('active');
    //$('#professional').removeClass('active');
    $('#community').addClass('active');
  }

  if(currentCommment.indexOf('#diy')!= -1){
    $('ul.nav-tabs li').removeClass('active');
    $('.tab-pane').removeClass('active');
    $('ul.nav-tabs li:eq(2)').addClass('active');
    //$('#professional').removeClass('active');
    $('#diy').addClass('active');
  }

  if(currentCommment.indexOf('#video')!= -1){
    $('ul.nav-tabs li').removeClass('active');
    $('.tab-pane').removeClass('active');
    $('ul.nav-tabs li:eq(0)').addClass('active');
    //$('#professional').removeClass('active');
    $('#video').addClass('active');
  }

});