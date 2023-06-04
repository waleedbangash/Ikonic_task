var skeletonId = 'skeleton';
var contentId = 'content';
var skipCounter = 0;
var takeAmount = 10;

function getRecivedRequest()
{
 $.ajax({
    url: 'get_recived_request',
    type:'get',
    success: function(response) {
      return $('#content').html(response);
    },
  });
}

function getConnections() {
  $.ajax({
    url: 'get_connections',
    data:{
        'latest':true,
    },
    success: function(response) {
      return $('#content').html(response);
    },
  });
}
function deleteConnection(param) {

  id = param.getAttribute('data-id');
  request_type = param.getAttribute('data-request')
  url = 'delete_connection/'+id;

  $.ajax({
    url:url,
    type :"get",
    success: function(response) {
      if(response.status == 200)
      {
         $(param).closest('.item').remove();
      }
      
    },
  });
}
var coment_connection = '';
function getConnectionsInCommon(param) {
  _this = $(param);
  commen_connection=$('.commen_items').length;
  if(commen_connection =1)
  {
    $('#load_more_commen_btn_parent').remove()
    $('.commen_items').remove();
  }
    
  id = param.getAttribute('data-id');
  url = 'git_commen_connection/'+id;

  $.ajax({
    url:url,
    type :"get",
    success: function(response) {
      return _this.closest('.item').find('.commen_connection').html(response);
    },
  });
}

function getSuggestions() {
  $.ajax({
    url: 'get_sugestions',
    data:{
        'latest':true,
    },
    success: function(response) {
      return $('#content').html(response);
    },
  });
}

function deleteRequest(param) {

  id = param.getAttribute('data-id');
  url = 'delete_request/'+id;

  $.ajax({
    url:url,
    type :"get",
    success: function(response) {
      if(response.status == 200)
      {
         $(param).closest('.item').remove();
      } 
    },
  });

}

function acceptRequest(param) {
  
  id = param.getAttribute('data-id');
  request_type = param.getAttribute('data-request')
  url = 'accept_request';
  $.ajax({
    headers:
    {
      "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
          "content"
      ),
    },
    url:url,
    data: {
      "id": id,
    },
    type :"post",
    success: function(response) {
      if(response.status == 200)
      {
         $(param).closest('.item').remove();
      }  
    },
  });
}



$(function () {
  getSuggestions();
});

$('body').on('click', '#get_connections_btn', function() {

  value= getConnections();
  console.log(value,'value');
});

$('body').on('click','#get_suggestions_btn',function(){
  getSuggestions();
})

$('body').on('click','#get_received_requests_btn',function(){
  getRecivedRequest();
})

//use for pagination

$('body').on('click','.send_request',function(){
  _this = $(this);
 
  var id = _this.data('id');
  $.ajax({
    headers:
    {
      "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
          "content"
      ),
    },
    url: 'send_request',
    data:{
      'id':id,
    },
    type:'post',
    success: function(response) {  
      if(response.status == 200)
      {
        _this.closest('.item').remove();
      }
    },
  });
})

$('body').on('click','#get_sent_requests_btn',function(){
  _this = $(this);
  
  $.ajax({
    url: 'get_sent_request',
    type:'get',
    success: function(response) {
      return $('#content').html(response);
    },
  });
});

$('body').on('click', '#load_more_btn', function (e) {  

  _this = $(this);
  var path = _this.data('path');
 
  if(path == 'sent_request')
  {
    var url = 'get_sent_request'
  }
   if('recived_request')
  {
      url = 'get_recived_request';
  }
  if(path == 'connection_request')
  {
    url ="get_connections";
  }
  if(path == 'get_sugestion'){
     url = 'get_sugestions'
  }

  let total_pages = Number($('input[name="total_pages"]').val());
  let page = Number($('input[name="current_page"]').val());
 
  if (total_pages && page && page < total_pages) {
      var flag = true;
     
      if (flag === true) {
          page = page + 1;
          
          $.ajax(
              {    
                  url: url,
                  type: "get",
                  data:
                  {
                      page: page
                  },
              })
              .done(function (response) {
                  $('input[name="current_page"]').val(page);
                  _this.closest('.container').find('.items:last').after(response);

                  if (page >= total_pages) {
                      $('#load_more_btn').addClass('d-none');
                  }
              })
              .fail(function (jqXHR, ajaxOptions, thrownError) {
                  console.log(jqXHR, ajaxOptions, thrownError)
              });
          flag = false;
      }
  }
});

// Pagination for common connection
$('body').on('click', '#load_more_commen_btn', function (e) {  

  _this = $(this);
  id =_this.closest('.item').find('.show-mutual').data('id');

  var url = 'git_commen_connection/'+id

  let total_pages = Number($('input[name="total_commen_pages"]').val());
  let page = Number($('input[name="current_commen_page"]').val());
 
  if (total_pages && page && page < total_pages) {
      var flag = true;
     
      if (flag === true) {
          page = page + 1;
          
          $.ajax(
              {  
                url: url,
                type: "get",
                data:
                {
                    page: page
                },
              })
              .done(function (response) {               
                  $('input[name="current_commen_page"]').val(page);
                  _this.closest('.commen_connection').find('.commen_item:last').after(response);

                  if (page >= total_pages) {
                      $('#load_more_commen_btn').addClass('d-none');
                  }
              })
              .fail(function (jqXHR, ajaxOptions, thrownError) {
                  console.log(jqXHR, ajaxOptions, thrownError)
              });
          flag = false;
      }
  }
});





function button_status(element, handle) {
  if (handle == "loading") {
      /* loading */
      element.data('text', element.html());
      element.prop('disabled', true);
      element.html('<span class="spinner-grow spinner-grow-sm mr-2"></span>' + ['Loading']);
  } else {
      /* reset */
      element.prop('disabled', false);
      element.html(element.data('text'));
  }
}