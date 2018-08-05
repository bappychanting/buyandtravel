/*==================== start of windows resize functions  ====================*/

$( window ).resize(function() {

    // Align footer on windows resize

  footerAlign();

});

/*==================== end of windows resize functions  ====================*/

/*==================== start of document ready functions  ====================*/

$(document).ready(function(){

  time = 0;

    // Align footer

  footerAlign();

    // Set all html selects as material select

  $('.mdb-select').material_select();

    // Set TinyMce

  setTinyMce() 

    // Set when the loading screen will stop

  setTimeout(function () { $('.page-loader-wrapper').fadeOut(); }, 50);

    // hide button to scroll to top  

  $("#scrollToTopButton").hide();
  
    //  Check to see if the window is top if not then display button

  $(window).scroll(function(){
    if ($(this).scrollTop() > 200) {
      $("#scrollToTopButton").fadeIn();
    } else {
      $("#scrollToTopButton").fadeOut();
    }
  });
  
    //  Click event to scroll to top

  $("#scrollToTopButton").click(function(){
    $('html, body').animate({scrollTop : 0},800);
    return false;
  });

    // Showing Notifications

  if ($(".info_messages").length) {
      $( ".info_messages" ).each(function() {
        notificationLoop(time, $(this), "#", "info", "top", "right", 20, 120, 'animated fadeInDown', 'animated fadeOutUp');
        time++;
      });
  } 
  if ($(".success_messages").length) {
      $( ".success_messages" ).each(function() {
        notificationLoop(time, $(this), "#", "success", "top", "right", 20, 120, 'animated fadeInDown', 'animated fadeOutUp');
        time++;
      });
  } 
  if ($(".warning_messages").length) {
      $( ".warning_messages" ).each(function() {
        notificationLoop(time, $(this), "#", "warning", "top", "right", 20, 120, 'animated fadeInDown', 'animated fadeOutUp');
        time++;
      });
  } 
  if ($(".error_messages").length) {
      $( ".error_messages" ).each(function() {
        notificationLoop(time, $(this), "#", "danger", "top", "right", 20, 120, 'animated fadeInDown', 'animated fadeOutUp');
        time++;
      });
  } 

    //  Show image preview

  $('.input_image').change(function() {
      readURL(this, $(this).index());
  });

    //  Refresh preview on modal close

  $('#updateimage').on('hidden.bs.modal', function (e) {
    $('input[name=image]').empty().val('');
    $('.file-path').empty().val('');
    $('.preview_input').attr('src', 'http://placehold.it/200');
  });

    // Open and close details on button click

  $('#showDetails').on('show.bs.collapse', function () {
    $('#showDetailsButton').empty().append("<i class='fa fa-folder fa-sm pr-2'></i>Click Here to Close Details");
  });

  $('#showDetails').on('hidden.bs.collapse', function () {
    $('#showDetailsButton').empty().append("<i class='fa fa-folder-open fa-sm pr-2'></i>Click Here to Show Details");
  });

    //  Jquery form for uploading image and showing progress

  (function() {
    $('.upload_image').ajaxForm({
      beforeSend: function() {
      },
      uploadProgress: function() {
        $(".image_modal").empty().append("<div class='modal-body text-center mb-1'><h5 class='mt-1 mb-2'>Uploading Image</h5><div class='progress primary-color-dark'><div class='indeterminate'></div></div></div>");
      },
      success: function() {
        $(".image_modal").empty().append("<div class='modal-body text-center mb-1'><h5 class='mt-1 mb-2 light-green-text'><i class='fa fa-check-circle'></i> Image Uploaded</h5><p class='mt-1 mb-2 deep-orange-text'>Wait till the image is being saved...</p><div class='progress primary-color-dark'><div class='indeterminate'></div></div></div>").fadeIn("slow");        
      },
      error: function() {
       $(".image_modal").empty().append("<div class='modal-body text-center mb-1'><h5 class='mt-1 mb-2 red-text'><i class='fa fa-warning'></i> Image can't be Uploaded!</h5><p class='mt-1 mb-2 light-blue-text'>Something went wrong in the server. Wait till the page refreshes...</p><div class='progress primary-color-dark'><div class='indeterminate'></div></div></div>").fadeIn("slow");        
      },
      complete: function(xhr) {
        location.reload();
      }
    }); 
  })();

    //  Show offer details on modal popup

  $('.view_offer_details_button').click(function() {
    var offer = $(this).data('offer');
    var order = $(this).data('order');
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name=csrf-token]').attr('content')
      }
    });
    $.ajax({
      url: "offer/details",
      type: 'POST',
      data: {
        'offer_id': offer,
        'order_id': order
      },
      dataType: 'JSON',
      beforeSend: function(){
          $("#modal_offer_details").empty();
          $("<center><i class='fa fa-spinner fa-spin my-5'></i></center>").show().appendTo("#modal_offer_details");
          $("#modal_accept_offer_btn").prop("disabled",true);
      },
      success:function(response){
        $('#modal_offer_id').val(offer);
        $('#modal_order_id').val(order);
        $("#modal_accept_offer_btn").prop("disabled",false);
        $("#modal_offer_details").empty().append('<ul class="list-group list-group-flush mb-3"><li class="list-group-item"><i class="fa fa-user fa-sm pr-2"></i><strong>Added By: </strong>' +response['user']+'</li><li class="list-group-item"><i class="fa fa-cart-plus fa-sm pr-2"></i><strong>Quantity: </strong>'+response['quantity']+'</li><li class="list-group-item"><i class="fa fa-dollar fa-sm pr-2"></i><strong>Asking Price: </strong>'+response['price']+'/=</li><li class="list-group-item"><i class="fa fa-calendar-check-o fa-sm pr-2"></i><strong>Delivery Date: </strong>'+response['date']+'</li></ul>'+response['details']);
      },
      error: function(response){
        $("#modal_accept_offer_btn").prop("disabled",true);
        $("#modal_offer_details").empty().append('<p class="font-weight-bold text-center">Sorry, no data returned from server...</p>');
      }
    });
  });

    //  Edit message  

  $('.edit_message_button').click(function() {
    var message_id = $(this).data('message-id');
    var action = $('#edit_message_form').attr('action');
    $("#editMessageTitle").empty().append('Edit Message #'+message_id);
    $('#edit_message_form').attr('action', action+'/'+message_id);
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name=csrf-token]').attr('content')
      }
    });
    $.ajax({
      url: message_id+"/edit",
      type: 'GET',
      dataType: 'JSON',
      beforeSend: function(){
        tinymce.get('edit_message_textarea').setContent("<center><i class='fa fa-spinner fa-spin my-5'></i></center>");
      },
      success:function(response){
        // if(tinymce.get('edit_message_textarea').initialized){
        tinymce.get('edit_message_textarea').setContent(response);
        if(tinyMCE.get('edit_message_textarea').getContent().length > 0){
          $("#update_message_button").prop("disabled",false);
        }
      }
    });
  });

    //  Sweet alert for warning

  $('.form_warning_sweet_alert').on('click',function(e){
      e.preventDefault();
      var form = $(this).parents('form');
      var title = $(this).attr('title');
      var text = $(this).attr('text');
      var confirmButtonText = $(this).attr('confirmButtonText');
      swal({
          title: title,
          text: text,
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "#f80",
          confirmButtonText: confirmButtonText,
          closeOnConfirm: false
      }, function(isConfirm){
          if (isConfirm) form.submit();
      });
  });

      // MSB Jquery Datatable

  $('#dataTable').DataTable();
  $('#dataTable_wrapper').find('label').each(function () {
    $(this).parent().append($(this).children());
  });
  $('#dataTable_wrapper .dataTables_filter').find('input').each(function () {
    $('input').attr("placeholder", "Search");
    $('input').removeClass('form-control-sm');
  });
  $('#dataTable_wrapper .dataTables_length').addClass('d-flex flex-row');
  $('#dataTable_wrapper .dataTables_filter').addClass('md-form');
  $('#dataTable_wrapper select').removeClass('custom-select custom-select-sm form-control form-control-sm');
  $('#dataTable_wrapper select').addClass('mdb-select');
  $('#dataTable_wrapper .mdb-select').material_select();
  $('#dataTable_wrapper .dataTables_filter').find('label').remove();


});

/*==================== end of document ready functions  ====================*/

/*==================== start of individual functions  ====================*/

  // Function for aligning footer

function footerAlign() {
  $('footer').css('display', 'block');
  $('footer').css('height', 'auto');
  var footerHeight = $('footer').outerHeight();
  $('body').css('padding-bottom', footerHeight);
  $('footer').css('height', footerHeight);
}

  // Function for showing image preview

function readURL(input, i) {
    i = i-1;
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('.preview_input').eq(i).attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}

  // Function for printing a webpage area

function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}

  // Function for tinymce editor

function setTinyMce() {
    tinymce.init({
      // selector: 'textarea',
      // height: 300,
      theme: 'modern',
      mode : "specific_textareas",
      editor_selector : "editor",
      plugins: 'print preview autoresize searchreplace autolink directionality visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists textcolor wordcount imagetools contextmenu colorpicker textpattern help',
      toolbar1: 'formatselect | bold italic strikethrough forecolor backcolor | link | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent  | removeformat',
      image_advtab: true,
      autoresize_min_height: 300,
      autoresize_max_height: 800,
      templates: [
        { title: 'Test template 1', content: 'Test 1' },
        { title: 'Test template 2', content: 'Test 2' }
      ],
      content_css: [
        '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
        '//www.tinymce.com/css/codepen.min.css'
      ]
     });
}

  // Function for looping notificaitons

function notificationLoop(time, data, redirect, colorName, placementFrom, placementAlign, offsetFrom, offsetAlign, animateEnter, animateExit){
  setTimeout(function () {   
    showNotification(data.find('h1').text(), data.find('p').text(), redirect, colorName, placementFrom, placementAlign, offsetFrom, offsetAlign, animateEnter, animateExit);                                       
  }, 1000 * time)
}

  // Function for showing notificaitons

function showNotification(title, text, redirect, colorName, placementFrom, placementAlign, offsetFrom, offsetAlign, animateEnter, animateExit) {
    if (title === null || text === '') { text = ''; }
    if (text === null || text === '') { text = ''; }
    if (colorName === null || colorName === '') { colorName = 'bg-black'; }
    if (redirect === null || redirect === '') { redirect = '#'; }
    if (animateEnter === null || animateEnter === '') { animateEnter = 'animated fadeInDown'; }
    if (animateExit === null || animateExit === '') { animateExit = 'animated fadeOutUp'; }
    var allowDismiss = true;

    $.notify({
      // options
      icon: 'glyphicon glyphicon-warning-sign',
      title: title,
      message: text,
      url: redirect,
      target: '_blank'
    },{
      // settings
      element: 'body',
      position: null,
      type: colorName,
      allow_dismiss: allowDismiss,
      newest_on_top: true,
      showProgressbar: false,
      placement: {
        from: placementFrom,
        align: placementAlign
      },
      offset: {
        x: offsetFrom,
        y: offsetAlign
      },  
      spacing: 10,
      z_index: 1031,
      delay: 2000,
      timer: 1000,
      url_target: '_blank',
      mouse_over: null,
      animate: {
        enter: animateEnter,
        exit: animateExit
      },
      onShow: null,
      onShown: null,
      onClose: null,
      onClosed: null,
      icon_type: 'class',
      template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
                  '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
                  '<span data-notify="title">{1}</span>' +
                  '<br><span data-notify="message">{2}</span>' +
                  '<div class="progress" data-notify="progressbar">' +
                    '<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
                  '</div>' +
                  '<a href="{3}" target="{4}" data-notify="url"></a>' +
                '</div>'
    });
}

/*==================== end of individual functions  ====================*/