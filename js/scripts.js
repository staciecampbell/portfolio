$(function(){

	console.log("It's working");

	$('header').hide();
	
	setTimeout(function() {
     	$('.logo').fadeOut(500);
     	$('header').fadeIn(1500);
 	 },1500);

	 document.getElementById('go').onclick = function(e){
        e.preventDefault();
        move('.nav-2')
          .x(280)
          .end();
      };

      $('.exit').on('click', function(e){
      	e.preventDefault();
      	move('.nav-2')
      	.x(-250)
      	.end()
      });

      
      
          $(".sticker").sticky({topSpacing: 70});
        
     
});

