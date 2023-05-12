

<script src="https://js.pusher.com/7.2/pusher.min.js"></script>
<div class="container-fluid px-0">

    @if (session('success'))
        <div class="alert alert-success text-center" role="alert">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger text-center" role="alert">
            {{ session('error') }}
        </div>
    @endif

    <div class="toast-container position-fixed top-0 end-0 p-3">
    </div>
</div>

<script>

// $(".toast-container").append(
//    `
//         <div id="liveToast" class="toast fade show" role="alert" aria-live="assertive" aria-atomic="true">
//           <div class="toast-header">
//             <img class="h-auto me-3" style="width:20px" src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/73/Flat_tick_icon.svg/512px-Flat_tick_icon.svg.png" class="rounded me-2" alt="...">
//             <strong class="me-auto">Thông Báo Mới</strong>
        
//             <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
//           </div>
//           <div class="toast-body">
//          ggg
//           </div>
//           </div>
//   `

//   )



    Pusher.logToConsole = true;
        var pusher = new Pusher('fb3c1e77ffa46104ee69', {
          cluster: 'ap1',
          encrypted:false,
          useTLS:false,
          tls:false,
          broadcaster: 'pusher',
         
      
       
        });
    
    
        var channel = pusher.subscribe('my-channel');
          let message = "";
        channel.bind('my-event', function(data) {
             message=JSON.stringify(data.message);
             if(message){

    //    console.log(message);

         $(".toast-container").append(
   `
        <div id="liveToast" class="toast fade show" role="alert" aria-live="assertive" aria-atomic="true">
          <div class="toast-header">
            <img class="h-auto me-3" style="width:20px" src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/73/Flat_tick_icon.svg/512px-Flat_tick_icon.svg.png" class="rounded me-2" alt="...">
            <strong class="me-auto">Thông Báo Mới</strong>
        
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
          </div>
          <div class="toast-body">
            ${message}
          </div>
          </div>
  `

  )}
    })
    


   
       
  

   
   

    
    </script>
