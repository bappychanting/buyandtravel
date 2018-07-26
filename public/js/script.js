$( window ).resize(function() {
  footerAlign();
});

$(document).ready(function(){

  time = 0;

  $('.mdb-select').material_select();
  footerAlign();
  setTimeout(function () { $('.page-loader-wrapper').fadeOut(); }, 50);

  $('.delete_sweet_alert').on('click', function () {
     swal({   
      title: "Are you sure?",   
      text: "You will not be able to recover this imaginary file!",   
      type: "warning",   
      showCancelButton: true,   
      confirmButtonColor: "#DD6B55",   
      confirmButtonText: "Yes, delete it!",   
      cancelButtonText: "No, cancel plx!",   
      closeOnConfirm: false,   
      closeOnCancel: false }, 
      function(isConfirm){   
         if (isConfirm) {     
             swal("Deleted!", "Your imaginary file has been deleted.", "success");   } 
         else {
             swal("Cancelled", "Your imaginary file is safe :)", "error");   } 
      });
  });

   $("#scrollToTopButton").hide();
  
      //Check to see if the window is top if not then display button
    $(window).scroll(function(){
      if ($(this).scrollTop() > 200) {
        $("#scrollToTopButton").fadeIn();
      } else {
        $("#scrollToTopButton").fadeOut();
      }
    });
    
      //Click event to scroll to top
    $("#scrollToTopButton").click(function(){
      $('html, body').animate({scrollTop : 0},800);
      return false;
    });

      // Notifications
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

    $('.input_image').change(function() {
        readURL(this, $(this).index());
    });

    $('#showDetails').on('show.bs.collapse', function () {
      $('#showDetailsButton').empty().append("<i class='fa fa-folder fa-sm pr-2'></i>Click Here to Close Details");
    })

    $('#showDetails').on('hidden.bs.collapse', function () {
      $('#showDetailsButton').empty().append("<i class='fa fa-folder-open fa-sm pr-2'></i>Click Here to Show Details");
    })

    $('#updateimage').on('hidden.bs.modal', function (e) {
      $('input[name=image]').empty().val('');
      $('.file-path').empty().val('');
      $('.preview_input').attr('src', 'http://placehold.it/200');
    });

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
    })

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
            confirmButtonColor: "#2196f3",
            confirmButtonText: confirmButtonText,
            closeOnConfirm: false
        }, function(isConfirm){
            if (isConfirm) form.submit();
        });
    });

      // Jquery Datatable
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
      // #ENDS# Jquery Datatable

});

function footerAlign() {
  $('footer').css('display', 'block');
  $('footer').css('height', 'auto');
  var footerHeight = $('footer').outerHeight();
  $('body').css('padding-bottom', footerHeight);
  $('footer').css('height', footerHeight);
}

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

function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}

$(function () {
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
});

function notificationLoop(time, data, redirect, colorName, placementFrom, placementAlign, offsetFrom, offsetAlign, animateEnter, animateExit){
  setTimeout(function () {   
    showNotification(data.find('h1').text(), data.find('p').text(), redirect, colorName, placementFrom, placementAlign, offsetFrom, offsetAlign, animateEnter, animateExit);                                       
  }, 1000 * time)
}

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





/*$(document).ready(function() {

    var docHeight = $(window).height();
    var footerHeight = $('footer').outerHeight();
    var footerTop = $('footer').position().top + footerHeight;

    if (footerTop < docHeight)
        $('footer').css('margin-top', 16+ (docHeight - footerTop) + 'px');
});*/