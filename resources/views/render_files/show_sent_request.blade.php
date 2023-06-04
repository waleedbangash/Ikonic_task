<div class="container">
  
         <input type="hidden" name="total_pages" value="{{$sentRequests->lastPage()}}">
         <input type="hidden" name="current_page" value="1">
        
      <div class="items d-grid gap-4">

         @foreach ($sentRequests as $sentRequest)
             <div class="item">
               <div class="row">
                 <div class="col-9">
                   <label>{{$sentRequest->user['name'] .'-'. $sentRequest->user['email']}}</label>
                 </div>
                 <div class="col-3 d-flex justify-content-end">
                   <a href="javascript:void(0)" class="btn btn-danger" data-request="sent_request" onclick="deleteRequest(this)"  data-id="{{encrypt($sentRequest->user['id'])}}">Withdraw Request</a>
                 </div>
               </div>
             </div>
         @endforeach
      </div>
     
      @if($sentRequests->currentPage() < $sentRequests->lastPage())
        <div class="d-flex justify-content-center mt-2 py-3 {{-- d-none --}}" id="load_more_btn_parent">
          <button class="btn btn-primary" data-path="sent_request"  id="load_more_btn">Load more</button>
        @endif
        </div>
      
  </div>
   