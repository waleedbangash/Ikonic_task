
<div class="items d-grid gap-4 mt-3">
  @foreach ($sugestionUsers as $sugestionUser)
    <div class="item">
      <div class="row">
        <div class="col-10">
          <label>{{$sugestionUser['name'] .'-'. $sugestionUser['email']}}</label>
        </div>
        <div class="col-2">
          <a href="javascript:void(0)" class="form-control ml-3 btn btn-danger send_request"  data-id="{{encrypt($sugestionUser['id'])}}">connect</a>
        </div>
      </div>
    </div>
  @endforeach
</div>
   