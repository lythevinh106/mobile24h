 
 
 
 $(document).ready(function(){
//slider

   $('.content-home-top__slider .row .content-top-slider-home').slick({
    slidesToShow: 2,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 1000,
  });





  $('.content-home-features__slider').slick({
    slidesToShow: 5,
    slidesToScroll: 1,
     autoplay: true,
    autoplaySpeed: 1000,
    arrows: true,
   
  });

  /////nut scroll toi muc
  scrollToCategory(".list-scroll--home",".list-scroll--home .list-scroll-box");









 
 ///tab-home
 

    $(".content-home-suggestion__main .tab li").removeClass("active");
    $(".content-home-suggestion__main .tab li:first").addClass("active");

    $(".tab-content .tab-content__box").hide();
    // $(".tab-content").find("#foryou").show();
     $(".tab-content__box:first").show();

    
      $(".content-home-suggestion__main .tab li").click(function(){


        $(".content-home-suggestion__main .tab li").removeClass("active");
        $(this).addClass("active");

        let id=$(this).find("a").attr("href");
        // console.log(id);

          $(".tab-content .tab-content__box").hide();

          $(id).show();
       

          
    })


    function scrollToCategory(name_list_scroll,list_scroll_item){

        $(name_list_scroll).hide();
     
      let pos_top_header=   $(".header-top__nav").offset().top;
    
    
        $(window).scroll(function(){
          let  pos_body = $('html,body').scrollTop();
          hideAndShowListScroll(pos_body, pos_top_header);           
           });
    
           $(".banner-left").hide();
    
     function  hideAndShowListScroll(pos_body,  pos_top_header)
     {
      if(pos_body> pos_top_header+500){
        $(name_list_scroll).fadeIn(600);
        $(".banner-left").fadeIn(600);
    
         }
       else{
        $(name_list_scroll).fadeOut(600);
        $(".banner-left").fadeOut(600);
    
     }}
    
    
     $(list_scroll_item).click(function (event) {
      event.preventDefault();
      let a = $(this).attr("href");
      // console.log(a);
    
      let position = $(a).offset().top;
      $("html,body").scrollTop(position);
      
      $(list_scroll_item).removeClass("active");
    
      $(this).addClass("active");
    
    })
    
    
      }




    });