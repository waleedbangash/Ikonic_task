
<div class="items d-grid gap-4 mt-3">
 
  @foreach ($sentRequests as $sentRequest)
          <div class="item">
            <div class="row">
              <div class="col-9">
                <label>{{$sentRequest['user']['name'] .'-'. $sentRequest['user']['email']}}</label>
              </div>
              <div class="col-3 d-flex justify-content-end">
                <a href="javascript:void(0)" class=" btn btn-danger" data-request="sent_request" onclick="deleteRequest(this)"  data-id="{{encrypt($sentRequest['user']['id'])}}">Withdraw Request</a>
              </div>
            </div>
          </div>
      @endforeach
</div>
   