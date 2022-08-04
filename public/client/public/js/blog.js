$(document).ready(function(){

    $('.related_slider').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,
        arrows: true,
       
      });
    

//lazyload home


$(".content-home-blog img").Lazy({
    effect: 'fadeIn'

});


      //lazyload category


      $(".category--left-item img").Lazy({
        effect: 'fadeIn'

    });



      
      ///scroll to top


      scrollToTop();











 function scrollToTop(){
  $(".btn-scroll-top").hide();

$(window).scroll(function(){
  let  pos_body = $('html,body').scrollTop();
 

  if(pos_body>=500){
    $(".btn-scroll-top").fadeIn(600);
  }
  else{
    $(".btn-scroll-top").fadeOut(600);
     
  }

   });

   $(".btn-scroll-top").click(function(){

    $("html,body").scrollTop(0);
   })




}



})