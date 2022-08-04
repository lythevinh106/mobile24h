$(document).ready(function()

{

////modal add

$(".modal-add").hide();



let flag =0;
$(".modal-add .fa-xmark").click(function(){
  flag=0;

  $(".modal-add").hide();

})




$(".info__right__btn-add").click(function(){



  
  $(".modal-add").show();
 
  $(".modal-add").animate({opacity:1},100)
  $(".modal-add").animate({right:'5px'},300,"swing");
  flag++;
  // $(".modal-add").animate({opacity:0},6000)

  if(flag>1){
    console.log(flag);
           
    $(".modal-add").hide(200);
    $(".modal-add").show(300);
    

  
   $(".modal-add").animate({opacity:1},100)
   $(".modal-add").animate({right:'5px'},300,"swing");


}


  })

 




 






 

    $('.content-product-detail__main .slider-for').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        fade: true,
        asNavFor: '.content-product-detail__main .slider-nav'
      });


    $('.content-product-detail__main .slider-nav').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        focusOnSelect: true,
        autoplaySpeed: 2000,
        dots:true,
        arrows: true,
        asNavFor: '.content-product-detail__main .slider-for',
      });


      ///slider-footer
     

      $('.content-product-detail__related__slider').slick({
        slidesToShow: 6,
        slidesToScroll: 1,
        focusOnSelect: true,
        autoplaySpeed: 2000,
       
        arrows: true,
        
      });

      ///hide and show description product
   
   
      let pos_description=$(".content-product-detail__main-description").offset().top;
  
       let dem=0;
      $(".content-product-detail__main-description .main-description__overview span").click(function(){
      dem++;
     $(".main-description__description").toggleClass("active");
        
   if(dem%2==0){
    $(this).text("Xem Chi Tiết")
   }
   else{
    $(this).text("Thu Gọn");



   }









      })


  


//input + -
  let min=$(".info__right__number_input").attr("min");
  let max=$(".info__right__number_input").attr("max");

      $(".info__right__number_minus").click(function(){
        let value= $(".info__right__number_input").attr("value");

      if(value>min){
        value--;
        $(".info__right__number_input").attr("value",value)

      }
    
      
       
        
       })
    
    
       $(".info__right__number_plus").click(function(){
        let value= $(".info__right__number_input").attr("value");
        if(value<max){
            value++;
         $(".info__right__number_input").attr("value",value)
    
          }
      
         
        })

 
   
  
    

function modal_box(tag_is_click,modal,modal_style,btn_no){

    $(tag_is_click).click(function(){

        $(".over-layer").css("display","block");
        $(modal).css("display","block");
    })
    
    $(".over-layer").click(function(){
    
        $(this).css("display","none");
        $(modal_style).css("display","none")
    })
    
    $(btn_no).click(function(){
    
        $(modal).css("display","none");
        $(".over-layer").css("display","none");
    })
    
    
    
    
    

}






    

})

