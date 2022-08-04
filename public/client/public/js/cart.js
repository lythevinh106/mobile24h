
function load_select(element) {
    let value = $(element).val();

    $.ajax({
        type: "post",
        url: "/cart/load_select",
        data: {

            value
        },
        dataType: "json",
        success: function(response) {

            if(response.error==false){
             $(".content-cart-pay-order__district").html(response.html);  
            }
          
        }
    });

}


 


function check_all(element) {
 

$(".check_children").click();
   

}





function check_children(element) {



    let total = 0;
    let cart_count = 0;
  
    $(".check_children").each(function(index, value) {
    // console.log($(value).prop("checked"));
        if ($(value).prop("checked") == true) {

            // console.log("true");
            let item_count = Number($(value).parents("tr").find(
                ".input_number_order").val())


            let sub_total = Number($(value).parents("tr").find(
                ".content-cart-detail-main__total-price-hidden").val())


            total += sub_total;
            cart_count += item_count;




            let id = $(value).parents("tr").attr("row-id");
            let element_cart_info = "#data-info-" + id;
            // console.log(element_cart_info);
            $(element_cart_info).show();



        } else  if($(value).prop("checked") == false){

            // console.log("false");
            let id = $(value).parents("tr").attr("row-id");
            let element_cart_info = "#data-info-" + id;
         
            $(element_cart_info).hide();

        }



    })


    // console.log(total);
    $(".content-cart-pay-main__total__price-hidden").val(total);

    let cart_total = format_price(total);


    $(".content-cart-pay-main__total__price").text(cart_total);

  
    /////update info cart in header


    $(".header-top__cart-detail-end__number").find("span").text(cart_count);
    $(".header-top__cart-detail-end__total").text(cart_total);

    $(".header-top__cart-total").text(cart_count)



}





$("#payment-btn-online").hide();
       

function hide_show_btn_payment(element) {
        if ($(element).val() == 0) {
            $("#payment-btn-online").hide();
            $("#payment-btn-cod").show();

        } else {
            $("#payment-btn-online").show();
            $("#payment-btn-cod").hide();


        }


    }



$(document).ready(function()



{





    
  ///modal box clear all
modal_box(".content-cart-detail-top__clear-all",".modal-box__cart-clear-all",".modal-box__cart-clear-all .btn-no")
 ///modal box clear 1 item
// modal_box(".content-cart-detail-main__clear",".modal-box__cart-clear-item",".modal-box__cart-clear-item .btn-no")





 
   
  
    

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






//////hide and show btn payment

 

    

})

