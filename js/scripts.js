$(function(){

	console.log("It's working");

	$('.container').hide();
	
	setTimeout(function() {
     	$('.container').fadeIn(1500);
 	 },1500);

	 document.getElementById('go').onclick = function(e){
        e.preventDefault();
        move('.nav-2')
          .x(280)
          .end();
      };

      $('go').on('click', function(){
      	('.nav-2').addClass('sticker');
      });

      $('.exit').on('click', function(e){
      	e.preventDefault();
      	move('.nav-2')
      	.x(-250)
      	.end()
      });

      $(".sticker").sticky({topSpacing: 70});

      $(".sticker2").sticky({topSpacing: 70});
     

      // if($('header').is(':visible')){
      //   $('.nav-2').addClass('hide');
      // }
     // new WOW().init();

});

