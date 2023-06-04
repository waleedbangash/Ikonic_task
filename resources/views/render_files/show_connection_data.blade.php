
<div class="items d-grid gap-4 mt-3">
 
  @foreach ($connections as $connected)
    <div class="item">
      <div class="row">
        <div class="col-9">
            <label>{{$connected['name'].'-'.$connected['email']}}</label>
        </div>
        <div class="col-3 d-flex justify-content-end">
            <button class="btn btn-danger show-mutual me-1"  data-id="{{$connected['id']}}" onclick="getConnectionsInCommon(this)">Connections in common ({{ count($connected->friends) }})</button>
            <button class="btn btn-danger connections" onclick="deleteConnection(this)" data-id="{{$connected['id']}}">Remove Connection</button>
        </div>
      </div>
    </div>
  @endforeach
</div>
   