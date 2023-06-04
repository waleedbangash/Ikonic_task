<div class="container">
  
    
         <input type="hidden" name="total_pages" value="{{$sugestionUsers->lastPage()}}">
         <input type="hidden" name="current_page" value="1">
        
      <div class="items d-grid gap-4">
         @foreach ($sugestionUsers as $sugestionUser)
        
             <div class="item">
               <div class="row">
                 <div class="col-10">
                   <label>{{$sugestionUser['name'] .'-'. $sugestionUser['email']}}</label>
                 </div>
                 <div class="col-2">
                   <a href="javascript:void(0)" class="form-control ml-3 btn btn-primary send_request "   data-id="{{encrypt($sugestionUser['id'])}}">Connect</a>
                 </div>
               </div>
             </div>
         @endforeach
      </div>
      
      @if($sugestionUsers->currentPage() < $sugestionUsers->lastPage())
        <div class="d-flex justify-content-center mt-2 py-3 {{-- d-none --}}" id="load_more_btn_parent">
          <button class="btn btn-primary" data-path="get_sugestion"  id="load_more_btn">Load more</button>
        </div>
       @endif
  </div>
   