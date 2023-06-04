@foreach ($mutualFirends as $mutaul)
   <div class="commen_item">
      <div class="row">
         <div class="col-5">
            <label style="margin-left: 5%">{{$mutaul->name .'-'. $mutaul->email}}</label>
         </div>
      </div>
   </div>
   @endforeach
