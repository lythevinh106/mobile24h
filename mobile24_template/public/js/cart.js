$(document).ready(function()



{
  ///modal box clear all
modal_box(".content-cart-detail-top__clear-all",".modal-box__cart-clear-all",".modal-box__cart-clear-all .btn-no")
 ///modal box clear 1 item
modal_box(".content-cart-detail-main__clear",".modal-box__cart-clear-item",".modal-box__cart-clear-item .btn-no")





 
   
  
    

function modal_box(tag_is_click,modal,btn_no){

    $(tag_is_click).click(function(){

        $(".over-layer").css("display","block");
        $(modal).css("display","block");
    })
    
    $(".over-layer").click(function(){
    
        $(this).css("display","none");
        $(modal).css("display","none")
    })
    
    $(btn_no).click(function(){
    
        $(modal).css("display","none");
        $(".over-layer").css("display","none");
    })
    
    
    
    
    

}










    

})

