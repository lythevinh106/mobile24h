////show and hide item
function hide_and_show_product(item,btn,btn_span,sl_shows=10,sl_show_pluss=10){
    $(item).hide();
    $(item).each(function(index,value){ 
     let sl_show=sl_shows;
     if(index<sl_show){
  
       $(value).show();
     }
           
    })
    
  
    $(item).each(function(index,value){ 
     
    let sl_show=sl_shows;
    
   
    let sl=$(item).length;
    let sl_hide=0; 
    let sl_show_plus=sl_show_pluss;   
  
    sl_hide=sl-sl_show;
    
  
  
    if(  sl_hide>0 ){
      
        $(btn_span).text("xem thêm "+ sl_hide + " sản phẩm" );
      }
     else{
        $(btn_span).hide();
    }
  
  
  
   
  
  
  
     $(btn).click(function(){
      sl_show=sl_show+10;
     
        if(index<sl_show){
      
          $(value).show();
          sl_hide=sl-sl_show;
        if(  sl_hide>0 ){
          $(btn_span).text("xem thêm "+ sl_hide + " sản phẩm" );
        }
        else{
          $(btn_span).hide();
        }
         
         
        }
        else{
          $(value).hide();
        }
             
      })
  
  
    
      
    });
    
  
  }
   
    