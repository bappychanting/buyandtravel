function footerAlign() {
  $('footer').css('display', 'block');
  $('footer').css('height', 'auto');
  var footerHeight = $('footer').outerHeight();
  $('body').css('padding-bottom', footerHeight);
  $('footer').css('height', footerHeight);
}

$(document).ready(function(){
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

});

$( window ).resize(function() {
  footerAlign();
});



$(function () {
    tinymce.init({
      selector: 'textarea',
      height: 500,
      theme: 'modern',
      mode : "specific_textareas",
      editor_selector : "myTextEditor",
      plugins: 'print preview fullpage searchreplace autolink directionality visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists textcolor wordcount imagetools contextmenu colorpicker textpattern help',
      toolbar1: 'formatselect | bold italic strikethrough forecolor backcolor | link | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent  | removeformat',
      image_advtab: true,
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





/*$(document).ready(function() {

    var docHeight = $(window).height();
    var footerHeight = $('footer').outerHeight();
    var footerTop = $('footer').position().top + footerHeight;

    if (footerTop < docHeight)
        $('footer').css('margin-top', 16+ (docHeight - footerTop) + 'px');
});*/