<div class="container">
  
    
         <input type="hidden" name="total_pages" value="{{$recivedRequests->lastPage()}}">
         <input type="hidden" name="current_page" value="1">
        
      <div class="items d-grid gap-4">

         @foreach ($recivedRequests as $recivedRequest)
             <div class="item">
               <div class="row">
                 <div class="col-9">
                   <label>{{$recivedRequest->recivedFriend['name'] .'-'.  $recivedRequest->recivedFriend['email']}}</label>
                 </div>
                 <div class="col-3 d-flex justify-content-end">
                   <a href="javascript:void(0)" class=" btn btn-primary" onclick="acceptRequest(this)"  data-id="{{encrypt($recivedRequest->recivedFriend['id'])}}">Accept</a>
                  </div>
               </div>
             </div>
         @endforeach
      </div>
     
      @if($recivedRequests->currentPage() < $recivedRequests->lastPage())
        <div class="d-flex justify-content-center mt-2 py-3 {{-- d-none --}}" id="load_more_btn_parent">
          <button class="btn btn-primary" data-path="recived_request"  id="load_more_btn">Load more</button>
        @endif
        </div>
      
  </div>
   