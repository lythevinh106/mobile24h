$(document).ready(function(){

 


//scroll toi muc

    scrollToCategory(".list-scroll--sale",".list-scroll--sale .list-scroll-box");





//  ////show and hide item
// function hide_and_show_product(item,btn,btn_span,sl_shows=10,sl_show_pluss=10){
//     $(item).hide();
//     $(item).each(function(index,value){ 
//      let sl_show=sl_shows;
//      if(index<sl_show){
  
//        $(value).show();
//      }
           
//     })
    
  
//     $(item).each(function(index,value){ 
     
//     let sl_show=sl_shows;
    
   
//     let sl=$(item).length;
//     let sl_hide=0; 
//     let sl_show_plus=sl_show_pluss;   
  
//     sl_hide=sl-sl_show;
    


//     if(  sl_hide>0 ){
      
//         $(btn_span).text("xem thêm "+ sl_hide + " sản phẩm" );
//       }
//      else{
//         $(btn_span).hide();
//     }



   



//      $(btn).click(function(){
//       sl_show=sl_show+10;
     
//         if(index<sl_show){
      
//           $(value).show();
//           sl_hide=sl-sl_show;
//         if(  sl_hide>0 ){
//           $(btn_span).text("xem thêm "+ sl_hide + " sản phẩm" );
//         }
//         else{
//           $(btn_span).hide();
//         }
         
         
//         }
//         else{
//           $(value).hide();
//         }
             
//       })
  
  
    
      
//     });
    

// }






//scroll toi muc 



  
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



   







  


})
