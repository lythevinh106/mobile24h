




 


function add_cart_ajax(id, element) {

  // alert(typeof id)

  $.ajax({
      type: "get",
      url: "/cart/add_ajax",
      data: {

          id,

      },
      dataType: "json",
      success: function(response) {
          if (response.error === false) {


              /////update info cart in header
              // alert(response.html_li);
              let cart_total = format_price(response.cart_total);
              $(".header-top__cart-detail-end__number").find("span").text(response.cart_count);
              $(".header-top__cart-detail-end__total").text(cart_total);

              $(".header-top__cart-total").text(response.cart_count)

              let cart_info_select = "cart-info-" + id;
              let cart_info_select_id = "#cart-info-" + id;
              let kt = $(".header-top__cart-detail-main__number span").hasClass(cart_info_select);

              // alert(kt);
              if (kt === true) {

                  var number_item = Number($(cart_info_select_id).text());
                    

                    //   alert(number_item);

                     var last_number_item=number_item+1;
               
                //    alert(last_number_item);



                  $(cart_info_select_id).text(last_number_item);


              } else {

                  $(".header-top__cart-detail").find(".row").append(response.html_li)


              }




           
              /////////////////////




              $("body").append(response.html)
              // hide_and_show_modal($(element).parents("span"));

              $(".modal-add").animate({
                  opacity: 0.7

              }, 3000, "linear", function() {

              });

              $(".modal-add").animate({
                  right: "-1000px"

              }, 1500, "linear", function() {

              });










          } else {


          }
      }
  });

}





function updateAjax(rowId, element) {
    let value = $(element).val();
  
    // alert(value);
    $.ajax({
        type: "get",
        url: "/cart/update_ajax",
        data: {
            value,
            rowId
        },
        dataType: "json",
        success: function(response) {
  
            if (response.error == false) {
  
                // cart_total = Number(response.cart_total);
                // alert(response.cart_total);
                // alert(response.cart_count);
                // alert(response.cart_item_subtotal);
                // cart_item_id
                 

  
        ///subtotal

             $(element).parents('tr').find('.content-cart-detail-main__total-price-hidden').val(response.cart_item_subtotal);

                let sub_total = format_price(response.cart_item_subtotal);
  
                $(element).parents('tr').find('.content-cart-detail-main__total-price').html(
                    sub_total
                );
    
  



           ///////////total----cart
               let total=0;

       

//             $(".check_children").each(function(index,value){

// console.log($(value).prop("checked"));
//    if($(value).prop('checked')==false){

//     alert("sadd");
//    } })
          
             
             $(".content-cart-detail-main__total-price-hidden").each(function (indexInArray, value) { 
              

                 if($(value).parents("tr").find(".check_children").prop('checked')!=false){

                    let   sub_total= Number($(this).val());
                    total+=sub_total;
                 }
                    
            
                  
                  
                 

             });
           
                 // }

             $(".content-cart-pay-main__total__price-hidden").val(total);

                let cart_total = format_price(total);
            
  
                $(".content-cart-pay-main__total__price").text(cart_total);
             

             


                
  
                /////update info cart in header
  
  
                $(".header-top__cart-detail-end__number").find("span").text(response.cart_count);
                $(".header-top__cart-detail-end__total").text(cart_total);
  
                $(".header-top__cart-total").text(response.cart_count)
                // alert(response.cart_item_id);
  
                let cart_info_id = '#cart-info-' + response.cart_item_id;
                $(cart_info_id).text(value);
  
  
  
  
  
            }
  
        }
    });
  }
  ///https://simplelocalize.io/blog/posts/number-formatting-in-javascript/
  function format_price(price) {
  
  
    return price.toLocaleString('decimal', {
        minimumFractionDigits: 0,
        maximumFractionDigits: 0
    }) + " ₫";
  
  
  }







$(document).ready(function(){
  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});



  $("img").Lazy({
    effect : "fadeIn"
  });   



 /////x-close modal-add
//  $(".modal-add").click(function(){
//     alert("sad");
//     //  $(this).parents().find(".modal-add").hide();

// });
 //modal box login







    





//hide and show suggestion product

//  $(".tab-content__box").each(function(){
//   let id = $(this).attr("id");
//   let tab_content_id="#"+id
  
//   let noichuoi=tab_content_id +" .tab-content__box-item";
//  $(noichuoi).each(function(index,value){    
//       console.log(noichuoi);
//     let sl= $(noichuoi).length;
    
//     console.log(sl)
  
//     let sl_show=8;
  
//     if(index>=sl_show){
    
//       $(value).hide();
//     }
  
//     let sl_hide=sl-sl_show;
//   if(sl<=sl_show){

//     $(tab_content_id).find('.content-home-suggestion__overview span').hide();

//   }

   
//     $(tab_content_id).find(".content-home-suggestion__overview span").text("Xem thêm sản phẩm");
   
//     $(tab_content_id).find(".content-home-suggestion__overview ").click(function(){
  
//         if(sl_hide>0){
//           $(value).show();
//           sl_hide=0;              
//         }
//         if( sl_hide==0) {
//              $(this).find('span').hide();
//         }
//       })
  
    
//   });
  
  

// })


/////autocomplete

$("#key_search").keyup(function() {

  var string_search = $(this).val();

  if (string_search != "") {
      if (string_search.length >= 2) {
          $.ajax({
              type: "post",
              url: "/auto_complete",
              data: {


                  string_search
              },
              dataType: "json",
              success: function(response) {
                  $("#search_ajax").fadeIn();
                  $("#search_ajax").html(response.html);





              }
          });
      }
  } else {
      $("#search_ajax").fadeOut();


  }


});






  





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







   ////chuyen thanh k dau

  


   ////modal box
   
  
function modal_box(tag_is_click,modal,btn_no,display="block"){

  $(tag_is_click).click(function(){

      $(".over-layer").css("display","block");
      $(modal).css("display",display);
  })
  
  $(".over-layer").click(function(){
  
      $(this).css("display","none");
      $(modal).css("display","none");
      $("#search_ajax").fadeOut();
  })
  
  $(btn_no).click(function(){
  
      $(modal).css("display","none");
      $(".over-layer").css("display","none");
  })}

   

});








   







  
  



