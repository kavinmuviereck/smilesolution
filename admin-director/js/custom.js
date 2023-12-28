
// Image preview script
// 1-Feb-2019
$(document).on('click', '#close-preview', function(){ 
    $('.image-preview').popover('hide');
    // Hover befor close the preview
    $('.image-preview').hover(
        function () {
           $('.image-preview').popover('show');
        }, 
         function () {
           $('.image-preview').popover('hide');
        }
    );    
});

$(function() {
    // Create the close button
    var closebtn = $('<button/>', {
        type:"button",
        text: 'x',
        id: 'close-preview',
        style: 'font-size: initial;',
    });
    closebtn.attr("class","close pull-right");
    // Set the popover default content
    $('.image-preview').popover({
        trigger:'manual',
        html:true,
        title: "<strong>Preview</strong>"+$(closebtn)[0].outerHTML,
        content: "There's no image",
        placement:'bottom'
    });
    // Clear event
    $('.image-preview-clear').click(function(){
        $('.image-preview').attr("data-content","").popover('hide');
        $('.image-preview-filename').val("");
        $('.image-preview-clear').hide();
        $('.image-preview-input input:file').val("");
        $(".image-preview-input-title").text("Browse"); 
    }); 
    // Create the preview image
    $(".image-preview-input input:file").change(function (){     
        var img = $('<img/>', {
            id: 'dynamic',
            width:250,
            height:200
        });      
        var file = this.files[0];
        var reader = new FileReader();
        // Set preview image into the popover data-content
        reader.onload = function (e) {
            $(".image-preview-input-title").text("Change");
            $(".image-preview-clear").show();
            $(".image-preview-filename").val(file.name);            
            img.attr('src', e.target.result);
            $(".image-preview").attr("data-content",$(img)[0].outerHTML).popover("show");
        }        
        reader.readAsDataURL(file);
    });  
});
//Image preview script ends

//Video preview script Starts

// $(document).on('click', '#close-preview', function(){ 
//     $('.video-preview').popover('hide');
//     // Hover befor close the preview
//     $('.video-preview').hover(
//         function () {
//            $('.video-preview').popover('show');
//         }, 
//          function () {
//            $('.video-preview').popover('hide');
//         }
//     );    
// });


$(function() {
    // Create the close button
    var closebtn = $('<button/>', {
        type:"button",
        text: 'x',
        id: 'close-preview',
        style: 'font-size: initial;',
    });
    closebtn.attr("class","close pull-right");
    // Set the popover default content
    $('.video-preview').popover({
        trigger:'manual',
        html:true,
        title: "<strong>Preview</strong>"+$(closebtn)[0].outerHTML,
        content: "There's no image",
        placement:'bottom'
    });
    // Clear event
    $('.video-preview-clear').click(function(){
        $('.video-preview').attr("data-content","").popover('hide');
        $('.video-preview-filename').val("");
        $('.video-preview-clear').hide();
        $('.video-preview-input input:file').val("");
        $(".video-preview-input-title").text("Choose Video"); 
    }); 
    // Create the preview video
    $(".video-preview-input input:file").change(function (){     
        var img = $('<iframe/>', {
            id: 'dynamic',
            width:250,
            height:200
        });      
        var file = this.files[0];
        var reader = new FileReader();
        // Set preview image into the popover data-content
        reader.onload = function (e) {
            $(".video-preview-input-title").text("Change");
            $(".video-preview-clear").show();
            $(".video-preview-filename").val(file.name);            
            img.attr('src', e.target.result);
            //$(".video-preview").attr("data-content",$(img)[0].outerHTML).popover("show");
        }        
        reader.readAsDataURL(file);
    });  
});
//Video preview script ends








//Sidebar toggle script
//1-feb-2019
jQuery(function ($) {
  $(".sidebar-dropdown > a").click(function() {
    $(".sidebar-submenu").slideUp(200);
    if ($(this).parent().hasClass("active")) {
      $(".sidebar-dropdown").removeClass("active");
      $(this).parent().removeClass("active");
    } 
    else {
      $(".sidebar-dropdown").removeClass("active");
      $(this).next(".sidebar-submenu").slideDown(200);
      $(this).parent().addClass("active");
    }
  });

  $("#close-sidebar").click(function() {
    $(".page-wrapper").removeClass("toggled");
  });
  $("#show-sidebar").click(function() {
    $(".page-wrapper").addClass("toggled");
  });
});   

// $('.sidebar-menu-li a').click(function(){
//   $(this).addClass('active');
//     var link_url = $(this).attr('data-url');
//     $('#hidden_field').val(link_url);
//     $(".divContent").load(link_url);
//     return false;
// });
//Ends

    $(document).ready(function() {
      $('.content').richText();
      // CKEDITOR.replace( 'full_descp' );
    });