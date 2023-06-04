<div class="commen_items d-grid gap-4">
   <input type="hidden" name="total_commen_pages" value="{{$mutualFirends->lastPage()}}">
   <input type="hidden" name="current_commen_page" value="1">
   @foreach ($mutualFirends as $mutaul)
   <div class="commen_item">
      <div class="row">
         <div class="col-5">
            <label style="margin-left: 5%">{{$mutaul->name .'-'. $mutaul->email}}</label>
         </div>
      </div>
   </div>
   @endforeach
   
  
</div>
@if ($mutualFirends->currentPage() < $mutualFirends->lastPage())
   <div class="d-flex justify-content-center mt-2 py-2" id="load_more_commen_btn_parent">
      <button class="btn btn-primary" style="font-size: smaller; width:9%" data-path=""  id="load_more_commen_btn">Load more</button>
   </div>
@endif
