<div class="container">
   <input type="hidden" name="total_pages" value="{{$connections->lastPage()}}">
   <input type="hidden" name="current_page" value="1">
   <div class="items d-grid gap-4">
   @foreach ($connections as $connected)
   <div class="item">
      <div class="row">
         <div class="col-7">
            <label>{{$connected['name'].'-'.$connected['email']}}</label>
         </div>
         <div class="col-5 d-flex justify-content-end">
            <button class="btn btn-primary show-mutual me-1" onclick="getConnectionsInCommon(this)" data-id="{{encrypt($connected['id'])}}">Connections in common ({{ $connected['friends_count'] }})</button>
            <button class="btn btn-danger connections" onclick="deleteConnection(this)" data-id="{{encrypt($connected['id'])}}">Remove Connection</button>
         </div>
      </div>
      <div class="commen_connection">
       
      </div>
      
   </div>
   @endforeach
  
</div>
   @if($connections->currentPage() < $connections->lastPage())
      <div class="d-flex justify-content-center mt-2 py-3 " id="load_more_btn_parent">
         <button class="btn btn-primary" data-path="connection_request"  id="load_more_btn">Load more</button>
      </div>
   @endif
</div>

