













$(document).ready(function(){

 //modal box login

 modal_box(".header-top__nav .btn--login",".login-modal",".login-modal__btn--close","flex")


    // alert("ss");

   $('.content-home-top__slider .row .content-top-slider-home').slick({
        slidesToShow: 2,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,
      });





      $('.content-home-features__slider').slick({
        slidesToShow: 5,
        slidesToScroll: 1,
        // autoplay: true,
        autoplaySpeed: 2000,
        arrows: true,
       
      });


      ///tab-home
    //   $(".content-home-suggestion__main .tab li").each(function(value,index){

     

    //   });

    $(".tab-content .tab-content__box").hide();
    $(".tab-content").find("#foryou").show();
      $(".content-home-suggestion__main .tab li").click(function(){


        $(".content-home-suggestion__main .tab li").removeClass("active");
        $(this).addClass("active");

        let id=$(this).find("a").attr("href");
        // console.log(id);

          $(".tab-content .tab-content__box").hide();

          $(id).show();
       

          
    })




  /////nut scroll toi muc
  scrollToCategory(".list-scroll--home",".list-scroll--home .list-scroll-box");


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



   











//hide and show suggestion product

 $(".tab-content__box").each(function(){
  let id = $(this).attr("id");
  let tab_content_id="#"+id
  
  let noichuoi=tab_content_id +" .tab-content__box-item";
 $(noichuoi).each(function(index,value){    
      console.log(noichuoi);
    let sl= $(noichuoi).length;
    
    console.log(sl)
  
    let sl_show=8;
  
    if(index>=sl_show){
    
      $(value).hide();
    }
  
    let sl_hide=sl-sl_show;
  if(sl<=sl_show){

    $(tab_content_id).find('.content-home-suggestion__overview span').hide();

  }

   
    $(tab_content_id).find(".content-home-suggestion__overview span").text("Xem thêm sản phẩm");
   
    $(tab_content_id).find(".content-home-suggestion__overview ").click(function(){
  
        if(sl_hide>0){
          $(value).show();
          sl_hide=0;              
        }
        if( sl_hide==0) {
             $(this).find('span').hide();
        }
      })
  
    
  });
  
  

})



  





////scroll to top

scrollToTop();

 function scrollToTop(){
  $(".btn-scroll-top").hide();
$(window).scroll(function(){
  let  pos_body = $('html,body').scrollTop();
  let pos_footer=$('.footer').offset().top ;
  // console.log(pos_footer);
  if(pos_body>=pos_footer-1400){
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




   ///search 
   $(".header-top__search input").click(function(){

   $(".over-layer").css("display","block");
  


   })




  


   ////modal box
   
  
function modal_box(tag_is_click,modal,btn_no,display="block"){

  $(tag_is_click).click(function(){

      $(".over-layer").css("display","block");
      $(modal).css("display",display);
  })
  
  $(".over-layer").click(function(){
  
      $(this).css("display","none");
      $(modal).css("display","none")
  })
  
  $(btn_no).click(function(){
  
      $(modal).css("display","none");
      $(".over-layer").css("display","none");
  })}

   

});








   







  
  



