
//Modals
$(document).ready(function() {

    var overlay = $('#overlay');
    var open_modal = $('.open_modal');
    var close = $('.modal_close, #overlay');
    var modal = $('.modal_div');

     open_modal.click( function(event){
         event.preventDefault();
         var div = $(this).attr('href');
         overlay.fadeIn(400,
             function(){
                 $(div)
                     .css('display', 'block')
                     .animate({opacity: 1, top: '50%'}, 200);
         });
     });

     close.click( function(){
            modal
             .animate({opacity: 0, top: '45%'}, 200,
                 function(){
                     $(this).css('display', 'none');
                     overlay.fadeOut(400);
                 }
             );
     });
});

//Tabs

$('.tab-links').click(function(){
    $('.tab-links').removeClass('active');
    $(this).addClass('active');
    $('.tab-block-news').removeClass('active');
    $('#'+$(this).attr('data-tab')).addClass('active');
})

$('.download-link').click(function(){
    $('.download-link').removeClass('active');
    $(this).addClass('active');
    $('.download-block').removeClass('active');
    $('#'+$(this).attr('data-tab')).addClass('active');
})

$('.news-link').click(function(){
    $('.news-link').removeClass('active');
    $(this).addClass('active');
    $('.news-block').removeClass('active');
    $('#'+$(this).attr('data-tab')).addClass('active');
})

//Fixed Menu
$(function() {
    $(window).scroll(function() {
        if($(this).scrollTop() > 100) {
        $('.top-panel').addClass('top-fixed');
        } else {
        $('.top-panel').removeClass('top-fixed');
    }
    });
});

// News
var acc = document.getElementsByClassName("news-click");
var i;

for (i = 0; i < acc.length; i++) {
    acc[i].addEventListener("click", function() {
        /* Toggle between adding and removing the "active" class,
        to highlight the button that controls the panel */
        this.classList.toggle("active");

        /* Toggle between hiding and showing the active panel */
        var textnews = this.nextElementSibling;
        if (textnews.style.display === "block") {
            textnews.style.display = "none";
        } else {
            textnews.style.display = "block";
        }
    });
}
