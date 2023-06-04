
<div class="items d-grid gap-4 mt-3">
 
  @foreach ($recivedRequests as $recivedRequest)
          <div class="item">
            <div class="row">
              <div class="col-9">
                <label>{{$recivedRequest->recivedFriend['name'] .'-'.  $recivedRequest->recivedFriend['email']}}</label>
              </div>
              <div class="col-3 d-flex justify-content-end">
                <a href="javascript:void(0)" class="btn btn-primary" onclick="acceptRequest(this)" data-id="{{encrypt($recivedRequest->recivedFriend['id'])}}">Accept</a>
              </div>
            </div>
          </div>
      @endforeach
</div>